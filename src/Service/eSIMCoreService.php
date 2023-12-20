<?php

namespace Esim\eSIMCoreClient\Service;

use Esim\eSIMCoreClient\Dto\Request\BalanceRequest;
use Esim\eSIMCoreClient\Dto\Request\CreateOrderRequest;
use Esim\eSIMCoreClient\Dto\Request\PackageDetailsByPackageCodeRequest;
use Esim\eSIMCoreClient\Dto\Request\PackageGroupsRequest;
use Esim\eSIMCoreClient\Dto\Request\PackagesByFootprintCodeRequest;
use Esim\eSIMCoreClient\Dto\Request\SignatureDto;
use Esim\eSIMCoreClient\Dto\Response\Order\BalanceDto;
use Esim\eSIMCoreClient\Dto\Response\Order\OrderDto;
use Esim\eSIMCoreClient\Dto\Response\Package\PackageDetailsDto;
use Esim\eSIMCoreClient\Dto\Response\Package\PackageDto;
use Esim\eSIMCoreClient\Dto\Response\PackageGroup\PackageGroupDto;
use Esim\eSIMCoreClient\Enum\Headers;
use Esim\eSIMCoreClient\Exception\ClientException;
use Esim\eSIMCoreClient\Exception\CoreSignatureError;
use Esim\eSIMCoreClient\Exception\ResourceNotFoundException;
use Esim\eSIMCoreClient\Helper\SignatureHelper;
use Esim\eSIMCoreClient\Mapper\Order\OrderDtoMapper;
use Esim\eSIMCoreClient\Mapper\Package\BalanceDtoMapper;
use Esim\eSIMCoreClient\Mapper\Package\PackageDetailsDtoMapper;
use Esim\eSIMCoreClient\Mapper\Package\PackageDtoMapper;
use Esim\eSIMCoreClient\Mapper\PackageGroup\PackageGroupDtoMapper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class eSIMCoreService
{
    const PACKAGES_BY_FOOTPRINT_CODE_ROUTE = '/packages/%s';
    const PACKAGE_GROUPS_ROUTE = '/package-groups';
    const PACKAGES_DETAILS_BY_CODE_ROUTE = '/packages/%s/details';
    const CREATE_ORDER_ROUTE = '/order';
    const BALANCE_ROUTE = '/order/%s/balance';
    const CONTENT_TYPE = 'application/json';

    public function __construct(
        public readonly HttpClientInterface $eSIMCoreClient,
        public readonly string              $baseUri,
        public readonly string              $apiKey,
        public readonly string              $secretKey
    )
    {
    }

    /**
     * @param PackagesByFootprintCodeRequest $packagesByFootprintCodeRequest
     * @return array<int, PackageDto>
     * @throws ClientException
     */
    public function getPackagesByFootprintCode(PackagesByFootprintCodeRequest $packagesByFootprintCodeRequest): array
    {
        try {
            $headers = [
                Headers::CONTENT_TYPE->value => self::CONTENT_TYPE,
                Headers::CLIENT_COUNTRY->value => $packagesByFootprintCodeRequest->getCountry(),
                Headers::CLIENT_LANGUAGE->value => $packagesByFootprintCodeRequest->getLanguage(),
                Headers::CLIENT_IP->value => $packagesByFootprintCodeRequest->getIp(),
                Headers::CORRELATION_ID->value => $packagesByFootprintCodeRequest->getCorrelationId(),
                Headers::CLIENT_TIMEZONE->value => $packagesByFootprintCodeRequest->getTimezone(),
                Headers::TOKEN->value => $this->apiKey,
            ];

            $signatureDto = SignatureDto::builder()
                ->setUrl($this->baseUri . sprintf(self::PACKAGES_BY_FOOTPRINT_CODE_ROUTE, $packagesByFootprintCodeRequest->getFootprintCode()))
                ->setHeaders($headers);

            $headers[Headers::SIGNATURE->value] = SignatureHelper::calculateSignature($signatureDto->toArray(), $this->secretKey);
            $response = $this->eSIMCoreClient->request(
                Request::METHOD_GET,
                sprintf(self::PACKAGES_BY_FOOTPRINT_CODE_ROUTE, $packagesByFootprintCodeRequest->getFootprintCode()),
                [
                    'headers' => $headers
                ]
            );

            $packagesResult = $response->toArray()['result']['packages'] ?? [];
            $packages = [];

            if (!empty($packagesResult)) {
                foreach ($packagesResult as $package) {
                    $packages[] = PackageDtoMapper::map($package);
                }
                unset($packagesResult);
            }

            return $packages;
        } catch (ClientExceptionInterface|DecodingExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $exception) {
            throw new ClientException($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * @param PackageGroupsRequest $packageGroupsRequest
     * @return array<int, PackageGroupDto>
     * @throws ClientException
     */
    public function getPackageGroups(PackageGroupsRequest $packageGroupsRequest): array
    {
        try {
            $headers = [
                Headers::CONTENT_TYPE->value => self::CONTENT_TYPE,
                Headers::CLIENT_COUNTRY->value => $packageGroupsRequest->getCountry(),
                Headers::CLIENT_LANGUAGE->value => $packageGroupsRequest->getLanguage(),
                Headers::CLIENT_IP->value => $packageGroupsRequest->getIp(),
                Headers::CORRELATION_ID->value => $packageGroupsRequest->getCorrelationId(),
                Headers::CLIENT_TIMEZONE->value => $packageGroupsRequest->getTimezone(),
                Headers::TOKEN->value => $this->apiKey,
            ];

            $signatureDto = SignatureDto::builder()
                ->setUrl($this->baseUri . self::PACKAGE_GROUPS_ROUTE)
                ->setHeaders($headers);

            $headers[Headers::SIGNATURE->value] = SignatureHelper::calculateSignature($signatureDto->toArray(), $this->secretKey);
            $response = $this->eSIMCoreClient->request(
                Request::METHOD_GET,
                self::PACKAGE_GROUPS_ROUTE,
                [
                    'headers' => $headers
                ]
            );

            $packageGroupsResult = $response->toArray()['result']['packageGroups'] ?? [];
            $packageGroups = [];

            if (!empty($packageGroupsResult)) {
                foreach ($packageGroupsResult as $packageGroup) {
                    $packageGroups[] = PackageGroupDtoMapper::map($packageGroup);
                }
                unset($packageGroupsResult);
            }

            return $packageGroups;
        } catch (ClientExceptionInterface|DecodingExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $exception) {
            throw new ClientException($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * @param PackageDetailsByPackageCodeRequest $packageDetailsByPackageCodeRequest
     * @return PackageDetailsDto
     * @throws ClientException
     */
    public function getPackageDetailsByCode(PackageDetailsByPackageCodeRequest $packageDetailsByPackageCodeRequest): PackageDetailsDto
    {
        try {
            $headers = [
                Headers::CONTENT_TYPE->value => self::CONTENT_TYPE,
                Headers::CLIENT_COUNTRY->value => $packageDetailsByPackageCodeRequest->getCountry(),
                Headers::CLIENT_LANGUAGE->value => $packageDetailsByPackageCodeRequest->getLanguage(),
                Headers::CLIENT_IP->value => $packageDetailsByPackageCodeRequest->getIp(),
                Headers::CORRELATION_ID->value => $packageDetailsByPackageCodeRequest->getCorrelationId(),
                Headers::CLIENT_TIMEZONE->value => $packageDetailsByPackageCodeRequest->getTimezone(),
                Headers::TOKEN->value => $this->apiKey,
            ];

            $signatureDto = SignatureDto::builder()
                ->setUrl($this->baseUri . sprintf(self::PACKAGES_DETAILS_BY_CODE_ROUTE, $packageDetailsByPackageCodeRequest->getPackageCode()))
                ->setHeaders($headers);

            $headers[Headers::SIGNATURE->value] = SignatureHelper::calculateSignature($signatureDto->toArray(), $this->secretKey);
            $response = $this->eSIMCoreClient->request(
                Request::METHOD_GET,
                sprintf(self::PACKAGES_DETAILS_BY_CODE_ROUTE, $packageDetailsByPackageCodeRequest->getPackageCode()),
                [
                    'headers' => $headers
                ]
            );

            $packagesDetailsResult = $response->toArray()['result']['packageDetails'] ?? null;
            if (empty($packagesDetailsResult)) {
                throw new ResourceNotFoundException();
            }
            return PackageDetailsDtoMapper::map($packagesDetailsResult);
        } catch (ResourceNotFoundException|ClientExceptionInterface|DecodingExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $exception) {
            throw new ClientException($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * @throws ClientException
     */
    public function postCreateOrder(CreateOrderRequest $createOrderRequest): OrderDto
    {
        try {
            $headers = [
                Headers::CONTENT_TYPE->value => self::CONTENT_TYPE,
                Headers::CLIENT_COUNTRY->value => $createOrderRequest->getCountry(),
                Headers::CLIENT_LANGUAGE->value => $createOrderRequest->getLanguage(),
                Headers::CLIENT_IP->value => $createOrderRequest->getIp(),
                Headers::CORRELATION_ID->value => $createOrderRequest->getCorrelationId(),
                Headers::CLIENT_TIMEZONE->value => $createOrderRequest->getTimezone(),
                Headers::TOKEN->value => $this->apiKey,
            ];

            $payload = [
                'packageCode' => $createOrderRequest->getPackageCode(),
                'email' => $createOrderRequest->getEmail(),
                'activationDate' => $createOrderRequest->getActivationDate(),
                'subscriberId' => $createOrderRequest->getSubscriberId(),
                'parentOrder' => $createOrderRequest->getParentOrder(),
                'customParams' => $createOrderRequest->getCustomParams(),
            ];

            $signatureDto = SignatureDto::builder()
                ->setUrl($this->baseUri . self::CREATE_ORDER_ROUTE)
                ->setHeaders($headers)
                ->setPayload($payload);

            $headers[Headers::SIGNATURE->value] = SignatureHelper::calculateSignature($signatureDto->toArray(), $this->secretKey);
            $response = $this->eSIMCoreClient->request(
                Request::METHOD_POST,
                self::CREATE_ORDER_ROUTE,
                [
                    'headers' => $headers,
                    'json' => $payload
                ]
            );

            $createOrderResult = $response->toArray()['result'] ?? null;
            if (empty($createOrderResult)) {
                throw new ResourceNotFoundException();
            }
            return OrderDtoMapper::map($createOrderResult);
        } catch (ResourceNotFoundException|ClientExceptionInterface|DecodingExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $exception) {
            throw new ClientException($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * @param BalanceRequest $balanceRequest
     * @return BalanceDto|null
     * @throws ClientException
     */
    public function getBalance(BalanceRequest $balanceRequest): ?BalanceDto
    {
        try {
            $headers = [
                Headers::CONTENT_TYPE->value => self::CONTENT_TYPE,
                Headers::CLIENT_COUNTRY->value => $balanceRequest->getCountry(),
                Headers::CLIENT_LANGUAGE->value => $balanceRequest->getLanguage(),
                Headers::CLIENT_IP->value => $balanceRequest->getIp(),
                Headers::CORRELATION_ID->value => $balanceRequest->getCorrelationId(),
                Headers::CLIENT_TIMEZONE->value => $balanceRequest->getTimezone(),
                Headers::TOKEN->value => $this->apiKey,
            ];

            $signatureDto = SignatureDto::builder()
                ->setUrl($this->baseUri . sprintf(self::BALANCE_ROUTE, $balanceRequest->getTrackingNumber()))
                ->setHeaders($headers);

            $headers[Headers::SIGNATURE->value] = SignatureHelper::calculateSignature($signatureDto->toArray(), $this->secretKey);

            $response = $this->eSIMCoreClient->request(
                Request::METHOD_GET,
                sprintf(self::BALANCE_ROUTE, $balanceRequest->getTrackingNumber()),
                [
                    'headers' => $headers
                ]
            );

            $balanceResult = $response->toArray()['result'] ?? [];
            $balance = null;

            if (!empty($balanceResult)) {
                $balance = BalanceDtoMapper::map($balanceResult);
                unset($balanceResult);
            }

            return $balance;
        } catch (ClientExceptionInterface|DecodingExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $exception) {
            throw new ClientException($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * @param array $signatureArray
     * @param string|null $signature
     * @return void
     * @throws CoreSignatureError
     */
    public function checkWebhookSignature(array $signatureArray, ?string $signature): void
    {
        $calculateSignature = SignatureHelper::calculateSignature($signatureArray, $this->secretKey);
        if (
            empty($signature) ||
            !hash_equals(
                $signature,
                $calculateSignature
            )
        ) {
            throw new CoreSignatureError('Signature not match: ' . $signature . ', Calculate Signature: ' . $calculateSignature);
        }
    }
}
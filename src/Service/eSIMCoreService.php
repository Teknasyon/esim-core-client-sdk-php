<?php

namespace eSIM\eSIMCoreClient\Service;

use eSIM\eSIMCoreClient\Dto\Request\ActivateOrderRequest;
use eSIM\eSIMCoreClient\Dto\Request\BaseRequest;
use eSIM\eSIMCoreClient\Dto\Request\CancelOrderRequest;
use eSIM\eSIMCoreClient\Dto\Request\CreateOrderRequest;
use eSIM\eSIMCoreClient\Dto\Request\BalanceRequest;
use eSIM\eSIMCoreClient\Dto\Request\OrderStatusCheckBulkRequest;
use eSIM\eSIMCoreClient\Dto\Request\PackageDetailsByPackageCodeRequest;
use eSIM\eSIMCoreClient\Dto\Request\PackageGroupsRequest;
use eSIM\eSIMCoreClient\Dto\Request\PackagesByFootprintCodeRequest;
use eSIM\eSIMCoreClient\Dto\Request\SignatureDto;
use eSIM\eSIMCoreClient\Dto\Response\Order\BalanceDto;
use eSIM\eSIMCoreClient\Dto\Response\Order\OrderDto;
use eSIM\eSIMCoreClient\Dto\Response\Package\PackageDetailsDto;
use eSIM\eSIMCoreClient\Dto\Response\Package\PackageDto;
use eSIM\eSIMCoreClient\Dto\Response\PackageGroup\PackageGroupDto;
use eSIM\eSIMCoreClient\Enum\Headers;
use eSIM\eSIMCoreClient\Exception\ClientException;
use eSIM\eSIMCoreClient\Exception\CoreSignatureError;
use eSIM\eSIMCoreClient\Exception\ResourceNotFoundException;
use eSIM\eSIMCoreClient\Helper\SignatureHelper;
use eSIM\eSIMCoreClient\Mapper\Order\OrderDtoMapper;
use eSIM\eSIMCoreClient\Mapper\Package\BalanceDtoMapper;
use eSIM\eSIMCoreClient\Mapper\Package\PackageDetailsDtoMapper;
use eSIM\eSIMCoreClient\Mapper\Package\PackageDtoMapper;
use eSIM\eSIMCoreClient\Mapper\PackageGroup\PackageGroupDtoMapper;
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
    const ACTIVATE_ROUTE = '/order/%s/activate';
    const ORDER_STATUS_CHECK_BULK_ROUTE = '/order/status-check/bulk';
    const CANCEL_ROUTE = '/order/%s/cancel';
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
            $headers = $this->getHeaders($packagesByFootprintCodeRequest);

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
            $headers = $this->getHeaders($packageGroupsRequest);

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
            $headers = $this->getHeaders($packageDetailsByPackageCodeRequest);

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
            $headers = $this->getHeaders($createOrderRequest);

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
            $headers = $this->getHeaders($balanceRequest);

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
     * @throws ClientException
     */
    public function patchActivateOrder(ActivateOrderRequest $activateOrderRequest): bool
    {
        try {
            $headers = $this->getHeaders($activateOrderRequest);

            $signatureDto = SignatureDto::builder()
                ->setUrl($this->baseUri . sprintf(self::ACTIVATE_ROUTE, $activateOrderRequest->getTrackingNumber()))
                ->setHeaders($headers);

            $headers[Headers::SIGNATURE->value] = SignatureHelper::calculateSignature($signatureDto->toArray(), $this->secretKey);
            $response = $this->eSIMCoreClient->request(
                Request::METHOD_PATCH,
                sprintf(self::ACTIVATE_ROUTE, $activateOrderRequest->getTrackingNumber()),
                [
                    'headers' => $headers
                ]
            );

            return $response->getStatusCode() == 204;
        } catch (ResourceNotFoundException|ClientExceptionInterface|DecodingExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $exception) {
            throw new ClientException($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * @throws ClientException
     * @throws ResourceNotFoundException
     */
    public function checkOrderStatusBulk(OrderStatusCheckBulkRequest $orderStatusCheckBulkRequest): bool
    {
        try {
            $headers = $this->getHeaders($orderStatusCheckBulkRequest);

            $payload = $orderStatusCheckBulkRequest->toArray();

            $signatureDto = SignatureDto::builder()
                ->setUrl($this->baseUri . self::ORDER_STATUS_CHECK_BULK_ROUTE)
                ->setHeaders($headers)
                ->setPayload($payload);

            $headers[Headers::SIGNATURE->value] = SignatureHelper::calculateSignature($signatureDto->toArray(), $this->secretKey);
            $response = $this->eSIMCoreClient->request(
                Request::METHOD_POST,
                self::ORDER_STATUS_CHECK_BULK_ROUTE,
                [
                    'headers' => $headers,
                    'json' => $payload
                ]
            );

            return $response->getStatusCode() == 200;
        } catch (ClientExceptionInterface|DecodingExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $exception) {
            throw new ClientException($exception->getMessage(), $exception->getCode());
        }
    }

    /**
     * @throws ClientException
     */
    public function patchCancelOrder(CancelOrderRequest $cancelOrderRequest): bool
    {
        try {
            $headers = $this->getHeaders($cancelOrderRequest);

            $signatureDto = SignatureDto::builder()
                ->setUrl($this->baseUri . sprintf(self::CANCEL_ROUTE, $cancelOrderRequest->getTrackingNumber()))
                ->setHeaders($headers);

            $headers[Headers::SIGNATURE->value] = SignatureHelper::calculateSignature($signatureDto->toArray(), $this->secretKey);
            $response = $this->eSIMCoreClient->request(
                Request::METHOD_PATCH,
                sprintf(self::CANCEL_ROUTE, $cancelOrderRequest->getTrackingNumber()),
                [
                    'headers' => $headers
                ]
            );

            return $response->getStatusCode() == 204;
        } catch (ResourceNotFoundException|ClientExceptionInterface|DecodingExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $exception) {
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

    private function getHeaders(BaseRequest $request): array
    {
        $headers = [
            Headers::CONTENT_TYPE->value => self::CONTENT_TYPE,
            Headers::CLIENT_COUNTRY->value => $request->getCountry(),
            Headers::CLIENT_LANGUAGE->value => $request->getLanguage(),
            Headers::CLIENT_IP->value => $request->getIp(),
            Headers::CORRELATION_ID->value => $request->getCorrelationId(),
            Headers::CLIENT_TIMEZONE->value => $request->getTimezone(),
            Headers::TOKEN->value => $this->apiKey,
        ];

        if (!is_null($request->getCurrency())) {
            $headers[Headers::CURRENCY->value] = $request->getCurrency();
        }
        return $headers;
    }
}
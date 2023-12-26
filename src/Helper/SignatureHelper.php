<?php

namespace eSIM\eSIMCoreClient\Helper;

class SignatureHelper
{
    const SIGNATURE_ALGORITHM = 'sha256';

    /**
     * @param array $signatureArray
     * @param string $secretKey
     * @return string
     */
    public static function calculateSignature(array $signatureArray, string $secretKey): string
    {
        self::ksortRecursive($signatureArray);
        $jsonFormat = json_encode($signatureArray, JSON_PRESERVE_ZERO_FRACTION | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        return base64_encode(hash_hmac(self::SIGNATURE_ALGORITHM, $jsonFormat, $secretKey, true));
    }

    /**
     * @param array $array
     * @return void
     */
    public static function ksortRecursive(array &$array): void
    {
        ksort($array);
        foreach ($array as &$a) {
            is_array($a) && self::ksortRecursive($a);
        }
    }
}
<?php

namespace Esim\eSIMCoreClient\Helper;

use DateTime;
use DateTimeInterface;
use DateTimeZone;
use Exception;

class DateHelper
{
    const DATE_TIME_FORMAT = 'Y-m-d H:i:s';
    const DATE_FORMAT = 'Y-m-d';

    /**
     * @param string $dateTime
     * @return DateTime
     */
    public static function getDateTime(string $dateTime): DateTime
    {
        try {
            return new DateTime($dateTime);
        } catch (Exception) {
            return new DateTime();
        }
    }

    /**
     * @param string|null $dateTime
     * @return DateTime|null
     */
    public static function nullableDateTime(?string $dateTime): ?DateTime
    {
        if (empty($dateTime)) {
            return null;
        }
        return self::getDateTime($dateTime);
    }

    /**
     * @param DateTimeInterface $datetime
     * @param $timezone
     * @return void
     */
    public static function setTimeZone(DateTimeInterface $datetime, $timezone): void
    {
        try {
            $datetime->setTimezone(new DateTimeZone($timezone));
        } catch (Exception $e) {
            $datetime->setTimezone(new DateTimeZone('UTC'));
        }
    }
}
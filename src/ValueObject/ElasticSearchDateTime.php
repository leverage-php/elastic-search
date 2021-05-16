<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\ValueObject;

use DateInterval;
use DateTime;
use DateTimeZone;
use Exception;
use JsonSerializable;

class ElasticSearchDateTime implements JsonSerializable
{
    private const DATETIME_FORMAT = 'U u';

    private $at;

    public static function createfromFormat(
        string $format,
        string $datetime,
        DateTimeZone $timezone = null
    ): self {
        $at = DateTime::createFromFormat($format, $datetime, $timezone);

        if (!$at) {
            throw new Exception('Unable to create DateTime');
        }

        return new ElasticSearchDateTime($at);
    }

    public function __construct(
        DateTime $at = null
    ) {
        $this->at = $at ?? new DateTime;
    }

    public function diff(
        ElasticSearchDateTime $other
    ): DateInterval {
        return $this->at->diff($other->at);
    }

    public function jsonSerialize(): string
    {
        $str = $this->at->format('Y-m-d\TH:i:s.u');
        return substr($str, 0, -3) . 'Z';
    }

    public function sub(
        DateInterval $interval
    ): ElasticSearchDateTime {
        return new ElasticSearchDateTime($this->at->sub($interval));
    }
}

<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\ValueObject;

use DateInterval;
use DateTime;
use JsonSerializable;

class ElasticSearchDateTime implements JsonSerializable
{
    private const DATETIME_FORMAT = 'U u';

    private $at;

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

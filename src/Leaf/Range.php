<?php

declare(strict_types=1);

namespace Leverage\ElasticSearch\Leaf;

use Leverage\ElasticSearch\Interfaces\LeafInterface;

class Range implements LeafInterface
{
    /** @var string */
    private $field;

    /** @var mixed */
    private $greaterThan;

    /** @var mixed */
    private $greaterThanEqual;

    /** @var mixed */
    private $lessThan;

    /** @var mixed */
    private $lessThanEqual;

    /**
     * @param mixed $greaterThanEqual
     * @param mixed $lessThan
     */
    public function __construct(
        string $field,
        $greaterThanEqual = null,
        $lessThan = null
    ) {
        $this->field = $field;
        $this->greaterThanEqual = $greaterThanEqual;
        $this->lessThan = $lessThan;
    }

    public function jsonSerialize(): array
    {
        $plan = [];

        if ($this->greaterThan !== null) {
            $plan['gt'] = $this->greaterThan;
        }

        if ($this->greaterThanEqual !== null) {
            $plan['gte'] = $this->greaterThanEqual;
        }

        if ($this->lessThan !== null) {
            $plan['lt'] = $this->lessThan;
        }

        if ($this->lessThanEqual !== null) {
            $plan['lte'] = $this->lessThanEqual;
        }

        return [
            'range' => [
                $this->field => $plan,
            ],
        ];
    }

    /**
     * @param mixed $greaterThan
     */
    public function setGreaterThan(
        $greaterThan
    ): self {
        $this->greaterThan = $greaterThan;
        return $this;
    }

    /**
     * @param mixed $greaterThanEqual
     */
    public function setGreaterThanEqual(
        $greaterThanEqual
    ): self {
        $this->greaterThanEqual = $greaterThanEqual;
        return $this;
    }

    /**
     * @param mixed $lessThan
     */
    public function setLessThan(
        $lessThan
    ): self {
        $this->lessThan = $lessThan;
        return $this;
    }

    /**
     * @param mixed $lessThanEqual
     */
    public function setLessThanEqual(
        $lessThanEqual
    ): self {
        $this->lessThanEqual = $lessThanEqual;
        return $this;
    }
}

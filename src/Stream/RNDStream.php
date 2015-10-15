<?php
/**
 * Simplest stream, creates stream of random generated numbers.
 *
 * @class \Stream\RNDStream
 */

namespace Stream;


class RNDStream implements \IteratorAggregate
{

    const STREAM_SIZE = 10000;

    private $maxSize;

    public function __construct($maxSize = self::STREAM_SIZE)
    {
        $this->maxSize = $maxSize;
    }

    public function getIterator()
    {
        for($i = 0; $i < $this->maxSize; $i++) {
            yield mt_rand(0, $this->maxSize);
        }
    }
}
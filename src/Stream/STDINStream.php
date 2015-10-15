<?php
/**
 * STDIN stream, can read values through piped input.
 * As well, as from user input.
 *
 * @class \Stream\STDINStream
 */
namespace Stream;

class STDINStream implements \IteratorAggregate
{

    const CLOSE_STREAM_COMMAND  = 'exit';
    const STREAM_URL            = 'php://stdin';

    private $streamUrl;

    public function __construct($streamUrl = self::STREAM_URL)
    {
        $this->streamUrl = $streamUrl;
    }

    public function getIterator()
    {
        $stdin = fopen($this->streamUrl, 'r');

        while (($value = trim(fgets($stdin))) && ($value != self::CLOSE_STREAM_COMMAND)) {
            yield $value;
        }

        fclose($stdin);
    }
}
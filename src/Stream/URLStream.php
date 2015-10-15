<?php
/**
 * URL stream, reads values from remote url streams.
 *
 * @class \Stream\URLStream
 */

namespace Stream;


class URLStream implements \IteratorAggregate
{

    /**
     * URL to read from
     *
     * @var string
     */
    private $url;

    public function __construct($url)
    {
        if(!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \Exception('Invalid URL provided');
        }
        $this->url = $url;
    }

    public function getIterator()
    {
        $pointer = fopen($this->url, 'r');

        if(false === $pointer) {
            throw new \Exception('Error accessing URL');
        }

        while($value = fgets($pointer)) {
            yield trim($value);
        }

        fclose($pointer);
    }
}
<?php

/**
 * Class RNDStreamTest
 */

use \Stream\RNDStream;

class RNDStreamTest extends PHPUnit_Framework_TestCase
{
    public function testSize() {
        $stream = new RNDStream(10);
        $i = 0;
        foreach($stream as $val) {
            $i++;
        }
        $this->assertEquals(10, $i);
    }
}
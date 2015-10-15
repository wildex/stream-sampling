<?php

/**
 * Class STDINStreamTest
 */

use \Stream\STDINStream;
use org\bovigo\vfs\vfsStream;

class STDINStreamTest extends PHPUnit_Framework_TestCase
{

    private $stdin;

    public function setup() {
        vfsStream::setup('std');
    }

    public function testRead() {
        $this->stdin = vfsStream::url('std/input');
        file_put_contents($this->stdin, "quick\nbrown\ndog\njumped\nover\nhappy\nfox");

        $stream = new STDINStream($this->stdin);
        $i = 0;
        foreach($stream as $val) {
            $i++;
        }
        $this->assertEquals(7, $i);
    }
}
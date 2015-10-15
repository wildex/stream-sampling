<?php

/**
 * Class URLStreamTestTest
 */

use \Stream\URLStream;
use org\bovigo\vfs\vfsStream;

class URLStreamTest extends PHPUnit_Framework_TestCase
{
    public function testCall()
    {
        $handle = vfsStream::newFile('handle')
            ->withContent(FileContent)
            ->at(vfsStream::setup('root'));

        $iterator = new URLStream($handle->url());
        $data = [];
        foreach ($iterator as $item) {
            $data[] = (int)$item;
        }
    }
}
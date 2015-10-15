<?php

/**
 * Class ReservoirSamplerTest
 */

use \Sampler\ReservoirSampler;

class ReservoirSamplerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Sampler\ReservoirSampler
     */
    private $sampling;

    /**
     * @var array
     */
    private $values;

    public function setUp()
    {
        $this->values = range(0,100);
        $this->sampling = new ReservoirSampler(new \ArrayIterator($this->values));
    }

    /**
     * Test proper sample size creation
     */
    public function testSampleSize()
    {
        $this->assertEquals(0, count($this->sampling->sample(0)));
        $this->assertEquals(99, count($this->sampling->sample(99)));
    }

    /**
     * Test proper sampling values
     */
    public function testSample() {
        $sample = $this->sampling->sample(5);
        $this->assertTrue(count(array_intersect($sample, $this->values)) == count($sample));
    }
}
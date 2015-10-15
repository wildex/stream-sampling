<?php
/**
 * Sampler class. Implements Reservoir sampling
 * algorithm.
 *
 * @class \Sampler\Sampler
 */

namespace Sampler;

class ReservoirSampler
{
    /**
     * @var \Traversable
     */
    private $stream;

    public function __construct(\Traversable $stream)
    {
        $this->stream = $stream;
    }

    /**
     * Creates sample according to requested size.
     *
     * @param $size
     * @return array
     */
    public function sample($size)
    {
        $result = [];
        $i      = 0;

        foreach ($this->stream as $value) {
            if ($i < $size) {
                $result[$i] = $value;
            } else {
                $rnd = mt_rand(0, $i);
                if ($rnd < $size) {
                    $result[$rnd] = $value;
                }
            }
            $i++;
        }

        return $result;
    }
}
<?php
/**
 * Creates appropriate stream.
 *
 * @class \Stream\StreamFactory
 */

namespace Stream;


class StreamFactory
{

    const STREAM_CLASS_SUFFIX = 'Stream';

    public static function getStream($type, $url = null)
    {

        $class = '\\' . __NAMESPACE__ . '\\' . $type . self::STREAM_CLASS_SUFFIX;

        if(!class_exists($class)) {
            throw new \Exception('Requested stream type not available');
        }

        $stream = ('URL' === $type) ? new $class($url)
                                    : new $class();

        return $stream;
    }
}
<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/datastream/v1/datastream_resources.proto

namespace Google\Cloud\Datastream\V1\Stream;

use UnexpectedValueException;

/**
 * Stream state.
 *
 * Protobuf type <code>google.cloud.datastream.v1.Stream.State</code>
 */
class State
{
    /**
     * Unspecified stream state.
     *
     * Generated from protobuf enum <code>STATE_UNSPECIFIED = 0;</code>
     */
    const STATE_UNSPECIFIED = 0;
    /**
     * The stream has been created but has not yet started streaming data.
     *
     * Generated from protobuf enum <code>NOT_STARTED = 1;</code>
     */
    const NOT_STARTED = 1;
    /**
     * The stream is running.
     *
     * Generated from protobuf enum <code>RUNNING = 2;</code>
     */
    const RUNNING = 2;
    /**
     * The stream is paused.
     *
     * Generated from protobuf enum <code>PAUSED = 3;</code>
     */
    const PAUSED = 3;
    /**
     * The stream is in maintenance mode.
     * Updates are rejected on the resource in this state.
     *
     * Generated from protobuf enum <code>MAINTENANCE = 4;</code>
     */
    const MAINTENANCE = 4;
    /**
     * The stream is experiencing an error that is preventing data from being
     * streamed.
     *
     * Generated from protobuf enum <code>FAILED = 5;</code>
     */
    const FAILED = 5;
    /**
     * The stream has experienced a terminal failure.
     *
     * Generated from protobuf enum <code>FAILED_PERMANENTLY = 6;</code>
     */
    const FAILED_PERMANENTLY = 6;
    /**
     * The stream is starting, but not yet running.
     *
     * Generated from protobuf enum <code>STARTING = 7;</code>
     */
    const STARTING = 7;
    /**
     * The Stream is no longer reading new events, but still writing events in
     * the buffer.
     *
     * Generated from protobuf enum <code>DRAINING = 8;</code>
     */
    const DRAINING = 8;

    private static $valueToName = [
        self::STATE_UNSPECIFIED => 'STATE_UNSPECIFIED',
        self::NOT_STARTED => 'NOT_STARTED',
        self::RUNNING => 'RUNNING',
        self::PAUSED => 'PAUSED',
        self::MAINTENANCE => 'MAINTENANCE',
        self::FAILED => 'FAILED',
        self::FAILED_PERMANENTLY => 'FAILED_PERMANENTLY',
        self::STARTING => 'STARTING',
        self::DRAINING => 'DRAINING',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}


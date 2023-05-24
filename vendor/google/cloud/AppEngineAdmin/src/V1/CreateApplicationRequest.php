<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/appengine/v1/appengine.proto

namespace Google\Cloud\AppEngine\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for `Applications.CreateApplication`.
 *
 * Generated from protobuf message <code>google.appengine.v1.CreateApplicationRequest</code>
 */
class CreateApplicationRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Application configuration.
     *
     * Generated from protobuf field <code>.google.appengine.v1.Application application = 2;</code>
     */
    private $application = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\AppEngine\V1\Application $application
     *           Application configuration.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Appengine\V1\Appengine::initOnce();
        parent::__construct($data);
    }

    /**
     * Application configuration.
     *
     * Generated from protobuf field <code>.google.appengine.v1.Application application = 2;</code>
     * @return \Google\Cloud\AppEngine\V1\Application|null
     */
    public function getApplication()
    {
        return $this->application;
    }

    public function hasApplication()
    {
        return isset($this->application);
    }

    public function clearApplication()
    {
        unset($this->application);
    }

    /**
     * Application configuration.
     *
     * Generated from protobuf field <code>.google.appengine.v1.Application application = 2;</code>
     * @param \Google\Cloud\AppEngine\V1\Application $var
     * @return $this
     */
    public function setApplication($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AppEngine\V1\Application::class);
        $this->application = $var;

        return $this;
    }

}


<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.ErrorDetails</code>
 */
class ErrorDetails extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.ErrorInfo error_info = 25251973;</code>
     */
    private $error_info = null;
    /**
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.Help help = 3198785;</code>
     */
    private $help = null;
    /**
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.LocalizedMessage localized_message = 404537155;</code>
     */
    private $localized_message = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Compute\V1\ErrorInfo $error_info
     *     @type \Google\Cloud\Compute\V1\Help $help
     *     @type \Google\Cloud\Compute\V1\LocalizedMessage $localized_message
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.ErrorInfo error_info = 25251973;</code>
     * @return \Google\Cloud\Compute\V1\ErrorInfo|null
     */
    public function getErrorInfo()
    {
        return $this->error_info;
    }

    public function hasErrorInfo()
    {
        return isset($this->error_info);
    }

    public function clearErrorInfo()
    {
        unset($this->error_info);
    }

    /**
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.ErrorInfo error_info = 25251973;</code>
     * @param \Google\Cloud\Compute\V1\ErrorInfo $var
     * @return $this
     */
    public function setErrorInfo($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Compute\V1\ErrorInfo::class);
        $this->error_info = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.Help help = 3198785;</code>
     * @return \Google\Cloud\Compute\V1\Help|null
     */
    public function getHelp()
    {
        return $this->help;
    }

    public function hasHelp()
    {
        return isset($this->help);
    }

    public function clearHelp()
    {
        unset($this->help);
    }

    /**
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.Help help = 3198785;</code>
     * @param \Google\Cloud\Compute\V1\Help $var
     * @return $this
     */
    public function setHelp($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Compute\V1\Help::class);
        $this->help = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.LocalizedMessage localized_message = 404537155;</code>
     * @return \Google\Cloud\Compute\V1\LocalizedMessage|null
     */
    public function getLocalizedMessage()
    {
        return $this->localized_message;
    }

    public function hasLocalizedMessage()
    {
        return isset($this->localized_message);
    }

    public function clearLocalizedMessage()
    {
        unset($this->localized_message);
    }

    /**
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.LocalizedMessage localized_message = 404537155;</code>
     * @param \Google\Cloud\Compute\V1\LocalizedMessage $var
     * @return $this
     */
    public function setLocalizedMessage($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Compute\V1\LocalizedMessage::class);
        $this->localized_message = $var;

        return $this;
    }

}


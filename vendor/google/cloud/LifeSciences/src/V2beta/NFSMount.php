<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/lifesciences/v2beta/workflows.proto

namespace Google\Cloud\LifeSciences\V2beta;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Configuration for an `NFSMount` to be attached to the VM.
 *
 * Generated from protobuf message <code>google.cloud.lifesciences.v2beta.NFSMount</code>
 */
class NFSMount extends \Google\Protobuf\Internal\Message
{
    /**
     * A target NFS mount. The target must be specified as `address:/mount".
     *
     * Generated from protobuf field <code>string target = 1;</code>
     */
    private $target = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $target
     *           A target NFS mount. The target must be specified as `address:/mount".
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Lifesciences\V2Beta\Workflows::initOnce();
        parent::__construct($data);
    }

    /**
     * A target NFS mount. The target must be specified as `address:/mount".
     *
     * Generated from protobuf field <code>string target = 1;</code>
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * A target NFS mount. The target must be specified as `address:/mount".
     *
     * Generated from protobuf field <code>string target = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setTarget($var)
    {
        GPBUtil::checkString($var, True);
        $this->target = $var;

        return $this;
    }

}

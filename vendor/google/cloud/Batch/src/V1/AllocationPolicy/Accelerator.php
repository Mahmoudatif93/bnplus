<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/batch/v1/job.proto

namespace Google\Cloud\Batch\V1\AllocationPolicy;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Accelerator describes Compute Engine accelerators to be attached to VMs.
 *
 * Generated from protobuf message <code>google.cloud.batch.v1.AllocationPolicy.Accelerator</code>
 */
class Accelerator extends \Google\Protobuf\Internal\Message
{
    /**
     * The accelerator type. For example, "nvidia-tesla-t4".
     * See `gcloud compute accelerator-types list`.
     *
     * Generated from protobuf field <code>string type = 1;</code>
     */
    private $type = '';
    /**
     * The number of accelerators of this type.
     *
     * Generated from protobuf field <code>int64 count = 2;</code>
     */
    private $count = 0;
    /**
     * Generated from protobuf field <code>bool install_gpu_drivers = 3 [deprecated = true];</code>
     * @deprecated
     */
    protected $install_gpu_drivers = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $type
     *           The accelerator type. For example, "nvidia-tesla-t4".
     *           See `gcloud compute accelerator-types list`.
     *     @type int|string $count
     *           The number of accelerators of this type.
     *     @type bool $install_gpu_drivers
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Batch\V1\Job::initOnce();
        parent::__construct($data);
    }

    /**
     * The accelerator type. For example, "nvidia-tesla-t4".
     * See `gcloud compute accelerator-types list`.
     *
     * Generated from protobuf field <code>string type = 1;</code>
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * The accelerator type. For example, "nvidia-tesla-t4".
     * See `gcloud compute accelerator-types list`.
     *
     * Generated from protobuf field <code>string type = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkString($var, True);
        $this->type = $var;

        return $this;
    }

    /**
     * The number of accelerators of this type.
     *
     * Generated from protobuf field <code>int64 count = 2;</code>
     * @return int|string
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * The number of accelerators of this type.
     *
     * Generated from protobuf field <code>int64 count = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setCount($var)
    {
        GPBUtil::checkInt64($var);
        $this->count = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bool install_gpu_drivers = 3 [deprecated = true];</code>
     * @return bool
     * @deprecated
     */
    public function getInstallGpuDrivers()
    {
        @trigger_error('install_gpu_drivers is deprecated.', E_USER_DEPRECATED);
        return $this->install_gpu_drivers;
    }

    /**
     * Generated from protobuf field <code>bool install_gpu_drivers = 3 [deprecated = true];</code>
     * @param bool $var
     * @return $this
     * @deprecated
     */
    public function setInstallGpuDrivers($var)
    {
        @trigger_error('install_gpu_drivers is deprecated.', E_USER_DEPRECATED);
        GPBUtil::checkBool($var);
        $this->install_gpu_drivers = $var;

        return $this;
    }

}



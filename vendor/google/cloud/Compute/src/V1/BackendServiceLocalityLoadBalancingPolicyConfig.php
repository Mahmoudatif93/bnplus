<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Container for either a built-in LB policy supported by gRPC or Envoy or a custom one implemented by the end user.
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.BackendServiceLocalityLoadBalancingPolicyConfig</code>
 */
class BackendServiceLocalityLoadBalancingPolicyConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.BackendServiceLocalityLoadBalancingPolicyConfigCustomPolicy custom_policy = 4818368;</code>
     */
    private $custom_policy = null;
    /**
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.BackendServiceLocalityLoadBalancingPolicyConfigPolicy policy = 91071794;</code>
     */
    private $policy = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Compute\V1\BackendServiceLocalityLoadBalancingPolicyConfigCustomPolicy $custom_policy
     *     @type \Google\Cloud\Compute\V1\BackendServiceLocalityLoadBalancingPolicyConfigPolicy $policy
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.BackendServiceLocalityLoadBalancingPolicyConfigCustomPolicy custom_policy = 4818368;</code>
     * @return \Google\Cloud\Compute\V1\BackendServiceLocalityLoadBalancingPolicyConfigCustomPolicy|null
     */
    public function getCustomPolicy()
    {
        return $this->custom_policy;
    }

    public function hasCustomPolicy()
    {
        return isset($this->custom_policy);
    }

    public function clearCustomPolicy()
    {
        unset($this->custom_policy);
    }

    /**
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.BackendServiceLocalityLoadBalancingPolicyConfigCustomPolicy custom_policy = 4818368;</code>
     * @param \Google\Cloud\Compute\V1\BackendServiceLocalityLoadBalancingPolicyConfigCustomPolicy $var
     * @return $this
     */
    public function setCustomPolicy($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Compute\V1\BackendServiceLocalityLoadBalancingPolicyConfigCustomPolicy::class);
        $this->custom_policy = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.BackendServiceLocalityLoadBalancingPolicyConfigPolicy policy = 91071794;</code>
     * @return \Google\Cloud\Compute\V1\BackendServiceLocalityLoadBalancingPolicyConfigPolicy|null
     */
    public function getPolicy()
    {
        return $this->policy;
    }

    public function hasPolicy()
    {
        return isset($this->policy);
    }

    public function clearPolicy()
    {
        unset($this->policy);
    }

    /**
     * Generated from protobuf field <code>optional .google.cloud.compute.v1.BackendServiceLocalityLoadBalancingPolicyConfigPolicy policy = 91071794;</code>
     * @param \Google\Cloud\Compute\V1\BackendServiceLocalityLoadBalancingPolicyConfigPolicy $var
     * @return $this
     */
    public function setPolicy($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Compute\V1\BackendServiceLocalityLoadBalancingPolicyConfigPolicy::class);
        $this->policy = $var;

        return $this;
    }

}


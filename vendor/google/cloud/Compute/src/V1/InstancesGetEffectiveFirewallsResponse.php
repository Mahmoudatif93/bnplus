<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.InstancesGetEffectiveFirewallsResponse</code>
 */
class InstancesGetEffectiveFirewallsResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Effective firewalls from firewall policies.
     *
     * Generated from protobuf field <code>repeated .google.cloud.compute.v1.InstancesGetEffectiveFirewallsResponseEffectiveFirewallPolicy firewall_policys = 410985794;</code>
     */
    private $firewall_policys;
    /**
     * Effective firewalls on the instance.
     *
     * Generated from protobuf field <code>repeated .google.cloud.compute.v1.Firewall firewalls = 272245619;</code>
     */
    private $firewalls;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Cloud\Compute\V1\InstancesGetEffectiveFirewallsResponseEffectiveFirewallPolicy>|\Google\Protobuf\Internal\RepeatedField $firewall_policys
     *           Effective firewalls from firewall policies.
     *     @type array<\Google\Cloud\Compute\V1\Firewall>|\Google\Protobuf\Internal\RepeatedField $firewalls
     *           Effective firewalls on the instance.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * Effective firewalls from firewall policies.
     *
     * Generated from protobuf field <code>repeated .google.cloud.compute.v1.InstancesGetEffectiveFirewallsResponseEffectiveFirewallPolicy firewall_policys = 410985794;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getFirewallPolicys()
    {
        return $this->firewall_policys;
    }

    /**
     * Effective firewalls from firewall policies.
     *
     * Generated from protobuf field <code>repeated .google.cloud.compute.v1.InstancesGetEffectiveFirewallsResponseEffectiveFirewallPolicy firewall_policys = 410985794;</code>
     * @param array<\Google\Cloud\Compute\V1\InstancesGetEffectiveFirewallsResponseEffectiveFirewallPolicy>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setFirewallPolicys($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Compute\V1\InstancesGetEffectiveFirewallsResponseEffectiveFirewallPolicy::class);
        $this->firewall_policys = $arr;

        return $this;
    }

    /**
     * Effective firewalls on the instance.
     *
     * Generated from protobuf field <code>repeated .google.cloud.compute.v1.Firewall firewalls = 272245619;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getFirewalls()
    {
        return $this->firewalls;
    }

    /**
     * Effective firewalls on the instance.
     *
     * Generated from protobuf field <code>repeated .google.cloud.compute.v1.Firewall firewalls = 272245619;</code>
     * @param array<\Google\Cloud\Compute\V1\Firewall>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setFirewalls($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Compute\V1\Firewall::class);
        $this->firewalls = $arr;

        return $this;
    }

}


<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/identity/accesscontextmanager/v1/service_perimeter.proto

namespace Google\Identity\AccessContextManager\V1\ServicePerimeterConfig;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Policy for ingress into [ServicePerimeter]
 * [google.identity.accesscontextmanager.v1.ServicePerimeter].
 * [IngressPolicies]
 * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressPolicy]
 * match requests based on `ingress_from` and `ingress_to` stanzas.  For an
 * ingress policy to match, both the `ingress_from` and `ingress_to` stanzas
 * must be matched. If an [IngressPolicy]
 * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressPolicy]
 * matches a request, the request is allowed through the perimeter boundary
 * from outside the perimeter.
 * For example, access from the internet can be allowed either
 * based on an [AccessLevel]
 * [google.identity.accesscontextmanager.v1.AccessLevel] or, for traffic
 * hosted on Google Cloud, the project of the source network. For access from
 * private networks, using the project of the hosting network is required.
 * Individual ingress policies can be limited by restricting which
 * services and/or actions they match using the `ingress_to` field.
 *
 * Generated from protobuf message <code>google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressPolicy</code>
 */
class IngressPolicy extends \Google\Protobuf\Internal\Message
{
    /**
     * Defines the conditions on the source of a request causing this
     * [IngressPolicy]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressPolicy]
     * to apply.
     *
     * Generated from protobuf field <code>.google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressFrom ingress_from = 1;</code>
     */
    private $ingress_from = null;
    /**
     * Defines the conditions on the [ApiOperation]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.ApiOperation]
     * and request destination that cause this [IngressPolicy]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressPolicy]
     * to apply.
     *
     * Generated from protobuf field <code>.google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressTo ingress_to = 2;</code>
     */
    private $ingress_to = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig\IngressFrom $ingress_from
     *           Defines the conditions on the source of a request causing this
     *           [IngressPolicy]
     *           [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressPolicy]
     *           to apply.
     *     @type \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig\IngressTo $ingress_to
     *           Defines the conditions on the [ApiOperation]
     *           [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.ApiOperation]
     *           and request destination that cause this [IngressPolicy]
     *           [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressPolicy]
     *           to apply.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Identity\Accesscontextmanager\V1\ServicePerimeter::initOnce();
        parent::__construct($data);
    }

    /**
     * Defines the conditions on the source of a request causing this
     * [IngressPolicy]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressPolicy]
     * to apply.
     *
     * Generated from protobuf field <code>.google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressFrom ingress_from = 1;</code>
     * @return \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig\IngressFrom|null
     */
    public function getIngressFrom()
    {
        return $this->ingress_from;
    }

    public function hasIngressFrom()
    {
        return isset($this->ingress_from);
    }

    public function clearIngressFrom()
    {
        unset($this->ingress_from);
    }

    /**
     * Defines the conditions on the source of a request causing this
     * [IngressPolicy]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressPolicy]
     * to apply.
     *
     * Generated from protobuf field <code>.google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressFrom ingress_from = 1;</code>
     * @param \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig\IngressFrom $var
     * @return $this
     */
    public function setIngressFrom($var)
    {
        GPBUtil::checkMessage($var, \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig\IngressFrom::class);
        $this->ingress_from = $var;

        return $this;
    }

    /**
     * Defines the conditions on the [ApiOperation]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.ApiOperation]
     * and request destination that cause this [IngressPolicy]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressPolicy]
     * to apply.
     *
     * Generated from protobuf field <code>.google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressTo ingress_to = 2;</code>
     * @return \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig\IngressTo|null
     */
    public function getIngressTo()
    {
        return $this->ingress_to;
    }

    public function hasIngressTo()
    {
        return isset($this->ingress_to);
    }

    public function clearIngressTo()
    {
        unset($this->ingress_to);
    }

    /**
     * Defines the conditions on the [ApiOperation]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.ApiOperation]
     * and request destination that cause this [IngressPolicy]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressPolicy]
     * to apply.
     *
     * Generated from protobuf field <code>.google.identity.accesscontextmanager.v1.ServicePerimeterConfig.IngressTo ingress_to = 2;</code>
     * @param \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig\IngressTo $var
     * @return $this
     */
    public function setIngressTo($var)
    {
        GPBUtil::checkMessage($var, \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig\IngressTo::class);
        $this->ingress_to = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IngressPolicy::class, \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig_IngressPolicy::class);


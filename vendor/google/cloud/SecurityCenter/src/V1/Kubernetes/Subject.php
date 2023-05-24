<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/securitycenter/v1/kubernetes.proto

namespace Google\Cloud\SecurityCenter\V1\Kubernetes;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a Kubernetes Subject.
 *
 * Generated from protobuf message <code>google.cloud.securitycenter.v1.Kubernetes.Subject</code>
 */
class Subject extends \Google\Protobuf\Internal\Message
{
    /**
     * Authentication type for subject.
     *
     * Generated from protobuf field <code>.google.cloud.securitycenter.v1.Kubernetes.Subject.AuthType kind = 1;</code>
     */
    private $kind = 0;
    /**
     * Namespace for subject.
     *
     * Generated from protobuf field <code>string ns = 2;</code>
     */
    private $ns = '';
    /**
     * Name for subject.
     *
     * Generated from protobuf field <code>string name = 3;</code>
     */
    private $name = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $kind
     *           Authentication type for subject.
     *     @type string $ns
     *           Namespace for subject.
     *     @type string $name
     *           Name for subject.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Securitycenter\V1\Kubernetes::initOnce();
        parent::__construct($data);
    }

    /**
     * Authentication type for subject.
     *
     * Generated from protobuf field <code>.google.cloud.securitycenter.v1.Kubernetes.Subject.AuthType kind = 1;</code>
     * @return int
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * Authentication type for subject.
     *
     * Generated from protobuf field <code>.google.cloud.securitycenter.v1.Kubernetes.Subject.AuthType kind = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setKind($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\SecurityCenter\V1\Kubernetes\Subject\AuthType::class);
        $this->kind = $var;

        return $this;
    }

    /**
     * Namespace for subject.
     *
     * Generated from protobuf field <code>string ns = 2;</code>
     * @return string
     */
    public function getNs()
    {
        return $this->ns;
    }

    /**
     * Namespace for subject.
     *
     * Generated from protobuf field <code>string ns = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNs($var)
    {
        GPBUtil::checkString($var, True);
        $this->ns = $var;

        return $this;
    }

    /**
     * Name for subject.
     *
     * Generated from protobuf field <code>string name = 3;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Name for subject.
     *
     * Generated from protobuf field <code>string name = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Subject::class, \Google\Cloud\SecurityCenter\V1\Kubernetes_Subject::class);


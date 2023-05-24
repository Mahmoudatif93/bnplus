<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/osconfig/v1/os_policy.proto

namespace Google\Cloud\OsConfig\V1\OSPolicy\Resource\RepositoryResource;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a single apt package repository. These will be added to
 * a repo file that will be managed at
 * `/etc/apt/sources.list.d/google_osconfig.list`.
 *
 * Generated from protobuf message <code>google.cloud.osconfig.v1.OSPolicy.Resource.RepositoryResource.AptRepository</code>
 */
class AptRepository extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Type of archive files in this repository.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.OSPolicy.Resource.RepositoryResource.AptRepository.ArchiveType archive_type = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $archive_type = 0;
    /**
     * Required. URI for this repository.
     *
     * Generated from protobuf field <code>string uri = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $uri = '';
    /**
     * Required. Distribution of this repository.
     *
     * Generated from protobuf field <code>string distribution = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $distribution = '';
    /**
     * Required. List of components for this repository. Must contain at
     * least one item.
     *
     * Generated from protobuf field <code>repeated string components = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $components;
    /**
     * URI of the key file for this repository. The agent maintains a
     * keyring at `/etc/apt/trusted.gpg.d/osconfig_agent_managed.gpg`.
     *
     * Generated from protobuf field <code>string gpg_key = 5;</code>
     */
    private $gpg_key = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $archive_type
     *           Required. Type of archive files in this repository.
     *     @type string $uri
     *           Required. URI for this repository.
     *     @type string $distribution
     *           Required. Distribution of this repository.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $components
     *           Required. List of components for this repository. Must contain at
     *           least one item.
     *     @type string $gpg_key
     *           URI of the key file for this repository. The agent maintains a
     *           keyring at `/etc/apt/trusted.gpg.d/osconfig_agent_managed.gpg`.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Osconfig\V1\OsPolicy::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Type of archive files in this repository.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.OSPolicy.Resource.RepositoryResource.AptRepository.ArchiveType archive_type = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getArchiveType()
    {
        return $this->archive_type;
    }

    /**
     * Required. Type of archive files in this repository.
     *
     * Generated from protobuf field <code>.google.cloud.osconfig.v1.OSPolicy.Resource.RepositoryResource.AptRepository.ArchiveType archive_type = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setArchiveType($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\OsConfig\V1\OSPolicy\Resource\RepositoryResource\AptRepository\ArchiveType::class);
        $this->archive_type = $var;

        return $this;
    }

    /**
     * Required. URI for this repository.
     *
     * Generated from protobuf field <code>string uri = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * Required. URI for this repository.
     *
     * Generated from protobuf field <code>string uri = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setUri($var)
    {
        GPBUtil::checkString($var, True);
        $this->uri = $var;

        return $this;
    }

    /**
     * Required. Distribution of this repository.
     *
     * Generated from protobuf field <code>string distribution = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getDistribution()
    {
        return $this->distribution;
    }

    /**
     * Required. Distribution of this repository.
     *
     * Generated from protobuf field <code>string distribution = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setDistribution($var)
    {
        GPBUtil::checkString($var, True);
        $this->distribution = $var;

        return $this;
    }

    /**
     * Required. List of components for this repository. Must contain at
     * least one item.
     *
     * Generated from protobuf field <code>repeated string components = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getComponents()
    {
        return $this->components;
    }

    /**
     * Required. List of components for this repository. Must contain at
     * least one item.
     *
     * Generated from protobuf field <code>repeated string components = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setComponents($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->components = $arr;

        return $this;
    }

    /**
     * URI of the key file for this repository. The agent maintains a
     * keyring at `/etc/apt/trusted.gpg.d/osconfig_agent_managed.gpg`.
     *
     * Generated from protobuf field <code>string gpg_key = 5;</code>
     * @return string
     */
    public function getGpgKey()
    {
        return $this->gpg_key;
    }

    /**
     * URI of the key file for this repository. The agent maintains a
     * keyring at `/etc/apt/trusted.gpg.d/osconfig_agent_managed.gpg`.
     *
     * Generated from protobuf field <code>string gpg_key = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setGpgKey($var)
    {
        GPBUtil::checkString($var, True);
        $this->gpg_key = $var;

        return $this;
    }

}


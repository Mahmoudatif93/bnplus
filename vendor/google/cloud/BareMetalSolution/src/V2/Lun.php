<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/baremetalsolution/v2/lun.proto

namespace Google\Cloud\BareMetalSolution\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A storage volume logical unit number (LUN).
 *
 * Generated from protobuf message <code>google.cloud.baremetalsolution.v2.Lun</code>
 */
class Lun extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The name of the LUN.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $name = '';
    /**
     * An identifier for the LUN, generated by the backend.
     *
     * Generated from protobuf field <code>string id = 10;</code>
     */
    private $id = '';
    /**
     * The state of this storage volume.
     *
     * Generated from protobuf field <code>.google.cloud.baremetalsolution.v2.Lun.State state = 2;</code>
     */
    private $state = 0;
    /**
     * The size of this LUN, in gigabytes.
     *
     * Generated from protobuf field <code>int64 size_gb = 3;</code>
     */
    private $size_gb = 0;
    /**
     * The LUN multiprotocol type ensures the characteristics of the LUN are
     * optimized for each operating system.
     *
     * Generated from protobuf field <code>.google.cloud.baremetalsolution.v2.Lun.MultiprotocolType multiprotocol_type = 4;</code>
     */
    private $multiprotocol_type = 0;
    /**
     * Display the storage volume for this LUN.
     *
     * Generated from protobuf field <code>string storage_volume = 5 [(.google.api.resource_reference) = {</code>
     */
    private $storage_volume = '';
    /**
     * Display if this LUN can be shared between multiple physical servers.
     *
     * Generated from protobuf field <code>bool shareable = 6;</code>
     */
    private $shareable = false;
    /**
     * Display if this LUN is a boot LUN.
     *
     * Generated from protobuf field <code>bool boot_lun = 7;</code>
     */
    private $boot_lun = false;
    /**
     * The storage type for this LUN.
     *
     * Generated from protobuf field <code>.google.cloud.baremetalsolution.v2.Lun.StorageType storage_type = 8;</code>
     */
    private $storage_type = 0;
    /**
     * The WWID for this LUN.
     *
     * Generated from protobuf field <code>string wwid = 9;</code>
     */
    private $wwid = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Output only. The name of the LUN.
     *     @type string $id
     *           An identifier for the LUN, generated by the backend.
     *     @type int $state
     *           The state of this storage volume.
     *     @type int|string $size_gb
     *           The size of this LUN, in gigabytes.
     *     @type int $multiprotocol_type
     *           The LUN multiprotocol type ensures the characteristics of the LUN are
     *           optimized for each operating system.
     *     @type string $storage_volume
     *           Display the storage volume for this LUN.
     *     @type bool $shareable
     *           Display if this LUN can be shared between multiple physical servers.
     *     @type bool $boot_lun
     *           Display if this LUN is a boot LUN.
     *     @type int $storage_type
     *           The storage type for this LUN.
     *     @type string $wwid
     *           The WWID for this LUN.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Baremetalsolution\V2\Lun::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The name of the LUN.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Output only. The name of the LUN.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * An identifier for the LUN, generated by the backend.
     *
     * Generated from protobuf field <code>string id = 10;</code>
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * An identifier for the LUN, generated by the backend.
     *
     * Generated from protobuf field <code>string id = 10;</code>
     * @param string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkString($var, True);
        $this->id = $var;

        return $this;
    }

    /**
     * The state of this storage volume.
     *
     * Generated from protobuf field <code>.google.cloud.baremetalsolution.v2.Lun.State state = 2;</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * The state of this storage volume.
     *
     * Generated from protobuf field <code>.google.cloud.baremetalsolution.v2.Lun.State state = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\BareMetalSolution\V2\Lun\State::class);
        $this->state = $var;

        return $this;
    }

    /**
     * The size of this LUN, in gigabytes.
     *
     * Generated from protobuf field <code>int64 size_gb = 3;</code>
     * @return int|string
     */
    public function getSizeGb()
    {
        return $this->size_gb;
    }

    /**
     * The size of this LUN, in gigabytes.
     *
     * Generated from protobuf field <code>int64 size_gb = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setSizeGb($var)
    {
        GPBUtil::checkInt64($var);
        $this->size_gb = $var;

        return $this;
    }

    /**
     * The LUN multiprotocol type ensures the characteristics of the LUN are
     * optimized for each operating system.
     *
     * Generated from protobuf field <code>.google.cloud.baremetalsolution.v2.Lun.MultiprotocolType multiprotocol_type = 4;</code>
     * @return int
     */
    public function getMultiprotocolType()
    {
        return $this->multiprotocol_type;
    }

    /**
     * The LUN multiprotocol type ensures the characteristics of the LUN are
     * optimized for each operating system.
     *
     * Generated from protobuf field <code>.google.cloud.baremetalsolution.v2.Lun.MultiprotocolType multiprotocol_type = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setMultiprotocolType($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\BareMetalSolution\V2\Lun\MultiprotocolType::class);
        $this->multiprotocol_type = $var;

        return $this;
    }

    /**
     * Display the storage volume for this LUN.
     *
     * Generated from protobuf field <code>string storage_volume = 5 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getStorageVolume()
    {
        return $this->storage_volume;
    }

    /**
     * Display the storage volume for this LUN.
     *
     * Generated from protobuf field <code>string storage_volume = 5 [(.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setStorageVolume($var)
    {
        GPBUtil::checkString($var, True);
        $this->storage_volume = $var;

        return $this;
    }

    /**
     * Display if this LUN can be shared between multiple physical servers.
     *
     * Generated from protobuf field <code>bool shareable = 6;</code>
     * @return bool
     */
    public function getShareable()
    {
        return $this->shareable;
    }

    /**
     * Display if this LUN can be shared between multiple physical servers.
     *
     * Generated from protobuf field <code>bool shareable = 6;</code>
     * @param bool $var
     * @return $this
     */
    public function setShareable($var)
    {
        GPBUtil::checkBool($var);
        $this->shareable = $var;

        return $this;
    }

    /**
     * Display if this LUN is a boot LUN.
     *
     * Generated from protobuf field <code>bool boot_lun = 7;</code>
     * @return bool
     */
    public function getBootLun()
    {
        return $this->boot_lun;
    }

    /**
     * Display if this LUN is a boot LUN.
     *
     * Generated from protobuf field <code>bool boot_lun = 7;</code>
     * @param bool $var
     * @return $this
     */
    public function setBootLun($var)
    {
        GPBUtil::checkBool($var);
        $this->boot_lun = $var;

        return $this;
    }

    /**
     * The storage type for this LUN.
     *
     * Generated from protobuf field <code>.google.cloud.baremetalsolution.v2.Lun.StorageType storage_type = 8;</code>
     * @return int
     */
    public function getStorageType()
    {
        return $this->storage_type;
    }

    /**
     * The storage type for this LUN.
     *
     * Generated from protobuf field <code>.google.cloud.baremetalsolution.v2.Lun.StorageType storage_type = 8;</code>
     * @param int $var
     * @return $this
     */
    public function setStorageType($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\BareMetalSolution\V2\Lun\StorageType::class);
        $this->storage_type = $var;

        return $this;
    }

    /**
     * The WWID for this LUN.
     *
     * Generated from protobuf field <code>string wwid = 9;</code>
     * @return string
     */
    public function getWwid()
    {
        return $this->wwid;
    }

    /**
     * The WWID for this LUN.
     *
     * Generated from protobuf field <code>string wwid = 9;</code>
     * @param string $var
     * @return $this
     */
    public function setWwid($var)
    {
        GPBUtil::checkString($var, True);
        $this->wwid = $var;

        return $this;
    }

}

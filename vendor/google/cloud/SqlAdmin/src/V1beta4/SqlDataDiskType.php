<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/sql/v1beta4/cloud_sql_resources.proto

namespace Google\Cloud\Sql\V1beta4;

use UnexpectedValueException;

/**
 * The type of disk that is used for a v2 instance to use.
 *
 * Protobuf type <code>google.cloud.sql.v1beta4.SqlDataDiskType</code>
 */
class SqlDataDiskType
{
    /**
     * This is an unknown data disk type.
     *
     * Generated from protobuf enum <code>SQL_DATA_DISK_TYPE_UNSPECIFIED = 0;</code>
     */
    const SQL_DATA_DISK_TYPE_UNSPECIFIED = 0;
    /**
     * An SSD data disk.
     *
     * Generated from protobuf enum <code>PD_SSD = 1;</code>
     */
    const PD_SSD = 1;
    /**
     * An HDD data disk.
     *
     * Generated from protobuf enum <code>PD_HDD = 2;</code>
     */
    const PD_HDD = 2;
    /**
     * This field is deprecated and will be removed from a future version of the
     * API.
     *
     * Generated from protobuf enum <code>OBSOLETE_LOCAL_SSD = 3 [deprecated = true];</code>
     */
    const OBSOLETE_LOCAL_SSD = 3;

    private static $valueToName = [
        self::SQL_DATA_DISK_TYPE_UNSPECIFIED => 'SQL_DATA_DISK_TYPE_UNSPECIFIED',
        self::PD_SSD => 'PD_SSD',
        self::PD_HDD => 'PD_HDD',
        self::OBSOLETE_LOCAL_SSD => 'OBSOLETE_LOCAL_SSD',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

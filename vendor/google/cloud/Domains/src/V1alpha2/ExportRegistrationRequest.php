<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/domains/v1alpha2/domains.proto

namespace Google\Cloud\Domains\V1alpha2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request for the `ExportRegistration` method.
 *
 * Generated from protobuf message <code>google.cloud.domains.v1alpha2.ExportRegistrationRequest</code>
 */
class ExportRegistrationRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The name of the `Registration` to export,
     * in the format `projects/&#42;&#47;locations/&#42;&#47;registrations/&#42;`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $name = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Required. The name of the `Registration` to export,
     *           in the format `projects/&#42;&#47;locations/&#42;&#47;registrations/&#42;`.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Domains\V1Alpha2\Domains::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The name of the `Registration` to export,
     * in the format `projects/&#42;&#47;locations/&#42;&#47;registrations/&#42;`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Required. The name of the `Registration` to export,
     * in the format `projects/&#42;&#47;locations/&#42;&#47;registrations/&#42;`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
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


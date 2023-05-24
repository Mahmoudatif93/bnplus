<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/explanation.proto

namespace Google\Cloud\AIPlatform\V1\ExplanationMetadataOverride;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The [input metadata][google.cloud.aiplatform.v1.ExplanationMetadata.InputMetadata] entries to be
 * overridden.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.ExplanationMetadataOverride.InputMetadataOverride</code>
 */
class InputMetadataOverride extends \Google\Protobuf\Internal\Message
{
    /**
     * Baseline inputs for this feature.
     * This overrides the `input_baseline` field of the
     * [ExplanationMetadata.InputMetadata][google.cloud.aiplatform.v1.ExplanationMetadata.InputMetadata]
     * object of the corresponding feature's input metadata. If it's not
     * specified, the original baselines are not overridden.
     *
     * Generated from protobuf field <code>repeated .google.protobuf.Value input_baselines = 1;</code>
     */
    private $input_baselines;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Protobuf\Value>|\Google\Protobuf\Internal\RepeatedField $input_baselines
     *           Baseline inputs for this feature.
     *           This overrides the `input_baseline` field of the
     *           [ExplanationMetadata.InputMetadata][google.cloud.aiplatform.v1.ExplanationMetadata.InputMetadata]
     *           object of the corresponding feature's input metadata. If it's not
     *           specified, the original baselines are not overridden.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\Explanation::initOnce();
        parent::__construct($data);
    }

    /**
     * Baseline inputs for this feature.
     * This overrides the `input_baseline` field of the
     * [ExplanationMetadata.InputMetadata][google.cloud.aiplatform.v1.ExplanationMetadata.InputMetadata]
     * object of the corresponding feature's input metadata. If it's not
     * specified, the original baselines are not overridden.
     *
     * Generated from protobuf field <code>repeated .google.protobuf.Value input_baselines = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getInputBaselines()
    {
        return $this->input_baselines;
    }

    /**
     * Baseline inputs for this feature.
     * This overrides the `input_baseline` field of the
     * [ExplanationMetadata.InputMetadata][google.cloud.aiplatform.v1.ExplanationMetadata.InputMetadata]
     * object of the corresponding feature's input metadata. If it's not
     * specified, the original baselines are not overridden.
     *
     * Generated from protobuf field <code>repeated .google.protobuf.Value input_baselines = 1;</code>
     * @param array<\Google\Protobuf\Value>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setInputBaselines($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Protobuf\Value::class);
        $this->input_baselines = $arr;

        return $this;
    }

}



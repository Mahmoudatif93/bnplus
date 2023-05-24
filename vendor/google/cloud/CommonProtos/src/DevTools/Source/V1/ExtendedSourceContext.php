<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/devtools/source/v1/source_context.proto

namespace Google\Cloud\DevTools\Source\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An ExtendedSourceContext is a SourceContext combined with additional
 * details describing the context.
 *
 * Generated from protobuf message <code>google.devtools.source.v1.ExtendedSourceContext</code>
 */
class ExtendedSourceContext extends \Google\Protobuf\Internal\Message
{
    /**
     * Any source context.
     *
     * Generated from protobuf field <code>.google.devtools.source.v1.SourceContext context = 1;</code>
     */
    protected $context = null;
    /**
     * Labels with user defined metadata.
     *
     * Generated from protobuf field <code>map<string, string> labels = 2;</code>
     */
    private $labels;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\DevTools\Source\V1\SourceContext $context
     *           Any source context.
     *     @type array|\Google\Protobuf\Internal\MapField $labels
     *           Labels with user defined metadata.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Devtools\Source\V1\SourceContext::initOnce();
        parent::__construct($data);
    }

    /**
     * Any source context.
     *
     * Generated from protobuf field <code>.google.devtools.source.v1.SourceContext context = 1;</code>
     * @return \Google\Cloud\DevTools\Source\V1\SourceContext|null
     */
    public function getContext()
    {
        return isset($this->context) ? $this->context : null;
    }

    public function hasContext()
    {
        return isset($this->context);
    }

    public function clearContext()
    {
        unset($this->context);
    }

    /**
     * Any source context.
     *
     * Generated from protobuf field <code>.google.devtools.source.v1.SourceContext context = 1;</code>
     * @param \Google\Cloud\DevTools\Source\V1\SourceContext $var
     * @return $this
     */
    public function setContext($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\DevTools\Source\V1\SourceContext::class);
        $this->context = $var;

        return $this;
    }

    /**
     * Labels with user defined metadata.
     *
     * Generated from protobuf field <code>map<string, string> labels = 2;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Labels with user defined metadata.
     *
     * Generated from protobuf field <code>map<string, string> labels = 2;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setLabels($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->labels = $arr;

        return $this;
    }

}


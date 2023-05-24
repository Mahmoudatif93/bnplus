<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dialogflow/v2/intent.proto

namespace Google\Cloud\Dialogflow\V2\Intent\Message\BasicCard;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The button object that appears at the bottom of a card.
 *
 * Generated from protobuf message <code>google.cloud.dialogflow.v2.Intent.Message.BasicCard.Button</code>
 */
class Button extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The title of the button.
     *
     * Generated from protobuf field <code>string title = 1;</code>
     */
    private $title = '';
    /**
     * Required. Action to take when a user taps on the button.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.Intent.Message.BasicCard.Button.OpenUriAction open_uri_action = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $open_uri_action = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $title
     *           Required. The title of the button.
     *     @type \Google\Cloud\Dialogflow\V2\Intent\Message\BasicCard\Button\OpenUriAction $open_uri_action
     *           Required. Action to take when a user taps on the button.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Dialogflow\V2\Intent::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The title of the button.
     *
     * Generated from protobuf field <code>string title = 1;</code>
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Required. The title of the button.
     *
     * Generated from protobuf field <code>string title = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setTitle($var)
    {
        GPBUtil::checkString($var, True);
        $this->title = $var;

        return $this;
    }

    /**
     * Required. Action to take when a user taps on the button.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.Intent.Message.BasicCard.Button.OpenUriAction open_uri_action = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Dialogflow\V2\Intent\Message\BasicCard\Button\OpenUriAction|null
     */
    public function getOpenUriAction()
    {
        return $this->open_uri_action;
    }

    public function hasOpenUriAction()
    {
        return isset($this->open_uri_action);
    }

    public function clearOpenUriAction()
    {
        unset($this->open_uri_action);
    }

    /**
     * Required. Action to take when a user taps on the button.
     *
     * Generated from protobuf field <code>.google.cloud.dialogflow.v2.Intent.Message.BasicCard.Button.OpenUriAction open_uri_action = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Dialogflow\V2\Intent\Message\BasicCard\Button\OpenUriAction $var
     * @return $this
     */
    public function setOpenUriAction($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dialogflow\V2\Intent\Message\BasicCard\Button\OpenUriAction::class);
        $this->open_uri_action = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Button::class, \Google\Cloud\Dialogflow\V2\Intent_Message_BasicCard_Button::class);


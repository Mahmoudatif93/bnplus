<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/speech/v1p1beta1/cloud_speech.proto

namespace Google\Cloud\Speech\V1p1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The only message returned to the client by the `LongRunningRecognize` method.
 * It contains the result as zero or more sequential `SpeechRecognitionResult`
 * messages. It is included in the `result.response` field of the `Operation`
 * returned by the `GetOperation` call of the `google::longrunning::Operations`
 * service.
 *
 * Generated from protobuf message <code>google.cloud.speech.v1p1beta1.LongRunningRecognizeResponse</code>
 */
class LongRunningRecognizeResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Sequential list of transcription results corresponding to
     * sequential portions of audio.
     *
     * Generated from protobuf field <code>repeated .google.cloud.speech.v1p1beta1.SpeechRecognitionResult results = 2;</code>
     */
    private $results;
    /**
     * When available, billed audio seconds for the corresponding request.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration total_billed_time = 3;</code>
     */
    private $total_billed_time = null;
    /**
     * Original output config if present in the request.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v1p1beta1.TranscriptOutputConfig output_config = 6;</code>
     */
    private $output_config = null;
    /**
     * If the transcript output fails this field contains the relevant error.
     *
     * Generated from protobuf field <code>.google.rpc.Status output_error = 7;</code>
     */
    private $output_error = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Cloud\Speech\V1p1beta1\SpeechRecognitionResult>|\Google\Protobuf\Internal\RepeatedField $results
     *           Sequential list of transcription results corresponding to
     *           sequential portions of audio.
     *     @type \Google\Protobuf\Duration $total_billed_time
     *           When available, billed audio seconds for the corresponding request.
     *     @type \Google\Cloud\Speech\V1p1beta1\TranscriptOutputConfig $output_config
     *           Original output config if present in the request.
     *     @type \Google\Rpc\Status $output_error
     *           If the transcript output fails this field contains the relevant error.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Speech\V1P1Beta1\CloudSpeech::initOnce();
        parent::__construct($data);
    }

    /**
     * Sequential list of transcription results corresponding to
     * sequential portions of audio.
     *
     * Generated from protobuf field <code>repeated .google.cloud.speech.v1p1beta1.SpeechRecognitionResult results = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Sequential list of transcription results corresponding to
     * sequential portions of audio.
     *
     * Generated from protobuf field <code>repeated .google.cloud.speech.v1p1beta1.SpeechRecognitionResult results = 2;</code>
     * @param array<\Google\Cloud\Speech\V1p1beta1\SpeechRecognitionResult>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setResults($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Speech\V1p1beta1\SpeechRecognitionResult::class);
        $this->results = $arr;

        return $this;
    }

    /**
     * When available, billed audio seconds for the corresponding request.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration total_billed_time = 3;</code>
     * @return \Google\Protobuf\Duration|null
     */
    public function getTotalBilledTime()
    {
        return $this->total_billed_time;
    }

    public function hasTotalBilledTime()
    {
        return isset($this->total_billed_time);
    }

    public function clearTotalBilledTime()
    {
        unset($this->total_billed_time);
    }

    /**
     * When available, billed audio seconds for the corresponding request.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration total_billed_time = 3;</code>
     * @param \Google\Protobuf\Duration $var
     * @return $this
     */
    public function setTotalBilledTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Duration::class);
        $this->total_billed_time = $var;

        return $this;
    }

    /**
     * Original output config if present in the request.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v1p1beta1.TranscriptOutputConfig output_config = 6;</code>
     * @return \Google\Cloud\Speech\V1p1beta1\TranscriptOutputConfig|null
     */
    public function getOutputConfig()
    {
        return $this->output_config;
    }

    public function hasOutputConfig()
    {
        return isset($this->output_config);
    }

    public function clearOutputConfig()
    {
        unset($this->output_config);
    }

    /**
     * Original output config if present in the request.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v1p1beta1.TranscriptOutputConfig output_config = 6;</code>
     * @param \Google\Cloud\Speech\V1p1beta1\TranscriptOutputConfig $var
     * @return $this
     */
    public function setOutputConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Speech\V1p1beta1\TranscriptOutputConfig::class);
        $this->output_config = $var;

        return $this;
    }

    /**
     * If the transcript output fails this field contains the relevant error.
     *
     * Generated from protobuf field <code>.google.rpc.Status output_error = 7;</code>
     * @return \Google\Rpc\Status|null
     */
    public function getOutputError()
    {
        return $this->output_error;
    }

    public function hasOutputError()
    {
        return isset($this->output_error);
    }

    public function clearOutputError()
    {
        unset($this->output_error);
    }

    /**
     * If the transcript output fails this field contains the relevant error.
     *
     * Generated from protobuf field <code>.google.rpc.Status output_error = 7;</code>
     * @param \Google\Rpc\Status $var
     * @return $this
     */
    public function setOutputError($var)
    {
        GPBUtil::checkMessage($var, \Google\Rpc\Status::class);
        $this->output_error = $var;

        return $this;
    }

}


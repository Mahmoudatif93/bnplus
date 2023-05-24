<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/speech/v1p1beta1/cloud_speech.proto

namespace Google\Cloud\Speech\V1p1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Description of audio data to be recognized.
 *
 * Generated from protobuf message <code>google.cloud.speech.v1p1beta1.RecognitionMetadata</code>
 */
class RecognitionMetadata extends \Google\Protobuf\Internal\Message
{
    /**
     * The use case most closely describing the audio content to be recognized.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v1p1beta1.RecognitionMetadata.InteractionType interaction_type = 1;</code>
     */
    private $interaction_type = 0;
    /**
     * The industry vertical to which this speech recognition request most
     * closely applies. This is most indicative of the topics contained
     * in the audio.  Use the 6-digit NAICS code to identify the industry
     * vertical - see https://www.naics.com/search/.
     *
     * Generated from protobuf field <code>uint32 industry_naics_code_of_audio = 3;</code>
     */
    private $industry_naics_code_of_audio = 0;
    /**
     * The audio type that most closely describes the audio being recognized.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v1p1beta1.RecognitionMetadata.MicrophoneDistance microphone_distance = 4;</code>
     */
    private $microphone_distance = 0;
    /**
     * The original media the speech was recorded on.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v1p1beta1.RecognitionMetadata.OriginalMediaType original_media_type = 5;</code>
     */
    private $original_media_type = 0;
    /**
     * The type of device the speech was recorded with.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v1p1beta1.RecognitionMetadata.RecordingDeviceType recording_device_type = 6;</code>
     */
    private $recording_device_type = 0;
    /**
     * The device used to make the recording.  Examples 'Nexus 5X' or
     * 'Polycom SoundStation IP 6000' or 'POTS' or 'VoIP' or
     * 'Cardioid Microphone'.
     *
     * Generated from protobuf field <code>string recording_device_name = 7;</code>
     */
    private $recording_device_name = '';
    /**
     * Mime type of the original audio file.  For example `audio/m4a`,
     * `audio/x-alaw-basic`, `audio/mp3`, `audio/3gpp`.
     * A list of possible audio mime types is maintained at
     * http://www.iana.org/assignments/media-types/media-types.xhtml#audio
     *
     * Generated from protobuf field <code>string original_mime_type = 8;</code>
     */
    private $original_mime_type = '';
    /**
     * Obfuscated (privacy-protected) ID of the user, to identify number of
     * unique users using the service.
     *
     * Generated from protobuf field <code>int64 obfuscated_id = 9 [deprecated = true];</code>
     * @deprecated
     */
    protected $obfuscated_id = 0;
    /**
     * Description of the content. Eg. "Recordings of federal supreme court
     * hearings from 2012".
     *
     * Generated from protobuf field <code>string audio_topic = 10;</code>
     */
    private $audio_topic = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $interaction_type
     *           The use case most closely describing the audio content to be recognized.
     *     @type int $industry_naics_code_of_audio
     *           The industry vertical to which this speech recognition request most
     *           closely applies. This is most indicative of the topics contained
     *           in the audio.  Use the 6-digit NAICS code to identify the industry
     *           vertical - see https://www.naics.com/search/.
     *     @type int $microphone_distance
     *           The audio type that most closely describes the audio being recognized.
     *     @type int $original_media_type
     *           The original media the speech was recorded on.
     *     @type int $recording_device_type
     *           The type of device the speech was recorded with.
     *     @type string $recording_device_name
     *           The device used to make the recording.  Examples 'Nexus 5X' or
     *           'Polycom SoundStation IP 6000' or 'POTS' or 'VoIP' or
     *           'Cardioid Microphone'.
     *     @type string $original_mime_type
     *           Mime type of the original audio file.  For example `audio/m4a`,
     *           `audio/x-alaw-basic`, `audio/mp3`, `audio/3gpp`.
     *           A list of possible audio mime types is maintained at
     *           http://www.iana.org/assignments/media-types/media-types.xhtml#audio
     *     @type int|string $obfuscated_id
     *           Obfuscated (privacy-protected) ID of the user, to identify number of
     *           unique users using the service.
     *     @type string $audio_topic
     *           Description of the content. Eg. "Recordings of federal supreme court
     *           hearings from 2012".
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Speech\V1P1Beta1\CloudSpeech::initOnce();
        parent::__construct($data);
    }

    /**
     * The use case most closely describing the audio content to be recognized.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v1p1beta1.RecognitionMetadata.InteractionType interaction_type = 1;</code>
     * @return int
     */
    public function getInteractionType()
    {
        return $this->interaction_type;
    }

    /**
     * The use case most closely describing the audio content to be recognized.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v1p1beta1.RecognitionMetadata.InteractionType interaction_type = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setInteractionType($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Speech\V1p1beta1\RecognitionMetadata\InteractionType::class);
        $this->interaction_type = $var;

        return $this;
    }

    /**
     * The industry vertical to which this speech recognition request most
     * closely applies. This is most indicative of the topics contained
     * in the audio.  Use the 6-digit NAICS code to identify the industry
     * vertical - see https://www.naics.com/search/.
     *
     * Generated from protobuf field <code>uint32 industry_naics_code_of_audio = 3;</code>
     * @return int
     */
    public function getIndustryNaicsCodeOfAudio()
    {
        return $this->industry_naics_code_of_audio;
    }

    /**
     * The industry vertical to which this speech recognition request most
     * closely applies. This is most indicative of the topics contained
     * in the audio.  Use the 6-digit NAICS code to identify the industry
     * vertical - see https://www.naics.com/search/.
     *
     * Generated from protobuf field <code>uint32 industry_naics_code_of_audio = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setIndustryNaicsCodeOfAudio($var)
    {
        GPBUtil::checkUint32($var);
        $this->industry_naics_code_of_audio = $var;

        return $this;
    }

    /**
     * The audio type that most closely describes the audio being recognized.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v1p1beta1.RecognitionMetadata.MicrophoneDistance microphone_distance = 4;</code>
     * @return int
     */
    public function getMicrophoneDistance()
    {
        return $this->microphone_distance;
    }

    /**
     * The audio type that most closely describes the audio being recognized.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v1p1beta1.RecognitionMetadata.MicrophoneDistance microphone_distance = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setMicrophoneDistance($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Speech\V1p1beta1\RecognitionMetadata\MicrophoneDistance::class);
        $this->microphone_distance = $var;

        return $this;
    }

    /**
     * The original media the speech was recorded on.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v1p1beta1.RecognitionMetadata.OriginalMediaType original_media_type = 5;</code>
     * @return int
     */
    public function getOriginalMediaType()
    {
        return $this->original_media_type;
    }

    /**
     * The original media the speech was recorded on.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v1p1beta1.RecognitionMetadata.OriginalMediaType original_media_type = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setOriginalMediaType($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Speech\V1p1beta1\RecognitionMetadata\OriginalMediaType::class);
        $this->original_media_type = $var;

        return $this;
    }

    /**
     * The type of device the speech was recorded with.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v1p1beta1.RecognitionMetadata.RecordingDeviceType recording_device_type = 6;</code>
     * @return int
     */
    public function getRecordingDeviceType()
    {
        return $this->recording_device_type;
    }

    /**
     * The type of device the speech was recorded with.
     *
     * Generated from protobuf field <code>.google.cloud.speech.v1p1beta1.RecognitionMetadata.RecordingDeviceType recording_device_type = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setRecordingDeviceType($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Speech\V1p1beta1\RecognitionMetadata\RecordingDeviceType::class);
        $this->recording_device_type = $var;

        return $this;
    }

    /**
     * The device used to make the recording.  Examples 'Nexus 5X' or
     * 'Polycom SoundStation IP 6000' or 'POTS' or 'VoIP' or
     * 'Cardioid Microphone'.
     *
     * Generated from protobuf field <code>string recording_device_name = 7;</code>
     * @return string
     */
    public function getRecordingDeviceName()
    {
        return $this->recording_device_name;
    }

    /**
     * The device used to make the recording.  Examples 'Nexus 5X' or
     * 'Polycom SoundStation IP 6000' or 'POTS' or 'VoIP' or
     * 'Cardioid Microphone'.
     *
     * Generated from protobuf field <code>string recording_device_name = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setRecordingDeviceName($var)
    {
        GPBUtil::checkString($var, True);
        $this->recording_device_name = $var;

        return $this;
    }

    /**
     * Mime type of the original audio file.  For example `audio/m4a`,
     * `audio/x-alaw-basic`, `audio/mp3`, `audio/3gpp`.
     * A list of possible audio mime types is maintained at
     * http://www.iana.org/assignments/media-types/media-types.xhtml#audio
     *
     * Generated from protobuf field <code>string original_mime_type = 8;</code>
     * @return string
     */
    public function getOriginalMimeType()
    {
        return $this->original_mime_type;
    }

    /**
     * Mime type of the original audio file.  For example `audio/m4a`,
     * `audio/x-alaw-basic`, `audio/mp3`, `audio/3gpp`.
     * A list of possible audio mime types is maintained at
     * http://www.iana.org/assignments/media-types/media-types.xhtml#audio
     *
     * Generated from protobuf field <code>string original_mime_type = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setOriginalMimeType($var)
    {
        GPBUtil::checkString($var, True);
        $this->original_mime_type = $var;

        return $this;
    }

    /**
     * Obfuscated (privacy-protected) ID of the user, to identify number of
     * unique users using the service.
     *
     * Generated from protobuf field <code>int64 obfuscated_id = 9 [deprecated = true];</code>
     * @return int|string
     * @deprecated
     */
    public function getObfuscatedId()
    {
        @trigger_error('obfuscated_id is deprecated.', E_USER_DEPRECATED);
        return $this->obfuscated_id;
    }

    /**
     * Obfuscated (privacy-protected) ID of the user, to identify number of
     * unique users using the service.
     *
     * Generated from protobuf field <code>int64 obfuscated_id = 9 [deprecated = true];</code>
     * @param int|string $var
     * @return $this
     * @deprecated
     */
    public function setObfuscatedId($var)
    {
        @trigger_error('obfuscated_id is deprecated.', E_USER_DEPRECATED);
        GPBUtil::checkInt64($var);
        $this->obfuscated_id = $var;

        return $this;
    }

    /**
     * Description of the content. Eg. "Recordings of federal supreme court
     * hearings from 2012".
     *
     * Generated from protobuf field <code>string audio_topic = 10;</code>
     * @return string
     */
    public function getAudioTopic()
    {
        return $this->audio_topic;
    }

    /**
     * Description of the content. Eg. "Recordings of federal supreme court
     * hearings from 2012".
     *
     * Generated from protobuf field <code>string audio_topic = 10;</code>
     * @param string $var
     * @return $this
     */
    public function setAudioTopic($var)
    {
        GPBUtil::checkString($var, True);
        $this->audio_topic = $var;

        return $this;
    }

}


<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/video/stitcher/v1/slates.proto

namespace GPBMetadata\Google\Cloud\Video\Stitcher\V1;

class Slates
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
+google/cloud/video/stitcher/v1/slates.protogoogle.cloud.video.stitcher.v1google/api/resource.proto"�
Slate
name (	B�A
uri (	:_�A\\
"videostitcher.googleapis.com/Slate6projects/{project}/locations/{location}/slates/{slate}B{
"com.google.cloud.video.stitcher.v1BSlatesProtoPZFgoogle.golang.org/genproto/googleapis/cloud/video/stitcher/v1;stitcherbproto3'
        , true);

        static::$is_initialized = true;
    }
}


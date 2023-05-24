<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/automl/v1/data_items.proto

namespace GPBMetadata\Google\Cloud\Automl\V1;

class DataItems
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Cloud\Automl\V1\Geometry::initOnce();
        \GPBMetadata\Google\Cloud\Automl\V1\Io::initOnce();
        \GPBMetadata\Google\Cloud\Automl\V1\TextSegment::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
\'google/cloud/automl/v1/data_items.protogoogle.cloud.automl.v1google/cloud/automl/v1/io.proto)google/cloud/automl/v1/text_segment.proto"=
Image
image_bytes (H 
thumbnail_uri (	B
data"F
TextSnippet
content (	
	mime_type (	
content_uri (	"�
DocumentDimensionsN
unit (2@.google.cloud.automl.v1.DocumentDimensions.DocumentDimensionUnit
width (
height ("e
DocumentDimensionUnit\'
#DOCUMENT_DIMENSION_UNIT_UNSPECIFIED 
INCH

CENTIMETER	
POINT"�
DocumentA
input_config (2+.google.cloud.automl.v1.DocumentInputConfig:
document_text (2#.google.cloud.automl.v1.TextSnippet7
layout (2\'.google.cloud.automl.v1.Document.LayoutG
document_dimensions (2*.google.cloud.automl.v1.DocumentDimensions

page_count (�
Layout9
text_segment (2#.google.cloud.automl.v1.TextSegment
page_number (;
bounding_poly (2$.google.cloud.automl.v1.BoundingPolyR
text_segment_type (27.google.cloud.automl.v1.Document.Layout.TextSegmentType"�
TextSegmentType!
TEXT_SEGMENT_TYPE_UNSPECIFIED 	
TOKEN
	PARAGRAPH

FORM_FIELD
FORM_FIELD_NAME
FORM_FIELD_CONTENTS	
TABLE
TABLE_HEADER
	TABLE_ROW

TABLE_CELL	"�
ExamplePayload.
image (2.google.cloud.automl.v1.ImageH ;
text_snippet (2#.google.cloud.automl.v1.TextSnippetH 4
document (2 .google.cloud.automl.v1.DocumentH B	
payloadB�
com.google.cloud.automl.v1PZ<google.golang.org/genproto/googleapis/cloud/automl/v1;automl�Google.Cloud.AutoML.V1�Google\\Cloud\\AutoMl\\V1�Google::Cloud::AutoML::V1bproto3'
        , true);

        static::$is_initialized = true;
    }
}


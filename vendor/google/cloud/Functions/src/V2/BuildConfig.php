<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/functions/v2/functions.proto

namespace Google\Cloud\Functions\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Describes the Build step of the function that builds a container from the
 * given source.
 *
 * Generated from protobuf message <code>google.cloud.functions.v2.BuildConfig</code>
 */
class BuildConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The Cloud Build name of the latest successful deployment of the
     * function.
     *
     * Generated from protobuf field <code>string build = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     */
    private $build = '';
    /**
     * The runtime in which to run the function. Required when deploying a new
     * function, optional when updating an existing function. For a complete
     * list of possible choices, see the
     * [`gcloud` command
     * reference](https://cloud.google.com/sdk/gcloud/reference/functions/deploy#--runtime).
     *
     * Generated from protobuf field <code>string runtime = 2;</code>
     */
    private $runtime = '';
    /**
     * The name of the function (as defined in source code) that will be
     * executed. Defaults to the resource name suffix, if not specified. For
     * backward compatibility, if function with given name is not found, then the
     * system will try to use function named "function".
     * For Node.js this is name of a function exported by the module specified
     * in `source_location`.
     *
     * Generated from protobuf field <code>string entry_point = 3;</code>
     */
    private $entry_point = '';
    /**
     * The location of the function source code.
     *
     * Generated from protobuf field <code>.google.cloud.functions.v2.Source source = 4;</code>
     */
    private $source = null;
    /**
     * Output only. A permanent fixed identifier for source.
     *
     * Generated from protobuf field <code>.google.cloud.functions.v2.SourceProvenance source_provenance = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $source_provenance = null;
    /**
     * Name of the Cloud Build Custom Worker Pool that should be used to build the
     * function. The format of this field is
     * `projects/{project}/locations/{region}/workerPools/{workerPool}` where
     * {project} and {region} are the project id and region respectively where the
     * worker pool is defined and {workerPool} is the short name of the worker
     * pool.
     * If the project id is not the same as the function, then the Cloud
     * Functions Service Agent
     * (service-<project_number>&#64;gcf-admin-robot.iam.gserviceaccount.com) must be
     * granted the role Cloud Build Custom Workers Builder
     * (roles/cloudbuild.customworkers.builder) in the project.
     *
     * Generated from protobuf field <code>string worker_pool = 5 [(.google.api.resource_reference) = {</code>
     */
    private $worker_pool = '';
    /**
     * User-provided build-time environment variables for the function
     *
     * Generated from protobuf field <code>map<string, string> environment_variables = 6;</code>
     */
    private $environment_variables;
    /**
     * Optional. User managed repository created in Artifact Registry optionally with a
     * customer managed encryption key. This is the repository to which the
     * function docker image will be pushed after it is built by Cloud Build.
     * If unspecified, GCF will create and use a repository named 'gcf-artifacts'
     * for every deployed region.
     * It must match the pattern
     * `projects/{project}/locations/{location}/repositories/{repository}`.
     * Cross-project repositories are not supported.
     * Cross-location repositories are not supported.
     * Repository format must be 'DOCKER'.
     *
     * Generated from protobuf field <code>string docker_repository = 7 [(.google.api.field_behavior) = OPTIONAL, (.google.api.resource_reference) = {</code>
     */
    private $docker_repository = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $build
     *           Output only. The Cloud Build name of the latest successful deployment of the
     *           function.
     *     @type string $runtime
     *           The runtime in which to run the function. Required when deploying a new
     *           function, optional when updating an existing function. For a complete
     *           list of possible choices, see the
     *           [`gcloud` command
     *           reference](https://cloud.google.com/sdk/gcloud/reference/functions/deploy#--runtime).
     *     @type string $entry_point
     *           The name of the function (as defined in source code) that will be
     *           executed. Defaults to the resource name suffix, if not specified. For
     *           backward compatibility, if function with given name is not found, then the
     *           system will try to use function named "function".
     *           For Node.js this is name of a function exported by the module specified
     *           in `source_location`.
     *     @type \Google\Cloud\Functions\V2\Source $source
     *           The location of the function source code.
     *     @type \Google\Cloud\Functions\V2\SourceProvenance $source_provenance
     *           Output only. A permanent fixed identifier for source.
     *     @type string $worker_pool
     *           Name of the Cloud Build Custom Worker Pool that should be used to build the
     *           function. The format of this field is
     *           `projects/{project}/locations/{region}/workerPools/{workerPool}` where
     *           {project} and {region} are the project id and region respectively where the
     *           worker pool is defined and {workerPool} is the short name of the worker
     *           pool.
     *           If the project id is not the same as the function, then the Cloud
     *           Functions Service Agent
     *           (service-<project_number>&#64;gcf-admin-robot.iam.gserviceaccount.com) must be
     *           granted the role Cloud Build Custom Workers Builder
     *           (roles/cloudbuild.customworkers.builder) in the project.
     *     @type array|\Google\Protobuf\Internal\MapField $environment_variables
     *           User-provided build-time environment variables for the function
     *     @type string $docker_repository
     *           Optional. User managed repository created in Artifact Registry optionally with a
     *           customer managed encryption key. This is the repository to which the
     *           function docker image will be pushed after it is built by Cloud Build.
     *           If unspecified, GCF will create and use a repository named 'gcf-artifacts'
     *           for every deployed region.
     *           It must match the pattern
     *           `projects/{project}/locations/{location}/repositories/{repository}`.
     *           Cross-project repositories are not supported.
     *           Cross-location repositories are not supported.
     *           Repository format must be 'DOCKER'.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Functions\V2\Functions::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The Cloud Build name of the latest successful deployment of the
     * function.
     *
     * Generated from protobuf field <code>string build = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getBuild()
    {
        return $this->build;
    }

    /**
     * Output only. The Cloud Build name of the latest successful deployment of the
     * function.
     *
     * Generated from protobuf field <code>string build = 1 [(.google.api.field_behavior) = OUTPUT_ONLY, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setBuild($var)
    {
        GPBUtil::checkString($var, True);
        $this->build = $var;

        return $this;
    }

    /**
     * The runtime in which to run the function. Required when deploying a new
     * function, optional when updating an existing function. For a complete
     * list of possible choices, see the
     * [`gcloud` command
     * reference](https://cloud.google.com/sdk/gcloud/reference/functions/deploy#--runtime).
     *
     * Generated from protobuf field <code>string runtime = 2;</code>
     * @return string
     */
    public function getRuntime()
    {
        return $this->runtime;
    }

    /**
     * The runtime in which to run the function. Required when deploying a new
     * function, optional when updating an existing function. For a complete
     * list of possible choices, see the
     * [`gcloud` command
     * reference](https://cloud.google.com/sdk/gcloud/reference/functions/deploy#--runtime).
     *
     * Generated from protobuf field <code>string runtime = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setRuntime($var)
    {
        GPBUtil::checkString($var, True);
        $this->runtime = $var;

        return $this;
    }

    /**
     * The name of the function (as defined in source code) that will be
     * executed. Defaults to the resource name suffix, if not specified. For
     * backward compatibility, if function with given name is not found, then the
     * system will try to use function named "function".
     * For Node.js this is name of a function exported by the module specified
     * in `source_location`.
     *
     * Generated from protobuf field <code>string entry_point = 3;</code>
     * @return string
     */
    public function getEntryPoint()
    {
        return $this->entry_point;
    }

    /**
     * The name of the function (as defined in source code) that will be
     * executed. Defaults to the resource name suffix, if not specified. For
     * backward compatibility, if function with given name is not found, then the
     * system will try to use function named "function".
     * For Node.js this is name of a function exported by the module specified
     * in `source_location`.
     *
     * Generated from protobuf field <code>string entry_point = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setEntryPoint($var)
    {
        GPBUtil::checkString($var, True);
        $this->entry_point = $var;

        return $this;
    }

    /**
     * The location of the function source code.
     *
     * Generated from protobuf field <code>.google.cloud.functions.v2.Source source = 4;</code>
     * @return \Google\Cloud\Functions\V2\Source|null
     */
    public function getSource()
    {
        return $this->source;
    }

    public function hasSource()
    {
        return isset($this->source);
    }

    public function clearSource()
    {
        unset($this->source);
    }

    /**
     * The location of the function source code.
     *
     * Generated from protobuf field <code>.google.cloud.functions.v2.Source source = 4;</code>
     * @param \Google\Cloud\Functions\V2\Source $var
     * @return $this
     */
    public function setSource($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Functions\V2\Source::class);
        $this->source = $var;

        return $this;
    }

    /**
     * Output only. A permanent fixed identifier for source.
     *
     * Generated from protobuf field <code>.google.cloud.functions.v2.SourceProvenance source_provenance = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Cloud\Functions\V2\SourceProvenance|null
     */
    public function getSourceProvenance()
    {
        return $this->source_provenance;
    }

    public function hasSourceProvenance()
    {
        return isset($this->source_provenance);
    }

    public function clearSourceProvenance()
    {
        unset($this->source_provenance);
    }

    /**
     * Output only. A permanent fixed identifier for source.
     *
     * Generated from protobuf field <code>.google.cloud.functions.v2.SourceProvenance source_provenance = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Cloud\Functions\V2\SourceProvenance $var
     * @return $this
     */
    public function setSourceProvenance($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Functions\V2\SourceProvenance::class);
        $this->source_provenance = $var;

        return $this;
    }

    /**
     * Name of the Cloud Build Custom Worker Pool that should be used to build the
     * function. The format of this field is
     * `projects/{project}/locations/{region}/workerPools/{workerPool}` where
     * {project} and {region} are the project id and region respectively where the
     * worker pool is defined and {workerPool} is the short name of the worker
     * pool.
     * If the project id is not the same as the function, then the Cloud
     * Functions Service Agent
     * (service-<project_number>&#64;gcf-admin-robot.iam.gserviceaccount.com) must be
     * granted the role Cloud Build Custom Workers Builder
     * (roles/cloudbuild.customworkers.builder) in the project.
     *
     * Generated from protobuf field <code>string worker_pool = 5 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getWorkerPool()
    {
        return $this->worker_pool;
    }

    /**
     * Name of the Cloud Build Custom Worker Pool that should be used to build the
     * function. The format of this field is
     * `projects/{project}/locations/{region}/workerPools/{workerPool}` where
     * {project} and {region} are the project id and region respectively where the
     * worker pool is defined and {workerPool} is the short name of the worker
     * pool.
     * If the project id is not the same as the function, then the Cloud
     * Functions Service Agent
     * (service-<project_number>&#64;gcf-admin-robot.iam.gserviceaccount.com) must be
     * granted the role Cloud Build Custom Workers Builder
     * (roles/cloudbuild.customworkers.builder) in the project.
     *
     * Generated from protobuf field <code>string worker_pool = 5 [(.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setWorkerPool($var)
    {
        GPBUtil::checkString($var, True);
        $this->worker_pool = $var;

        return $this;
    }

    /**
     * User-provided build-time environment variables for the function
     *
     * Generated from protobuf field <code>map<string, string> environment_variables = 6;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getEnvironmentVariables()
    {
        return $this->environment_variables;
    }

    /**
     * User-provided build-time environment variables for the function
     *
     * Generated from protobuf field <code>map<string, string> environment_variables = 6;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setEnvironmentVariables($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->environment_variables = $arr;

        return $this;
    }

    /**
     * Optional. User managed repository created in Artifact Registry optionally with a
     * customer managed encryption key. This is the repository to which the
     * function docker image will be pushed after it is built by Cloud Build.
     * If unspecified, GCF will create and use a repository named 'gcf-artifacts'
     * for every deployed region.
     * It must match the pattern
     * `projects/{project}/locations/{location}/repositories/{repository}`.
     * Cross-project repositories are not supported.
     * Cross-location repositories are not supported.
     * Repository format must be 'DOCKER'.
     *
     * Generated from protobuf field <code>string docker_repository = 7 [(.google.api.field_behavior) = OPTIONAL, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getDockerRepository()
    {
        return $this->docker_repository;
    }

    /**
     * Optional. User managed repository created in Artifact Registry optionally with a
     * customer managed encryption key. This is the repository to which the
     * function docker image will be pushed after it is built by Cloud Build.
     * If unspecified, GCF will create and use a repository named 'gcf-artifacts'
     * for every deployed region.
     * It must match the pattern
     * `projects/{project}/locations/{location}/repositories/{repository}`.
     * Cross-project repositories are not supported.
     * Cross-location repositories are not supported.
     * Repository format must be 'DOCKER'.
     *
     * Generated from protobuf field <code>string docker_repository = 7 [(.google.api.field_behavior) = OPTIONAL, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setDockerRepository($var)
    {
        GPBUtil::checkString($var, True);
        $this->docker_repository = $var;

        return $this;
    }

}


<?php
/*
 * Copyright 2021 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/binaryauthorization/v1beta1/service.proto
 * Updates to the above are reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Cloud\BinaryAuthorization\V1beta1\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;

use Google\ApiCore\PathTemplate;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\BinaryAuthorization\V1beta1\GetSystemPolicyRequest;
use Google\Cloud\BinaryAuthorization\V1beta1\Policy;

/**
 * Service Description: API for working with the system policy.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $systemPolicyV1Beta1Client = new SystemPolicyV1Beta1Client();
 * try {
 *     $formattedName = $systemPolicyV1Beta1Client->policyName('[PROJECT]');
 *     $response = $systemPolicyV1Beta1Client->getSystemPolicy($formattedName);
 * } finally {
 *     $systemPolicyV1Beta1Client->close();
 * }
 * ```
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * @experimental
 */
class SystemPolicyV1Beta1GapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.cloud.binaryauthorization.v1beta1.SystemPolicyV1Beta1';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'binaryauthorization.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
    ];

    private static $locationPolicyNameTemplate;

    private static $policyNameTemplate;

    private static $projectPolicyNameTemplate;

    private static $pathTemplateMap;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/system_policy_v1_beta1_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/system_policy_v1_beta1_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/system_policy_v1_beta1_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/system_policy_v1_beta1_rest_client_config.php',
                ],
            ],
        ];
    }

    private static function getLocationPolicyNameTemplate()
    {
        if (self::$locationPolicyNameTemplate == null) {
            self::$locationPolicyNameTemplate = new PathTemplate('locations/{location}/policy');
        }

        return self::$locationPolicyNameTemplate;
    }

    private static function getPolicyNameTemplate()
    {
        if (self::$policyNameTemplate == null) {
            self::$policyNameTemplate = new PathTemplate('projects/{project}/policy');
        }

        return self::$policyNameTemplate;
    }

    private static function getProjectPolicyNameTemplate()
    {
        if (self::$projectPolicyNameTemplate == null) {
            self::$projectPolicyNameTemplate = new PathTemplate('projects/{project}/policy');
        }

        return self::$projectPolicyNameTemplate;
    }

    private static function getPathTemplateMap()
    {
        if (self::$pathTemplateMap == null) {
            self::$pathTemplateMap = [
                'locationPolicy' => self::getLocationPolicyNameTemplate(),
                'policy' => self::getPolicyNameTemplate(),
                'projectPolicy' => self::getProjectPolicyNameTemplate(),
            ];
        }

        return self::$pathTemplateMap;
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * location_policy resource.
     *
     * @param string $location
     *
     * @return string The formatted location_policy resource.
     *
     * @experimental
     */
    public static function locationPolicyName($location)
    {
        return self::getLocationPolicyNameTemplate()->render([
            'location' => $location,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a policy
     * resource.
     *
     * @param string $project
     *
     * @return string The formatted policy resource.
     *
     * @experimental
     */
    public static function policyName($project)
    {
        return self::getPolicyNameTemplate()->render([
            'project' => $project,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a
     * project_policy resource.
     *
     * @param string $project
     *
     * @return string The formatted project_policy resource.
     *
     * @experimental
     */
    public static function projectPolicyName($project)
    {
        return self::getProjectPolicyNameTemplate()->render([
            'project' => $project,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - locationPolicy: locations/{location}/policy
     * - policy: projects/{project}/policy
     * - projectPolicy: projects/{project}/policy
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     *
     * @experimental
     */
    public static function parseName($formattedName, $template = null)
    {
        $templateMap = self::getPathTemplateMap();
        if ($template) {
            if (!isset($templateMap[$template])) {
                throw new ValidationException("Template name $template does not exist");
            }

            return $templateMap[$template]->match($formattedName);
        }

        foreach ($templateMap as $templateName => $pathTemplate) {
            try {
                return $pathTemplate->match($formattedName);
            } catch (ValidationException $ex) {
                // Swallow the exception to continue trying other path templates
            }
        }

        throw new ValidationException("Input did not match any known format. Input: $formattedName");
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           **Deprecated**. This option will be removed in a future major release. Please
     *           utilize the `$apiEndpoint` option instead.
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'binaryauthorization.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $serviceAddress setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     * }
     *
     * @throws ValidationException
     *
     * @experimental
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     * Gets the current system policy in the specified location.
     *
     * Sample code:
     * ```
     * $systemPolicyV1Beta1Client = new SystemPolicyV1Beta1Client();
     * try {
     *     $formattedName = $systemPolicyV1Beta1Client->policyName('[PROJECT]');
     *     $response = $systemPolicyV1Beta1Client->getSystemPolicy($formattedName);
     * } finally {
     *     $systemPolicyV1Beta1Client->close();
     * }
     * ```
     *
     * @param string $name         Required. The resource name, in the format `locations/&#42;/policy`.
     *                             Note that the system policy is not associated with a project.
     * @param array  $optionalArgs {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\BinaryAuthorization\V1beta1\Policy
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function getSystemPolicy($name, array $optionalArgs = [])
    {
        $request = new GetSystemPolicyRequest();
        $requestParamHeaders = [];
        $request->setName($name);
        $requestParamHeaders['name'] = $name;
        $requestParams = new RequestParamsHeaderDescriptor($requestParamHeaders);
        $optionalArgs['headers'] = isset($optionalArgs['headers']) ? array_merge($requestParams->getHeader(), $optionalArgs['headers']) : $requestParams->getHeader();
        return $this->startCall('GetSystemPolicy', Policy::class, $optionalArgs, $request)->wait();
    }
}

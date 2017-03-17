<?php
namespace PAGEmachine\Searchable\LinkBuilder;

use PAGEmachine\Searchable\Configuration\DynamicConfigurationInterface;
use PAGEmachine\Searchable\Service\ConfigurationMergerService;


/*
 * This file is part of the PAGEmachine Searchable project.
 */

/**
 * AbstractLinkBuilder
 */
abstract class AbstractLinkBuilder implements DynamicConfigurationInterface {

    /**
     * DefaultConfiguration
     * Add your own default configuration here if necessary
     *
     * @var array
     */
    protected static $defaultConfiguration = [];

    /**
     * This function will be called by the ConfigurationManager.
     * It can be used to add default configuration
     *
     * @param array $rootConfiguration The complete root configuration
     * @param array $currentSubconfiguration The subconfiguration at this classes' level. This is the part that can be modified
     */
    public static function getDefaultConfiguration($rootConfiguration, $currentSubconfiguration) {

       return static::$defaultConfiguration;
    }

    /**
     * @var array
     */
    protected $config = [];

    /**
     * @param array $config
     */
    public function __construct($config = null) {

        if ($config != null) {

            $this->config = ConfigurationMergerService::merge($this->config, $config);
        }
    }
}
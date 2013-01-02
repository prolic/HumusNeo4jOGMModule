<?php

namespace HumusNeo4jOGMModule\Options;

use Zend\Stdlib\AbstractOptions;

class EntityManager extends AbstractOptions
{
    /**
     * Set the configuration key for the Configuration. Configuration key
     * is assembled as "humusneo4jogm.configuration.{key}" and pulled from
     * service locator.
     *
     * @var string
     */
    protected $configuration = 'ogm_default';

    /**
     *
     * @param type $configuration
     * @return \HumusNeo4jOGMModule\Options\EntityManager
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = (string) $configuration;
        return $this;
    }

    /**
     * @return string
     */
    public function getConfiguration()
    {
        return "humusneo4jogm.configuration.{$this->configuration}";
    }

}
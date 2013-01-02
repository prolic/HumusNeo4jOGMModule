<?php

namespace HumusNeo4jOGMModule;

use HumusNeo4jOGMModule\Service as OGMService;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Loader\AutoloaderFactory;
use Zend\Loader\StandardAutoloader;

class Module implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ServiceProviderInterface
{

    /**
     * {@inheritDoc}
     */
    public function getAutoloaderConfig()
    {
        return array(
            AutoloaderFactory::STANDARD_AUTOLOADER => array(
                StandardAutoloader::LOAD_NS => array(
                    __NAMESPACE__ => __DIR__,
                ),
            ),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    /**
     * {@inheritDoc}
     */
    public function getServiceConfig()
    {
        return array(
            'invokables' => array(
            ),
            'aliases' => array(
                'HireVoice\Neo4j\EntityManager' => 'humusneo4jogm.entitymanager.ogm_default',
            ),
            'factories' => array(
                // @todo rewrite those classes
                //'doctrine.authenticationadapter.ogm_default'  => new CommonService\Authentication\AdapterFactory('ogm_default'),
                //'doctrine.authenticationstorage.ogm_default'  => new CommonService\Authentication\StorageFactory('ogm_default'),
                //'doctrine.authenticationservice.ogm_default'  => new CommonService\Authentication\AuthenticationServiceFactory('ogm_default'),
                'humusneo4jogm.configuration.ogm_default'   => new OGMService\ConfigurationFactory('ogm_default'),
                'humusneo4jogm.entitymanager.ogm_default' => new OGMService\EntityManagerFactory('ogm_default'),
            )
        );
    }
}

<?php

namespace HumusNeo4jOGMModule\Service;

use HireVoice\Neo4j\EntityManager;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Factory creates a neo4j entity manager
 */
class EntityManagerFactory extends AbstractFactory
{

    /**
     * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     * @return \Doctrine\ODM\MongoDB\DocumentManager
     */     
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $options = $this->getOptions($serviceLocator, 'entitymanager');
        $config = $serviceLocator->get($options->getConfiguration());
        return new EntityManager($config);
    }

    /**
     * Get the class name of the options associated with this factory.
     *
     * @return string
     */
    public function getOptionsClass()
    {
        return 'HumusNeo4jOGMModule\Options\EntityManager';
    }
}
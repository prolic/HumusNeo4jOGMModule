<?php

namespace HumusNeo4jOGMModule\Service;

use Doctrine\Common\Annotations;
use HireVoice\Neo4j\Configuration;
use Zend\ServiceManager\ServiceLocatorInterface;

class ConfigurationFactory implements \Zend\ServiceManager\FactoryInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $options = $serviceLocator->get('Configuration');
        $options = $options['humusneo4jogm'];
        $options = isset($options['configuration'][$this->name]) ? $options['configuration'][$this->name] : null;

        $cache = isset($options['cache']) ? $options['cache'] : 'array';
        $cache = $serviceLocator->get('doctrine.cache.' . $cache);

        $reader = new Annotations\AnnotationReader();
        $reader = new Annotations\CachedReader(new Annotations\IndexedReader($reader), $cache);

        $options['annotation_reader'] = $reader;

        if (null === $options) {
            throw new \RuntimeException(sprintf(
                'Options with name "%s" could not be found in "humusneo4jogm.configuration".',
                $this->name
            ));
        }
        return new Configuration($options);
    }


}
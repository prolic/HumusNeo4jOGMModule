<?php
return array(
    'humusneo4jogm' => array(

        'configuration' => array(
            'ogm_default' => array(
                'transport' => 'default',
                'host' => 'localhost',
                'port' => 7474,
                'proxy_dir' => 'data/HumusNeo4jOGMModule/Proxy',
                'debug' => true,
                'username' => null,
                'password' => null,
                'cache' => 'array',
            )
        ),

        'entitymanager' => array(
            'ogm_default' => array(
                'configuration' => 'ogm_default'
            )
        ),

        /*
         * @todo rewrite classes
        'authentication' => array(
            'odm_default' => array(
                'objectManager' => 'doctrine.documentmanager.odm_default',
                'identityClass' => 'Application\Model\User',
                'identityProperty' => 'username',
                'credentialProperty' => 'password'
            ),
        ),
        */
    ),
);

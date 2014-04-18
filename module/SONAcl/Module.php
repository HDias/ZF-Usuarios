<?php
namespace SONAcl;

use Zend\Mvc\MvcEvent;
use Zend\Mail\Transport\Smtp as SmtpTransport,
	Zend\Mail\Transport\SmtpOptions;
use SONUser\Auth\Adapter as AuthAdapter;

class Module{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig(){
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
    public function getServiceConfig() {
    
    	return array(
    			'factories' => array(
    
    		)
    	);
    
    }
}

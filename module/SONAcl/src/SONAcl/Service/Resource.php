<?php
namespace SONAcl\Service;

use SONBase\Service\AbstractService;

class Resource extends AbstractService{

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        parent::__construct($em);
        $this->entity = "SONAcl\Entity\Resource";
    	}
    
}

<?php
namespace SONUserRest\Controller;

use Zend\View\Model\JsonModel;
use Zend\Mvc\Controller\AbstractRestfulController;

class UserRestController extends AbstractRestfulController{
	
	// Listar - GET
	public function getList(){
		
		$em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
		$repo = $em->getRepository("SONUser\Entity\User");
		
		$data = $repo->findArray();
		 
		
		return new JsonModel(array('data' => $data));
		
	}
	// Retorna Registro Específico - Get
	public function get($id){
		
		$em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
		$repo = $em->getRepository("SONUser\Entity\User");
		
		$data = $repo->find($id)->toArray();
		
		return new JsonModel(array('data' => $data));
		
	}
	
	//Insere Registro - Post
	public function create($data){
		$userService = $this->getServiceLocator()->get("SONUser\Service\User");
		
		if($data)
		{
			$user = $userService->insert($data);
			if($user)
			{
				return new JsonModel(array('data'=>array('id'=>$user->getId(),'success'=>true)));
			}
			else
			{
				return new JsonModel(array('data'=>array('success'=>false)));
			}
		}
		else
			return new JsonModel(array('data'=>array('success'=>false)));
	}
	
	// Alteração - Put
	public function update($id, $data){
		$data['id'] = $id;
		$userService = $this->getServiceLocator()->get("SONUser\Service\User");
		
		if($data['id'])
		{
			$user = $userService->update($data);
			if($user)
			{
				return new JsonModel(array('data'=>array('id'=>$user->getId(),'success'=>true)));
			}
			else
			{
				return new JsonModel(array('data'=>array('success'=>false)));
			}
		}
		else
			return new JsonModel(array('data'=>array('success'=>false)));
	}
	
	// Deleta Registro - Delete
	public function delete($id){
		$userService = $this->getServiceLocator()->get("SONUser\Service\User");
		$res = $userService->delete($id);
		
		if($res)
		{
			return new JsonModel(array('data'=>array('success'=>true)));
		}
		else
			return new JsonModel(array('data'=>array('success'=>false)));
	}
	
}
<?php
namespace Rest\Model\Address;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;

class CountyTable
{
	protected $tg;
	
	public function __construct($sm)
	{
		$dbAdapter = $sm->get('Zend\Db\Adapter');
		$this->tg = new TableGateway('county', $dbAdapter);
	}
	
	public function fetchAll($id)
	{
		$data = $this->tg->select(array('parentId' => $id));
		return $data;
	}
	
	public function fetchOne($id)
	{
		$dataset = $this->tg->select(array('countyId' => $id));
		$data = $dataset->current();
		return $data;
	}
}
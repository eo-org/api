<?php
namespace Rest\Model\Address;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;

class ProvinceTable
{
	protected $tg;
	
	public function __construct($sm)
	{
		$dbAdapter = $sm->get('Zend\Db\Adapter');
		$this->tg = new TableGateway('province', $dbAdapter);
	}
	
	public function fetchAll($id)
	{
		$dataset = $this->tg->select();
		return $dataset;
	}
	
	public function fetchOne($id)
	{
		$dataset = $this->tg->select(array('provinceId' => $id));
		$data = $dataset->current();
		return $data;
	}
}
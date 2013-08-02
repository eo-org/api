<?php
namespace Rest\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Rest\Model\Address\ProvinceTable;
use Rest\Model\Address\CityTable;
use Rest\Model\Address\CountyTable;

class AddressController extends AbstractRestfulController
{
	public function getList()
	{
		$sm = $this->getServiceLocator();
		
		$cityTable = new CityTable($sm);
		$cityRowset = $cityTable->fetchAll();
		$result = array('Message' => null, 'ErrorCode' => null, 'Data' => array(
			
		));
		return new JsonModel($result);
	}
	
	public function get($id)
	{
		$sm = $this->getServiceLocator();
		
		if(substr($id, 2) == '0000') {
			$cityTable = new CityTable($sm);
			$dataset = $cityTable->fetchAll($id);
			$dataResult = $dataset->toArray();
		} else if(substr($id, 4) == '00') {
			$countyTable = new CountyTable($sm);
			$dataset = $countyTable->fetchAll($id);
			$dataResult = $dataset->toArray();
		} else {
			$provinceId = substr($id, 0, 2).'0000';
			$cityId = substr($id, 0, 4).'00';
			
			$provinceTable	= new ProvinceTable($sm);
			$cityTable		= new CityTable($sm);
			$countyTable	= new CountyTable($sm);
			$province	= $provinceTable->fetchOne($provinceId);
			$city 		= $cityTable->fetchOne($cityId);
			$county		= $countyTable->fetchOne($id);
			
			if($provinceId == '110000' || $provinceId == '120000' || $provinceId == '310000' || $provinceId == '500000') {
				$pccName = $province['province'].$county['county'];
			} else {
				$pccName = $province['province'].$city['city'].$county['county'];
			}
			
			$dataResult = array(
				'provinceName'	=> $province['province'],
				'cityName'		=> $city['city'],
				'countyName'	=> $county['county'],
				'pccName'		=> $pccName
			);
			
		}
		
		$result = array('Message' => null, 'ErrorCode' => null, 'Data' => $dataResult);
		return new JsonModel($result);
	}
	
	public function create($data)
	{
	
	}
	
	public function update($id, $data)
	{
		
	}
	
	public function delete($id)
	{
		
	}
}
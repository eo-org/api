<?php
namespace Rest\Model\Address;

class City
{
	public $cityId;
	public $city;
	public $parentId;
	
	public function getArrayCopy()
	{
		return array(
			'cityId' => $this->cityId,
			'city'	=> $this->city,
			'parentId' => $this->parentId
		);
	}
	
	public function exchangeArray($data)
	{
		$this->cityId = $data['cityId'];
		$this->city = $data['city'];
		$this->parentId = $data['parentId'];
	}
}
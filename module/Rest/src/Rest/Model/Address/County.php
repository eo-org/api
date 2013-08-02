<?php
namespace Rest\Model\Address;

class County
{
	public $countyId;
	public $county;
	public $parentId;
	
	public function getArrayCopy()
	{
		return array(
			'countyId' => $this->countyId,
			'county'	=> $this->county,
			'parentId' => $this->parentId
		);
	}
	
	public function exchangeArray($data)
	{
		$this->countyId = $data['countyId'];
		$this->county = $data['county'];
		$this->parentId = $data['parentId'];
	}
}
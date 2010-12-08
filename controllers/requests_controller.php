<?php

class RequestsController extends AppController {
	var $name = 'Requests';
	var $uses = array('Request', 'Item', 'ItemUnitType', 'User', 'Organization', 'Shelter');
	var $components = array('Twitter');
	
	function index() {
		$requests = $this->Request->find('all', array('conditions'=>array('Request.deleted'=>0), 'order'=>'Request.modified DESC', 'limit'=>15));
		
		foreach($requests as $index => $request) {
			$requests[$index]['Item']['name'] = $this->Item->getName($request['Request']['item_id']);
			$requests[$index]['ItemUnitType']['name'] = $this->ItemUnitType->getName($request['Request']['item_unit_type_id']);
			$requests[$index]['User']['name'] = $this->User->getName($request['Request']['modified_by']);
			
			if ('shelter' === $request['Request']['associate_type']) {
				$requests[$index]['Associate']['name'] = $this->Shelter->getName($request['Request']['associate_id']);
			}
			else {
				$requests[$index]['Associate']['name'] = $this->Organization->getName($request['Request']['associate_id']);
			}
		}
		
		$this->set('requests', $requests);
	}

	function create() {
		if (empty($this->data['Request'])) {
			$this->set('items', $this->Item->find('list', array('Item.id', 'Item.name')));
			$this->set('itemUnitTypes', $this->ItemUnitType->find('list', array('ItemUnitType.id', 'ItemUnitType.name')));
		}
		else {
			// quantity has specified
			if (array_key_exists('quantity', $this->data['Request'])) {
				$itemId = $this->data['Request']['item_id'];
				$itemUnitTypeId = $this->data['Request']['item_unit_type_id'];
				$associateId = '4cfae4cb-c96c-4cb1-9e30-0d10897623dc';
				$request = $this->Request->find('first', array('conditions'=>array('Request.associate_id'=>$associateId, 'Request.item_id'=>$itemId, 'Request.item_unit_type_id'=>$itemUnitTypeId, 'Request.deleted'=>0)));
				
				$this->data['Request']['associate_id'] = $associateId;
				$this->data['Request']['associate_type'] = 'organization';
				$this->data['Request']['modified_by'] = '4cfae4cb-aa78-45ea-a5e4-0d10897623dc 	';

				if (empty($request)) {
					$this->Request->create();
					$this->data['Request']['created_by'] = '4cfae4cb-aa78-45ea-a5e4-0d10897623dc 	';
				}
				else {
					$this->Request->id = $request['Request']['id'];
				}
				
				if ($this->Request->save($this->data['Request'])) {
					if ('shelter' === $this->data['Request']['associate_type']) {
						$associateName = $this->Shelter->getName($associateId);
					}
					else {
						$associateName = $this->Organization->getName($associateId);
					}
					
					$itemName = $this->Item->getName($itemId);
					$itemUnitTypeName = $this->ItemUnitType->getName($itemUnitTypeId);
					$url = 'http://' . $_SERVER['HTTP_HOST'] . '/simba/organizations/detail/' . $associateId;
					$this->Twitter->postRequest($associateName, $itemName, $this->data['Request']['quantity'], $itemUnitTypeName, $url);
					$this->set('success', true);
					$this->flash('Request submitted.', '/organizations/detail/'.$associateId, 3);
				}
				else {
					$this->set('success', false);
					$this->render('message');
				}
			}
			// specify quantity
			else {
				$itemId = $this->data['Request']['item_id'];
				$itemUnitTypeId = $this->data['Request']['item_unit_type_id'];
				$associateId = '4cfae4cb-c96c-4cb1-9e30-0d10897623dc';
				$request = $this->Request->find('first', array('conditions'=>array('Request.associate_id'=>$associateId, 'Request.item_id'=>$itemId, 'Request.item_unit_type_id'=>$itemUnitTypeId, 'Request.deleted'=>0)));
			
				if (empty($request)) {
					$this->set('itemQuantity', 0);
				}
				else {
					$this->set('itemQuantity', $request['Request']['quantity']);
				}
			
				$this->set('itemName', $this->Item->field('name', "Item.id='$itemId'"));
				$this->set('itemUnitTypeName', $this->ItemUnitType->field('name', "ItemUnitType.id='$itemUnitTypeId'"));
				$this->set('itemId', $itemId);
				$this->set('itemUnitTypeId', $itemUnitTypeId);
				$this->render('specify_quantity');
			}
		}
	}
	
	function statistics() {
		$this->set('numberOfOrganizations', $this->Organization->find('count'));
		$this->set('numberOfShelters', $this->Shelter->find('count'));
		$requestStats = $this->Request->getStatistics();
		
		foreach($requestStats as $index => $stat) {
			$requestStats[$index]['Item']['name'] = $this->Item->getName($stat['Request']['item_id']);
			$requestStats[$index]['ItemUnitType']['name'] = $this->ItemUnitType->getName($stat['Request']['item_unit_type_id']);
		}
		
		$this->set('requestStats', $requestStats);
	}
}
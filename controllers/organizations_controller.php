<?php

class OrganizationsController extends AppController {
	var $uses = array('Organization', 'User', 'OrganizationType', 'Request', 'Item', 'ItemUnitType');
	var $helpers = array('Html', 'Form', 'Javascript');

	function register() {
		if ( empty($this->data) ) {
			$this->set('organizationTypes', $this->OrganizationType->find('list', array('Organization.id', 'Organization.name')));
		}
		else {
			//debug($this->data);exit;
			// validate
			// validate password
			if ( md5($this->data['User']['password_hash']) === md5($this->data['UserPasswordConfirmation']) ) {
				// hash password
				$this->data['User']['password_hash'] = md5($this->data['User']['password_hash']);

				if (!$this->Organization->save($this->data['Organization'])) {
					$this->set('success', false);
					return;
				}
				
				// set associate ID and associate type
				$this->data['User']['associate_id'] = $this->Organization->id;
				$this->data['User']['associate_type'] = 'Organization';
				$this->data['User']['level'] = 'admin';
				if (!$this->User->save($this->data['User'])) {
					$this->set('success', false);
					return;
				}
				
				$this->set('success', true);
				$this->render('after_registration');
			}
		}
	}
	
	function getLongLat() {
	}
	
	function listInMap() {
		$this->set('organizations', $this->Organization->find('all'));
	}
	
	function listRequests($organizationId) {
		$requests = $this->Request->find('all', array('conditions'=>array('Request.deleted'=>0, 'Request.associate_id'=>$organizationId), 'order'=>'Request.modified DESC', 'limit'=>15));
		
		foreach($requests as $index => $request) {
			$requests[$index]['Item']['name'] = $this->Item->getName($request['Request']['item_id']);
			$requests[$index]['ItemUnitType']['name'] = $this->ItemUnitType->getName($request['Request']['item_unit_type_id']);
			$requests[$index]['created']['User']['name'] = $this->User->getName($request['Request']['created_by']);
			$requests[$index]['modified']['User']['name'] = $this->User->getName($request['Request']['modified_by']);
		}

		$this->set('requests', $requests);
	}
	
	function detail($organizationId) {
		$this->set('organization', $this->Organization->findById($organizationId));
		$this->listRequests($organizationId);
	}
}
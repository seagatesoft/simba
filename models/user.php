<?php

class User extends AppModel {
	var $name = 'User';
	var $transactional = true;
	
	function getName($id) {
		$modelName = $this->name;
		$nameField = $this->nameField;

		return ( $this->field('first_name', "$modelName.id='$id'") . ' ' . $this->field('last_name', "$modelName.id='$id'"));
	}
}
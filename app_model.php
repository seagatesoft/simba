<?php

class AppModel extends Model {
	var $nameField = 'name';

	function getName($id) {
		$modelName = $this->name;
		$nameField = $this->nameField;

		return $this->field($nameField, "$modelName.id='$id'");
	}
}
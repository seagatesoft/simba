<?php

class Request extends AppModel {
	var $name = 'Request';
	
	function getStatistics() {
		$query = "SELECT item_id, item_unit_type_id, SUM(quantity) AS totalQuantity FROM requests AS Request WHERE deleted=0 GROUP BY item_id, item_unit_type_id ORDER BY totalQuantity  DESC";
		
		return $this->query($query);
	}
}
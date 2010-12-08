<?php
echo $javascript->link('http://maps.google.com/maps/api/js?sensor=false', false);
echo $javascript->link('maps', false);
?>
<script type="text/javascript">
document.observe(
	'dom:loaded', 
	function() {
		var organizationsList = [];
		var organizationsInfo = [];
		var organizationsLinks = [];
		<?php foreach($organizations as $index => $organization):?>
		organizationsList[<?php echo $index;?>] = new google.maps.LatLng(<?php echo $organization['Organization']['location_latitude'];?>, <?php echo $organization['Organization']['location_longitude'];?>);
		organizationsInfo[<?php echo $index;?>] = '<?php echo $organization['Organization']['name'];?>';
		organizationsLinks[<?php echo $index;?>] = '<?php echo $html->link($organization['Organization']['name'], array('controller'=>'organizations', 'action'=>'detail', 'id'=>$organization['Organization']['id']));?>';
		<?php endforeach;?>
		showOrganizationsInMap(organizationsList, organizationsInfo, organizationsLinks);
	}
);
</script>
<div>
	<input onclick="clearOverlays();" type="button" value="Clear Overlays" />
	<input onclick="showOverlays();" type="button" value="Show All Overlays" /> 
</div>
<div id="map_canvas" style="width:600px; height:500px"></div>
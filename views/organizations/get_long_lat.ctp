<?php
echo $javascript->link('http://maps.google.com/maps/api/js?sensor=false', false);
echo $javascript->link('maps', false);
?>
<script type="text/javascript">
document.observe(
	'dom:loaded', 
	function() {
		initialize();
	}
);
</script>
<div>
<table> 
	<tr>
		<td colspan="2"><strong>Get Location</strong></td>
	</tr>
    <tr>
		<td>Latitude:</td>
		<td><input id="latitudeInput" type="text" /></td>
    </tr>
    <tr>
		<td>Longitude:</td>
		<td><input id="longitudeInput" type="text" /></td>
    </tr>
    <tr>
		<td colspan="2">
			<input onclick="deleteOverlays();" type="button" value="Cancel"/>&nbsp;
			<input id="btn1" type="button" value="OK" onclick="sendValueToParent();"/>
		</td>
	</tr>
</table>
</div>
<div id="map_canvas" style="width:600px; height:500px"></div> 
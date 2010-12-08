<h2>Organization Info</h2>
<!--<?php debug($organization);?>-->
<div>
<p><strong>Name:</strong> <?php echo $organization['Organization']['name'];?></p>
<p><strong>Description:</strong> <?php echo preg_replace('#\n#', '<br />', $organization['Organization']['description']);?></p>
<p><strong>Address:</strong> <?php echo preg_replace('#\n#', '<br />', $organization['Organization']['location_text']);?></p>
<p><strong>Contact:</strong> <?php echo preg_replace('#\n#', '<br />', $organization['Organization']['contact_info']);?></p>
</div>

<h2>List of All Requested Items by <?php echo $organization['Organization']['name'];?></h2>
<br />
<table>
<thead>
<tr>
	<th>No.</th>
	<th>Item</th>
	<th>Quantity</th>
	<th>Item Unit</th>
	<th>Created By</th>
	<th>Last Modified By</th>
	<th>Created</th>
	<th>Last Modified</th>
</tr>
</thead>
<tbody>
<?php foreach($requests as $index => $request):?>
<tr>
	<td><?php echo ($index+1);?></td>
	<td><?php echo $request['Item']['name'];?></td>
	<td><?php echo $request['Request']['quantity'];?></td>
	<td><?php echo $request['ItemUnitType']['name'];?></td>
	<td><?php echo $request['created']['User']['name'];?></td>
	<td><?php echo $request['modified']['User']['name'];?></td>
	<td><?php echo $request['Request']['created'];?></td>
	<td><?php echo $request['Request']['modified'];?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
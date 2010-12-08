<h2>List of All Requested Items</h2>
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
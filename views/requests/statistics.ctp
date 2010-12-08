<h2>Requests Statistics</h2>
<p>
Total registered shelters: <?php echo $numberOfOrganizations;?><br />
Total registered organizations: <?php echo $numberOfShelters;?><br />
Total refugees: 1.000<br />
Total volunteers: 200<br />
Total capacity of shelters: 1.200
</p>
<table>
<thead>
<tr>
	<th>No.</th>
	<th>Item Requested</th>
	<th>Quantity</th>
	<th>Item Unit</th>
</tr>
</thead>
<tbody>
<?php foreach($requestStats as $index => $stat):?>
<tr>
	<td><?php echo ($index+1);?></td>
	<td><?php echo $stat['Item']['name'];?></td>
	<td><?php echo $stat[0]['totalQuantity'];?></td>
	<td><?php echo $stat['ItemUnitType']['name'];?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
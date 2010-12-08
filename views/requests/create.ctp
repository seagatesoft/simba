<h2>Create Request</h2>
<form method="post" action="<?php echo $html->url('/requests/create');?>">
<fieldset>
Item:<br />
<?php echo $form->select('Request.item_id', $items);?>
<br />
Item Unit:<br />
<?php echo $form->select('Request.item_unit_type_id', $itemUnitTypes);?>
<br />
<input type="submit" value="Continue" />
</fieldset>
</form>
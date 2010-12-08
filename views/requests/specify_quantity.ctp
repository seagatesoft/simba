<h2>Create Request</h2>
<form method="post" action="<?php echo $html->url('/requests/create');?>">
<fieldset>
Item: <?php echo $itemName;?>
<br />
<?php if(!empty($itemQuantity)):?>
(Your organization has send request for this item for quantity below.)<br />
<?php endif;?>
Quantity: <input type="text" name="data[Request][quantity]" value="<?php echo $itemQuantity;?>" />
<br />
Item Unit: <?php echo $itemUnitTypeName;?>
<br />
<input type="hidden" name="data[Request][item_id]" value="<?php echo $itemId;?>" />
<input type="hidden" name="data[Request][item_unit_type_id]" value="<?php echo $itemUnitTypeId;?>" />
<input type="submit" value="Send Request" />
</fieldset>
</form>
<?php
echo $javascript->link('http://maps.google.com/maps/api/js?sensor=false', false);
echo $javascript->link('maps', false);
?>
<script type="text/javascript">
document.observe(
	'dom:loaded', 
	function() {
		$('getLatLongButton').observe('click', showPrompt);
	}
);
</script>
<h2>Register Organization</h2>
<form method="post" action="<?php echo $html->url('/Organizations/register');?>">
<fieldset>
<legend>Organization</legend>
<label for="OrganizationName">Organization Name:</label>
<br />
<input type="text" id="OrganizationName" name="data[Organization][name]" />
<br />
<label for="OrganizationLocationText">Location:</label>
<br />
<textarea id="OrganizationLocationText" name="data[Organization][location_text]"></textarea>
<br />
<label for="OrganizationLocationLatitude">Location Latitude:</label>
<br />
<input type="text" id="OrganizationLocationLatitude" name="data[Organization][location_latitude]" />
<br />
<label for="OrganizationLocationLongitude">Location Longitude:</label>
<br />
<input type="text" id="OrganizationLocationLongitude" name="data[Organization][location_longitude]" />
<br />
<button type="button" id="getLatLongButton">Get Latitude and Longitude via Google Map</button>
<br />
<label for="OrganizationType">Organization Type:</label>
<br />
<?php echo $form->select('Organization.organization_type_id', $organizationTypes);?>
<br />
<label for="OrganizationContactInfo">Contact Info:</label>
<br />
<textarea id="OrganizationContactInfo" name="data[Organization][contact_info]"></textarea>
<br />
<label for="OrganizationDescription">Description:</label>
<br />
<textarea id="OrganizationDescription" name="data[Organization][description]"></textarea>
<br />
</fieldset>
<fieldset>
<legend>Organization Admin</legend>
<label for="UserName">User Name:</label>
<br />
<input type="text" id="UserName" name="data[User][user_name]" />
<br />
<label for="UserPasswordConfirmation">Confirm Password:</label>
<br />
<input type="password" id="UserPasswordConfirmation" name="data[UserPasswordConfirmation]" />
<br />
<label for="UserPasswordHash">Password:</label>
<br />
<input type="password" id="UserPasswordHash" name="data[User][password_hash]" />
<br />
<label for="UserFirstName">First Name:</label>
<br />
<input type="text" id="UserFirstName" name="data[User][first_name]" />
<br />
<label for="UserLastName">Last Name:</label>
<br />
<input type="text" id="UserLastName" name="data[User][last_name]" />
<br />
<label for="UserEmail">E-mail:</label>
<br />
<input type="text" id="UserEmail" name="data[User][email]" />
<br />
<label for="UserContactInfo">Contact Info:</label>
<br />
<textarea id="UserContactInfo" name="data[User][contact_info]"></textarea>
<br />
</fieldset>
<input type="submit" value="Register" />
</form>
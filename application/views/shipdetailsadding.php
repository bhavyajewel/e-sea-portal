<!-- <h2>SHIP DETAILS ADDING</h2> -->
<br><br>
<form action="<?php echo base_url();?>Welcome/shipdetailsprocess" method="post">
	<table align="center">
	<tr><td>Ship Category</td><td><select name="shipcategory" class="form-control">
		<option>Selelct</option>
		<option>Cargo Carriers</option>
		<option>Passenger Carriers</option>
		<option>Industrial Ships</option>
		<option>Service Vessels</option>
		<option>Non commercial</option>
		<option>Ferries</option>
		<option>Tankers</option>
		<option>Container ships</option>
		<option>Barge-carrying ships</option>
		<option>Dry bulk ships</option>
		<option>Roll-on ships</option>
		<option>Roll-off ships</option>
		<option>Cruise ships</option>
		<option>General ships</option>
	</select></tr>
	<tr><td>Ship Name</td><td><input type="text" name="shipname" class="form-control"></td></tr>
	<tr><td>Source</td><td><input type="text" name="source" class="form-control"></td></tr>
	<tr><td>Destination</td><td><input type="text" name="destination"class="form-control"></td></tr>
	<tr><td>Ship Details</td><td><textarea  name="shipdetails" class="form-control"></textarea></td></tr>
	<tr><td></td><td><input type="submit" value="submit" class="btn btn-success"></td></tr>
	</table>
	</form>
<br><br>

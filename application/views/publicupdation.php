<!-- <h2>PUBLIC UPDATION FORM</h2> -->
<br><br>
<form action="<?php echo base_url();?>Welcome/publicupdation" method="post">
	<table align="center">
    <input type="hidden" name="hide" class="form-control" value="<?php echo $id?>">
	<?php foreach ($views as $row) { ?>
	<tr><td>Name</td><td><input type="text" name="name"class="form-control" value="<?php echo $row->name;?>"></td></tr>
	<tr><td>Adress</td><td><textarea  name="address" class="form-control"><?php echo $row->address;?></textarea></td></tr>
	<tr><td>Pincode</td><td><input type="text" name="pincode" class="form-control" value="<?php echo $row->pincode;?>"></td></tr>
	<tr><td>District</td><td><select name="district" class="form-control">
	<option Value="<?php echo $row->district;?>"><?php echo $row->district;?></option>
		<option>Thiruvananthapuram</option>
		<option>Kollam</option>
		<option>Pathanamthitta</option>
		<option>Alappuzha</option>
		<option>Kottayam</option>
		<option>Idukki</option>
		<option>Ernakulam</option>
		<option>Trissufr</option>
		<option>Palakad</option>
		<option>Malapuram</option>
		<option>Kozhikode</option>
		<option>Wayanad</option>
		<option>Kannur</option>
		<option>Kasargode</option>
	</select></tr>
	<tr><td>City</td><td><input type="text" name="city" class="form-control" value="<?php echo $row->city;?>"></td></tr>
	<tr><td>Gender</td><td><select id="gender" name="gender" class="form-control" required><br><br>
		<option value="male">Male</option>
		<option value="female">Female</option>
		<option value="other">Other</option>
    </select>
	</td></tr>
	<tr><td>contact</td><td><input type="text" name="contact" class="form-control" value="<?php echo $row->contact;?>"></td></tr>
	<tr><td>email</td><td><input type="email" name="email" class="form-control" value="<?php echo $row->email;?>"></td></tr>
	<tr><td></td><td><input type="submit" value="update" class="btn btn-success"></td></tr>
    <?php } ?>
	</table>
	</form>
<br><br>

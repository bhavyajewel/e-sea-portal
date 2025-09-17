<!-- <h2>COMPANY UPDATION FORM</h2> -->
<br><br>
<form action="<?php echo base_url();?>Welcome/companyupdation" method="post">
	<table align="center">
	<input type="hidden" name="hide" value="<?php echo $id?>">
	<?php foreach ($views as $row) { ?>
	<tr><td>Name</td><td><input type="text" name="name" class="form-control" value="<?php echo $row->name;?>"></td></tr>
	<tr><td>Address</td><td><textarea name="address"class="form-control"><?php echo $row->address;?></textarea></td></tr>
	<tr><td>State</td><td><select name="state"class="form-control" value="">
    <option Value="<?php echo $row->state;?>"><?php echo $row->state;?></option>
		<option>ANDHRA PRADESH</option>
		<option>ARUNACHAL PRADESH</option>
		<option>BIHAR</option>
		<option>CHATTISGARH</option>
		<option>GOA</option>
		<option>GUJARAT</option>
		<option>HARYANA</option>
		<option>JHARKHAND</option>
		<option>KARNATAKA</option>
		<option>KERALA</option>
		<option>MADHYA PRADESH</option>
		<option>PUNJAB</option>
		<option>TAMILNADU</option>
		<option>WEST BENGAL</option>
		</td></tr>
	<tr><td>District</td><td><select name="district" class="form-control" value="<?php echo $row->district;?>">
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
    <tr><td>contact</td><td><input type="text" name="contact" class="form-control" value="<?php echo $row->contact;?>"></td></tr>
	<tr><td>email</td><td><input type="email" name="email" class="form-control" value="<?php echo $row->email;?>"></td></tr>
	<!-- <tr><td>password</td><td><input type="password" name="password"></td></tr> -->
	<tr><td></td><td><input type="submit" value="update" class="btn btn-success"></td></tr>
	<?php } ?>
	</table>
	</form>
	<br><br>
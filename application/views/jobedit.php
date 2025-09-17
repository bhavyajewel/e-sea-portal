<!-- <h2>JOB EDIT FORM</h2> -->
<br><br>
<form action="<?php echo base_url();?>Welcome/jobupdations" method="post">
	<table align="center">
    <input type="hidden" name="hide" class="form-control" value="<?php echo $jobid?>">
	<?php foreach ($dis as $row) { ?>
    <tr><td>Job Category</td><td><select name="jobcategory" class="form-control">
	<option Value="<?php echo $row->jobcategory;?>"><?php echo $row->jobcategory;?></option>
    <option>Selelct</option>
    <option>Selelct</option>
		<option>Captain</option>
		<option>Marine Engineer</option>
		<option>Deckhand</option>
		<option>Engineer</option>
        <option>Cruise Staff Department</option>
		<option>Activities Coordinator</option>
		<option>Chief Engineer</option>
		<option>Chief Mate</option>
		<option>Logistics</option>
		<option>Officer</option>
		<option>Chef</option>
		<option>Mechanics</option>
		<option>Entertainment and guest programmes</option>
		<option>Crane drivers</option>
		<option>Terminal Operators</option>
        <option>Cleaning</option>
        <option>HR Post</option>
        <option>IT engineers</option>
	</select></tr>
    <tr><td>Job Name</td><td><input type="text" name="jobname" class="form-control" value="<?php echo $row->jobname;?>"></td></tr>
	<tr><td>Job details</td><td><input type="text" name="jobdetails" class="form-control" value="<?php echo $row->jobdetails;?>"></td></tr>
	<tr><td>Qualifications</td><td><input type="text" name="qualification" class="form-control" value="<?php echo $row->qualification;?>"></td></tr>
    <tr><td>Last date for apply</td><td><input type="text" name="lastdateforapply" class="form-control" value="<?php echo $row->lastdateforapply;?>"></td></tr>
	<tr><td></td><td><input type="submit" value="update" class="btn btn-success"></td></tr>
    <?php } ?>
	</table>
	</form>
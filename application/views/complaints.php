<br><br>
<centre>
<form action="<?php echo base_url();?>Welcome/complaint" method="post">
	<table align="center">
	<input type="hidden" name="hide" class="form-control value="<?php echo $shipid;?>>
	<input type="hidden" name="exportid" class="form-control value="<?php echo $exportid;?>>
    <tr><td>Subject</td><td><input type="text" name="subject" class="form-control"></td></tr>
	<tr><td>Complaint</td><td><textarea name="complaints" class="form-control"></textarea></td></tr>
    <tr><td>Upload image</td><td><input type="file" name="image" class="form-control"></td></tr>
	<tr><td></td><td><input type="submit" value="register" class="btn btn-success"></td></tr>
	</table>
	</form>
	</centre>
<br><br>
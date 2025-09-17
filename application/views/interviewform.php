<br><br>
<form action="<?php echo base_url();?>Welcome/interview" method="post">
	<table align="center">
	<input type="hidden" name="hide" value="<?php echo $id;?>">
    <tr><td>Interview date</td><td><input type="date" name="interview_date" class="form-control"></td></tr>
    <tr><td>Interview time</td><td><input type="time" name="time"  class="form-control"></td></tr>
    <tr><td>Venue</td><td><input type="text" name="venue" class="form-control"></td></tr>
    <!-- <tr><td>Current date</td><td><input type="text" name="currentdate"></td></tr> -->
    <!-- <tr><td>Upload CV</td><td><input type="file" name="image"></td></tr> -->
	<tr><td></td><td><input type="submit" value="register" class="btn btn-success"></td></tr>
	</table>
	</form>
    <br><br>
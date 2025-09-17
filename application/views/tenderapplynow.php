<h2></h2>
<br><br>
<form action="<?php echo base_url();?>Welcome/tenderapplynow1" method="post">
	<table align="center">
	<input type="hidden" name="hide" class="form-control" value="<?php echo $tid;?>">
    <tr><td>Amount</td><td><input type="text" name="amount" class="form-control"></td></tr><br>
	<tr><td></td><td><input type="submit" value="apply" class="btn btn-success"></td></tr>
	</table>
	</form>
	<br><br>
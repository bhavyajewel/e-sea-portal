<!-- <h2>NEWS UPDATION FORM</h2> -->
<br><br>
<form action="<?php echo base_url();?>/Welcome/newsupdation" method="post">
	<table align="center">
	<input type="hidden" name="hide" class="form-control" value="<?php echo $id?>">
    <?php foreach ($views as $row) { ?>
	<tr><td>News</td><td><textarea  name="news" class="form-control"><?php echo $row->news;?></textarea></td></tr>
	<!-- <tr><td>Date</td><td><input type="date" name="date" value="<?php echo $row->currentdate;?>"></td></tr> -->
	<tr><td></td><td><input type="submit" value="Update" class="btn btn-success"></td></tr>
    <?php } ?>
	</table>
	</form>	
	<br><br>
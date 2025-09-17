<h2>NEWS REGISTRATION FORM</h2>
<form action="<?php echo base_url();?>/Welcome/news" method="post">
	<table aligh="center">
	<input type="hidden" name="hide" value="h">
	<?php foreach ($views as $row) { ?>
	<tr><td>News</td><td><textarea  name="news"><?php echo $row->news;?></textarea></td></tr>
	<tr><td>date</td><td><input type="date" name="date"value="<?php echo $row->currentdate;?>"></td></tr>
	<tr><td></td><td><input type="submit" value="submit" class="btn btn-success"></td></tr>
	<?php } ?>
	</table>
	</form>
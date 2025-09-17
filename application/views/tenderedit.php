<h2>TENDER EDIT FORM</h2>
<form action="<?php echo base_url();?>Welcome/tenderupdations" method="post">
	<table aligh="center">
    <input type="hidden" name="hide" value="">
	<?php foreach ($dis as $row) { ?>
    <tr><td>Tender Category</td><td><input type="text" name="tendercategory"></td></tr>
	<tr><td>Tender Name</td><td><input type="text" name="tendername"></td></tr>
	<tr><td>Tender details</td><td><input type="text" name="tenderdetails"></td></tr>
	<tr><td>Amount</td><td><input type="text" name="amount"></td></tr>
    <tr><td>Last date for apply</td><td><input type="date" name="lastdate"></td></tr>
	<tr><td>date</td><td><input type="date" name="date"></td></tr>
	<tr><td></td><td><input type="submit" value="update" class="btn btn-success"></td></tr>
    <?php } ?>
	</table>
	</form>
<h2>TENDER ADDING</h2>
<form action="<?php echo base_url();?>Welcome/tender" method="post">
	<table aligh="center">
    <tr><td>Tender Category</td><td><input type="text" name="tendercategory"></td></tr>
	<tr><td>Tender Name</td><td><input type="text" name="tendername"></td></tr>
	<tr><td>Tender details</td><td><input type="text" name="tenderdetails"></td></tr>
	<tr><td>Amount</td><td><input type="text" name="amount"></td></tr>
    <tr><td>Last date for apply</td><td><input type="date" name="lastdate"></td></tr>
	<tr><td>date</td><td><input type="date" name="date"></td></tr>
	<tr><td></td><td><input type="submit" value="submit" class="btn btn-success"></td></tr>
	</table>
	</form>
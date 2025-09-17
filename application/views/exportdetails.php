<!-- <h2>EXPORT DETAILS FORM</h2> -->
<form action="<?php echo base_url();?>Welcome/exports" method="post">
	<table align="center">
	<input type="hidden" name="hide" value="">
    <tr><td>Product Category</td><td><input type="text" name="productcategory" class="form-control"></td></tr>
    <tr><td>Product Name</td><td><input type="text" name="productname" class="form-control"></td></tr>
    <tr><td>Product Quantity</td><td><input type="text" name="productquantity" class="form-control"></td></tr>
    <tr><td>Source</td><td><input type="text" name="source" class="form-control"></td></tr>
    <tr><td>Destination</td><td><input type="text" name="destination" class="form-control"></td></tr>
    <tr><td>Date</td><td><input type="date" name="date" class="form-control"></td></tr>
    <tr><td>Recepient Name</td><td><input type="text" name="recepientname" class="form-control"></td></tr>
    <tr><td>Recepient Address</td><td><input type="text" name="recepientaddress" class="form-control"></td></tr>
    <tr><td>Recepient Contact</td><td><input type="text" name="recepientcontact" class="form-control"></td></tr>
	<tr><td></td><td><input type="submit" value="register" class="btn btn-success"></td></tr>
	</table>
	</form>
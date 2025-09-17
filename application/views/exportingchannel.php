<h2>Exporting channel</h2>
<form action="<?php echo base_url();?>Welcome/exportchannel" method="post">
	<table aligh="center">
	<tr><td>Product Category</td><td><select name="productcategory">
		<option>Selelct</option>
		<option value="Electronic Gadgets">Electronic Gadgets</option>
		<option value="Clothing">Clothing</option>
		<option value="Books">Books</option>
		<option value="Medicines">Medicines</option>
		<option value="Vehicles">Vehicles</option>
		<option value="Food items">Food items</option>
		<option value="Beverages">Beverages</option>
		<option value="Furnitures">Furnitures</option>
	</select></td></tr>
    <tr><td>Product Subcategory</td><td><select name="product_subcategory">
		<option>Selelct</option>
		<option value="Mobile phones">Mobile phones</option>
		<option value="Laptops">Laptops</option>
        <option value="AC">AC</option>
        <option value="Television">Television</option>
        <option value="Referigerator">Referigerator</option>
        <option value="Washing Machine">Washing Machine</option>
		<option value="SHIRTS">SHIRTS</option>
        <option value="PANTS">PANTS</option>
        <option value="SKIRTS">SKIRTS</option>
        <option value="SAREE">SAREE</option>
        <option value="KIDS WEAR">KIDS WEAR</option>
		<option value="ROMANCE">ROMANCE</option>
        <option value="HORROR">HORROR</option>
        <option value="FICTION">FICTION</option>
        <option value="EPICS">EPICS</option>
        <option value="STUDY MATERIALS">STUDY MATERIALS</option>
		<option value="CARS">CARS</option>
        <option value="BIKE">BIKE</option>
        <option value="AUTO">AUTO</option>
        <option value="DATES">DATES</option>
        <option value="FISH">FISH</option>
		<option value="MEAT">MEAT</option>
        <option value="FRUITS">FRUITS</option>
        <option value="VEGETABLES">VEGETABLES</option>
        <option value="SOFA">SOFA</option>
        <option value="TABLE">TABLE</option>
		<option value="ALMIRAH">ALMIRAH</option>
        <option value="JUICE">JUICE</option>
        <option value="INSTANT NOODLES">INSTANT NOODLES</option>
        <option value="Dolo">Dolo</option>
		<option value="Citrizine">Citrizine</option>
        <option value="Insulin">Insulin</option>
        <option value="Medical kit">Medical kit</option>
	</select></td></tr>
	<tr><td>Product Name</td><td><input type="text" name="productname"></td></tr>
	<tr><td>Company Name</td><td><input type="text" name="companyname"></td></tr>
    <tr><td>Exporting charge per item</td><td><input type="text" name="exportingcharge"></td></tr>
	<tr><td>Tax amount %</td><td><input type="text" name="taxamount"></td></tr>
	<tr><td></td><td><input type="submit" value="submit" class="btn btn-success"></td></tr>
	</table>
	</form>
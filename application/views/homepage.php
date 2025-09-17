<!-- <h2>Sign In Page</h2><br><br>
<form action=".php" method="post">
    <div class="conatiner">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Username" name="uname" required>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter password" name="psw" required>
        <button type="submit">Login</button>
        <label>
            <input type="checkbox" checked="checked" name="remember">Remember me </label>
            <button type="Submit">Sign Up</button>
</div> -->

<h2>HOME</h2>
<form action="" method="post">
	<label for="first"> Name:</label>
	<input type="text" id="first" name="first" placeholder="Enter your first name" required><br><br>
	<label for="last">Last Name:</label>
	<input type="text" id="last" name="last" placeholder="Enter your last name" required><br><br>
	<label for="email">Email:</label>
	<input type="email" id="email" name="email" placeholder="Enter your email ID" required><br><br>
	<label for="dob">Date Of Birth:</label>
	<input type="date" id="dob" name="dob" placeholder="Enter your DOB" required><br><br>
	<label for="mobile">Contact:</label>
	<input type="text" id="mobile" name="mobile" placeholder="Enter your contact number" required maxlength-"10"><br><br>
	<label for="gender">Gender:</label>
	<select id="gender" name="gender" required><br><br>
		<option value="male">Male</option>
		<option value="female">Female</option>
		<option value="other">Other</option>
    </select>
	<div class="wrap"><br><br>
		<button type="submit" onclick="solve()">Submit</button><br><br>
</div>
</form>
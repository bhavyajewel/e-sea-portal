<html ng-app="myApp">

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
</head>

<body>
	<div ng-controller="cntrl" class="container" style="margin-left: 200px;">
		<br><br>
		<form action="<?php echo base_url(); ?>index.php/Welcome/publicregister" method="post">
			<!-- <table align="center"> -->
				<div class="row">
					<div class="col-sm-3" style="margin-left: 150px;">Name:</div>
					<div class="col-sm-3" style="margin-left: -150px;"><input type="text" name="name" maxlength="60"
							ng-pattern="/^[a-zA-Z. ]*[a-zA-Z]{1,60}$/" ng-model="name" style="width: 400px;" required
							class="form form-control mb-2" placeholder="Enter Full Name" />
					</div>
					<div class="col-sm-3" style="margin-left: 400px;"><span style="color:red"
							ng-show="SaveForm.name.$dirty && SaveForm.name.$invalid" class="ng-hide">
							Please Enter Valid Name.! </span></div>
				</div>
				<div class="row">
					<div class="col-sm-3" style="margin-left: 150px;">Address:</div>
					<div class="col-sm-3" style="margin-left: -150px;">
						<textarea class="form-control" name="address" class="form-control"
							style="width:400px"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3" style="margin-left: 150px;">Pincode:</div>
					<div class="col-sm-3" style="margin-left: -150px;"> <input type="text" name="pincode"
							style="width: 400px;" required class="form form-control mb-2">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3" style="margin-left: 150px;">District:</div>
					<div class="col-sm-3" style="margin-left: -150px;">
						<select name="district" class="form-control" style="width: 400px;">
							<option>Selelct</option>
							<option>Thiruvananthapuram</option>
							<option>Kollam</option>
							<option>Pathanamthitta</option>
							<option>Alappuzha</option>
							<option>Kottayam</option>
							<option>Idukki</option>
							<option>Ernakulam</option>
							<option>Trissufr</option>
							<option>Palakad</option>
							<option>Malapuram</option>
							<option>Kozhikode</option>
							<option>Wayanad</option>
							<option>Kannur</option>
							<option>Kasargode</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3" style="margin-left: 150px;">City:</div>
					<div class="col-sm-3" style="margin-left: -150px;">
						<textarea class="form-control" name="city" class="form-control"></textarea>
					</div>
				</div>
	<div class="row">
		<div class="col-sm-3" style="margin-left: 150px;">Gender:</div>
		<div class="col-sm-4" style="margin-left: -150px;">
			<section id="pattern1">
				<label style="--icon:'🤵🏻‍♂';--color:lightblue"><input type="radio" name="gender" value="male"
						required>&nbsp;Male &nbsp;</label>
				<label style="--icon:'🤵🏻‍♀';--color:pink"><input type="radio" name="gender" value="female"
						required>&nbsp;Female &nbsp;</label>
				<label style="--icon:'🏳‍🌈';--color:white"><input type="radio" name="gender" value="other"
						required>&nbsp;Other </label>
			</section>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3" style="margin-left: 150px;">Contact Number:</div>
		<div class="col-sm-3" style="margin-left: -150px;"><input type="text" ng-pattern="/^[6-9][0-9]{9}$/"
				ng-model="contact_number" name="contact" style="width: 400px;" required
				class="form form-control mb-2" />
		</div>
		<div class="col-sm-3" style="margin-left: 400px;"><span style="color:red"
				ng-show="SaveForm.contact_number.$dirty && SaveForm.contact_number.$invalid" class="ng-hide">
				Please Enter Valid Mobile No.! </span></div>
	</div>
	<div class="row">
		<div class="col-sm-3" style="margin-left: 150px;">Email: </div>
		<div class="col-sm-3" style="margin-left: -150px;"><input type="email" required
				ng-pattern="/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,30}$/" name="email" style="width: 400px;"
				class="form form-control mb-2" ng-model="email" />
		</div>
		<div class="col-sm-3" style="margin-left: 400px;"> <span style="color:red"
				ng-show="SaveForm.email.$dirty && SaveForm.email.$invalid" class="ng-hide">
				Please Enter Valid Email.!</span></div>
	</div>
	<div class="row">
		<div class="col-sm-3" style="margin-left: 150px;">Password: </div>
		<div class="col-sm-3" style="margin-left: -150px;"><input type="password" name="password" style="width: 400px;"
				required class="form form-control mb-2">
			<input type="submit" ng-disabled="SaveForm.$invalid" value="Register" class="btn btn-primary">
		</div>
	</div>

	</div>

	<!-- </table> -->
	</form>
	<br><br>
	<script>
		var app = angular.module("myApp", []);
		app.controller('cntrl', function ($scope) { })
	</script>

</html>



<!-- </div> -->
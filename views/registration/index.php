<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<title>Registration</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="/template/css/style.css" rel="stylesheet" type="text/css">
	<?php include_once (ROOT.'/template/js/script.php'); ?>
</head>
<body>
<h1 class="headline"> Registration Form </h1>
<div class="container">
	<div class="row">
		<form id="registration-form" method="post" action="/controllers/RequestController.php">
		<input type="hidden" name="model" value="Registration">
		<input type="hidden" name="function" value="register">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-md-6 form-group">
						<label>First Name</label>
						<input type="text" placeholder="Enter First Name Here.." class="form-control" name="fname" maxlength="32" required>
					</div>
					<div class="col-md-6 form-group">
						<label>Last Name</label>
						<input type="text" placeholder="Enter Last Name Here.." class="form-control" name="lname" maxlength="32" required>
					</div>
				</div>									
				<div class="form-group" >
					<label>Username</label>
					<input type="text" placeholder="Enter Username Here.." class="form-control" name="uname" maxlength="10" 
						title="The username must be 3 to 15 characters long and consist only of English letters, numbers, underscores, and dashes." required>
				</div>		
				<div class="form-group">
					<label>Email Address</label>
					<input type="email" placeholder="Enter Email Address Here.." class="form-control" name="email" maxlength="100" required>
				</div>	
				<div class="row">
					<div class="col-md-6 form-group">
						<label>Password</label>
						<input type="password" placeholder="Enter Password Here.." class="form-control" name="pass" maxlength="15"
							title="At least eight characters, one uppercase and one lowercase letter, and one number." required>
					</div>
					<div class="col-md-6 form-group">
						<label>Confirm Password</label>
						<input type="password" placeholder="Enter Password Here.." class="form-control" name="confirm" maxlength="15" required>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6">
						<button type="button" class="btn btn-lg btn-danger submit-btn" onclick="redirect('login');">
							Login
						</button>	
					</div>
					<div class="col-sm-6">
						<button type="submit" class="btn btn-lg btn-success submit-btn">
							Submit
						</button>	
					</div>
				</div>			
			</div>
		</form>
	</div>
</div>

<?php include_once (ROOT.'/views/footer.php');?>
</body>
</html>
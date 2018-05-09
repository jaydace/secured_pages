<?php
/*
Author: Joseph Dominic Ambrocio
Website: https://www.facebook.com/dominic.ambrocio.5/
*/
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/fontawesome-all.min.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">  
<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>


 <nav class="navbar navbar-expand-md bg-primary navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <i class="fa d-inline fa-lg fa-cloud"></i>
                <b> Brand</b>
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa d-inline fa-lg fa-bookmark-o"></i> Bookmarks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa d-inline fa-lg fa-envelope-o"></i> Contacts</a>
                    </li>
                </ul>
                <a class="btn navbar-btn ml-2 text-white btn-secondary">
                    <i class="fa d-inline fa-lg fa-user-circle-o"></i> Sign in</a>
            </div>
        </div>
    </nav>

<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<div class="solo">
        <h1 class="title">Register</h1>
                <form method="post" action="">
            <div class="form-group row">
                <label for="username" class="col-4 col-form-label">Username</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="username" name="username" placeholder="juan" type="text" class="form-control here" required="required">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-4 col-form-label">Email</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="email" name="email" placeholder="juan@delacruz.com" type="email" class="form-control here" required="required">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-4 col-form-label">Password</label>
                <div class="col-8">
                    <div class="input-group">
                        <input id="password" name="password" type="password" class="form-control here" required="required">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-4 col-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php } ?>
</body>
</html>

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
<title>Login</title>
<link rel="stylesheet" href="css/fontawesome-all.min.css" type="text/css">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">  
<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>

<!-- nav toolbar -->
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
    <!-- /nav toolbar -->

<?php
	require('db.php');
	session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: index.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{
?>
<div class="form">
<div class="solo">
        <h1 class="title">Login</h1>

                                    <div class="alert alert-danger">
                    Incorrect username/password!                </div>
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
     


<br /><br />
 <center>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>  
</center>
</div>
<?php } ?>

 
 <!-- footer -->
<div class="text-white bg-dark">
        <div class="container">
            <div class="row">
                <div class="p-5 col-md-3">
                    <i class="fa fa-5x mb-5 fa-diamond"></i>
                    <h3 class="mb-4">SVCommerce</h3>
                    <ul class="list-unstyled">
                        <a href="#" class="text-white">Home</a>
                        <br>
                        <a href="#" class="text-white">About us</a>
                        <br>
                        <a href="#" class="text-white">Our services</a>
                        <br>
                        <a href="#" class="text-white">Testimonials</a>
                    </ul>
                </div>
                <div class="p-5 col-md-4">
                    <h3 class="mb-4">Latest post</h3>
                    <p>Stop talking, brain thinking. Hush. I am the last of my species, and I know how that weighs on the heart so don't lie to me!</p>

                    <p>No, I'll fix it. I'm good at fixing rot. Call me the Rotmeister. No, I'm the Doctor. Don't call me the Rotmeister.</p>
                </div>
                <div class="p-5 col-md-5">
                    <h3>Get in touch</h3>
                    <form class="my-4">
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Get monthly updates</label>
                            <input type="email" class="form-control" placeholder="Enter email"> </fieldset>
                        <button type="submit" class="btn btn-outline-light">Submit</button>
                    </form>
                    <h3 class="mt-5">Social</h3>
                    <div class="align-self-center col-12 my-4">
                        <a href="https://www.facebook.com" target="_blank">
                            <i class="fab fa-facebook-square fa-lg mr-3 text-white"></i>
                        </a>
                        <a href="https://twitter.com" target="_blank">
                            <i class="fab fa-twitter-square mx-3 fa-lg text-white"></i>
                        </a>
                        <a href="https://www.instagram.com" target="_blank">
                            <i class="fab fa-instagram d-inline mx-3 fa-lg text-white"></i>
                        </a>
                        <a href="https://plus.google.com" target="_blank">
                            <i class="fab fa-google-plus-square d-inline mx-3 fa-lg text-white"></i>
                        </a>
                        <a href="https://pinterest.com" target="_blank">
                            <i class="fab fa-pinterest-p d-inline mx-3 fa-lg text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <p class="text-center">&copy; SPRINGVALLEYTECH CORP. - All rights reserved. </p>
                </div>
            </div>
        </div>
    </div>
    <!-- /footer -->
    <script src="http://[::1]/app-master//assets/js/jquery-3.3.1.min.js"></script>
    <script src="http://[::1]/app-master//assets/js/bootstrap.bundle.min.js"></script>

<div id="codeigniter_profiler" style="clear:both;background-color:#fff;padding:10px;">

<fieldset id="ci_profiler_benchmarks" style="border:1px solid #900;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
<legend style="color:#900;">&nbsp;&nbsp;BENCHMARKS&nbsp;&nbsp;</legend>


<table style="width:100%;">
<tr><td style="padding:5px;width:50%;color:#000;font-weight:bold;background-color:#ddd;">Loading Time: Base Classes&nbsp;&nbsp;</td><td style="padding:5px;width:50%;color:#900;font-weight:normal;background-color:#ddd;">0.0126</td></tr>
<tr><td style="padding:5px;width:50%;color:#000;font-weight:bold;background-color:#ddd;">Controller Execution Time ( Account / Login )&nbsp;&nbsp;</td><td style="padding:5px;width:50%;color:#900;font-weight:normal;background-color:#ddd;">0.0155</td></tr>
<tr><td style="padding:5px;width:50%;color:#000;font-weight:bold;background-color:#ddd;">Total Execution Time&nbsp;&nbsp;</td><td style="padding:5px;width:50%;color:#900;font-weight:normal;background-color:#ddd;">0.0285</td></tr>
</table>
</fieldset>

<fieldset id="ci_profiler_get" style="border:1px solid #cd6e00;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
<legend style="color:#cd6e00;">&nbsp;&nbsp;GET DATA&nbsp;&nbsp;</legend>
<div style="color:#cd6e00;font-weight:normal;padding:4px 0 4px 0;">No GET data exists</div></fieldset>

<fieldset id="ci_profiler_memory_usage" style="border:1px solid #5a0099;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
<legend style="color:#5a0099;">&nbsp;&nbsp;MEMORY USAGE&nbsp;&nbsp;</legend>
<div style="color:#5a0099;font-weight:normal;padding:4px 0 4px 0;">1,933,424 bytes</div></fieldset>

<fieldset id="ci_profiler_post" style="border:1px solid #009900;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
<legend style="color:#009900;">&nbsp;&nbsp;POST DATA&nbsp;&nbsp;</legend>


<table style="width:100%;">
<tr><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">&#36;_POST['username']&nbsp;&nbsp; </td><td style="width:50%;padding:5px;color:#009900;font-weight:normal;background-color:#ddd;">marker</td></tr>
<tr><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">&#36;_POST['password']&nbsp;&nbsp; </td><td style="width:50%;padding:5px;color:#009900;font-weight:normal;background-color:#ddd;">amboy1265</td></tr>
<tr><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">&#36;_POST['submit']&nbsp;&nbsp; </td><td style="width:50%;padding:5px;color:#009900;font-weight:normal;background-color:#ddd;"></td></tr>
</table>
</fieldset>

<fieldset id="ci_profiler_uri_string" style="border:1px solid #000;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
<legend style="color:#000;">&nbsp;&nbsp;URI STRING&nbsp;&nbsp;</legend>
<div style="color:#000;font-weight:normal;padding:4px 0 4px 0;">login</div></fieldset>

<fieldset id="ci_profiler_controller_info" style="border:1px solid #995300;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
<legend style="color:#995300;">&nbsp;&nbsp;CLASS/METHOD&nbsp;&nbsp;</legend>
<div style="color:#995300;font-weight:normal;padding:4px 0 4px 0;">account/login</div></fieldset>

<fieldset style="border:1px solid #0000FF;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
<legend style="color:#0000FF;">&nbsp;&nbsp;DATABASE:&nbsp; svcommerce (Account:$db)&nbsp;&nbsp;&nbsp;QUERIES: 1 (0.0003 seconds)&nbsp;&nbsp;(<span style="cursor: pointer;" onclick="var s=document.getElementById('ci_profiler_queries_db_0').style;s.display=s.display=='none'?'':'none';this.innerHTML=this.innerHTML=='Hide'?'Show':'Hide';">Hide</span>)</legend>


<table style="width:100%;" id="ci_profiler_queries_db_0">
<tr><td style="padding:5px;vertical-align:top;width:1%;color:#900;font-weight:normal;background-color:#ddd;">0.0003&nbsp;&nbsp;</td><td style="padding:5px;color:#000;font-weight:normal;background-color:#ddd;"><code><span style="color: #000000">
<span style="color: #0000BB"><strong>SELECT</strong>&nbsp;</span><span style="color: #007700">*<br /></span><span style="color: #0000BB"><strong>FROM</strong>&nbsp;</span><span style="color: #007700">`</span><span style="color: #DD0000">accounts</span><span style="color: #007700">`<br /></span><span style="color: #0000BB"><strong>WHERE</strong>&nbsp;</span><span style="color: #007700">`</span><span style="color: #DD0000">username</span><span style="color: #007700">`&nbsp;=&nbsp;</span><span style="color: #DD0000">'marker'<br /></span><span style="color: #007700"><strong>AND</strong>&nbsp;`</span><span style="color: #DD0000">password</span><span style="color: #007700">`&nbsp;=&nbsp;</span><span style="color: #DD0000">'f000881b3737fe3bace2350313e74614e03cad77'&nbsp;</span>
</span>
</code></td></tr>
</table>
</fieldset>

<fieldset id="ci_profiler_http_headers" style="border:1px solid #000;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
<legend style="color:#000;">&nbsp;&nbsp;HTTP HEADERS&nbsp;&nbsp;(<span style="cursor: pointer;" onclick="var s=document.getElementById('ci_profiler_httpheaders_table').style;s.display=s.display=='none'?'':'none';this.innerHTML=this.innerHTML=='Show'?'Hide':'Show';">Show</span>)</legend>


<table style="width:100%;display:none;" id="ci_profiler_httpheaders_table">
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">HTTP_ACCEPT&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8</td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">HTTP_USER_AGENT&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36</td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">HTTP_CONNECTION&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">keep-alive</td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">SERVER_PORT&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">80</td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">SERVER_NAME&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">[::1]</td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">REMOTE_ADDR&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">::1</td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">SERVER_SOFTWARE&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">Apache/2.4.33 (Win32) OpenSSL/1.1.0g PHP/7.2.4</td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">HTTP_ACCEPT_LANGUAGE&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">en-US,en;q=0.9</td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">SCRIPT_NAME&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">/app-master/index.php</td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">REQUEST_METHOD&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">POST</td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;"> HTTP_HOST&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">REMOTE_HOST&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">CONTENT_TYPE&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">application/x-www-form-urlencoded</td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">SERVER_PROTOCOL&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">HTTP/1.1</td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">QUERY_STRING&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">HTTP_ACCEPT_ENCODING&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">gzip, deflate, br</td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">HTTP_X_FORWARDED_FOR&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="vertical-align:top;width:50%;padding:5px;color:#900;background-color:#ddd;">HTTP_DNT&nbsp;&nbsp;</td><td style="width:50%;padding:5px;color:#000;background-color:#ddd;">1</td></tr>
</table>
</fieldset>

<fieldset id="ci_profiler_config" style="border:1px solid #000;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee;">
<legend style="color:#000;">&nbsp;&nbsp;CONFIG VARIABLES&nbsp;&nbsp;(<span style="cursor: pointer;" onclick="var s=document.getElementById('ci_profiler_config_table').style;s.display=s.display=='none'?'':'none';this.innerHTML=this.innerHTML=='Show'?'Hide':'Show';">Show</span>)</legend>


<table style="width:100%;display:none;" id="ci_profiler_config_table">
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">base_url&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">http://[::1]/app-master/</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">index_page&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">index.php</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">uri_protocol&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">REQUEST_URI</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">url_suffix&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">language&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">english</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">charset&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">UTF-8</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">enable_hooks&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">subclass_prefix&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">MY_</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">composer_autoload&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">permitted_uri_chars&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">a-z 0-9~%.:_\-</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">enable_query_strings&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">controller_trigger&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">c</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">function_trigger&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">m</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">directory_trigger&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">d</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">allow_get_array&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">1</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">log_threshold&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">0</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">log_path&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">log_file_extension&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">log_file_permissions&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">420</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">log_date_format&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">Y-m-d H:i:s</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">error_views_path&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">cache_path&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">cache_query_string&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">encryption_key&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">sess_driver&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">files</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">sess_cookie_name&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">ci_session</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">sess_expiration&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">7200</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">sess_save_path&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">sess_match_ip&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">sess_time_to_update&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">300</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">sess_regenerate_destroy&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">cookie_prefix&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">cookie_domain&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">cookie_path&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">/</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">cookie_secure&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">cookie_httponly&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">standardize_newlines&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">global_xss_filtering&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">csrf_protection&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">csrf_token_name&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">csrf_test_name</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">csrf_cookie_name&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">csrf_cookie_name</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">csrf_expire&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">7200</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">csrf_regenerate&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">1</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">csrf_exclude_uris&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"><pre>Array
(
)
</pre></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">compress_output&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">time_reference&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;">local</td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">rewrite_short_tags&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
<tr><td style="padding:5px;vertical-align:top;color:#900;background-color:#ddd;">proxy_ips&nbsp;&nbsp;</td><td style="padding:5px;color:#000;background-color:#ddd;"></td></tr>
</table>
</fieldset></div>
</body>
</html>

<?php
        session_start();
        // dBase file
        include "dbConfig.php";

		if(isset($_GET["op"]))
		if ($_GET["op"] == "login")
		{
			  if (!$_POST["username"] || !$_POST["password"])
		{
		die("You need to provide a username and password.");
		}
  
  // Create query

	$DB = new DBConfig();
	$DB -> config();
	$dbhandle =$DB -> conn();


	$q = "SELECT * FROM `users` "
		."WHERE `username`='".$_POST["username"]."' "
		."AND `password`='".$_POST["password"]."' "
		."LIMIT 1";
	//execute the SQL query and return records
	$result = mysql_query($q);

	

  if ($row = mysql_fetch_array($result))
        {
        // Login good, create session variables
        $_SESSION["id"] = $row{'id'};
        $_SESSION["username"] = $row{'username'};
        $_SESSION["role"]=$row{'role'};
        // Redirect to member page
        if($_SESSION["role"]==2)
         Header("Location: words.php");
        else
         Header("Location: admin.php");
        }
  else
        {
        // Login not successful
        die("Sorry, could not log you in. Wrong login information.");
        }
  }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Modelling 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20120617

-->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>rasi</title>
<link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="wrapper2">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="#">rasi</a></h1>
			</div>
		</div>
		<!-- end #header -->
		<div id="banner-wrapper"></div>
		<div id="page">
			<div id="content">
				<div class="post">
					<h2 class="title"><a href="#">Welcome to rasi </a></h2>
					<p class="meta"><span class="date">feb 27, 2013</span><span class="posted">Posted by <a href="#">FSMK</a></span></p>
					<div style="clear: both;">&nbsp;</div>
					<div class="entry">
						<p>Sample text<strong>Sample text </strong>, Sample text, Sample text Sample text Sample textSample text Sample textSample text. Sample textSample text Sample text Sample text Sample text Sample textSample text text Sample textSample text. Sample textSample text Sample text Sample text Sample text Sample textSample text  text Sample textSample text. Sample textSample text Sample text Sample text Sample text Sample textSample text  text Sample textSample text. Sample textSample text Sample text Sample text Sample text Sample textSample text </p>
						<p>Sample text Sample textSample text  text Sample textSample text. Sample textSample text Sample text Sample text Sample text Sample textSample text Sample text Sample textSample text  text Sample textSample text. Sample textSample text Sample text Sample text Sample text Sample textSample text Sample text Sample textSample text  text Sample textSample text. Sample textSample text Sample text Sample text Sample text Sample textSample text  <br />
						</p>
					</div>
				</div>
			</div>
			<!-- end #content -->
			<div id="sidebar">
				<ul>
					<li>
						<h2>Login</h2>
                                           
						<ul>
						<?php

						  echo "<form action=\"?op=login\" method=\"POST\">";
						  echo "<table border=\"0\"/><tr>";
						  echo "<td>Username</td><td><input type=\"text\"  name=\"username\" size=\"15\"></td></tr>";
						  echo "<tr><td>Password</td><td><input type=\"password\" name=\"password\" size=\"15\"><br/></td>";
						  echo "<tr><td>";
						  echo "<input type=\"submit\" value=\"Login\">";
						  echo "</td></tr>";
						  echo "</tr></table>";
						  echo "</form>";
						?>
						</ul>
                                                   <a href="http://localhost/rasi-master/form.php">Sign up</a>

					</li>
					<li>
						
					</li>
				</ul>
			</div>
			<!-- end #sidebar -->
			<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #page --> 
	</div>
</div>
<!-- end #footer -->
</body>
</html>

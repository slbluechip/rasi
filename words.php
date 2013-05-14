<?php
        session_start();
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

<script src="http://www.google.com/jsapi"></script>
<script>
	google.load("jquery", "1.3.2");
</script>
<script type="text/javascript" src="js/page.js"></script>
<script>
</script>

<style type="text/css">
a.pagor {
	height:20px;
	padding-left:4px;
	padding-right:4px;
	display:block;
	float:left;
	border:1px solid #CCC;
	color: #444;
	margin-right:4px;
	text-decoration:none;
	text-align:center;
}

a.pagor:hover {
	background:#ADDADC;
	border:1px solid #33A8AD;
	color:white;
}

a.selected {
	background:#A3E9EC;
	border:1px solid #6DCED2;
}
</style>

</head>
<body>


<div id="wrapper">
	<div id="wrapper2">
		<div id="wordlist">
				
		</div>

		<div style="clear: both;">&nbsp;</div>
		</div>
		<div id="alphabets">
			<ul>	
				<?php
				for ($i=65; $i<=90; $i++) {
					echo "<li><a id='character' href=words.php?arg1=".$i.">".chr($i)."</a></li>";
				}
				?>		
			</ul>
		</div>
		
	</div>
</div>

<input type="hidden" name="page_count" id="page_count" />

<!-- end #footer -->
</body>
</html>



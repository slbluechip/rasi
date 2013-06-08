
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


<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<link href="styles/style.css" rel="stylesheet" type="text/css" media="screen" />


<script type="text/javascript" src="js/page.js"></script>


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


	<div class="menulinks" style="padding-left:1160px;padding-top:10px;">
		<a id='go' rel='leanModal'   href='logout.php'>Logout</a> 
	</div>
	<div id="wrapper2">

		<div id="wordlist">
				
		</div>

		<div style="clear: both;">&nbsp;</div>
		</div>
		<div id="alphabets">
			<ul>	
				<?php
				for ($i=65; $i<=90; $i++) {
					echo "<li><a id='character".$i."' href=words.php?arg1=".$i." >".chr($i)."</a></li>";
				}
				?>		
			</ul>
		</div>
		<div style="clear: both;">&nbsp;</div>
		<div style="clear: both;">&nbsp;</div>
		
	</div>

</div>

<input type="hidden" name="page_count" id="page_count"  />
<input type="hidden" name="character" id="character" value="<?php if(isset($_GET['arg1']))  echo $_GET['arg1']  ?>" />

<!-- end #footer -->
</body>
</html>



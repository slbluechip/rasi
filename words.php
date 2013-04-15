<?php
        session_start();
        

        // dBase file
        include "dbConfig.php";
  
	$DB = new DBConfig();
	$DB -> config();
	$dbhandle =$DB -> conn();

	if(isset($_GET["arg1"]))
	{
		if($_GET["arg1"] !="")
		$q = "SELECT * FROM `words` WHERE `word` LIKE '".chr($_GET["arg1"])."%'";
	}
	else
	$q = "SELECT * FROM `words` ";

	//execute the SQL query and return records
	$result = mysql_query($q);
 


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
		<div id="wordlist">
				<ul>
					<li>
						<h2>Words</h2>
						<ul>
							<?php while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
							echo "<li><a href=temp_meanings.php?wordid=".$row['id']."&word=".$row['word'].">". $row['word']."</a>";
							
							}
							?>			
			
						</ul>
					</li>
				</ul>
			</div>

			<div style="clear: both;">&nbsp;</div>
		</div>
		<div id="alphabets">
			<ul>	
				<?php
				for ($i=65; $i<=90; $i++) {
					echo "<li><a href=words.php?arg1=".$i.">".chr($i)."</a></li>";
				}
				//echo "സൗജന്യം ";
				//echo "\xe5\x86\x85";
				?>		
			</ul>
		</div>
		
	</div>
</div>
<!-- end #footer -->
</body>
</html>

<?php

	mysql_free_result($result);
?>


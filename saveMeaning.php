<?php

       	session_start();

        include ("dbConfig.php");

        $DB = new DBConfig();
	$DB -> config();
	$dbhandle =$DB -> conn();

  
	$q = "INSERT INTO meanings (meaning,languageid,wordid,createdby,comments,reference) VALUES ('".$_POST["wordmeaning"]."',".$_POST["language"].",".$_POST["hidWordId"].",'".$_SESSION["username"]."', '".$_POST["comment"]."','".$_POST["reference"]."')";
  	
	//  Run query
  	$r = mysql_query($q);
  
  	
	if (!$r)
	{
		$err= mysql_error();	
		print $err;
	}
	else if ($r)
	{
	    print "Registration completed";
   	}
	$DB ->close();

?>

<?php
	//error_reporting(E_ERROR);
        // dbConfig.php is a file that contains your
        // database connection information. This
        // tutorial assumes a connection is made from
        // this existing file.

       	session_start();
        include ("dbConfig.php");

        $DB = new DBConfig();
	$DB -> config();
	$dbhandle =$DB -> conn();

  
  	$q = "INSERT INTO users (username,password,email,role) 
        VALUES ('$_POST[username]','$_POST[password]','$_POST[email]',2)";
  	
	
	//  Run query
  	$r = mysql_query($q);
  
  	
	if (!$r)
	{
		$err= mysql_error();	
		print "error";
	}
	else if ($r)
	{
	    print "Registration completed";
   	}
	$DB ->close();
   
?>

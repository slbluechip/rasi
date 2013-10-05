
<?php
       	session_start();

        include ("dbConfig.php");

        $DB = new DBConfig();
	$DB -> config();
	$dbhandle =$DB -> conn();

  
	$q = "SELECT * FROM `rating` "
		."WHERE `rated_by`='".$_SESSION["username"]."' "
		."AND `meaning_id`='".$_GET[meaning_id]."' "
		."LIMIT 1";

	
	//execute the SQL query and return records
	$result = mysql_query($q);
	

 	 if ($row = mysql_fetch_array($result))
        {
	$q="UPDATE rating set rating=". $_GET[score]." WHERE `rated_by`='".$_SESSION["username"]."' AND `meaning_id`='".$_GET[meaning_id]."' " ;
	print $q;	
	}
	else
	{
	$q="INSERT INTO rating (rated_by,rating,meaning_id) 
                                    VALUES('".$_SESSION["username"]."',". $_GET[score].",".$_GET[meaning_id].")";	
	}
	//  Run query
  	$r = mysql_query($q);
  
  	
	if (!$r)
	{
		$err= mysql_error();	
		print $err;
	}
	else if ($r)
	{
	    print "Rating updated";
   	}
	$DB ->close();

?>

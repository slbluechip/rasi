<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="raphaelicons.css" type="text/css">
<style type="text/css">
#rasi-admin-lang .icon td 
                {
		    font-size: 2.2em;
		    padding: 0px 5px 20px 5px;
		    height: 1.0em;
		    width: 0.8em;
		    position: relative;
		    text-align: center;
		}

              td.first_col a,td.last_col a{
			color: #444;
			text-decoration: none;
		}
		
   	      td.first_col a:hover,td.last_col a:hover 
                {
			text-decoration: underline;
		}	
</style>
<?php

include ("dbConfig.php");


        $DB = new DBConfig();
	$DB -> config();
	$dbhandle =$DB -> conn();
        if(isset($_GET["op"]))
	{	
                if ($_GET["op"] == "add")

                 {  
                    echo "data is".$_GET['lang'];
                    $row="UPDATE languages SET status='A' where language like '".$_GET['lang']."%'";
                    
                    $res=mysql_query($row);
                 }
               

        }
         else
                 {  //echo "data is".$_GET['lang'];
                    $row="UPDATE languages SET status='P' where language like '".$_GET['lang']."%'" ;
                    // echo $row;
                    $res=mysql_query($row);


                 }
$DB ->close();
     
?>
</head>
</html>

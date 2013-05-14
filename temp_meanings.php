<?php


        session_start();
        // dBase file
        include "dbConfig.php";
  
	$DB = new DBConfig();
	$DB -> config();
	$dbhandle =$DB -> conn();

	
	$q = "SELECT * FROM `meanings` "
		."WHERE `wordid`='".$_GET["wordid"]."' ";
        

	$qLlanguages="SELECT * FROM `languages` ";
	//execute the SQL query and return records
	$resultLanguages = mysql_query($qLlanguages);

	
        
            if(isset($_GET["rate"]))
              {    echo "Rate is set";
                   if($_GET["rate"]=="Yes")
                 {    //echo $_GET["rate"];
                      $curr_ratings[]=array();
                      $curr_ratings=$_POST['score'];
                      $meanings_count=count($curr_ratings);
                      echo("No:of meanings=".$meanings_count);
                      $meaning_ids=$_SESSION['meaning_id'];
                      $meanings=$_SESSION['meanings'];
                      $reasons=$_POST['reason'];
                      //echo "There are $meanings_count meanings";
                      for($x=0;$x<$meanings_count;$x++ )
                        {  
                              if($curr_ratings[$x]!="")
                              { 
                                echo $_SESSION['meaning_id'][$x];
                                $q="INSERT INTO rating (meaning,rated_by,rating,reason,meaning_id) 
                                    VALUES('$meanings[$x]','$_SESSION[username]',
                                             $curr_ratings[$x]
                                             ,'$reasons[$x]',$meaning_ids[$x] )  ";

				$r = mysql_query($q);
                                   if (!$r)
                                      {
                                        die("Hey,".mysql_error());    // Thanks to Pekka for pointing this out.
                                      }
                                  else 
                                       
                                      if($x==$meanings_count-1)
					{
                                          exit();
					}

				
                               }
                            
                          
			}
                   }    
                       
                 }
          
	
	if(isset($_GET["Save"]))
	{
		if($_GET["Save"]!="")
		{
		  $q = "INSERT INTO temp_meanings (meaning,languageid,word_id,createdby,comments,reference,status) VALUES ('$_POST[txtMeaning]','$_POST[cmbLanguage]','$_POST[hidWordId]','$_SESSION[username]', '$_POST[txtComment]','$_POST[txtReference]','P')";
	  	//  Run query
		  $r = mysql_query($q);
                  if (!$r)
{
    die("Hey,".mysql_error());    // Thanks to Pekka for pointing this out.
}
       
 
 else if ($r)
{
    echo "Thanks for your contribution. The meanings will be evaluated and saved";
}

		$q = "SELECT * FROM `meanings` "
		."WHERE `wordid`='".$_POST["hidWordId"]."' ";

		}
	}

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
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="/rasi/raty-master/lib/jquery.raty.min.js"></script>

<script type="text/javascript">
        $(document).ready(function(){
         
        $('div.star').raty();
           $('input[name=\'score\']').each(function() {

                  $(this).attr('name','score[]');

             });
          
        });
          
	
	function fnAddNew()
	{

		document.getElementById("td1").style.display="";
		document.getElementById("td2").style.display="";
                document.getElementById("td2a").style.display="";
                document.getElementById("td2b").style.display="";
		document.getElementById("td3").style.display="";
		document.getElementById("td4").style.display="";
	}
	function fnCancel()
	{
		document.getElementById("td1").style.display="none";
		document.getElementById("td2").style.display="none";
		document.getElementById("td3").style.display="none";
		document.getElementById("td4").style.display="none";
	}

	function fnSave()
	{
		frmMeanings.action="?Save=Yes&wordid="+document.getElementById("hidWordId").value;
		frmMeanings.method="post";
		frmMeanings.submit();
	}
       
        function saveRating()
         {

		frmMeanings.action="?rate=Yes&wordid="+document.getElementById("hidWordId").value;
		frmMeanings.method="post";
		frmMeanings.submit();

         }
       
         
</script>

</head>
<body >
<form action="" method="POST" id="frmMeanings"">
	<div id="wrapper">
		<div id="wrapper2">
			<!-- end #header -->

			<div id="page">
				<div id="content">
					<div class="post">
						<h2 class="title"><a href="#">Available word meaning(s)</a></h2>
					
						</div>
					</div>
				</div>
				<!-- end #content -->
				<div style="clear: both;">&nbsp;</div>
			</div>
			<!-- end #page --> 
		</div>
	</div>
	<div id="footer-content-wrapper">
		<div id="footer-content">
			<div id="column1">
				<h2><?php if(isset($_GET["word"])) echo $_GET["word"] ?></h2>
				<ul>
				        
					<?php
                                        $i=0;
                                      # echo "<form action=\"?op=rate \" method=\"POST\">";
                                         
                                        while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
                                        { $word=$_GET['word'] ;
                                          $meaning=$row['meaning'];
                                          $meaning_id=$row['id'];
                                          $_SESSION['word']=$word;
                                          $_SESSION['meanings'][$i]=$meaning;
                                          $_SESSION['meaning_id'][$i]=$meaning_id;
                                          echo"<input type=\"text\" value=\"$meaning\" readonly/> \n";
                                          
                                          $avg = mysql_query("select avg(rating) from rating where word =  '$word ' and   meaning = '$meaning'" );
                                          if($avg)
                                           {
                                            while($row = mysql_fetch_array($avg))
{
      $rating=$row['avg(rating)'];
      echo "</br>";
      echo " The average rating on 5 is: <input type=\"text\" value= \"$rating\" readonly/>";

}

                                           }
                                          else
                                            die("Hey,".mysql_error());    // Thanks to Pekka for pointing this out. 
                                           
					echo "<div class=\"star\" id=\"$i\" ><li class=\"approved\">".$row['meaning']."<input type=\"text\" name=\"reason[]\" placeholder=\"Rater's comments \"/></li></div>";
                                        
                                        $i++;
					
					}
                                        $_SESSION['meaning_count']=$i;
                                        #echo "<input type=\"submit\" name=\"submit\" value=\"Rate\"></input>";
                                        /*echo "<input type=\"button\" id=\"rate\" value=\"rate\" onclick=\"javascript:window.location.href='current_rating.php'\"></input>"; */
                                        echo "<a href=\"#\" id=\"rate\"  onclick=\"saveRating();\" >Rate</a>";
                                    #    echo "</form>";
                                        $_SESSION['word']=$_GET['word'];
                                        
					?>

				</ul>
			</div>
		</div>
	</div>

	<div id="footerlink">
		<ul>
				<?php
				  echo "<table border=\"0\"/><tr>";
				  echo "<td><a href=\"#\" onclick=\"fnAddNew();\">Add New</a></td>";
				  echo "<td style=\"display:none\" id=\"td1\"><input type=\"text\" name=\"txtMeaning\" size=\"15\" placeholder=\"Meaning\"></td>";
				  echo "<td style=\"display:none\" id=\"td2\"><select id=\"cmbLanguage\"";
				  echo "name=\"cmbLanguage\">";
                                  
				?>
					<?php while ($row = mysql_fetch_array($resultLanguages, MYSQL_ASSOC)){
					echo "<option value=".$row['id'].">".$row['language']."</option>";
					}
					?>
				<?php
 				  echo "</select></td>";
                                  echo "<td style=\"display:none\" id=\"td2a\"><input type=\"text\" name=\"txtComment\" size=\"15\" placeholder=\"Comment\"></td>";
                                  echo "<td style=\"display:none\" id=\"td2b\"><input type=\"text\" name=\"txtReference\" size=\"15\" placeholder=\"Reference\"></td>";
				  echo "<td style=\"display:none\" id=\"td3\"><a href=\"#\" onclick=\"fnSave();\">Save</a></td>";
				  echo "<td style=\"display:none\" id=\"td4\"><a href=\"#\" id=\"action\" onclick=\"fnCancel();\">Cancel</a></td>";
				  echo "</tr>";
				  echo "</table>";


				?>

		</ul>
	</div>	
	<!-- end #footer -->

	<input type="hidden" value="<?php echo $_GET['wordid'] ?>" id="hidWordId" name="hidWordId">
	<input type="hidden" value="<?php echo $_GET['word'] ?>" id="hidWord" name="hidWord">
</form>

</body>
</html>

<?php
	mysql_free_result($result);
?>

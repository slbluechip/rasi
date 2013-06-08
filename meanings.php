<?php
       	session_start();

      
        // dBase file
        include "dbConfig.php";
  
	$DB = new DBConfig();
	$DB -> config();
	$dbhandle =$DB -> conn();

	

    	if(isset($_GET['word']))
	$word=$_GET['word'];
	else
	$word=$_POST["hidWord"];

    	if(isset($_GET['wordid']))
	$wordid=$_GET['wordid'];
	else
	$wordId=$_POST["hidWordId"];

	

	$qLlanguages="SELECT * FROM `languages` ";
	//execute the SQL query and return records
	$resultLanguages = mysql_query($qLlanguages);


	$q ="SELECT `meaning`,m.`id`,`reference`,`unicodelanguage`,`comments` "
	." FROM  `meanings` m"
	." INNER JOIN languages l ON m.languageid = l.id"
		." WHERE `wordid`='".$wordid."' ";


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

<link href="styles/popup-style.css" rel="stylesheet" type="text/css" media="screen" />
<link href="styles/style.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jQuery Validation Plugin 1.9.0.js"></script>
<script type="text/javascript" src="js/jquery.raty.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>

</script>
<script type="text/javascript">
$(function() {
$('a[rel*=leanModal]').leanModal({ top : 120, closeButton: ".modal_close" });		
});
</script>

<script type="text/javascript">


	
        $(document).ready(function(){


           $('div[id*=overallrating]').each(function() {

		$(this).raty({
                    readOnly : true,
                    half  : true,
                    space : false,
		    score: function() {
    return $(this).attr('data-score');
  }
              });


             });


           $('div[id*=individualrating]').each(function() {

		$(this).raty({
                    readOnly : false,
                    half  : true,
                    space : false,
		    score: function() {
    return $(this).attr('data-score');
  }	,
		    click: function(score, evt) {
						$.post("saveRating.php?score="+score+"&meaning_id="+$("#meaning"+$(this).attr('value')).attr('value'), 	$("#meaningform").serialize(), function(data) {
	//alert(data);
	//alert($(this).attr('value'));
				});						 
						   //alert('ID: ' + $(this).attr('id') + "\nscore: " + score + "\nevent: " + evt);

						}
              });


             });


        });
	  
	

        function saveRating()
         {

		meaningform.action="?rate=Yes&wordid="+document.getElementById("hidWordId").value;
		meaningform.method="post";
		meaningform.submit();


         }


	$(document).ready(function(){
			$("#meaningform").validate({
				debug: false,
				rules: {
					wordmeaning: "required",
		                        language: "required",
		                        comment: "required",
		                        reference: "required"
				},
				messages: {
					wordmeaning: "Invalid meaning.",
		                        language: "Invalid language.",
		                        comment: "Invalid omment.",
		                        reference: "Invalid reference."
					},
				submitHandler: function(form) {
				$.post('saveMeaning.php', $("#meaningform").serialize(), function(data) {
				//alert(data);
				//alert( $("#hidWordId").value);

				window.location.href =  "meanings.php?wordid="+ $("#hidWordId").val() +"&word="+ $("#hidWord").val();				
				});
			}
		});
                
            
	});
</script>

</head>
<body>

	<form name="meaningform" id="meaningform" method="post" >  	
	<div id="meaning">
		<div id="meaning-ct">
			<div id="meaning-header">
				<h2>Add Meaning</h2>
				<a class="modal_close" href="#"></a>
			</div>
		
		
			
			  <div class="txt-fld">
			    <label for="">Meaning</label>
				<input type="text" name="wordmeaning" id="wordmeaning"  class="good_input">
			  </div>
			  <div class="txt-fld" >
			    <label for="">Language</label>
				    <select id="language" name="language">                                  
						<?php while ($row = mysql_fetch_array($resultLanguages, MYSQL_ASSOC)){
						echo "<option value=".$row['id'].">".$row['language']."</option>";
						}
						?>
				    </select>
			  </div>
			  <div class="txt-fld">
			    <label for="">Comment</label>
			    <input id="" name="comment" type="text" />
			  </div>
			  <div class="txt-fld">
			    <label for="">Reference</label>
			    <input id="" name="reference" type="text" />

			  </div>
			  <div class="btn-fld">
			  	<button type="submit"  >Save&raquo;</button>
		          </div>
                                 

		</div>
	</div>


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

                                        <div id="calander">
				<h2><?php  echo $word ?></h2>
					<?php
                                        $i=0; 
     				        echo "<table cellspacing='12px' cellpadding='2px' border='0' >";
     				        echo "<tr><th align='left'>Meaning</th><th align='left'>The average rating on 5 </th><th align='left'>Your rating</th></tr>";
                                        while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
                                        { 
					
                                          $meaning=$row['meaning'];
					  $meaningid=$row['id'];
					  $comments= 	$row['comments'];
					  $reference= 	$row['reference'];
					  $language=	$row['unicodelanguage'];
     				          echo "<tr><td>";
                                          echo "<div  id='meaning".$i."' value='".$meaningid."'>(".					  $language.")".$meaning;
					  echo "</br>";	
					  echo "Comments:".$comments;
					  echo "</br>";	
					  echo "Reference:<a href='".$reference."'>.$reference.</a>";
					  echo "</div>";
     				          echo "</td>";
                                          
                                          $avg = mysql_query("select avg(rating) from rating where meaning_id ='$meaningid' ");

                                          if($avg)
                                           {
                                            while($row = mysql_fetch_array($avg))
						{
						      $rating=$row['avg(rating)'];

						}

                                           }
                                          else
                                            die("Hey,".mysql_error());    // Thanks to Pekka for pointing this out. 
                                           
					echo "<td><div class=\"star\" value=\"$i\" id=\"overallrating$i\" data-score=\"$rating\">".$row['meaning'];
				
                                          $avg = mysql_query("select avg(rating) from rating where meaning_id ='$meaningid' and rated_by='$_SESSION[username]'");

                                          if($avg)
                                           {
                                            while($row = mysql_fetch_array($avg))
						{
						      $rating=$row['avg(rating)'];
						}

                                           }
                                          else
                                            die("Hey,".mysql_error());    // Thanks to Pekka for pointing this out. 
                                           
					echo "<td><div class=\"star\" value=\"$i\" id=\"individualrating$i\" data-score=\"$rating\">".$row['meaning'];


					#echo "<input type=\"text\" name=\"reason[]\" placeholder=\"Rater's comments \"/>"
					echo "</li></div></td></tr>";
                                        
                                        $i++;
					
					}
					echo "</table>";	
                                        #echo "<input type=\"button\" id=\"rate\" value=\"Rate\" onclick=\"saveRating();\" ></input>";
					?>

				<div style="clear: both;">&nbsp;</div>
				<div style="clear: both;">&nbsp;</div>
				<div class="menulinks">
					<a id='go' rel='leanModal'   href='#meaning'>Add Meaning</a> &nbsp;&nbsp;
					<a id='go' rel='leanModal'   href='words.php?arg1='>Back</a> 
				</div>
			    </div>	
			</div>
	</div>

	<!-- end #footer -->

	<input type="hidden" value="<?php echo $wordid ?>" id="hidWordId" name="hidWordId">
	<input type="hidden" value="<?php echo $word ?>" id="hidWord" name="hidWord">
</form>

</body>
</html>

<?php
	mysql_free_result($result);
?>

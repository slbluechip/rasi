<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<style type="text/css" > @import "jquery.dataTables.css" </style>
<link rel="stylesheet" href="raphaelicons.css" type="text/css">
<style type="text/css">
#rasi-admin-lang .icon td ,#rasi-admin-lang .icon-check td 
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
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://ban-ga-truc-tuyen-ttl2e.googlecode.com/svn-history/r8/trunk/js/jquery.dataTables.js"></script>
<script src="https://raw.github.com/DmitryBaranovskiy/raphael/master/raphael-min.js"></script>
<script src="js/jquery-ui-1.10.2.custom.js"></script>
<script type="text/javascript">
function addRow(tableID,icon) 
        {

              var row= $('tr.lang-row:last').clone('true').find('input').val('').end();
              row.addClass('temp');
              row.insertAfter('tr.lang-row:last');
              row.removeClass('temp');
              //row.closest('input').attr("value","");
              //$('input[name=\'lang[]\']:last').attr('value',"");
 	     // $('input[name=\'code[]\']:last').attr('value',"");
              //$('td.last_col:last').html("<a href=\"#\" ><span class=\"icon\"id=\"tick\" >Ã</span></a>");
              //$('td.last_col:last').html("<a href=\"#\" ><span class=\"icon\"id=\"tick\" >Ã</span></a>");
              $('span.icon:last').css("display","none");
              $('span.icon-check:last').css("display","inline");
              
         }

$(document).ready(function(){
  
  var word="";
 $('#rasi-admin').dataTable({
    "aLengthMenu":[1,2,3,4],
    "bJQueryUI": true,
    "sPaginationType": "full_numbers",
    "bProcessing": true,
    "bServerSide": true,
    "sAjaxSource": "search.php",
    "fnServerData": function ( sSource, aoData, fnCallback ) {
			/* Add some extra data to the sender */
			//aoData.push( { "name": "more_data", "value": word } );
			$.getJSON( sSource, aoData, function (json) { 
				/* Do whatever additional processing you want on the callback, then tell DataTables */
                               // alert(aoData);
                               fnCallback(json)
			} );
		}
    } );  
   

 
 $('input').on("click", function(){
   
    if($(this).closest('div').attr('id')=="rasi-admin_filter")
     {  
        $(this).attr("id","search");
     }
  
 });
  var $count;
  var $lang;
  $("select[name='rasi-admin_length']").change(function () {

     $count= $(this).val();

   });
  $('input.lang:last').keyup( function() {
    //if($(this).attr("name")=='lang[]')
   $(this).autocomplete({source:'suggest_language.php', minLength:2});
   $lang=$(this).val();
    // alert($(this).val());
   
    
  });
  var $onepagecount;
  $('#admin').submit( function() {
    var $i=1;
    var $j=0;
    $("input[name=\'word[]\']").each(function(){
          if($i<$count && $(this).val().indexOf($("input#search").val())>=0)
          $i=$i+1;
        });
       if (typeof $("input#search").val()!='undefined' )
        {
           $count=$i;
        }
      //alert($("select[name='rasi-admin_length']").val());
       if (typeof $count == 'undefined')
        {  
           $("input[name=\'word[]\']").each(function(){
            $j++;     
           });
          $count=$j;
        }
      $(this).attr("action","admin.php?op=save&count="+$count);
     // $(this).submit();
      
   });
   
   $('span.icon-check').on("click", function(){
      var lang= $('input.lang.ui-autocomplete-input').val();
     
        //alert(lang);
      //var serializedData = row.serialize();
  $.ajax({
    type:"GET",
    url: "lang_row.php?op=add",
    data: "lang="+lang
    
  }).done(function() { 
     $('span.icon-check').css('display','none');
     $('span.icon').css('display','inline');
  });
  });
  
   $('span#minus').on("click", function(){
     // alert($(this).closest('input').val());
      
      var lang=$(this).attr('val');
     $(this).closest('tr').remove();
     
      //var serializedData = row.serialize();
  $.ajax({
    type:"GET",
    url: "lang_row.php",
    data: "lang="+lang
    
  }).done(function() { 
    //alert($(this).closest('tr').attr('class'));
  });
  });
    
});
</script>
</head>
<?php

       session_start();

  // dbConfig.php is a file that contains your
        // database connection information. This
        // tutorial assumes a connection is made from
        // this existing file.
        include ("dbConfig.php");


        $DB = new DBConfig();
	$DB -> config();
	$dbhandle =$DB -> conn();
         if(isset($_GET["op"]))
	{	
                if ($_GET["op"] == "save")
		{   $val=$_GET['count'];
                   // echo "count is".$val;
                    #echo "decision 3 is ".$_POST['decision'][3];
                  $j=0;
                  
                  
	 #echo "decision is".$_POST['decision'][$j];              
                   while($j<$val)
		   { $wordid=$_POST['wordid'][$j];
                     
                  if($wordid!='')
		    {
                      $word=$_POST['word'][$j];
                      $meaning= $_POST['meaning'][$j];
                      $createdby=$_POST['createdby'][$j];
                      $createdon=$_POST['createdon'][$j];
                      $comments=$_POST['comments'][$j];
                      $reference=$_POST['reference'][$j];
                      if($_POST['decision'][$j]=='approve')
                   {  // echo "you've approved";
                      //echo "wordid is". $wordid;
                   $q="INSERT INTO meanings (wordid,meaning,createdby,createdon,comments,reference) VALUES        ('$wordid','$meaning','$createdby','$createdon','$comments','$reference')";
                      $result = mysql_query($q);
                        if (!$result)
				{        echo "wrong insert attempt";
   					 die("Hey,".mysql_error());    // Thanks to Pekka for pointing this out.
				}
                         else
                               {
					$q="DELETE FROM temp_meanings where word_id = '$wordid' and meaning = '$meaning'";
                                        $result = mysql_query($q);
                                        if (!$result)
				{          echo "wrong delete attempt";
   					 die("Hey,".mysql_error());    // Thanks to Pekka for pointing this out.
				}
                               }

                     
                   }
                      else

                       { // echo "You've rejected";
			  $q="UPDATE temp_meanings SET status='R' where word_id= '$wordid'and meaning = '$meaning'";		
			  $result = mysql_query($q); 
 			   if (!$result)
				{          echo "wrong update attempt";
   					 die("Hey,".mysql_error());    // Thanks to Pekka for pointing this out.
				}
                       }
                   }

                    $j++;
                 }
         		
        	 
		}

         }
        $q="select w.word,w.id,t.meaning,t.createdby,t.modifiedby,t.comments,t.reference,t.createdon,t.remarks from words w join  temp_meanings t on w.id=t.word_id ";
$i=0;        
        $result = mysql_query($q);
//echo "<form id=\"admin\"action=\"?op=save \" method=\"POST\">";
echo "<form id=\"admin\" method=\"POST\">";
echo "<table border='1' id=\"rasi-admin\" class=\"dataTable\">
<thead>
<tr>
<th></th>
<th>Word</th>
<th>Meaning</th>
<th>Created by</th>
<th>Comments</th>
<th>Reference</th>
<th>Created on</th>
<th>Status</th>
<th>Admin's Remarks</th>
</tr>
</thead>";
echo "<tbody>";

        while($row = mysql_fetch_array($result)) 
{ 
  echo "<tr>";
  echo "<td>"."<input type=\"hidden\" name=\"wordid[]\" value=" . $row['id'] . " /></td>";
  echo "<td>"."<input type=\"text\" name=\"word[]\" value=" . $row['word'] . " /></td>";
  ///echo "<td>"."<input type=\"text\" name=\"meaning[]\" value=" . $row['meaning'] . " /></td>";
  echo '<td><input type=text name= \'meaning[]\' value="'. $row['meaning'] .'"/></td>';
  echo '<td><input type=text name=\'createdby[]\' value="' . $row['createdby'] .'" /></td>';
  //echo "<td>"."<input type=\"text\" name=\"comments[]\" value=" . $row['comments'] . " /></td>";
  //echo "<td>"."<input type=\"text\" name=\"reference[]\" value=" . $row['reference'] . " /></td>";
  echo '<td><input type=text name= \'comments[]\' value="'. $row['comments'] .'"/></td>';
  echo '<td><input type=text name= \'reference[]\' value="'. $row['reference'] .'"/></td>';
  echo "<td>"."<input type=\"text\" name=\"createdon[]\"value=" . $row['createdon'] . " /></td>";
  
  
  echo "<td><select name='decision[]' >
  <option value='approve'>Approve</option>
  <option value='reject'>Reject</option>
  </select></td>";
  echo '<td><input type=text name=\'remarks[]\'value="'.$row['remarks'].'"/></td>';
  
  echo "</tr>";
$i++;
 }
       
 echo "</tbody>";       
 echo "</table>";
 
 echo "<input type=\"submit\" value=\"Submit\">";
 echo "</form>";
  
//$_SESSION['count'] = $i;

?>
<b>Languages added</b>


<?php

        $DB = new DBConfig();
	$DB -> config();
	$dbhandle =$DB -> conn();
        $lang="select * from languages where status='A'";
        $result = mysql_query($lang);
echo "<table border='1' id=\"rasi-admin-lang\">
        <thead>
<tr>
<th></th>
<th>Language</th>
<th></th>
</tr>
</thead>";
echo "<tbody>";
while($row = mysql_fetch_array($result)) 
{ 
  echo "<tr class=\"lang-row\">";
  echo "<td class=\"first_col\"><a href=\"#\" onclick=\"addRow('rasi-admin-lang',$(this))\"><span class=\"icon\" id=\"plus\" >@</span></a></td>";
  echo "<td>"."<input class=\"lang\" id=\"autocomplete-lang\" type=\"text\" name=\"lang[]\" value=" . $row['language'] . " /></td>";
  $lang1=explode(" ",$row['language']);
  $lang=$lang1[0];
  
  //echo '<td><input type=\'text\' name=\'code[]\' value="' . $row['code'] . '"/></td>';
  echo "<td class=\"last_col\"><a href=\"#\"><span class=\"icon\" id=\"minus\"val=\"$lang\">A</span><span class=\"icon-check\"id=\"tick\" style=\"display:none\"  >Ã</span>
  </a></td>";
  echo "</tr>";
}
 echo "</tbody>";       
 echo "</table>";   
$DB ->close();
     
?>
</html>

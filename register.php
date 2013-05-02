<?php

        // dbConfig.php is a file that contains your
        // database connection information. This
        // tutorial assumes a connection is made from
        // this existing file.
        include ("dbConfig.php");


//Input vaildation and the dbase code
    /*    if ( $_GET["op"] == "reg" )
  {
  $bInputFlag = false;
  foreach ( $_POST as $field )
        {
        if ($field == "")
    {
    $bInputFlag = false;
    }
        else
    {
    $bInputFlag = true;
    }
        }
  // If we had problems with the input, exit with error
  if ($bInputFlag == false)
        {
        die( "Problem with your registration info. "
    ."Please go back and try again.");
        }*/
        $DB = new DBConfig();
	$DB -> config();
	$dbhandle =$DB -> conn();

  
  $q = "INSERT INTO users (username,password,email,role) 
        VALUES ('$_POST[username]','$_POST[password]','$_POST[email]',2)";
  //  Run query
  $r = mysql_query($q);
  
  // Make sure query inserted user successfully
  /*if ( !mysql_insert_id($this->db) )
        {
        die("Error: User not added to database.");*/
  if (!$r)
{
    $err= mysql_error();
    Header("Location: form.php?op=error&&err=$err");
    //die("Hey,".mysql_error());
         // Thanks to Pekka for pointing this out.
}
       
 
 else if ($r)
{
    //Header("Location: words.php?op=thanks");
   print "Thank You for registering, ".$_POST[username]." To view the wordlist, click <a href='words.php'> here</a>";
   
}
$DB ->close();
   
 // } // end if


//The thank you page
 /*       elseif ( $_GET["op"] == "thanks" )
  {
  echo "<h2>Thanks for registering!</h2>";
  }*/
  
/*The web form for input ability
        else
  {
  echo "<form action=\"?op=reg\" method=\"POST\">\n";
  echo "Username: <input name=\"username\" MAXLENGTH=\"16\"><br />\n";
  echo "Password: <input type=\"password\" name=\"password\" MAXLENGTH=\"16\"><br />\n";
  echo "Email Address: <input name=\"email\" MAXLENGTH=\"25\"><br />\n";
  echo "<input type=\"submit\">\n";
  echo "</form>\n";
  }*/
        // EOF
        ?>

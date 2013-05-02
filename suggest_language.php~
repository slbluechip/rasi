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

        if ( !isset($_REQUEST['term']) )
	exit;
        $rs = mysql_query('select language from languages where language like "'. mysql_real_escape_string($_REQUEST['term']) .'%" order by language asc limit 0,10');
 
// loop through each zipcode returned and format the response for jQuery
$data = array();
if ( $rs && mysql_num_rows($rs) )
{
	while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
	{
		$data[] = array(
			'label' => $row['language'],
			'value' => $row['language']
		);
	}
}
 
// jQuery wants JSON data
echo json_encode($data);
flush() 

?>

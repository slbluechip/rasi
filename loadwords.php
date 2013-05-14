<?php
        // dBase file
        include "dbConfig.php";
  
	$DB = new DBConfig();
	$DB -> config();
	$dbhandle =$DB -> conn();

	


	if (isset($_REQUEST['action'])) {
		$action = $_REQUEST['action'];
		
		switch ($action) {
			case 'get_rows':
				getRows();
				break;
			case 'row_count':
				getRowCount();
				break;
			default;
				break;
		}
		
		exit;
	} else {
		return false;
	}
	
	function getRowCount() {	

	if(isset($_GET["arg1"]))
	{
		if($_GET["arg1"] !="")
		$strSQL = "SELECT COUNT(*) FROM `words` WHERE `word` LIKE '".chr($_GET["arg1"])."%'";
	}
	else
		$strSQL = "SELECT COUNT(*) FROM `words` ";

		$result = mysql_query($strSQL);
		$count = mysql_fetch_row($result);
		
		echo $count[0];
	}
	
	function getRows() {
		$start_row = isset($_REQUEST['start'])?$_REQUEST['start']:0;
		$start_row = 10 * (int)$start_row;
		
		$employees = loadWords($start_row);
		
		$formatted_employees = "<ul><li><h2>Words</h2><ul>" . formatData($employees) . "</ul></li></ul>";
		
		echo $formatted_employees;
	}
	
	function loadWords($start_row = 0) {
		
		if(isset($_GET["arg1"]))
		{
			if($_GET["arg1"] !="")
			$strSQL = "SELECT id,word  FROM `words` WHERE `word` LIKE '".chr($_GET["arg1"])."%' ORDER BY id ASC LIMIT {$start_row}, 10";
		}
		else
			$strSQL = "SELECT id,word  FROM `words` ORDER BY id ASC LIMIT {$start_row}, 10";


		

		$result = mysql_query($strSQL);	
		
		$employees = array();
		
		while ($row = mysql_fetch_assoc($result)) {
			$employees[] = $row;
		}

		return $employees;
	}
	
	function formatData($data) {
		$formatted = '';
		foreach ($data as $dat) {
			$formatted .= "<li><a href=temp_meanings.php?wordid=".$dat['id']."&word=".$dat['word'].">". $dat	['word']."</li></a>";
		}
		return $formatted;



	}
	
	function er($data) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

	

?>

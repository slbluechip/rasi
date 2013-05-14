<?php
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
		$db = array(
			'host' => '********',
			'login' => '*********',
			'password' => '********',
			'database' => '*********',
		);
		
		$link = mysql_connect($db['host'], $db['login'], $db['password']);
		if (!$link) {
			exit;
		}
		
		mysql_select_db($db['database']);
		
		$strSQL = "SELECT COUNT(*) AS count FROM names";
		$result = mysql_query($strSQL);
		$count = mysql_fetch_row($result);
		
		echo $count[0];
	}
	
	function getRows() {
		$start_row = isset($_REQUEST['start'])?$_REQUEST['start']:0;
		$start_row = 10 * (int)$start_row;
		
		$employees = loadEmployees($start_row);
		
		$formatted_employees = "<div id='formatted_eployees'>" . formatData($employees) . "</div>";
		
		echo $formatted_employees;
	}
	
	function loadEmployees($start_row = 0) {
		$db = array(
			'host' => '********',
			'login' => '********',
			'password' => '******',
			'database' => '*******',
		);
		
		$link = mysql_connect($db['host'], $db['login'], $db['password']);
		if (!$link) {
			exit;
		}
		
		mysql_select_db($db['database']);
		
		$strSQL = "SELECT * FROM names ORDER BY id ASC LIMIT {$start_row}, 10";

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
			$formatted .= '<p>' . $dat['firstname'] . ' ' . $dat['lastname'] . '</p>';
		}
		return $formatted;
	}
	
	function er($data) {
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

?>
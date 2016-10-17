<html>
<head><meta charset="UTF-8"></head>
<body>
<?php
require_once("Table1.php");
require './shiftplanning.php';
	
	
	$shiftplanning = new shiftplanning(
		array(
			'key' => '1b5d4b7cb46934dbd627888466036a59cb1aa39a' // enter your developer key
		)
	);

	$session = $shiftplanning->getSession();

	if(!$session) {
		$response = $shiftplanning->doLogin(
			array(
				'username' => 'blagija@gmail.com',
				'password' => 'bl4ggij4...',
			)
		);
	}
	
	$shifts = $shiftplanning->setRequest(
		array(
			'token' => $shiftplanning->getAppToken(),
			'module' => 'schedule.shifts',
			'start_date' => 'July 3, 2013',
			'end_date' => 'today',
			'mode' => 'overview'
		)
	);
	
	$tableData = array();
	foreach($shifts['data'] as $shift){
		
		$obj = new stdClass;
		$obj->name = $shift['employees'][0]['name'];
		$obj->time = $shift['start_date']['time'] . '-' .$shift['end_date']['time'];
		
		if ($shift['location']) {
			$obj->location = $shift['location']['name'];
		} else {
			$obj->location = "n/a";
		}
		array_push($tableData, $obj);
	}
	$tg = new Table1($tableData);
	$tg->getTable();
?>
</body>
</html>
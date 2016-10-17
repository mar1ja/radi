<style>
	table, th, td {
            border: 2px solid #660000;
	    border-collapse: collapse;
	}
	th, td {
	    padding: 15px;
	    text-align: center;
	}
</style>
<h1>Shifts:</h1>
<?php

class Table1{
	
	public $data;
	
	public function __construct($data) {
		$this->data = $data;
	}
	public function getTable() {
		
		if (sizeof($this->data) == 0) {
			echo "Nema podataka";
			return;
		}
		$first_row = array_shift($this->data);
		array_unshift($this->data, $first_row);
		
		$theaders = array();
		foreach($first_row as $key => $value) {
			array_push($theaders, $key);
		}
		
		$result = "<table><tr>";
		
		for ($i = 0; $i < count($theaders); $i++) {
			$result = $result . "<th>" . $theaders[$i] . "</th>";
		}
		$result = $result . "</tr>";
		
		foreach($this->data as $row) {
			$result = $result . "<tr>";
			foreach($row as $el) {
				$result = $result . "<td>" . $el . "</td>";
			}
			$result = $result . "</tr>";
		}
		$result = $result . "</table>";
		
		echo $result;
	}
}
?>
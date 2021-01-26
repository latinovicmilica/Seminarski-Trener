<?php
include("konekcija.php");

	$array['cols'][] = array('label' => 'Tip','type' => 'string');
    $array['cols'][] = array('label' => 'Broj tipova', 'type' => 'number');

		$sql="SELECT t.nazivTipa, COUNT( b.blogID ) as broj FROM blog b JOIN tip t ON b.tipID = t.tipID GROUP BY t.tipID";

		$n = $db->rawQuery($sql);
		foreach($n as $vrednost){
		 $array['rows'][] = array('c' => array( array('v'=>$vrednost['nazivTipa']),array('v'=>(int)$vrednost['broj']))) ;

		}

		$niz_json = json_encode ($array);
		print ($niz_json);




?>

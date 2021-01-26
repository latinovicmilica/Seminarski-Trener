<?php
$tip = $_GET['tip'];
include("konekcija.php");
$whereUslov = '';
if($tip != 0){
$whereUslov = 'where t.tipID ='.$tip;	 
}

$blog=$db->rawQuery('select * from blog
                    b join tip t on b.tipID = t.tipID
                    '.$whereUslov);


echo(json_encode($blog));


 ?>
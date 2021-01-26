<?php

class Blog {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function noviBlog() {
		if(!isset($_POST['naslov']) || !isset($_POST['tip']) || !isset($_POST['opis']) || !isset($_POST['datum'])){
			//return false;

		}
		if($_POST['naslov']=='' || $_POST['tip']=='' || $_POST['opis'] == '' || $_POST['datum'] == ''){
			//return false;

		}

		$parameters = '[{'.

			'"naslov"'.':'.'"'.$_POST['naslov'].'",'.
			'"tip"'.':'.'"'.$_POST['tip'].'",'.
			'"opis"'.':'.'"'.$_POST['opis'].'",'.
			'"datum"'.':'.'"'.$_POST['datum'].'"'

			.'}]';

		
		$mysqli = new mysqli("localhost", "root", "", "seminarskitrener");
		$cols = '(tipID, naslov, opis, datum)';

		$values = "('".$_POST['tip']."','".$_POST['naslov']."','".$_POST['opis']."','".$_POST['datum']."')";

		$query = 'INSERT into blog '.$cols.' VALUES '.$values;

		if($mysqli->query($query))
		{
			return true;
		}
		else
		{
			return false;
		}
		$mysqli->close();


			if($json_objekat == "Uspesno ste ubacili blog!") {
				return true;
			}
			else {
				return false;
			}
	}



	public function izmeni($id) {
		if(!isset($_POST['naslov']) || !isset($_POST['tip']) || !isset($_POST['opis']) || !isset($_POST['datum'])){
			return false;

		}
		if($_POST['naslov']=='' || $_POST['tip']=='' || $_POST['opis'] == '' || $_POST['datum'] == ''){
			return false;

		}

		$parameters = '[{'.

			'"naslov"'.':'.'"'.$_POST['naslov'].'",'.
			'"tipID"'.':'.'"'.$_POST['tipID'].'",'.
			'"opis"'.':'.'"'.$_POST['opis'].'",'.
			'"blog"'.':'.'"'.$id.'",'.
			'"datum"'.':'.'"'.$_POST['datum'].'"'

			.'}]';


			$curl_zahtev = curl_init("http://localhost/SeminarskiTrener/rest/izmeni.json");
			curl_setopt($curl_zahtev, CURLOPT_POST, TRUE);
			curl_setopt($curl_zahtev, CURLOPT_POSTFIELDS, $parameters);
			curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
			$curl_odgovor = curl_exec($curl_zahtev);
			$json_objekat=json_decode($curl_odgovor, true);
			curl_close($curl_zahtev);


			if($json_objekat == "Uspesno ste izmenili blog!") {
				return true;
			}
			else {
				return false;
			}
	}

}

?>

<?php
require 'flight/Flight.php';
require 'jsonindent.php';


Flight::route('/', function(){

	die("prazno");
});

Flight::register('db', 'Database', array('niz'));


Flight::route('GET /tipovi.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiTipove();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});

Flight::route('POST /noviBlog.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->unesiBlog($json_data);
	if($db->getResult())
	{
		$response = "Uspešno ste ubacili blog!";
	}
	else
	{
		$response = "Neuspešno ste ubacili blog!";

	}

	echo indent(json_encode($response));

});

Flight::route('POST /izmenaBloga.json', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->izmenaBloga($json_data);
	if($db->getResult())
	{
		$response = "Uspešno ste izmenili blog!";
	}
	else
	{
		$response = "Neuspešno ste izmenili blog!";

	}

	echo indent(json_encode($response));

});

Flight::start();
?>

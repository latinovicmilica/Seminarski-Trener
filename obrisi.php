<?php
include ("konekcija.php");
if(!isset($_GET['id'])){
	header("Location: admin.php");
}
$id=$_GET['id'];
$db->where('blogID',$id);
$db->delete('blog');
header("Location:admin.php");
 ?>
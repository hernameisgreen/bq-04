<?php
include_once"../base.php";
$type=$Type->find($_POST['id']);
$type['name']=$_POST['name'];
$Type->save($type);
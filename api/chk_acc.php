<?php

include_once"../base.php";

/* 短寫法 */
//echo $Mem->count(['acc'=>$_GET['acc']]);
$acc=$_GET['acc'];
$chk=$Mem->count(['acc'=>$acc]);
echo $chk;

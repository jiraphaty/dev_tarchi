<?php
include "Line_model.php";

$line = new Line_Notify();

$line->setToken('');

$line->setMsg('ทดสอบ');
$line->addMsg('***********************');
$line->addMsg('😁 : ข้อความ');
$line->addMsg('***********************');
$line->setSPId(1);
$line->setSId(6);
$line->setImg('https://media.giphy.com/media/13gvXfEVlxQjDO/giphy.gif');

if($line->sendNotify()){
	echo "ส่งแล้ว";
}else{
	echo "<pre>";
	print_r($line->getError());
	echo "</pre>";
}
?>
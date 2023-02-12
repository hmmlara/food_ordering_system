<?php

$labels=["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
$data= [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000];
$info=[];
$info['labels']=$labels;
$info['data']=$data;
echo json_encode($info);
?>
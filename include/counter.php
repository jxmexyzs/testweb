<?php
$filename="counter.txt";
$fp = fopen($filename,"r");
$number = fread ($fp,filesize($filename) );
fclose($fp);
$number=$number+1;
$fp=fopen($filename,"w");
fwrite($fp,$number);
fclose($fp);
echo $number;
?>
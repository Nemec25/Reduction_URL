<?php
require_once('idna_convert.class.php');
include 'bd.php';
$url = $_POST['url'];
$ip = $_SERVER["REMOTE_ADDR"];
$IDN = new idna_convert();
$url = $IDN->encode($url); // Конвертация в ACE-последовательности
if ( filter_var ( $url , FILTER_VALIDATE_URL ) )
{
$checkUrl = $mysqli->query (" SELECT `inn`,`outt` FROM main Where `inn` = '$url' ");
if ($checkUrl->num_rows == 0)
	{
		$rows = $mysqli->query ("SELECT `outt` FROM main");
		$sum = $rows->num_rows;
		$val = $sum+50;
		$val2 = $sum-8;
		$str = base_convert($val, 10, 34).base_convert($val2, 10, 36);
		$in = $mysqli->query ("INSERT INTO main (inn, outt, ip) VALUES ('$url', '$str', '$ip')");
		echo "<a href=".$url.">".$url."</a>  ==>  <a href=http://trr.96.lt/?a=".$str.">http://trr.96.lt/?a=".$str."</a><br>";
	}
	else 
	{
		while ($value = $checkUrl->fetch_assoc()) 
		echo "2http://trr.96.lt/?a=".$value['outt'];
	}
}
else echo "1";
?>
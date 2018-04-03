<?php
include 'bd.php';
if (isset($_GET['a']) && preg_match("/^[a-zA-Z0-9)(]{2,20}$/",$_GET['a']))
{
  $Hash = $_GET['a'];
  $newUrl = $mysqli->query (" SELECT `inn`,`outt` FROM main Where `outt` = '$Hash' ");  
  while($value = $newUrl->fetch_assoc())
    header('Location:'.$value['inn']);
}
if ($_SERVER["REMOTE_ADDR"] != '')
{
  $ip = $_SERVER["REMOTE_ADDR"];
  $checkIp = $mysqli->query (" SELECT `ip`,`inn`,`outt` FROM main Where `ip` = '$ip' ");
}
else $flag = 1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>test</title>
    <script src="./script/jquery.min.js"></script>
    <script src="./script/index.js"></script>
    <meta charset="utf-8">
    
</head>
<body>    
<label>Введите полную ссылку для преобразования в короткий вид</label>
<input type="text" id="url" name="url">
<button id="click">Преобразовать</button>
<center>
Прошлые запросы:
<br>
<div id="dataOut">
<?php
if ($flag != 1)
while ($value = $checkIp->fetch_assoc()) 
{
  echo "<a href=".$value['inn'].">".$value['inn']."</a>  ==>  <a href=http://trr.96.lt/?a=".$value['outt'].">http://trr.96.lt/?a=".$value['outt']."</a><br>";
}
?>  
</div></center>
</body>
</html>
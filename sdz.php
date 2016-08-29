<?php
$demp4_host="http://play.sturgeon.mopaas.com/";
$sdv_host="http://play.sturgeon.mopaas.com/";
if($_GET['demp4']){
$demp4_url=$demp4_host."demp4_crack.php".($_GET['play']?("?play=1&"):("?"));
header("Location:".$demp4_url."demp4=".($_GET['demp4']));
}else{
$p=$_SERVER['QUERY_STRING'];
$x=$sdv_host;
$u=$x.'ajax.php';
if($p&&(!$_GET['ver'])){
$headers = get_headers("$u?$p",1);
$k=$headers["Location"];
$s= $x.$k;
if(strlen($k)>0){
header("Location:$s");
}else{
header("Location:$u?$p");
}
}else{
echo file_get_contents($u);
}
}
?>
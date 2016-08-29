<?php
$url=base64_decode($_GET['demp4']);
if(!$url){die("Please Set Url!");}
$ns=reset(explode('.', end(explode('/', $url)))); 
$kzm=strtolower(end(explode('.', end(explode('/', $url))))); 
if($_GET['play']){die('<video width="100%" height="97%" src="'.'video/'.$ns.'.'.$kzm.'" controls="controls" autoplay="autoplay"></video>');}
if($_GET['reset']||$_GET['stop']){
@unlink("video/$ns.".$kzm);
@unlink("video/$ns.log");
if($_GET['reset']){
header("Location: demp4_crack.php?start=1&demp4=".$_GET['demp4']);
}else{
die('<script>window.location.href="demp4_checkpc.php?demp4='.$_GET['demp4'].'"</script>');
}
}else{
echo '<title>'.$ns.' - DeMp4 Processor</title><body style="background:black"><div style="position:fixed;margin-top:30%;width:62%;margin-left:38%;font-size:250px;color:black;background:white;height:160px;
line-height:160px;">'.(($kzm="mp4")?("mp4"):("mkv")).'</div><div align="center" style="width:99%;position:fixed;background:white;font-family: '."'".'Microsoft Yahei'."'".'; "><span style="float:left;left:0;top:0;">Processing';
$a_array = @get_headers($url,true); 
$file_sizeofurl = @$a_array['Content-Length']; 
$file_mp4 = @filesize("video/$ns.".$kzm);
$precent=@floor((100*$file_mp4/$file_sizeofurl));
switch ($precent)
{
case 0:
  $ec='demp4_crack.php?start=1&demp4='.$_GET['demp4'].'">Start';
  break;  
case 100:
  $ec='demp4_checkpc.php?reset=1&demp4='.$_GET['demp4'].'">Reset</a>&nbsp;<a style="color:rgb(156,
			81, 0);text-decoration:none;" target="_self" href="demp4_checkpc.php?play=1&demp4='.$_GET['demp4'].'">Play</a>';	
  break;
default:
  $ec='demp4_checkpc.php?stop=1&demp4='.$_GET['demp4'].'">Stop';
   echo	'<script>setTimeout("window.location.reload()",5000);</script>';
  break;   
}
echo " ".$precent."% ".(($file_mp4)?($file_mp4):("0"))."/".(($file_sizeofurl)?($file_sizeofurl):("0"));
die ('</span><a  style="color:rgb(156,
			81, 0);text-decoration:none;"  target="_blank" title="Videos Manager" href="gftp.php?op=home&folder=./video/">'.$ns.'</a><span style="float:right;right:0;top:0;"><a style="color:rgb(156,
			81, 0);text-decoration:none;" href="javascript:void(0);" onclick="window.location.reload();">Refresh</a>&nbsp;<a style="color:rgb(156,
			81, 0);text-decoration:none;" target="_self" href="'.$ec.'</a></span></div></body>');
}			
?>
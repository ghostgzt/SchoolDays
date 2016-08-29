<?php
function destroyDir($dir, $virtual = false) {
	$ds = DIRECTORY_SEPARATOR;
	$dir = $virtual ? realpath($dir) : $dir;
	$dir = substr($dir, -1) == $ds ? substr($dir, 0, -1) : $dir;
	if (is_dir($dir) && $handle = opendir($dir)) {
		while ($file = readdir($handle)) {
			if ($file == '.' || $file == '..') {
				continue;
			}
			elseif(is_dir($dir.$ds.$file)) {
				destroyDir($dir.$ds.$file);
			}
			else {
				unlink($dir.$ds.$file);
			}
		}
		closedir($handle);
		rmdir($dir);
		return true;
	}
	else {
		return false;
	}
}
if($_GET['play']==1){

define("VIDEO_TIME",3600*24*7);
$url=@base64_decode($_GET['demp4']);
if(!$url){die("Please Set Url!");}
$ns=reset(explode('.', end(explode('/', $url)))); 
$kzm=strtolower(end(explode('.', end(explode('/', $url))))); 

if (time() - date(filemtime('video')) > constant("VIDEO_TIME")) {
	destroyDir('video');
}
@mkdir("video");

if($_GET['start']){
echo '<script>setTimeout('."'".'window.location.href="demp4_crack.php?demp4='.$_GET['demp4'].'"'."'".',5000);</script>';
echo '<iframe src="demp4_crack.php?play=1&demp4='.$_GET['demp4'].'" style="display:none;"></iframe>';
die();
}else{
if(!file_exists("video/$ns.log")){
if(!file_exists("video/$ns.mp4")){
ignore_user_abort(true);
set_time_limit(0); 
$mp4header="AAAAGGZ0eXBpc29tAAAAAWlzb21hdmMxAAuo2W1vb3YAAABsbXZoZAAAAADOap00zmqdNAAAAlgADkhZAAEAAAEAAAAAAAAAAAAAAAABAAAAAAAAAAAAAAAAAAAAAQAAAAAAAAAAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMAAAAVaW9kcwAAAAAQBwBP//8pFQ==";
$mkvheader="GkXfo6NChoEBQveBAULygQRC84EIQoKIbWF0cm9za2FCh4ECQoWBAhhTgGcBAAAABcZfBxFNm3SvTbuMU6uEFUmpZlOsghADTbuMU6uEFlSua1OsghCZTbuOU6uEHFO7a1OshAXGSe/sT8wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA==";
if($kzm=="mp4"){
$header=$mp4header;
$hname="mp4header";
}else{
$header=$mkvheader;
$hname="mkvheader";
}
file_put_contents("video/$ns.log","Processing...");
file_put_contents("video/".$hname.".bin",base64_decode($header));
@unlink("video/$ns.".$kzm);
@unlink("video/$ns.mp4");
@unlink("video/$ns.log");
@shell_exec("wget -c -i $url -P video");
if(file_exists("video/$ns.".$kzm)){
@shell_exec("dd if=video/$ns.".$kzm." bs=".strlen(base64_decode($header))." skip=1  of=video/$ns.mpx");
@shell_exec("rm -rf video/$ns.".$kzm);
}
if(file_exists("video/$ns.mpx")){
@shell_exec("cat video/".$hname.".bin video/$ns.mpx > video/$ns.mp4");
@shell_exec("rm -rf video/$ns.mpx");
}
@unlink("video/$ns.log");
header("Location: video/$ns.mp4");
}else{
header("Location: video/$ns.mp4");
}
}else{
header("Location: demp4_crack.php?demp4=".$_GET['demp4']);
}
}








}else{







$url=base64_decode($_GET['demp4']);
if(!$url){die("Please Set Url!");}
$ns=reset(explode('.', end(explode('/', $url)))); 
$kzm=strtolower(end(explode('.', end(explode('/', $url))))); 
if($_GET['play']){die('<video width="100%" height="97%" src="'.'video/'.$ns.'.mp4'.'" controls="controls" autoplay="autoplay"></video>');}
if($_GET['reset']||$_GET['stop']){
@unlink("video/$ns.".$kzm);
@unlink("video/$ns.mp4");
@unlink("video/$ns.log");
if($_GET['reset']){
header("Location: demp4_crack.php?play=1&start=1&demp4=".$_GET['demp4']);
}else{
die('<script>window.location.href="demp4_crack.php?demp4='.$_GET['demp4'].'"</script>');
}
}else{
$a_array = @get_headers($url,true); 
$file_sizeofurl = @$a_array['Content-Length']; 
$file_mp4 = @filesize("video/$ns.".$kzm);
$file_ksz=@filesize("video/$ns.mp4");
if($file_ksz){$file_mp4=$file_ksz;}
$precent=@floor((100*$file_mp4/$file_sizeofurl));

if(!$file_mp4)
{
  $ec='demp4_crack.php?play=1&start=1&demp4='.$_GET['demp4'].'">Start';
}else{
if($precent==100){
 $ec='demp4_crack.php?reset=1&demp4='.$_GET['demp4'].'">Reset</a>&nbsp;<a style="color:rgb(156,
			81, 0);text-decoration:none;" target="_self" href="demp4_crack.php?play=1&demp4='.$_GET['demp4'].'">Play</a>';
$action=1;			
}else{
  $ec='demp4_crack.php?stop=1&demp4='.$_GET['demp4'].'">Stop';
   echo	'<script>setTimeout("window.location.reload()",5000);</script>';
}
}
echo '<title>'.$ns.' - DeMp4 Processor</title><body style="background:black"><div style="position:fixed;margin-top:30%;width:62%;margin-left:38%;font-size:250px;color:black;background:white;height:160px;
line-height:160px;">'.((!$action)?(strtoupper(($kzm=="mp4")?("mp4"):("mkv"))):('<a style="color:rgb(156,
			81, 0);text-decoration:none;font-family: '."'".'Microsoft Yahei'."'".';font-size:200px;" target="_self" href="demp4_crack.php?play=1&demp4='.$_GET['demp4'].'">Play</a>')).'</div><div align="center" style="width:99%;position:fixed;background:white;font-family: '."'".'Microsoft Yahei'."'".'; "><span style="float:left;left:0;top:0;">Processing';
echo " ".$precent."% ".(($file_mp4)?($file_mp4):("0"))."/".(($file_sizeofurl)?($file_sizeofurl):("0"));
die ('</span><a  style="color:rgb(156,
			81, 0);text-decoration:none;float:center;"  target="_blank" title="Videos Manager" href="gftp.php?op=home&folder=./video/">DeMp4 Processor</a><span style="float:right;right:0;top:0;"><a style="color:rgb(156,
			81, 0);text-decoration:none;" href="javascript:void(0);" onclick="window.location.reload();">Refresh</a>&nbsp;<a style="color:rgb(156,
			81, 0);text-decoration:none;" target="_self" href="'.$ec.'</a></span></div><div align="center" style="width:99%;position:fixed;top:30px;background:white;font-family: '."'".'Microsoft Yahei'."'".'; ">'.$ns.'</div></body>');
}	













}
?>
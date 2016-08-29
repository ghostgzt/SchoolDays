<?php
define("VIDEO_TIME",3600*24*7);
$url=@base64_decode($_GET['demp4']);
if(!$url){die("Please Set Url!");}
$ns=reset(explode('.', end(explode('/', $url)))); 
$kzm=strtolower(end(explode('.', end(explode('/', $url))))); 
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
if (time() - date(filemtime('video')) > constant("VIDEO_TIME")) {
	destroyDir('video');
}
@mkdir("video");

if($_GET['start']){
echo '<script>setTimeout('."'".'window.location.href="demp4_checkpc.php?demp4='.$_GET['demp4'].'"'."'".',5000);</script>';
echo '<iframe src="demp4_crack.php?demp4='.$_GET['demp4'].'" style="display:none;"></iframe>';
die();
}else{
if(!file_exists("video/$ns.log")){
if(!file_exists("video/$ns.".$kzm)){
ignore_user_abort(true);
set_time_limit(0); 
$mp4header="AAAAGGZ0eXBpc29tAAAAAWlzb21hdmMxAAuo2W1vb3YAAABsbXZoZAAAAADOap00zmqdNAAAAlgADkhZAAEAAAEAAAAAAAAAAAAAAAABAAAAAAAAAAAAAAAAAAAAAQAAAAAAAAAAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMAAAAVaW9kcwAAAAAQBwBP//8pFQ==";
$mkvheader="GkXfo6NChoEBQveBAULygQRC84EIQoKIbWF0cm9za2FCh4ECQoWBAhhTgGcBAAAABcZfBxFNm3SvTbuMU6uEFUmpZlOsghADTbuMU6uEFlSua1OsghCZTbuOU6uEHFO7a1OshAXGSe/sT8wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA==";
if($kzm="mp4"){
$header=$mp4header;
$hname="mp4header";
}else{
$header=$mkvheader;
$hname="mkvheader";
}
file_put_contents("video/$ns.log","Processing...");
file_put_contents("video/".$hname.".bin",base64_decode($header));
@shell_exec("wget -i $url -P video");
if(file_exists("video/$ns.".$kzm)){
@shell_exec("dd if=video/$ns.".$kzm." bs=".strlen(base64_decode($header))." skip=1  of=video/$ns.mpx");
@shell_exec("rm -rf video/$ns.".$kzm);
}
if(file_exists("video/$ns.mpx")){
@shell_exec("cat video/".$hname.".bin video/$ns.mpx > video/$ns.".$kzm);
@shell_exec("rm -rf video/$ns.mpx");
}
@unlink("video/$ns.log");
header("Location: video/$ns.".$kzm);
}else{
header("Location: video/$ns.".$kzm);
}
}else{
header("Location: demp4_checkpc.php?demp4=".$_GET['demp4']);
}
}
?>
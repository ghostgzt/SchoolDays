<?php
error_reporting(0);
function getheader($url){
$source=file_get_contents($url, NULL, NULL, 0, 160);
for($i=0;$i<strlen($source);$i++){
$hex=dechex(255-hexdec(bin2hex($source[$i])));
if(strlen($hex)==1){$hex="0".$hex;}
$header.= pack('H*',$hex);
}
return $header;
}
function destroyDir($dir, $virtual = false) {
    $ds = DIRECTORY_SEPARATOR;
    $dir = $virtual ? realpath($dir) : $dir;
    $dir = substr($dir, -1) == $ds ? substr($dir, 0, -1) : $dir;
    if (is_dir($dir) && $handle = opendir($dir)) {
        while ($file = readdir($handle)) {
            if ($file == '.' || $file == '..') {
                continue;
            } elseif (is_dir($dir . $ds . $file)) {
                destroyDir($dir . $ds . $file);
            } else {
                unlink($dir . $ds . $file);
            }
        }
        closedir($handle);
        rmdir($dir);
        return true;
    } else {
        return false;
    }
}
/*function dlx($file_name) {
	$bm=getheader($file_name);
    @set_time_limit(0);
    Header("Content-type: application/octet-stream");
    Header("Content-Disposition: attachment; filename=" . end(explode('/', $file_name)));
    $kzm = strtolower(end(explode('.', end(explode('/', $file_name)))));
    $file = @fopen($file_name, "rb");
    if (!$file) {
        die("Not Found!");
    } else {
        $first = 1;
        if ($kzm == "mp4") {
            Header("Content-type: video/mp4");
        } else {
            if ($kzm == "mkv") {
                Header("Content-type: video/x-matroskaMKV-application/octet-stream");
            } else {
                if ($kzm == "rmvb") {
                    Header("Content-type: video/x-pn-realaudio");
                } else {
                    die("Not Support !");
                }
            }
        }
        while (!feof($file)) {
            if ($first) {
                $c = $bm;
                fread($file, strlen($c));
                $first = 0;
            } else {
                $c = fread($file, 8 * 1024);
            }
            echo $c;
        }
        fclose($file);
    }
}*/

function dlx($fileName) { 
		set_time_limit(0);  
		$url=$fileName;
		$first = 1;
		$bm=getheader($url);			
		$preinfo=get_headers($fileName, 1);
		$fileSize = $preinfo['Content-Length'];
		@preg_match_all('/HTTP\/1\.[0|1]\s(.*?)\s/is', $preinfo[0], $match); 
		if ($match[1][0]=="404") {  
			die(header("HTTP/1.1 404 Not Found"));  
		}  	
		if ($match[1][0]!="200") {  
			die("This File is Fake!");  
		}  			
		if($preinfo["ETag"]){
			$etag=$preinfo["ETag"];
			header("ETag: $etag");
		}
		if($preinfo["Last-Modified"]){
			$lastModified=$preinfo["Last-Modified"];
			header("Last-Modified:  $lastModified");
		}
		if($preinfo["Accept-Ranges"]){
			$AcceptRanges=$preinfo["Accept-Range"];
			header("Accept-Range:  $AcceptRanges");
		}	

    if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $lastModified) 
    { 
        header("HTTP/1.1 304 Not Modified"); 
        return true; 
    } 
  
    if (isset($_SERVER['HTTP_IF_UNMODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_UNMODIFIED_SINCE']) < $lastModified) 
    { 
        header("HTTP/1.1 304 Not Modified"); 
        return true; 
    } 
  
    if (isset($_SERVER['HTTP_IF_NONE_MATCH']) &&  $_SERVER['HTTP_IF_NONE_MATCH'] == $etag) 
    { 
        header("HTTP/1.1 304 Not Modified"); 
        return true; 
    } 
  

        $fancyName = basename($fileName); 
    
  
		$kzm = strtolower(end(explode('.', end(explode('/', $fileName)))));
         if ($kzm == "mp4") {
            $contentType="video/mp4";
        } else {
            if ($kzm == "mkv") {
                $contentType="video/x-matroskaMKV-application/octet-stream";
            } else {
                if ($kzm == "rmvb") {
                   $contentType="video/x-pn-realaudio";
                } else {
                    die("Not Support !");
                }
            }
        } 

    $contentLength = $fileSize; 
    $isPartial = false; 
  
    if (isset($_SERVER['HTTP_RANGE'])) 
    { 
        if (preg_match('/^bytes=(\d*)-(\d*)$/', $_SERVER['HTTP_RANGE'], $matches)) 
        { 
            $startPos = $matches[1]; 
            $endPos = $matches[2]; 
  
            if ($startPos == '' && $endPos == '') 
            { 
                return false; 
            } 
  
            if ($startPos == '') 
            { 
                $startPos = $fileSize - $endPos; 
                $endPos = $fileSize - 1; 
            } 
            else if ($endPos == '') 
            { 
                $endPos = $fileSize - 1; 
            } 
  
            $startPos = $startPos < 0 ? 0 : $startPos; 
            $endPos = $endPos > $fileSize - 1 ? $fileSize - 1 : $endPos; 
  
            $length = $endPos - $startPos + 1; 
  
            if ($length < 0) 
            { 
                return false; 
            } 
  
            $contentLength = $length; 
            $isPartial = true; 
        } 
    } 

	if($startPos<strlen($bm)){
		$startPos=0;
	}
    // send headers 
    if ($isPartial) 
    { 
        header('HTTP/1.1 206 Partial Content'); 
        header("Content-Range: bytes $startPos-$endPos/$fileSize"); 
  
    } 
    else 
    { 
        header("HTTP/1.1 200 OK"); 
        $startPos = 0; 
        $endPos = $contentLength - 1; 
    } 

  
    header('Pragma: cache'); 
    header('Cache-Control: public, must-revalidate, max-age=0'); 
    header('Accept-Ranges: bytes'); 
    header('Content-type: ' . $contentType); 
    header('Content-Length: ' . $contentLength); 
  

  
    header("Content-Transfer-Encoding: binary"); 
  
    $bufferSize = 128; 
  

  
    $bytesSent = 0; 
	

	$url = ((strtolower(substr($url, 0, strlen("https"))) == "https") ? ("http" . substr($url, strlen("https"))) : ($url));

        $options = array(
            'http' => array(
                'timeout' => 120,
                'user_agent' => "Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)",
                'proxy' => "",
                'request_fulluri' => false,
                'max_redirects' => 3,
                'method' => "GET",
                'header' => "Accept-Ranges: bytes".PHP_EOL."Range: bytes= $startPos-",
                'content' => ""
            )
        );

    $fp = fopen($url, "rb",false,stream_context_create($options)); 

    while ($bytesSent < $contentLength && !feof($fp) && connection_status() == 0 ) 
    { 

  
        $readBufferSize = $contentLength - $bytesSent < $bufferSize ? $contentLength - $bytesSent : $bufferSize; 
		if ($first&&($startPos<strlen($bm))) {
                $buffer = $bm;
                fread($fp, strlen($bm));
                $first = 0;
            } else {
	   $buffer = fread($fp, $readBufferSize); 
	   }
        echo $buffer; 
		
        ob_flush(); 
        flush(); 
  
        $bytesSent += $readBufferSize; 
  

    } 
    return true; 
} 
function playnow($url, $path, $kzm) {
    if (@$_GET['playnow']) {
        echo "<style>html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block;}body{line-height:1;}ol,ul{list-style:none;}blockquote,q{quotes:none;}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none;}table{border-collapse:collapse;border-spacing:0;}body{font-family:'Microsoft Yahei';}a{color:rgb(156,81,0);text-decoration:none;}</style>";
        if (($kzm == "mp4") || ($kzm == "mkv")) {
            die('<video style="background:black;" id="vvdd" width="100%" height="100%" src="' . "$path" . '" controls="controls" autoplay="autoplay"></video>');
        } else {
		   if(strstr(strtolower($_SERVER['HTTP_USER_AGENT']),'android')||strstr(strtolower($_SERVER['HTTP_USER_AGENT']),'ipad')||strstr(strtolower($_SERVER['HTTP_USER_AGENT']),'iphone')) {
            die('<video style="background:black;" id="vvdd" width="100%" height="100%" src="' . "$path" . '" controls="controls" autoplay="autoplay"></video>');		   
		   }else{  
            die('<object width="100%" height="100%" type="video/x-ms-asf" url="' . "$path" . '" classid="CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6"><param name="url" value="' . "$path" . '"> <param name="filename" value="' . end(explode('/', $url)) . '"> <param name="autostart" value="1"> <param name="uiMode" value="full" /> <param name="autosize" value="1"> <param name="playcount" value="1"> <embed type="application/x-mplayer2" src="' . "$path" . '" width="100%" height="100%" autostart="true" showcontrols="true" pluginspage="http://www.microsoft.com/Windows/MediaPlayer/"></embed> </object> ');
		  }
        }
    }
}
$getfile = @base64_decode(str_replace(" ","+",@$_GET['key']));
if ($getfile) {
    playnow($getfile, 'demp4.php?key=' . $_GET['key'], strtolower(end(explode('.', end(explode('/', $getfile))))));
    dlx($getfile);
} else {
    if (@$_GET['play'] == 1) {
        define("VIDEO_TIME", 3600 * 24 * 7);
        $url = @base64_decode(str_replace(" ","+",$_GET['demp4']));
        if (!$url) {
            die("Please Set Url!");
        }
        $ns = reset(explode('.', end(explode('/', $url))));
        $kzm = strtolower(end(explode('.', end(explode('/', $url)))));
        if (time() - date(filemtime('video')) > constant("VIDEO_TIME")) {
            destroyDir('video');
        }
        @mkdir("video");
        if ($_GET['start']) {
            echo '<script>setTimeout(' . "'" . 'window.location.href="demp4.php?demp4=' . $_GET['demp4'] . '"' . "'" . ',5000);</script>';
            echo '<iframe src="demp4.php?play=1&demp4=' . $_GET['demp4'] . '" style="display:none;"></iframe>';
            die();
        } else {
            if (!file_exists("video/$ns.log")) {
                if (!file_exists("video/$ns.$kzm")) {
                    ignore_user_abort(true);
                    @set_time_limit(0);
					$header=getheader($url);
                    @unlink("video/$ns." . $kzm);
                    @unlink("video/$ns.log");
                    //file_put_contents("video/$ns.log", "Processing...");
					$a_array = @get_headers($url, true);
					$file_sizeofurl = @$a_array['Content-Length'];
					file_put_contents("video/$ns.log", $file_sizeofurl);					
                    $first = 1;
                    $file = fopen($url, "rb");
                    if ($file) {
                        $newf = fopen("video/$ns." . $kzm, "wb");
                        if ($newf) while (!feof($file)) {
                            if (!file_exists("video/$ns.log")) {
                                @unlink("video/$ns." . $kzm);
                                die();
                            }
                            if ($first) {
                                $c = $header;
                                fread($file, strlen($c));
                                $first = 0;
                            } else {
                                $c = fread($file, 1024 * 8);
                            }
                            fwrite($newf, $c, 1024 * 8); 
                        }
                    }
                    if ($file) {
                        fclose($file);
                    }
                    if ($newf) {
                        fclose($newf);
                    }
                    @unlink("video/$ns.log");
                    header("Location: video/$ns.$kzm");
                } else {
                    header("Location: video/$ns.$kzm");
                }
            } else {
                header("Location: demp4.php?demp4=" . $_GET['demp4']);
            }
        }
    } else {
        $url = base64_decode(str_replace(" ","+",$_GET['demp4']));
        if (!$url) {
            die("Please Set Url!");
        }
        $ns = @reset(explode('.', end(explode('/', $url))));
        $kzm = @strtolower(end(explode('.', end(explode('/', $url)))));
        playnow($url, "video/$ns.$kzm", $kzm);
        if (@$_GET['reset'] || @$_GET['stop']) {
            @unlink("video/$ns." . $kzm);
            @unlink("video/$ns.log");
            /*if ($_GET['reset']) {
                header("Location: demp4.php?play=1&start=1&demp4=" . $_GET['demp4']);
            } else {*/
                die('<script>window.location.href="demp4.php?demp4=' . $_GET['demp4'] . '"</script>');
            //}
        } else {
            if (@file_exists("video/$ns.log")&&@file_get_contents("video/$ns.log")>0) {
				$file_sizeofurl = @file_get_contents("video/$ns.log");
			}else{			
				$a_array = @get_headers($url, true);
				$file_sizeofurl = @$a_array['Content-Length'];
				//file_put_contents("video/$ns.log", $file_sizeofurl);
			}
            $file_mp4 = @filesize("video/$ns." . $kzm);
            $precent = @floor((100 * $file_mp4 / $file_sizeofurl));
            if (!$file_mp4) {
                $ec = 'demp4.php?play=1&start=1&demp4=' . $_GET['demp4'] . '">Start';
            } else {
                if ($precent == 100) {
                    $ec ="video/$ns.$kzm" . '" download="'.$ns.$kzm.'">Download</a>&nbsp;<a style="color:rgb(156,81, 0);text-decoration:none;" target="_self" href="demp4.php?reset=1&demp4=' . $_GET['demp4'] . '">Reset</a>&nbsp;<a style="color:rgb(156,81, 0);text-decoration:none;" target="_self" href="demp4.php?playnow=1&demp4=' . $_GET['demp4'] . '">Play</a>';
                    $action = 1;
                } else {
                    $ec = 'demp4.php?stop=1&demp4=' . $_GET['demp4'] . '">Stop';
                    echo '<script>setTimeout("window.location.reload()",5000);</script>';
                }
            }
            echo '<title>' . $ns . ' - DeMp4 Processor</title><body style="background:black"><div style="position:fixed;margin-top:30%;width:62%;margin-left:38%;font-size:250px;color:black;background:white;height:160px;line-height:160px;">' . ((!@$action) ? (strtoupper(($kzm == "mp4") ? ("mp4") : (($kzm == "mkv") ? ("mkv") : ("rmvb")))) : ('<a style="color:rgb(156,81, 0);text-decoration:none;font-family: ' . "'" . 'Microsoft Yahei' . "'" . ';font-size:200px;" target="_self" href="demp4.php?playnow=1&demp4=' . $_GET['demp4'] . '">Play</a>')) . '</div><div align="center" style="width:99%;position:fixed;background:white;font-family: ' . "'" . 'Microsoft Yahei' . "'" . '; "><span style="float:left;left:0;top:0;">Processing';
            echo " " . $precent . "% " . (($file_mp4) ? ($file_mp4) : ("0")) . "/" . (($file_sizeofurl) ? ($file_sizeofurl) : ("0"));
            die('</span><a  style="color:rgb(156,81, 0);text-decoration:none;float:center;"  target="_blank" title="Videos Manager" href="gftp.php?op=home&folder=./video/">DeMp4 Processor</a><span style="float:right;right:0;top:0;"><a style="color:rgb(156,81, 0);text-decoration:none;" href="demp4.php?playnow=1&key=' . $_GET['demp4'] . '">Stream</a>&nbsp;<a style="color:rgb(156,81, 0);text-decoration:none;" href="javascript:void(0);" onclick="window.location.reload();">Refresh</a>&nbsp;<a style="color:rgb(156,81, 0);text-decoration:none;" target="_self" href="' . $ec . '</a></span></div><div align="center" style="width:99%;position:fixed;top:30px;background:white;font-family: ' . "'" . 'Microsoft Yahei' . "'" . '; ">' . $ns . '</div></body>');
        }
    }
}
?>

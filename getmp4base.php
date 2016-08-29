<?php 
function dlx($file_name,$bm) {

    @set_time_limit(0);
    //Header("Content-type: application/octet-stream");
    //Header("Content-Disposition: attachment; filename=" . end(explode('/', $file_name)));
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
                $c = ($bm);
                fread($file, strlen($c));
                $first = 0;
            } else {
                $c = fread($file, 128 * 1024);
            }
            echo $c;
        }
        fclose($file);
    }
}


$source=file_get_contents("http://202.201.89.243/kuuE/687474703A2F2F6D372E6E65746B75752E636F6D2F64792F73757A68752F312E6D7034.mp4", NULL, NULL, 0, 160);
for($i=0;$i<strlen($source);$i++){
$hex=dechex(255-hexdec(bin2hex($source[$i])));
if(strlen($hex)==1){$hex="0".$hex;}
$header.= pack('H*',$hex);
}
//dlx("http://202.201.89.243/kuuE/687474703A2F2F6D382E6E65746B75752E636F6D2F652F64682F62696E6767756F2F30312E6D7034.mp4",$header);
echo file_put_contents("sttt",$source);
echo file_put_contents("tsss",$header);
?>
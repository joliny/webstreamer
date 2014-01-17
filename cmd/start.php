<?php
//enable all error output weve got...
error_reporting(E_ALL);
ini_set("display_errors","on");

//this receives the var from the call...
include_once("../functions/functs.php");
include_once("../config.php");

$file=$_GET['file'];
$name=$_GET['name'];
$uid=md5($_SERVER['REMOTE_ADDR'].$name); //multi user stuff...

$source=escapeshellcmd("avconv -re -i '{$file}'");
$target="tcp://127.0.0.1:6666?pkt_size=650"; //1613

//$presets = "-threads 2";
$presets = "";

//$audio="-acodec libfaac -ab 12k -aq 6 -ar 48000 -ac 1 -async 2";
//$audio="-acodec aac -ab 8k -aq 6 -ar 24000 -ac 1";
$audio = "-acodec libmp3lame -ab 8k -ar 22050 -aq 24 -ac 1"; //-ar 11025
//$video="-vcodec libx264 -intra -bufsize {$buffer}k -maxrate {$buffer}k -minrate 200k -bf 10 -s {$width}:{$height} -vf scale={$width}:{$height} -vbsf h264_mp4toannexb";
//$video="-vcodec flv -b:v 100k -s vga -strict experimental -g 10 -me_method zero";
$video="-vcodec libx264 -pass 1 -b:v 200k -s vga -strict experimental -g 20 -me_method zero";

$output = "-f flv -r 30 -metadata streamName=".$uid;

$subtitles = "-c:s copy";

$check_cmd = "ps auxf |grep {$uid} |awk '{ print $13}' |grep avconv";
$checked = exec($check_cmd);

//only start encoder if its not already running...
if($checked == ""){
	passthru("{$init} {$source} {$presets} {$audio} {$video} {$subtitles} {$output} '{$target}'",$returnval);
}
?>

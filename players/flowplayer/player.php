<?php
ini_set("display_errors","Off");

/* flowplayer definitions */
$style = "<link rel=\"stylesheet\" href=\"".$js_dir."flowplayer/skin/minimalist.css\" type=\"text/css\" media=\"screen\" />";

$headscript = "<script src=\"".$js_dir."flowplayer/flowplayer.min.js\"></script>";

$headscript .= '<script type="text/javascript">
	flowplayer.conf.rtmp = "rtmp://'.$crtmpserver.'/live";
	flowplayer.conf.muted = "true";
	flowplayer.conf.native_fullscreen = "true";
	flowplayer.conf.live = "false";
</script>';

$contentscript = "";

$tag = '<div class="flowplayer" poster="'.htmlentities($thumbs_dir.$filename).'_thumb.png" data-rtmp="rtmp://'.$crtmpserver.'/live" data-engine="flash">
<video>
	<source type="'.htmlentities($type).'" src="'.htmlentities($short_src).'" />
</video>
</div>';
?>

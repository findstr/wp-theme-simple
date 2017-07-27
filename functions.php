<?php
function colorCloud($text) {
$text = preg_replace_callback('|<a (.+?)>|i', 'colorCloudCallback', $text);
return $text;
}
function colorCloudCallback($matches) {
$text = $matches[1];
$colorFull = array('#999','#D8D9A4','#9BB','#EB9','#a3c159','#FEC42D','#6C8C37',
'#c2dc15','#3371A3','#888','#00ccff','#FF8080');
$color = $colorFull[ mt_rand(0, count($colorFull) - 1)];
$pattern = '/style=(\'|\")(.*)(\'|\")/i';
$text = preg_replace($pattern, "style=\"color:{$color};$2;\"", $text);
return "<a $text>";
}

add_filter('wp_tag_cloud', 'colorCloud', 1);

function pre_comment_check() {
	if ($_POST['idcode'] != 3) {
		wp_die("验证码不正确，请输入阿拉伯数字三.");
	}
}

add_filter('pre_comment_on_post', 'pre_comment_check');


?>

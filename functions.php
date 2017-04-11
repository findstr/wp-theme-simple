<?php

function Tagno($text) {
	$text = preg_replace_callback('|<a (.+?)</a>|i', 'tagnoCallback', $text);
	return $text;
}
function tagnoCallback($matches) {
	$text=$matches[1];
	preg_match('|title=(.+?)style|i',$text ,$a);
	preg_match("/[0-9]+/",$a[1],$a);
	return "<a ".$text ."<span>(<em>".$a[0]."</em>)</span></a>";
}
add_filter('wp_tag_cloud', 'Tagno', 1);


//边栏彩色标签
function colorCloud($text) {
    $text = preg_replace_callback('|<a (.+?)>|i','colorCloudCallback', $text);
    return $text;
}
function colorCloudCallback($matches) {
    $text = $matches[1];
    $color = dechex(rand(0,16777215));
    $pattern = '/style=(\'|\”)(.*)(\'|\”)/i';
    $text = preg_replace($pattern, "style=\"color:#{$color};$2;\"", $text);
    return "<a $text>";
}
add_filter('wp_tag_cloud', 'colorCloud', 1);

?>

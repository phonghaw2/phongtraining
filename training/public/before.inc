<?php
// comment ...
if (isset($_SERVER['SERVER_NAME'])) {
	define("SERVER_NAME", "training.xxx");
}
else {
	define("SERVER_NAME", "training_test.xxx");
}
// 公開領域のルートパス（HTTP）
 define("HTTP_ROOT", "http://cms230.dev1.local/" );
// 公開領域のルートパス（内部）
define("DOCUMENT_ROOT", "/htdocs/training");
// 本サーバのルートパス
define("REAL_ROOT", "");
// comment ...
// comment ...
// comment ...
$ary = array(
	array(
		'name' => '', 
		'width' => 178, 
		'height' => '', 
		'exp' => '.jpg'
	), 
	array(
		'name' => '_1', 
		'width' => 110, 
		'height' => '', 
		'exp' => '.jpg'
	)
);
setDefineArray('IMAGE_TEST', $ary);
// comment ...
// comment ...

$ary = array(
	array(
		'name' => '', 
		'width' => 178, 
		'height' => '', 
		'exp' => '.jpg'
	), 
	array(
		'name' => '_1', 
		'width' => 123123, 
		'height' => '', 
		'exp' => '.jpg'
	)
);
setDefineArray('IMAGE_TEST_2222', $ary);
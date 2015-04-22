<?php
set_error_handler(function($errno, $errstr) {
  $trace = debug_backtrace();
  if(isset($trace[1]['class'])) {
  	if(stristr($trace[0]['file'], 'classes.php')) {
		echo '<div style="outline: -webkit-focus-ring-color auto 7px; padding: 8px;"><span style="background-color: red; color: #FFF; display: block; padding: 20px; border-radius: 8px;">エラー！<br>';
		echo $errstr . '</span><br>';
		echo '<b>エラーが発生したクラス</b>：' . $trace[1]['class'] . '<br>';
		echo '<b>エラーが発生した関数</b>：' . $trace[1]['function'] . '<br>';
		echo '<b>エラーが発生した関数に使用された引数</b>：';
		print_r($trace[1]['args']);
		echo '<br><b>エラーが発生したファイル</b>：' . $trace[0]['file'] . '<br>';
		echo '<b>エラーが発生した行数</b>：' . $trace[0]['line'] .'<br>';
		echo '<b>詳細</b><pre>';
		print_r($trace);
		echo '</pre></div>';
	}
  }
});

if(opcache_is_script_cached(__FILE__)) opcache_invalidate(__FILE__);

include("classes.php");
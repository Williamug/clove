<?php

function dd($value, $message = '') {
	ob_start();

	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";

	echo "<pre>";
	print_r($value);
	echo "</pre>";

	if (!empty($message)) {
		echo "<p>Debug message: $message</p>";
	}

	$output = ob_get_clean();
	echo $output;
	die();
}
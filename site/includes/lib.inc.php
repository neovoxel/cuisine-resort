<?php
	function loadPageContent($file) {
		if (is_file($file)) {
			ob_start();
			include $file;
			$content = ob_get_contents();
			return $content;
		}
		else
			return false;
	}
?>
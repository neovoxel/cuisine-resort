<?php
	function loadPageContent($file) {
		if (is_file($file)) {
			ob_start();
			include $file;
			$content = ob_get_contents();
			ob_end_clean();
			return $content;
		}
		else
			return false;
	}
	
	function render($_S, $layout) {
		include $layout;
	}
?>
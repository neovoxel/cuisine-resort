<?php
	function loadPageContent($file) {
		if (is_file($file)) {
			ob_start();
			include $file;
			$file_content = ob_get_contents();
			ob_end_clean();
			return $file_content;
		}
		else
			return "Le fichier '$file' n'a pas été trouvé.";
	}
	
	function render($_S, $layout) {
		if (is_file($layout))
			include $layout;
		else
			die("Le fichier layout '$layout' n'a pas été trouvé.");
	}
	
	function pageExists($_page, $_P) {
		
		foreach ($_P as $page_name=> $tmp) {
			if ($_page == $page_name)
				return true;
		}
		return false;
	}
?>
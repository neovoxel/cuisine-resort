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
	
	function getPDO_BDD() {
		global $PDO_BDD;
		return $PDO_BDD;
	}
	
	function formatTime($unformated_time) {
		$time = explode(":", $unformated_time);
		
		if (!($time[0] > 0 or $time[1] > 0 or $time[2] > 0))		// Dans le cas où le temps vaut 0
			return '0h 0 min 0 sec';
		if ($time[0] > 0)
			$result = intval($time[0]).'h';
		if ($time[1] > 0) {
			if (isset($result)) $result .= ' '; else $result = '';	// On s'assure de l'existance de $result
			$result .= intval($time[1]).' min';
		}
		if ($time[2] > 0) {
			if (isset($result)) $result .= ' '; else $result = '';	// On s'assure de l'existance de $result
			$result .= intval($time[2]).' sec';
		}
		
		return $result;
	}
	
	function formatIngredient($quantite, $unite, $ingredient) {
		$result = $quantite.' ';
		if ($unite != 'Sans unité')
			$result .= $unite.' de ';
		$result .= $ingredient;
		return $result;
	}
	
	function getDifficulte($difficulte) {
		switch ($difficulte) {
			case 0:
				return 'Non précisée';
				break;
			case 1:
				return 'Facile';
				break;
			case 2:
				return 'Moyenne';
				break;
			case 3:
				return 'Difficile';
				break;
			default:
				return 'Difficulté inconnue';
		}
	}
?>
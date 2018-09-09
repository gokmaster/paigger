<?php
			
	function limit_words($strHTML)
	{
			
		// strip tags to avoid breaking any html
		$string = strip_tags($strHTML);

		if (strlen($string) > 500) {

			// truncate string
			$stringCut = substr($string, 0, 500);

			// make sure it ends in a word so assassinate doesn't become ass...
			$string = substr($stringCut, 0, strrpos($stringCut, ' ')) ; 
		}
		 return $string; 
				
	} 

//--------------------------------------------------	

	 
?>
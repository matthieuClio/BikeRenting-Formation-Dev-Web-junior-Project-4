<?php

	class Captcha {

		// Property
		public $validation_code;
		public $captchaCode;

		// Constructor
		function __construct() {
			// Object
			$this->validation_code = false;

			if (!empty($_SESSION['vercode'])) {
				$this->captchaCode = $_SESSION['vercode'];
			}
	    }

		function CapthcaValidator($code) {
			// Met en majuscule
			$code = strtoupper($code);

			if(!empty($code) && !empty($this->captchaCode) && $code == $this->captchaCode){
				$this->validation_code = true;
			}

			return $this->validation_code;
		} // End function CapthcaValidator

	} // End Class Captcha
	
?>
<?php
	class Contact {

		private $textarea;
		private $formSend;
		private $subject;
		private $email;
		private $textareaForm;

		// Constructor
		function __construct() {

			$this->textarea = true;

			if(!empty($_POST['form_send'])) {
				$this->formSend = $_POST['form_send'];
			}

			if(!empty($_POST['subject'])) {
				$this->subject = $_POST['subject'];
			}

			if(!empty($_POST['email'])) {
				$this->email = $_POST['email'];
			}

			if(!empty($_POST['textarea_contact'])) {
				$this->textareaForm = $_POST['textarea_contact'];
			}
	    }

	    function contactFunction() {
	    	// Activation JS textarea
			$textarea = $this->textarea;

	    	// Load the view
			require('../src/view/front/contact_view.php');
	    }

	    function sendEmail() {
	    	// Send email
	    	if(!empty($this->formSend) && !empty($this->email) && !empty($this->textareaForm)) {
	    		mail('makabay@hotmail.fr', $this->subject, $this->textareaForm, $this->email);
	    	}
	    }

	} // End class BackofficeBillet

	// Object BackofficeBillet
	$objectContact = new Contact();
	$objectContact->contactFunction();
	$objectContact->sendEmail();
?>
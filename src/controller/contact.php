<?php
	class Contact {

		private $formSend;
		private $subject;
		private $email;
		private $textareaForm;

		// Constructor
		function __construct() {

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
	    	// Load the view
			require('../src/view/front/contact_view.php');
	    }

	     function sendEmail() {
	    	// Send email
	    	if(!empty($this->formSend) && !empty($this->subject) && !empty($this->email) && !empty($this->textareaForm)) {

	    		$to = 'matthieu.clio@gmail.com';
		    	$subject = $this->subject;
		    	$textEmail = $this->textareaForm;
		    	$from = $this->email;

		    	mail($to, $subject, $textEmail, $from);
		    	$_SESSION['contact_email'] = 'Votre demande a bien été prit en compte';
	    	}
	    }

	} // End class BackofficeBillet

	// Object BackofficeBillet
	$objectContact = new Contact();
	$objectContact->sendEmail();
	$objectContact->contactFunction();
?>
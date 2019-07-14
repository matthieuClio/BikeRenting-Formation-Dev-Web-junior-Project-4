"use strict";

class Popup {
	constructor() {
		this.informationPopup = document.getElementById("information_popup_backoffice");
		this.informationPopupText = document.getElementById("information_popup_backoffice_h2");
		this.saveButton = document.getElementById("ticket_button_backoffice_id");
	}

	displayPopupBackoffice() {
		if (this.informationPopupText.textContent != "") {
			this.informationPopup.style.display = "block";
			//setTimeout(this.hiddePopupBackoffice.bind(this), 3000);
		}
	}

	hiddePopupBackoffice() {
		this.informationPopup.style.display = "none";
	}
}
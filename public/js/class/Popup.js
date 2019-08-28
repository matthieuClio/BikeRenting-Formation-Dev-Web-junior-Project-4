"use strict";

class Popup {
	
	constructor() {
		this.informationPopup = document.getElementById("information_popup_backoffice");
		this.informationPopupText = document.getElementById("information_popup_backoffice_h2");
	}

	displayPopupBackoffice() {

		// Check if informationPopup exist
		if(this.informationPopup && this.informationPopupText) {

			if (this.informationPopupText.textContent != "") {
				this.informationPopup.style.display = "block";
				//setTimeout(this.hiddePopupBackoffice.bind(this), 3000);
			}
		}
	} // End function displayPopupBackoffice

	hiddePopupBackoffice() {

		// Check if informationPopup exist
		if(this.informationPopup && this.informationPopupText) {
			this.informationPopup.style.display = "none";
		}
	}
}
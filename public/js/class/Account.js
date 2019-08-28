"use strict";

class Account {

	constructor() {
		// Button
		this.informationButtonElt = document.getElementById("information_compte_title");
		this.managerButtonElt = document.getElementById("manager_account_button");
		this.creatButtonElt = document.getElementById("creat_compte_button");
		
		// Container
		this.informationContainerElt = document.getElementById("information_compte_container");
		this.managerContainerElt = document.getElementById("manager_account_container");
		this.creatContainerElt = document.getElementById("creat_compte_container");
	}

	informationContainer() {
		// Check if informationButton exist
		if(this.informationButtonElt) {

			// Define a variable boolen
			let click = false;

			this.informationButtonElt.addEventListener("click", () =>{
				if(click) {
					this.informationContainerElt.style.height = "auto";
					click = false;
				}
				else if(!click) {
					this.informationContainerElt.style.height = "0px";
					click = true;
				}
	   		});
		}
	} // End informationContainer

	creatContainer() {
		// Check if creatButtonElt exist
		if(this.creatButtonElt) {

			// Define a variable boolen
			let click = false;

			this.creatButtonElt.addEventListener("click", () =>{
				if(!click) {
					this.creatContainerElt.style.height = "auto";
					click = true;
				}
				else if(click) {	
					this.creatContainerElt.style.height = "0px";
					click = false;
				}
	   		});
		}
	} // End creatContainer

	managerContainer() {
		// Check if creatButtonElt exist
		if(this.managerButtonElt) {

			// Define a variable boolen
			let click = false;

			this.managerButtonElt.addEventListener("click", () =>{
				if(click) {
					this.managerContainerElt.style.height = "auto";
					click = false;
				}
				else if(!click) {	
					this.managerContainerElt.style.height = "0px";
					click = true;
				}
	   		});
		}
	} // End managerContainer
}
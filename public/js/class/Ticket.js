"use strict";

class Ticket {

	constructor() {
		// Button
		this.addTicketButton = document.getElementById("add_ticket_backoffice_button_id");
		this.listingTicketButton = document.getElementById("listing_ticket_backoffice_button_id");

		// Container
		this.addTicket = document.getElementById("add_ticket_backoffice_id");
		this.listingTicket = document.getElementById("listing_ticket_backoffice_id");
	}

	addTicketContainer() {

		// Check if addTicketButton exist
		if(this.addTicketButton) {

			this.addTicketButton.addEventListener("click", () =>{
				if(this.addTicket.style.height == "0px") {
					this.addTicket.style.height = "auto";
				}
				else if(this.addTicket.style.height != "0px") {
					this.addTicket.style.height = "0px";
				}
	   		});
		}

		
		
	} // End addTicketContainer

	ticketListingContainer() {

		// Check if listingTicketButton exist
		if(this.listingTicketButton) {
			this.listingTicketButton.addEventListener("click", () =>{
				if(this.listingTicket.style.height == "0px") {
					this.listingTicket.style.height = "auto";
				}
				else if(this.listingTicket.style.height != "0px") {
					this.listingTicket.style.height = "0px";
				}
	       	});
		}

		
	} // End ticketListingContainer
}
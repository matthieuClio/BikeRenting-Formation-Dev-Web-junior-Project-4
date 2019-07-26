"use strict";

class Comment {
	constructor() {
		this.reportedCommentButton = document.getElementById("reported_comment_id");
		this.unreportedCommentButton = document.getElementById("unreported_comment_id");

		this.reportedCommentContain = document.getElementById("reported_comment_contain_id");
		this.unreportedCommentContain = document.getElementById("unreported_comment_contain_id");
	}

	reportCommentContainer() {

		// Check if addTicketButton exist
		if(this.reportedCommentContain) {

			this.reportedCommentButton.addEventListener("click", () =>{
				if(this.reportedCommentContain.style.height == "0px") {

					this.reportedCommentContain.style.height = "auto";
					this.reportedCommentContain.style.paddingTop = "25px";
					this.reportedCommentContain.style.paddingBottom = "25px";
				}
				else if(this.reportedCommentContain.style.height != "0px") {
					this.reportedCommentContain.style.height = "0px";
					this.reportedCommentContain.style.paddingTop = "0px";
					this.reportedCommentContain.style.paddingBottom = "0px";
				}
	   		});
		}
	} // End addTicketContainer


	unreportCommentContainer() {

		// Check if listingTicketButton exist
		if(this.unreportedCommentContain) {

			this.unreportedCommentButton.addEventListener("click", () =>{
				if(this.unreportedCommentContain.style.height == "0px") {
					this.unreportedCommentContain.style.height = "auto";
					this.unreportedCommentContain.style.paddingTop = "25px";
					this.unreportedCommentContain.style.paddingBottom = "25px";
				}
				else if(this.unreportedCommentContain.style.height != "0px") {
					this.unreportedCommentContain.style.height = "0px";
					this.unreportedCommentContain.style.paddingTop = "0px";
					this.unreportedCommentContain.style.paddingBottom = "0px";
				}
	       	});
		}
	}

}
"use strict";

// Popup object
// ...
let popupObject = new Popup();

// Display the popup
popupObject.displayPopupBackoffice();



// Ticket object
// ...
let ticketObject = new Ticket();

// Display / Undisplay the addTicketContainer
ticketObject.addTicketContainer();

// Display / Undisplay the ticketListingContainer
ticketObject.ticketListingContainer();



// Comment object
// ...
let commentObject = new Comment(); 

// Display / Undisplay the reportCommentContainer
commentObject.reportCommentContainer();

// Display / Undisplay the unreportCommentContainer
commentObject.unreportCommentContainer();

// Front office, block the commentary of a user
commentObject.blockCommentaryUser();



// Account object
// ...
let accountObject = new Account();

// Display / Undisplay the informationContainer
accountObject.informationContainer();

// Display / Undisplay the creatContainer
accountObject.creatContainer();

// Display / Undisplay the managerContainer
accountObject.managerContainer();

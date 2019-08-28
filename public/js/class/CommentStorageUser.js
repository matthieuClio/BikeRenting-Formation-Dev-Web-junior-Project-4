"use strict";

class CommentStorageUser {
	
	constructor() {
	}

	commentStorage() {
		localStorage.setItem('comment', 'true');
	} // End function commentStorage
}

// Object
let storageObject = new CommentStorageUser();

// Create a localStorage
storageObject.commentStorage();
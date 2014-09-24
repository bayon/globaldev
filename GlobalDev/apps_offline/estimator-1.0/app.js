/////////      app-specific globally needed js   /////////////////////
var AppSpace = {};
window.indexedDB = window.indexedDB || window.webkitIndexedDB || window.mozIndexedDB;

if ('webkitIndexedDB' in window) {
	window.IDBTransaction = window.webkitIDBTransaction;
	window.IDBKeyRange = window.webkitIDBKeyRange;
}

AppSpace.indexedDB = {};
AppSpace.indexedDB.db = null;

AppSpace.indexedDB.onerror = function(e) {
	console.log(e);
};

AppSpace.indexedDB.open = function() {
	var version = 3;
	var request = indexedDB.open("tasks", version);
	request.onupgradeneeded = function(e) {
		var db = e.target.result;
		e.target.transaction.onerror = AppSpace.indexedDB.onerror;

		/////	 SET UP DB TABLES 	///////////////
		//---task
		if (db.objectStoreNames.contains("task")) {
			db.deleteObjectStore("task");
		}
		var store = db.createObjectStore("task", {
			keyPath : "timeStamp"
		});

		//---material
		if (db.objectStoreNames.contains("material")) {
			db.deleteObjectStore("material");
		}
		var store = db.createObjectStore("material", {
			keyPath : "timeStamp"
		});
		//---estimate
		if (db.objectStoreNames.contains("estimate")) {
			db.deleteObjectStore("estimate");
		}
		var store = db.createObjectStore("estimate", {
			keyPath : "timeStamp"
		});

		if (db.objectStoreNames.contains("taskForEstimate")) {
			db.deleteObjectStore("taskForEstimate");
		}
		var store = db.createObjectStore("taskForEstimate", {
			keyPath : "timeStamp"
		});

		if (db.objectStoreNames.contains("materialForEstimate")) {
			db.deleteObjectStore("materialForEstimate");
		}
		var store = db.createObjectStore("materialForEstimate", {
			keyPath : "timeStamp"
		});
		//----end TABLES
	};
	request.onsuccess = function(e) {
		AppSpace.indexedDB.db = e.target.result;
		//check if DB contians data
		if (AppSpace.indexedDB.db.objectStore.count()) {
			console.log("data count:" + AppSpace.indexedDB.db.objectStore.count());
			//--gather initial data
			AppSpace.indexedDB.getAllTasks();
			AppSpace.indexedDB.getAllMaterials();
		}
	};
	request.onerror = AppSpace.indexedDB.onerror;
};

function init() {
	AppSpace.indexedDB.open();
}

window.addEventListener("DOMContentLoaded", init, false);
window.isCompatible = function() {
	return ('indexedDB' in window || 'webkitIndexedDB' in window || 'mozIndexedDB' in window);
};
if (isCompatible() === false) {
	document.getElementById('notcompatible').className = '';
}
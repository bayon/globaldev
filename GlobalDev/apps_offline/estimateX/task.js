////// 	task specific  js ////////////////////
function addTask() {
	var task = document.getElementById("task");
	var time = document.getElementById("time");
	AppSpace.indexedDB.addTask(task.value, time.value);
	task.value = "";
	time.value = "";
}

AppSpace.indexedDB.addTask = function(taskText, timeValue) {
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["task"], "readwrite");
	var store = trans.objectStore("task");
	var data = {
		"text" : taskText,
		"minutes" : timeValue,
		"timeStamp" : new Date().getTime()
	};

	var request = store.put(data);

	trans.oncomplete = function(e) {
		AppSpace.indexedDB.getAllTaskItems();
	};

	request.onerror = function(e) {
		console.log("Error Adding: ", e);
	};
};

AppSpace.indexedDB.deleteTask = function(id) {
	//clear ui elements in list  
	$('#taskTBody').innerHTML = "";
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["task"], "readwrite");
	var store = trans.objectStore("task");

	var request = store.delete(id);

	trans.oncomplete = function(e) {
		AppSpace.indexedDB.getAllTaskItems();
	};

	request.onerror = function(e) {
		console.log("Error Adding: ", e);
	};
};

AppSpace.indexedDB.getAllTaskItems = function() {
	//clear UI
	var taskTBody = document.getElementById("taskTBody");
	taskTBody.innerHTML = "";
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["task"], "readwrite");
	var store = trans.objectStore("task");
	var keyRange = IDBKeyRange.lowerBound(0);
	var cursorRequest = store.openCursor(keyRange);

	cursorRequest.onsuccess = function(e) {
		var result = e.target.result;
		if (!!result == false)
			return;

		renderTask(result.value);
		result.continue();
	};

	cursorRequest.onerror = AppSpace.indexedDB.onerror;
};

function renderTask(row) {
	var text = row.text;
	var min = row.minutes;
	var tableRow = "<tr><td>" + text + "</td><td>" + min + "</td><td><a href='javascript:void();' onclick='deleteTask(" + row.timeStamp + ");' >DELETE</a> </td></tr>";
	$('#taskTBody').append(tableRow);
}

function deleteTask(timestamp) {
	AppSpace.indexedDB.deleteTask(timestamp);
}

function getAllTasks() {
	AppSpace.indexedDB.getAllTaskItems();
}

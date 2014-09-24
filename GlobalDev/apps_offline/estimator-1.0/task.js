////// 	task specific  js ////////////////////
function addTask() {
	var task = document.getElementById("task");
	var time = document.getElementById("time");
	AppSpace.indexedDB.addTask(task.value, time.value);
	task.value = "";
	time.value = "";
	document.getElementById("task").focus();
}

AppSpace.indexedDB.addTask = function(task, time) {
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["task"], "readwrite");
	var store = trans.objectStore("task");
	var data = {
		"task" : task,
		"time" : time,
		"timeStamp" : new Date().getTime()
	};

	var request = store.put(data);

	trans.oncomplete = function(e) {
		AppSpace.indexedDB.getAllTasks();
	};

	request.onerror = function(e) {
		console.log("Error Adding: ", e);
	};
};
function deleteTask(timestamp) {
	AppSpace.indexedDB.deleteTask(timestamp);
}
AppSpace.indexedDB.deleteTask = function(id) {
	//clear ui elements in list  
	$('#taskTBody').innerHTML = "";
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["task"], "readwrite");
	var store = trans.objectStore("task");

	var request = store.delete(id);

	trans.oncomplete = function(e) {
		AppSpace.indexedDB.getAllTasks();
	};

	request.onerror = function(e) {
		console.log("Error Adding: ", e);
	};
};
function getAllTasks() {
	AppSpace.indexedDB.getAllTasks();
}
AppSpace.indexedDB.getAllTasks = function() {
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
	var task = row.task;
	var time = row.time;
	var tableRow = "<tr><td>" + task + "</td><td>" + time + "</td><td><a href='javascript:void();' class='listAnchor minus' onclick='deleteTask(" + row.timeStamp + ");' >-</a> </td></tr>";
	$('#taskTBody').append(tableRow);
}


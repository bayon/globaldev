function getAllTasksForSelection() {
	AppSpace.indexedDB.getAllTasksForSelection();
}
AppSpace.indexedDB.getAllTasksForSelection = function() {
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
		renderTaskForSelection(result.value);
		result.continue();
	};
	cursorRequest.onerror = AppSpace.indexedDB.onerror;
};
function renderTaskForSelection(row) {
	var task = row.task;
	var time = row.time;
	var tableRow = "<tr id='" + row.timeStamp + "'><td class='data' >" + task + "</td><td class='data' >" + time + "</td><td><a href='javascript:void();' class='listAnchor plus' onclick='selectTaskForEstimate(" + row.timeStamp + ");' >+</a> </td></tr>";
	$('#taskTBody').append(tableRow);
}
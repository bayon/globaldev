function getAllMaterialsForSelection() {
	AppSpace.indexedDB.getAllMaterialsForSelection();
}
AppSpace.indexedDB.getAllMaterialsForSelection = function() {
	console.log("getAllMaterialsForSelection");
	//clear UI
	var materialTBody = document.getElementById("materialTBody");
	materialTBody.innerHTML = "";
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["material"], "readwrite");
	var store = trans.objectStore("material");
	var keyRange = IDBKeyRange.lowerBound(0);
	var cursorRequest = store.openCursor(keyRange);

	cursorRequest.onsuccess = function(e) {
		var result = e.target.result;
		if (!!result == false)
			return;
		renderMaterialForSelection(result.value);
		result.continue();
	};
	cursorRequest.onerror = AppSpace.indexedDB.onerror;
};
function renderMaterialForSelection(row) {
	var material = row.material;
	var cost = row.cost;
	var tableRow = "<tr id='" + row.timeStamp + "'><td class='data' >" + material + "</td><td class='data' >" + cost + "</td><td><a href='javascript:void();' class='listAnchor plus' onclick='selectMaterialForEstimate(" + row.timeStamp + ");' >+</a> </td></tr>";
	$('#materialTBody').append(tableRow);
}
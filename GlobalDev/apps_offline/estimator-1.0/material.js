////// 	material specific  js ////////////////////
function addMaterial() {
	var material = document.getElementById("material");
	var cost = document.getElementById("cost");
	AppSpace.indexedDB.addMaterial(material.value, cost.value);
	material.value = "";
	cost.value = "";
	document.getElementById("material").focus();
}

AppSpace.indexedDB.addMaterial = function(material, cost) {
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["material"], "readwrite");
	var store = trans.objectStore("material");
	var data = {
		"material" : material,
		"cost" : cost,
		"timeStamp" : new Date().getTime()
	};

	var request = store.put(data);

	trans.oncomplete = function(e) {
		AppSpace.indexedDB.getAllMaterials();
	};

	request.onerror = function(e) {
		console.log("Error Adding: ", e);
	};
};
function deleteMaterial(timestamp) {
	AppSpace.indexedDB.deleteMaterial(timestamp);
}
AppSpace.indexedDB.deleteMaterial = function(id) {
	//clear ui elements in list  
	$('#materialTBody').innerHTML = "";
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["material"], "readwrite");
	var store = trans.objectStore("material");

	var request = store.delete(id);

	trans.oncomplete = function(e) {
		AppSpace.indexedDB.getAllMaterials();
	};

	request.onerror = function(e) {
		console.log("Error Adding: ", e);
	};
};
function getAllMaterials() {
	AppSpace.indexedDB.getAllMaterials();
}
AppSpace.indexedDB.getAllMaterials = function() {
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

		renderMaterial(result.value);
		result.continue();
	};

	cursorRequest.onerror = AppSpace.indexedDB.onerror;
};

function renderMaterial(row) {
	var material = row.material;
	var cost = row.cost;
	var tableRow = "<tr><td>" + material + "</td><td>" + cost + "</td><td><a href='javascript:void();' class='listAnchor minus' onclick='deleteMaterial(" + row.timeStamp + ");' >-</a> </td></tr>";
	$('#materialTBody').append(tableRow);
}





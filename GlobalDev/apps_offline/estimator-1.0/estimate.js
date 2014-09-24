////// 	estimate specific  js ////////////////////
function addEstimate() {
	console.log("addEstimate() ");
	var estimate = document.getElementById("estimate");
	var hourlyRate = document.getElementById("hourlyRate");
	AppSpace.indexedDB.addEstimate(estimate.value,hourlyRate.value);
	estimate.value = "";
	hourlyRate.value="";
}

AppSpace.indexedDB.addEstimate = function(estimate,hourlyRate ) {
	console.log("asynch addEstimate() ");
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["estimate"], "readwrite");
	var store = trans.objectStore("estimate");
	var data = {
		"estimate" : estimate,
		"hourlyRate":hourlyRate,
		"timeStamp" : new Date().getTime()
	};
	var request = store.put(data);
	trans.oncomplete = function(e) {
		AppSpace.indexedDB.getAllEstimates();
	};
	request.onerror = function(e) {
		console.log("Error Adding: ", e);
	};
};
function deleteEstimate(timestamp) {
	AppSpace.indexedDB.deleteEstimate(timestamp);
}
AppSpace.indexedDB.deleteEstimate = function(id) {
	//clear ui elements in list  
	$('#estimateTBody').innerHTML = "";
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["estimate"], "readwrite");
	var store = trans.objectStore("estimate");
	var request = store.delete(id);
	trans.oncomplete = function(e) {
		AppSpace.indexedDB.getAllEstimates();
	};
	request.onerror = function(e) {
		console.log("Error Adding: ", e);
	};
};

function getAllEstimates() {
	AppSpace.indexedDB.getAllEstimates();
}
AppSpace.indexedDB.getAllEstimates = function() {
	//clear UI
	var estimateTBody = document.getElementById("estimateTBody");
	estimateTBody.innerHTML = "";
	//get data
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["estimate"], "readwrite");
	var store = trans.objectStore("estimate");
	var keyRange = IDBKeyRange.lowerBound(0);
	var cursorRequest = store.openCursor(keyRange);
	cursorRequest.onsuccess = function(e) {
		var result = e.target.result;
		if (!!result == false)
			return;
		renderAllEstimates(result.value);
		result.continue();
	};
	cursorRequest.onerror = AppSpace.indexedDB.onerror;
};

function selectEstimate(timestamp) {
	AppSpace.indexedDB.selectEstimate(timestamp);
}

AppSpace.indexedDB.selectEstimate = function(id) {
	console.log("fn AppSpace.indexedDB.selectEstimate" + id);
	var db = AppSpace.indexedDB.db;
	var transaction = db.transaction(["estimate"]);
	var objectStore = transaction.objectStore("estimate");
	var request = objectStore.get(id);
	request.onerror = function(e) {
		// Handle errors!
		alert("fail");
	};
	request.onsuccess = function(e) {
		var result = request.result;
		renderSelectedEstimate(result);
	};
}; 

function renderAllEstimates(row) {
	$('#estimateSelected').empty();
	hideTasksAndMaterials();
	var estimate = row.estimate;
	var hourlyRate = row.hourlyRate;
	var tableRow = "<tr><td>" + estimate + "</td>"+
	"<td>" + hourlyRate + "</td>"+
	"<td><a href='javascript:void();' class='listAnchor minus' onclick='deleteEstimate(" + row.timeStamp + ");' >-</a> </td>"+
	"<td><a href='javascript:void();' class='listAnchor plus' onclick='selectEstimate(" + row.timeStamp + ");' >+</a> </td>"+
	"</tr>";
	$('#estimateTBody').append(tableRow);
}
function renderSelectedEstimate(row) {
	$('#estimateTHead').css("display","none");
	$('#estimateTBody').empty();
	$('#estimateSelected').empty();
	var estimate = row.estimate;
	var hourlyRate= row.hourlyRate;
	var ratePerMinute =  (hourlyRate/60).toFixed(2);
	var id = row.timeStamp;
	var selectedEstimate = "<h3>" + estimate +"-"+id+"</h3><span class='code_location'>estimate.js renderSelectedEstimate()</span>";
	//------ sessionStorage----------------- 
	sessionStorage.setItem('estimate_id',id);
	sessionStorage.setItem('hourlyRate',hourlyRate);
	sessionStorage.setItem('ratePerMinute',ratePerMinute);
	sessionStorage.setItem('taxRate',.05); // HARD CODED TAX RATE. !!!
	selectedEstimate +="<table class='estimateTable' border=1 width=100% >";
	selectedEstimate +="<tr>";
	selectedEstimate +="<td>";
	selectedEstimate +="<button onclick='enableTaskSelection("+id+");' class='action_btn' >     + task			</button>";
	selectedEstimate +="<button onclick='enableMaterialSelection("+id+");' class='action_btn' > + material		</button>";
	selectedEstimate +="<button onclick='showSelectedTasks("+id+");' class='action_btn' >       current tasks  		</button>";
	selectedEstimate +="<button onclick='showSelectedMaterials("+id+");' class='action_btn' >   current materials	</button>";
		selectedEstimate +="<button onclick='calculateEntireEstimate("+id+");' class='action_btn' >   calc est	</button>";

	selectedEstimate +="</td>";
	selectedEstimate +="</tr>";
	selectedEstimate +="</table>";
	$('#estimateSelected').append(selectedEstimate);
}

////	Add Tasks and Materials to Estimate  //
function enableTaskSelection(id){
	hideTasksAndMaterials();
	console.log("enableTaskSelection"+id);
	getAllTasksForSelection();
	$('#taskSelection').css("display","block");
}
function enableMaterialSelection(id){
	hideTasksAndMaterials();
	console.log("enableMaterialSelection"+id);
	getAllMaterialsForSelection();
	$('#materialSelection').css("display","block");
}
function showSelectedTasks(id){
	hideTasksAndMaterials();
	console.log("showSelectedTasks"+id);
	//getAllTasksForEstimate();
	getTasksByEstimateID();
	$('#selectedTasks').css("display","block");
}
function showSelectedMaterials(id){
	hideTasksAndMaterials();
	console.log("showSelectedMaterials"+id);
	getMaterialsByEstimateID();
	$('#selectedMaterials').css("display","block");
}
function hideTasksAndMaterials(){
	$('#taskSelection').css("display","none");
	$('#materialSelection').css("display","none");
	$('#selectedTasks').css("display","none");
	$('#selectedMaterials').css("display","none");
}
function calculateEntireEstimate(id){
	console.log("calculateEntireEstimate() for id:" + id);
	//plan overview: add current task subtotals and current material subtotals
	//create view: sumForEstimate.php which should combine needed tables from both similar components. 
	//use as template:
	//materialForEstimate.js
		//getMaterialByEstimateID() : in the loop just calculate the sums then ONLY render ONCE.
		//*rename: sumMaterialByEstimateID
		//renderMaterialsForEstimate()
		//*rename: renderSumMaterialsForEstimate() display just sum of subtotals
		
		//* and for tasks: show just time subtotal and cost subtotal.
		//if user "Finalizes" the quote...save these values and their sums to estimate table.
		//define what "finalize means beyond that..."
	hideTasksAndMaterials();
	console.log("calculateEntireEstimate"+id);
	sumMaterialsByEstimateID();
	sumTasksByEstimateID();
	
	$('#sumEstimate').css("display","block");
	
}

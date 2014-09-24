//----- MATERIALS------------------------------------------------	
function sumMaterialsByEstimateID() {
	AppSpace.indexedDB.sumMaterialsByEstimateID();
}
AppSpace.indexedDB.sumMaterialsByEstimateID = function() {
	console.log('sumMaterialsByEstimateID'+ sessionStorage.getItem('estimate_id'));
	 //clear UI
	var materialForEstimateTBody = document.getElementById("materialTBodyForEstimate");
	materialForEstimateTBody.innerHTML = "";
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["materialForEstimate"], "readwrite");
	var store = trans.objectStore("materialForEstimate"); 
	var keyRange = IDBKeyRange.lowerBound(0);
	var cursorRequest = store.openCursor(keyRange);
	//clear out session storage variable
	sessionStorage.setItem('materialSubtotal',0);
	cursorRequest.onsuccess = function(e) {
		var result = e.target.result;
		if (!!result == false)
			return;
			//USES sessionSTORAGE to get PRIMARY KEY 
		if(result.value.est_id == sessionStorage.getItem('estimate_id')){
			//calc sums here
			console.log('calculate sums here with:'+result.value.costSubtotal);
			var currentValue = sessionStorage.getItem('materialSubtotal');
			var sumValue = parseFloat(currentValue) + parseFloat(result.value.costSubtotal); 
			sessionStorage.setItem('materialSubtotal',sumValue);
		}
		renderSumMaterialForEstimate();
		result.continue();
		// a render here repeats with each iteration
	};
	// a render here occurs BEFORE the data has been provided.
	cursorRequest.onerror = AppSpace.indexedDB.onerror;
};
 
function renderSumMaterialForEstimate() {
//NOTE: Instead of *row make SURE we have array of subtotals or at least multiple params
	console.log('renderSumMaterialForEstimate'+sessionStorage.getItem('materialSubtotal'));
	var costSubtotal = sessionStorage.getItem('materialSubtotal');
	$('#matSum').val("$"+costSubtotal);
}

//----- TASKS------------------------------------------------	
function sumTasksByEstimateID() {
	AppSpace.indexedDB.sumTasksByEstimateID();
}
AppSpace.indexedDB.sumTasksByEstimateID = function() {
	console.log('sumTasksByEstimateID'+ sessionStorage.getItem('estimate_id'));
	 //clear UI
	var taskForEstimateTBody = document.getElementById("taskTBodyForEstimate");
	taskForEstimateTBody.innerHTML = "";
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["taskForEstimate"], "readwrite");
	var store = trans.objectStore("taskForEstimate"); 
	var keyRange = IDBKeyRange.lowerBound(0);
	var cursorRequest = store.openCursor(keyRange);
	//clear out session storage variable
	sessionStorage.setItem('taskCostSubtotal',0);
	sessionStorage.setItem('taskTimeSubtotal',0);
	cursorRequest.onsuccess = function(e) {
		var result = e.target.result;
		if (!!result == false)
			return;
			//USES sessionSTORAGE to get PRIMARY KEY 
		if(result.value.est_id == sessionStorage.getItem('estimate_id')){
			//calc sums here
			console.log('calculate sums here with:'+result.value.subCost);
			var currentCostValue = sessionStorage.getItem('taskCostSubtotal');
			var sumCostValue = parseFloat(currentCostValue) + parseFloat(result.value.subCost); 
			sessionStorage.setItem('taskCostSubtotal',sumCostValue.toFixed(2));
			
			
			var currentTimeValue = sessionStorage.getItem('taskTimeSubtotal');
			var sumTimeValue = parseFloat(currentTimeValue) + parseFloat(result.value.timeSubtotal); 
			sessionStorage.setItem('taskTimeSubtotal',sumTimeValue);
			
			
			
		}
		result.continue();
		// a render here repeats with each iteration
		renderSumTaskForEstimate();
	};
	// a render here occurs BEFORE the data has been provided.
	cursorRequest.onerror = AppSpace.indexedDB.onerror;
};

function renderSumTaskForEstimate() {
//NOTE: Instead of *row make SURE we have array of subtotals or at least multiple params
	console.log('renderSumTaskForEstimate'+sessionStorage.getItem('taskCostSubtotal'));
	var costTaskSubtotal = sessionStorage.getItem('taskCostSubtotal');
	$('#taskCostSum').val("$"+costTaskSubtotal);
	
	var minTaskTotal = sessionStorage.getItem('taskTimeSubtotal');
	var hours = (minTaskTotal/60).toFixed(2);
	
	$('#taskTimeSum').val(hours+" hours");
	
	var totalCost = parseFloat(sessionStorage.getItem('materialSubtotal')) + parseFloat(sessionStorage.getItem('taskCostSubtotal'));
	$('#estTotal').val("$ "+totalCost);
	
}
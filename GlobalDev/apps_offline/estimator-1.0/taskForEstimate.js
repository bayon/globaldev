////// 	taskForEstimate specific  js //////////////////// 
function addTaskForEstimate(taskForEstimate,time,task_id,est_id,subCost) {
	console.log("addTaskForEstimate");
	AppSpace.indexedDB.addTaskForEstimate(taskForEstimate,time,task_id,est_id,subCost);
}

AppSpace.indexedDB.addTaskForEstimate = function(taskForEstimate, time,task_id,est_id,subCost) {
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["taskForEstimate"], "readwrite");
	var store = trans.objectStore("taskForEstimate");
	var data = {
		"taskForEstimate" : taskForEstimate,
		"time" : time,
		"task_id":task_id,
		"est_id":est_id,
		"numberOf":1,
		"timeSubtotal" : time,
		"subCost" :subCost,
		"timeStamp" : new Date().getTime()
	};
	var request = store.put(data);
	trans.oncomplete = function(e) {
		AppSpace.indexedDB.getTasksByEstimateID();
	};
	request.onerror = function(e) {
		console.log("Error Adding: ", e);
	};
};
function deleteTaskForEstimate(timestamp) {
	AppSpace.indexedDB.deleteTaskForEstimate(timestamp);
}
AppSpace.indexedDB.deleteTaskForEstimate = function(id) {
	//clear ui elements in list  
	$('#taskTBodyForEstimate').innerHTML = "";
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["taskForEstimate"], "readwrite");
	var store = trans.objectStore("taskForEstimate");
	var request = store.delete(id);
	trans.oncomplete = function(e) {
		AppSpace.indexedDB.getTasksByEstimateID();
	};
	request.onerror = function(e) {
		console.log("Error Adding: ", e);
	};
};
 
function getTasksByEstimateID() {
	AppSpace.indexedDB.getTasksByEstimateID();
}
AppSpace.indexedDB.getTasksByEstimateID = function() {
	console.log('getTasksByEstimateID'+ sessionStorage.getItem('estimate_id'));
	 //clear UI
	var taskForEstimateTBody = document.getElementById("taskTBodyForEstimate");
	taskForEstimateTBody.innerHTML = "";
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["taskForEstimate"], "readwrite");
	var store = trans.objectStore("taskForEstimate"); 
	var keyRange = IDBKeyRange.lowerBound(0);
	var cursorRequest = store.openCursor(keyRange);
	cursorRequest.onsuccess = function(e) {
		var result = e.target.result;
		if (!!result == false)
			return;
			//USES sessionSTORAGE to get PRIMARY KEY 
		if(result.value.est_id == sessionStorage.getItem('estimate_id')){
			renderTaskForEstimate(result.value);
		}
		result.continue();
	};
	cursorRequest.onerror = AppSpace.indexedDB.onerror;
};
 
function renderTaskForEstimate(row) {
	var taskForEstimate = row.taskForEstimate;
	var time = row.time;
	var numberOf = row.numberOf;
	var timeSubtotal = row.timeSubtotal; 
	var id = row.timeStamp ;
	var costSubtotal = row.subCost; 
	var tableRow = "<tr id='" + id + "' >"+
	"<td><input class='data data_text' type='text' disabled value='" + taskForEstimate + "' /></td>"+
	"<td><input class='data data_number'  id='time' value='" + time + "' disabled /></td>"+
	"<td><input class='data data_number'  id='numberOf' 	type='number' onchange='calculateTaskSubtotals(" + id + ");' value='" + numberOf + "'/></td>"+
	"<td><input class='data data_number'  id='timeSubtotal' type='number' value='" + timeSubtotal + "' disabled /></td>"+
	"<td><input class='data data_number'  id='costSubtotal' type='number' value='" + costSubtotal + "' disabled /></td>"+
	"<td>"+
		"<button class='action_btn' onclick='updateTaskForEstimate(" + row.timeStamp + ");' >save</button>"+
		"<button class='action_btn' onclick='deleteTaskForEstimate(" + row.timeStamp + ");' >-</button>"+
	" </td>"+"</tr>";
	$('#taskTBodyForEstimate').append(tableRow);
}
function calculateTaskSubtotals(id){
	var numberOf = $('#'+id+' #numberOf').val();
	var time = $('#'+id+' #time').val();
	var subtotal = numberOf*time;
	$('#'+id+' #timeSubtotal').val(subtotal);
	var costSubtotal =  (subtotal * sessionStorage.getItem('ratePerMinute')).toFixed(2);
	$('#'+id+' #costSubtotal').val(costSubtotal);
}

function selectTaskForEstimate(task_id){
	  var table = $("#taskTBody");
	  table.find('#'+task_id).each(function (i, el) {
        var $tds = $(this).find('td'),
            task = $tds.eq(0).text(),
            time = $tds.eq(1).text();
        var taskForEstimate =task;
    	var estimate_id =sessionStorage.getItem('estimate_id');
    	var subCost = (time*sessionStorage.getItem('ratePerMinute')).toFixed(2);
		addTaskForEstimate(taskForEstimate,time,task_id,estimate_id,subCost) ;
    }); 
}

function updateTaskForEstimate(id) {
	var taskForEstimate;
	var time;
	var numberOf;
	var timeSubtotal;
	$.each($("#" + id + " .data"), function(i, e) {
		console.log(i+e.value);
		switch(i) {
		case 0:
		taskForEstimate = e.value;
		break;
		case 1:
		time = e.value;
		break;
		case 2:
		numberOf = e.value;
		break;
		case 3:
		timeSubtotal = e.value;
		break;
		case 4:
		subCost = e.value;
		break;
		default:
		//default code block
		}
	});
	updateTaskByKey(id,numberOf,timeSubtotal,subCost) ;
}

function updateTaskByKey(key,numberOf,timeSubtotal,subCost) {
	console.log("updateTaskByKey()");
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["taskForEstimate"], "readwrite");
	var store = trans.objectStore("taskForEstimate");
	console.log("PARAMS:"+key+"--"+numberOf+"--"+timeSubtotal+"--"+subCost+"--");
  	store.get(key).onsuccess = function (e) {
    console.log("store.get", key);
    var data = e.target.result;
    if (!data) {
      console.log("nothing matched.");
      return;
    }
    data.numberOf = numberOf;
    data.timeSubtotal = timeSubtotal;
    data.subCost = subCost;
    var request = store.put(data);
    request.onsuccess = function (e) {
      console.log("put success!");
    };
    request.onerror = function (e) {
      console.log("put error!");
    };
  };
}
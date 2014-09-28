////// 	materialForEstimate specific  js ////////////////////
function addMaterialForEstimate(materialForEstimate,cost,material_id,est_id,totCost) {
	console.log("addMaterialForEstimate");
	AppSpace.indexedDB.addMaterialForEstimate(materialForEstimate,cost,material_id,est_id,totCost);
}

AppSpace.indexedDB.addMaterialForEstimate = function(materialForEstimate, cost,material_id,est_id,totCost) {
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["materialForEstimate"], "readwrite");
	var store = trans.objectStore("materialForEstimate");
	var data = {
		"materialForEstimate" : materialForEstimate,
		"cost" : cost,
		"material_id":material_id,
		"est_id":est_id,
		"numberOf":1,
		"subtotal" : cost,
		"totCost" :totCost,
		"timeStamp" : new Date().getTime()
	};
	var request = store.put(data);
	trans.oncomplete = function(e) {
		AppSpace.indexedDB.getMaterialsByEstimateID();
	};
	request.onerror = function(e) {
		console.log("Error Adding: ", e);
	};
};
function deleteMaterialForEstimate(timestamp) {
	AppSpace.indexedDB.deleteMaterialForEstimate(timestamp);
}
AppSpace.indexedDB.deleteMaterialForEstimate = function(id) {
	//clear ui elements in list  
	$('#materialTBodyForEstimate').innerHTML = "";
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["materialForEstimate"], "readwrite");
	var store = trans.objectStore("materialForEstimate");
	var request = store.delete(id);
	trans.oncomplete = function(e) {
		AppSpace.indexedDB.getMaterialsByEstimateID();
	};
	request.onerror = function(e) {
		console.log("Error Adding: ", e);
	};
};
 
function getMaterialsByEstimateID() {
	AppSpace.indexedDB.getMaterialsByEstimateID();
}
AppSpace.indexedDB.getMaterialsByEstimateID = function() {
	console.log('getMaterialsByEstimateID'+ sessionStorage.getItem('estimate_id'));
	 //clear UI
	var materialForEstimateTBody = document.getElementById("materialTBodyForEstimate");
	materialForEstimateTBody.innerHTML = "";
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["materialForEstimate"], "readwrite");
	var store = trans.objectStore("materialForEstimate"); 
	var keyRange = IDBKeyRange.lowerBound(0);
	var cursorRequest = store.openCursor(keyRange);
	cursorRequest.onsuccess = function(e) {
		var result = e.target.result;
		if (!!result == false)
			return;
			//USES sessionSTORAGE to get PRIMARY KEY 
		if(result.value.est_id == sessionStorage.getItem('estimate_id')){
			renderMaterialForEstimate(result.value);
		}
		result.continue();
	};
	cursorRequest.onerror = AppSpace.indexedDB.onerror;
};
 
function renderMaterialForEstimate(row) {
	var materialForEstimate = row.materialForEstimate;
	var cost = row.cost;
	var numberOf = row.numberOf;
	var subtotal = row.subtotal; 
	var id = row.timeStamp ;
	//var costSubtotal = parseFloat(subtotal) + parseFloat((subtotal * sessionStorage.getItem('taxRate'))) ;
	var costSubtotal = row.costSubtotal;
	var tableRow = "<tr id='" + id + "' >"+
	"<td><input class='data ' type='text' disabled value='" + materialForEstimate + "' /></td>"+
	"<td><input class='data data_number'  id='cost' value='" + cost + "' disabled  title='cost per unit' /></td>"+
	"<td><input class='data data_number'  id='numberOf' 	type='number' onchange='calculateMaterialSubtotals(" + id + ");' value='" + numberOf + "' title='number of units needed'/></td>"+
	"<td><input class='data data_number'  id='costSubtotal' type='number' value='" + costSubtotal + "' disabled title='cost per unit times number needed'/></td>"+
	"<td>"+
		"<button class='action_btn' onclick='updateMaterialForEstimate(" + row.timeStamp + ");' >	save	</button>"+
		"<button class='action_btn' onclick='deleteMaterialForEstimate(" + row.timeStamp + ");' >	-		</button>"+
	" </td>"+"</tr>";
	$('#materialTBodyForEstimate').append(tableRow);
}
function calculateMaterialSubtotals(id){
	var numberOf = $('#'+id+' #numberOf').val();
	var cost = $('#'+id+' #cost').val();
	var subtotal = numberOf*cost;
	$('#'+id+' #costSubtotal').val(subtotal);
	var costSubtotal = subtotal + (subtotal * sessionStorage.getItem('taxRate')) ;
	//TAX RATE THEN BACK
	$('#'+id+' #costSubtotal').val(costSubtotal);
}

function selectMaterialForEstimate(material_id){
	  var table = $("#materialTBody");
	  table.find('#'+material_id).each(function (i, el) {
        var $tds = $(this).find('td'),
            material = $tds.eq(0).text(),
            cost = $tds.eq(1).text();
        var materialForEstimate =material;
    	var estimate_id =sessionStorage.getItem('estimate_id');
    	//var totCost = (cost*sessionStorage.getItem('ratePerMinute')).toFixed(2);
    	var totCost = parseFloat(cost) + parseFloat((cost * sessionStorage.getItem('taxRate'))) ;
		addMaterialForEstimate(materialForEstimate,cost,material_id,estimate_id,totCost) ;
    }); 
}

function updateMaterialForEstimate(id) {
	var materialForEstimate;
	var cost;
	var numberOf;
	var costSubtotal;
	$.each($("#" + id + " .data"), function(i, e) {
		switch(i) {
		case 0:
		materialForEstimate = e.value;
		break;
		case 1:
		cost = e.value;
		break;
		case 2:
		numberOf = e.value;
		break;
		case 3:
		totCost = e.value;
		break;
		default:
		//default code block
		}
	});
	updateByKey(id,numberOf,totCost) ;
}

function updateByKey(key,numberOf,costSubtotal,totCost) {
	var db = AppSpace.indexedDB.db;
	var trans = db.transaction(["materialForEstimate"], "readwrite");
	var store = trans.objectStore("materialForEstimate");
  store.get(key).onsuccess = function (e) {
    console.log("store.get", key);
    var data = e.target.result;
    if (!data) {
      console.log("nothing matched.");
      return;
    }
    data.numberOf = numberOf;
    data.costSubtotal = costSubtotal;
    data.totCost = totCost;
    var request = store.put(data);
    request.onsuccess = function (e) {
      console.log("put success!");
    };
    request.onerror = function (e) {
      console.log("put error!");
    };
  };
}
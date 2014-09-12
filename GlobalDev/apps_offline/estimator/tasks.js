document.getElementById('btn_add').onclick = function (e) {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  add({ name: name, email: email});
   
};
 
// add data
function add(o) {
  var tx = db.transaction(["tasks"], "readwrite");
  var store = tx.objectStore("tasks");
  // add 'created' param
  o.created = new Date();
  // add to store
  var request = store.add(o);
  request.onsuccess = function (e) {
    console.log("Add 'task' successful! task=" + JSON.stringify(o));
   
  };
  request.onerror = function (e) {
    console.log("Add error", e.target.error.name);
  };
}
//used to just be row
function renderTask(key,value) {
	 
	  
	return "<tr> <td>" +value["name"]+ "</td><td>" + value["email"] + " </td><td><a href='javascript:void(0);' style='color:red;'  onclick='deleteByKey(" + value['email'] + ")'>X</a></td></tr>";
}
 // find all
function findAll() {
  var tx = db.transaction(["tasks"], "readonly");
  var objectStore = tx.objectStore("tasks");
  var cursor = objectStore.openCursor();
	$('#taskListBody').empty(); //prevents duplication of rows
  cursor.onsuccess = function (e) {
  	var rowOutput = "";
	var taskListBody = document.getElementById("taskListBody");
    
    
    var res = e.target.result;
    if(!!res == false)
      return;
    
      console.log("key", res.key);
      console.log("value", res.value);
      rowOutput += renderTask(res.key,res.value);
      res.continue ();
    
      $('#taskListBody').append(rowOutput);
  };
}
function deleteByKey(key){
  var tx = db.transaction(["tasks"], "readwrite");
  var store = tx.objectStore("tasks");
  var request = store.delete(key);
  tx.oncomplete = function(e) {
  	alert('deleeeting...key ?'+ key );
    console.log('complete delete now refresh screen?');
  };

  tx.onerror = function(e) {
    console.log(e);
  };
  
}
 
/*
 * function loadTaskItems(tx, rs) {
	var rowOutput = "<tr><th>Task</th><th title='Time to complete once.'>Minutes</th><th>Action</th></tr>";
	var taskList = document.getElementById("taskList");
	for (var i = 0; i < rs.rows.length; i++) {
		rowOutput += renderTask(rs.rows.item(i));
	}
	taskList.innerHTML = rowOutput;
}

function renderTask(row) {
	return "<tr> <td>" + row.task + "</td><td>" + row.minutes + " </td><td><a href='javascript:void(0);' style='color:red;'  onclick='taskNameSpace.webdb.deleteTask(" + row.ID + ");'>X</a></td></tr>";
}
 */
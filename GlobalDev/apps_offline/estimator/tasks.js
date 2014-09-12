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
    console.log("Add 'person' successful! person=" + JSON.stringify(o));
   
  };
  request.onerror = function (e) {
    console.log("Add error", e.target.error.name);
  };
}
 
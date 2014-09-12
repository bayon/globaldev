var db = null;
var DBNAME = "estimate_db";
var DBVER = 11;

//document.getElementById('btn_open').onclick = function (e) {
 // openDB();
//};
/*
document.getElementById('btn_add').onclick = function (e) {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  add({ name: name, email: email});
};
document.getElementById('btn_find').onclick = function (e) {
  var key = document.getElementById('key').value;
  findByKey(key);
};
document.getElementById('btn_findAll').onclick = function (e) {
  findAll();
};
document.getElementById('btn_findByRange').onclick = function (e) {
  findByRange("A", "C");
};
document.getElementById('btn_remove').onclick = function (e) {
  var key = document.getElementById('key4remove').value;
  removeByKey(key);
};
document.getElementById('btn_update').onclick = function (e) {
  var key = document.getElementById('key4update').value;
  updateByKey(key);
};
document.getElementById('btn_deleteDB').onclick = function (e) {
  deleteDB(DBNAME);
};

*/
// open a database
function openDB_global() {
  var request = indexedDB.open(DBNAME, DBVER);
console.log('fn openDB_global');
  request.onupgradeneeded = function (e) {
    console.log("Upgrading...");
    var thisDB = e.target.result;
    var store = null;
    if (!thisDB.objectStoreNames.contains("estimates")) {
      // create objectStore as keyPath="email"
      store = thisDB.createObjectStore("estimates", {
        keyPath: "email"
      });
      //thisDB.createObjectStore("estimate", { autoIncrement: true });
      // create index to 'name' for conditional search
      store.createIndex('name', 'name', {
        unique: false
      });
      //store.deleteIndex('name');
    }
    //
     if (!thisDB.objectStoreNames.contains("materials")) {
      // create objectStore as keyPath="email"
      store = thisDB.createObjectStore("materials", {
        keyPath: "email"
      });
      //thisDB.createObjectStore("materials_db", { autoIncrement: true });
      
      // create index to 'name' for conditional search
      store.createIndex('name', 'name', {
        unique: false
      });
      //store.deleteIndex('name');
    }
    //
     if (!thisDB.objectStoreNames.contains("tasks")) {
      // create objectStore as keyPath="email"
      store = thisDB.createObjectStore("tasks", {
        keyPath: "email"
      });
      //thisDB.createObjectStore("tasks", { autoIncrement: true });
      
      // create index to 'name' for conditional search
      store.createIndex('name', 'name', {
        unique: false
      });
      //store.deleteIndex('name');
    }
    
  };

  request.onsuccess = function (e) {
    console.log("openDB success!");
    db = e.target.result;
  };

  request.onerror = function (e) {
    console.log("openDB error");
  };
}

// delete db
function deleteDB(dbname) {
  var request = indexedDB.deleteDatabase(dbname);
  request.onsuccess = function (e) {
    console.log("deleteDB success!");
  };
  request.onerror = function (e) {
    console.log("deleteDB error!");
  };
}
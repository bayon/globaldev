var db = null;
var DBNAME = "estimate_db";
var DBVER = 3;
// L E F T   O F F   H E R E  

//change people_db to "estimate_db"  THROUGH WHOLE APP....
//in openDB change table to "materials"
//change key to autoincrement or timestamp
//add function change table to "materials"
// findAll table to "materials"...

//document.getElementById('btn_open').onclick = function (e) {
 // openDB();
//};
document.getElementById('btn_add').onclick = function (e) {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  add({ name: name, email: email});
};
/*
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
function openDB() {
  var request = indexedDB.open(DBNAME, DBVER);

  

  request.onsuccess = function (e) {
    console.log("openDB success!");
    db = e.target.result;
  };

  request.onerror = function (e) {
    console.log("openDB error");
  };
}

// add data
function add(o) {
  var tx = db.transaction(["materials"], "readwrite");
  var store = tx.objectStore("materials");
  // add 'created' param
  o.created = new Date();
  // add to store
  var request = store.add(o);
  request.onsuccess = function (e) {
    console.log("Add 'person' successful! person=" + JSON.stringify(o));
    findAll();
  };
  request.onerror = function (e) {
    console.log("Add error", e.target.error.name);
  };
}

// find by key(email)
function findByKey(key) {
  var tx = db.transaction(["materials"], "readonly");
  var store = tx.objectStore("materials");
  var request = store.get(key);
  request.onsuccess = function (e) {
    console.log(e.target.result);
  };
}

// find all
function findAll() {
  var tx = db.transaction(["materials"], "readonly");
  var objectStore = tx.objectStore("materials");
  var cursor = objectStore.openCursor();

  cursor.onsuccess = function (e) {
    var res = e.target.result;
    if (res) {
      console.log("key", res.key);
      console.log("value", res.value);
      res.
      continue ();
    }
  };
}

// find by range
function findByRange(from, to) {
  var tx = db.transaction(["materials"], "readonly");
  var objectStore = tx.objectStore("materials");
  // find by range. condition: from <= 'name' < to 
  var range = IDBKeyRange.bound(from, to, false, true);
  var cursor = objectStore.index('name').openCursor(range);

  cursor.onsuccess = function (e) {
    var res = e.target.result;
    if (res) {
      console.log("key", res.key);
      console.log("value", res.value);
      res.continue();
    }
  };
}

// remove by key(email)
function removeByKey(key) {
  var tx = db.transaction(["materials"], "readwrite");
  var store = tx.objectStore("materials");
  var request = store.delete(key);
  //var request = store.clear(); // delete all from the store
  request.onsuccess = function (e) {
    // calls even when nothing to remove.
    console.log("removeByKey success!");
  };
  request.onerror = function (e) {
    console.log("removeByKey error!");
  };
}

// update by key(email)
function updateByKey(key) {
  var tx = db.transaction(["materials"], "readwrite");
  var store = tx.objectStore("materials");
  store.get(key).onsuccess = function (e) {
    console.log("store.get", key);
    var data = e.target.result;
    if (!data) {
      console.log("nothing matched.");
      return;
    }
    // modify 'name' to upperCase
    data.name = data.name.toUpperCase();
    var request = store.put(data);
    request.onsuccess = function (e) {
      console.log("put success!");
    };
    request.onerror = function (e) {
      console.log("put error!");
    };
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
var db = null;
var DBNAME = "estimate_db";
var DBVER = 3;

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
function openDB() {
  var request = indexedDB.open(DBNAME, DBVER);

  request.onupgradeneeded = function (e) {
    console.log("Upgrading...");
    var thisDB = e.target.result;
    var store = null;
    if (!thisDB.objectStoreNames.contains("estimates")) {
      // create objectStore as keyPath="email"
      store = thisDB.createObjectStore("estimates", {
        keyPath: "email"
      });
      //thisDB.createObjectStore("estimates", { autoIncrement: true });
      
      // create index to 'name' for conditional search
      store.createIndex('name', 'name', {
        unique: false
      });
      //store.deleteIndex('name');
    }
    
    
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
    
     if (!thisDB.objectStoreNames.contains("materials")) {
      // create objectStore as keyPath="email"
      store = thisDB.createObjectStore("materials", {
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

// add data
function add(o) {
  var tx = db.transaction(["estimates"], "readwrite");
  var store = tx.objectStore("estimates");
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

// find by key(email)
function findByKey(key) {
  var tx = db.transaction(["estimates"], "readonly");
  var store = tx.objectStore("estimates");
  var request = store.get(key);
  request.onsuccess = function (e) {
    console.log(e.target.result);
  };
}

// find all
function findAll() {
  var tx = db.transaction(["estimates"], "readonly");
  var objectStore = tx.objectStore("estimates");
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
  var tx = db.transaction(["estimates"], "readonly");
  var objectStore = tx.objectStore("estimates");
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
  var tx = db.transaction(["estimates"], "readwrite");
  var store = tx.objectStore("estimates");
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
  var tx = db.transaction(["estimates"], "readwrite");
  var store = tx.objectStore("estimates");
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
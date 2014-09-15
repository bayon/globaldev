/////////      app-specific globally needed js   /////////////////////
    var AppSpace = {};
    window.indexedDB = window.indexedDB || window.webkitIndexedDB ||
                    window.mozIndexedDB;

    if ('webkitIndexedDB' in window) {
      window.IDBTransaction = window.webkitIDBTransaction;
      window.IDBKeyRange = window.webkitIDBKeyRange;
    }

    AppSpace.indexedDB = {};
    AppSpace.indexedDB.db = null;

    AppSpace.indexedDB.onerror = function(e) {
      console.log(e);
    };

    AppSpace.indexedDB.open = function() {
      var version = 1;
      var request = indexedDB.open("tasks", version);
      request.onupgradeneeded = function(e) {
        var db = e.target.result;
        e.target.transaction.onerror = AppSpace.indexedDB.onerror;

		/////	 SET UP DB TABLES 	///////////////
		//---task
        if(db.objectStoreNames.contains("task")) {
          db.deleteObjectStore("task");
        }
        var store = db.createObjectStore("task",
          {keyPath: "timeStamp"});
          
          
          

      };

      request.onsuccess = function(e) {
        AppSpace.indexedDB.db = e.target.result;
        AppSpace.indexedDB.getAllTodoItems();
      };

      request.onerror = AppSpace.indexedDB.onerror;
    };

 function init() {
      AppSpace.indexedDB.open();
    }

    window.addEventListener("DOMContentLoaded", init, false);

  window.isCompatible = function() {
      
  return ('indexedDB' in window || 'webkitIndexedDB' in window || 'mozIndexedDB' in window);

    };

    if (isCompatible() === false) {
      document.getElementById('notcompatible').className = '';
    }


 
chrome.app.runtime.onLaunched.addListener(function() {
  chrome.app.window.create('index.php', {
    'bounds': {
      'width': 600,
      'height': 600
    }
  });
});
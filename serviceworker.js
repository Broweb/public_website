self.addEventListener('install', (event) => {
  console.log('Inside the install handler:', event);
  event.waitUntil(
    caches.open('browebCache').then(function(cache) {
    	console.log('[Service Worker] Caching all: app shell and content');
      return cache.addAll(
        [
          '/vue-erp/images/broelie.png'
          
        ]
      );
    })
  );
});

self.addEventListener('activate', (event) => {
  console.log('Inside the activate handler:', event);
});

self.addEventListener(fetch, (event) => {
  console.log('Inside the fetch handler:', event);
  console.log('[Service Worker] Fetched resource '+event.request.url);
  event.respondWith(
    caches.match(event.request).then(function(response) {
      return response || fetch(event.request);
    })
  );
});
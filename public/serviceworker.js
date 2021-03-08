"use strict";

/**
 * Service Worker of ROAKPOS
 */

const cacheName = "roakpos-v1.0";
const startPage = "https://pos.roakrak.co.id/roakpos/public/";
const offlinePage = "https://pos.roakrak.co.id/roakpos/public/offline/";
const filesToCache = [startPage, offlinePage];
const neverCacheUrls = [/\/vendor/, /preview=true/];

// Install
self.addEventListener("install", function (e) {
    console.log("ROAKPOS service worker installation");
    e.waitUntil(
        caches.open(cacheName).then(function (cache) {
            console.log("ROAKPOS service worker caching dependencies");
            filesToCache.map(function (url) {
                return cache.add(url).catch(function (reason) {
                    return console.log(
                        "ROAKPOS: " + String(reason) + " " + url
                    );
                });
            });
        })
    );
});

// Activate
self.addEventListener("activate", function (e) {
    console.log("ROAKPOS service worker activation");
    e.waitUntil(
        caches.keys().then(function (keyList) {
            return Promise.all(
                keyList.map(function (key) {
                    if (key !== cacheName) {
                        console.log("ROAKPOS old cache removed", key);
                        return caches.delete(key);
                    }
                })
            );
        })
    );
    return self.clients.claim();
});

// Fetch
self.addEventListener("fetch", function (e) {
    // Return if the current request url is in the never cache list
    if (!neverCacheUrls.every(checkNeverCacheList, e.request.url)) {
        console.log("ROAKPOS: Current request is excluded from cache.");
        return;
    }

    // Return if request url protocal isn't http or https
    if (!e.request.url.match(/^(http|https):\/\//i)) return;

    // Return if request url is from an external domain.
    if (new URL(e.request.url).origin !== location.origin) return;

    // For POST requests, do not use the cache. Serve offline page if offline.
    if (e.request.method !== "GET") {
        e.respondWith(
            fetch(e.request).catch(function () {
                return caches.match(offlinePage);
            })
        );
        return;
    }

    // Revving strategy
    if (e.request.mode === "navigate" && navigator.onLine) {
        e.respondWith(
            fetch(e.request).then(function (response) {
                return caches.open(cacheName).then(function (cache) {
                    cache.put(e.request, response.clone());
                    return response;
                });
            })
        );
        return caches.match(startPage);
    }

    e.respondWith(
        caches
            .match(e.request)
            .then(function (response) {
                return (
                    response ||
                    fetch(e.request).then(function (response) {
                        return caches.open(cacheName).then(function (cache) {
                            cache.delete(e.request, response.clone());
                            return response;
                        });
                    })
                );
            })
            .catch(function () {
                return caches.match(offlinePage);
            })
    );
});

// Check if current url is in the neverCacheUrls list
function checkNeverCacheList(url) {
    if (this.match(url)) {
        return false;
    }
    return true;
}

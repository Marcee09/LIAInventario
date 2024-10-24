var eventSent = false;
var currentMillis = 0;
var rootId = '';
var arrClientRenderings = [];
var arrCachedViews = {};

window.onload = function () {
    if (hasUrlParam('reset')) {
        reset();
        removeQueryParams();
        location.reload();
        return;
    }
    if (hasCachedValues()) {
        currentMillis = Date.now();
        mainDiv = document.getElementById('main');
        mainDiv.innerHTML = '<div id="' + rootId + '"></div>';
        let cachedElementsCounter = 0;
        for (const key in arrCachedViews) {
            if (key === 'tree' || key === 'root') {
                continue;
            }
            const element = document.getElementById(key);
            if (element) {
                $html = arrCachedViews[key];//decodeBase64(arrCachedViews[key]);
                $html = '<div key="' + key + '">' + $html + '</div>';
                element.innerHTML = $html;
                runScripts(element);
                cachedElementsCounter++;
            } else {
                console.error('Element not found: ' + key);
            }
        }
        console.info('Rendered ' + cachedElementsCounter + ' cached in ' + (Date.now() - currentMillis) + 'ms');
    } else {
        sendEvent('reload', {}, true);
    }
}

function findParentWithKey(element) {
    let parent = element.parentElement;
    while (parent) {
        if (parent.getAttribute('key')) {
            return parent;
        }
        parent = parent.parentElement;
    }
    return null;
}

function sendEvent(event, formData = {}, signal = false) {
    if (eventSent) {
        return;
    }
    eventSent = true;
    currentMillis = Date.now();
    const keyParent = findParentWithKey(document.activeElement);
    const source = keyParent ? keyParent.getAttribute('key') : null;
    let destination = source;
    if (signal) {
        destination = 'all';
    }

    event = event || '';
    var routeDiv = document.getElementById('routeDiv')
    var route = routeDiv.getAttribute('route');
    var token = routeDiv.getAttribute('token');

    fetch(route, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token
        },
        body: JSON.stringify({
            event: event,
            is_signal: signal,
            source: source,
            destination: destination,
            data: formData,
            rendered: arrClientRenderings
        })
    })
        .then(response => response.text())
        .then(data => {
            try {
                if (data.startsWith('<!DOCTYPE html>')) {
                    document.write(data);
                    eventSent = false;
                } else {
                    json = JSON.parse(data);
                    if (json['tree']) {
                        console.warn(json['tree']);
                    }
                    rootId = json['root'];
                    mainDiv = document.getElementById('main');
                    mainDiv.innerHTML = '<div id="' + rootId + '"></div>';
                    elementsUpdated = 0;
                    updated = "";
                    elementsNotFound = [];
                    for (const key in json) {
                        if (key === 'tree' || key === 'root') {
                            continue;
                        }
                        const element = document.getElementById(key);
                        if (element) {
                            $html = decodeBase64(json[key]);
                            $html = '<div key="' + key + '">' + $html + '</div>';
                            element.innerHTML = $html;
                            runScripts(element);
                            elementsUpdated++;
                            updated += key + ", ";
                            if (!arrClientRenderings.includes(key)) {
                                arrClientRenderings.push(key);
                            }
                            arrCachedViews[key] = $html;// json[key];
                        } else {
                            elementsNotFound.push(key);
                            // TODO: review this
                            //arrObjects = [];
                        }
                    }
                    eventSent = false;
                    console.info('Rendered: ' + elementsUpdated + " in " + (Date.now() - currentMillis) + 'ms');

                    // store the array of objects in local storage
                    localStorage.setItem('rootId', rootId);
                    localStorage.setItem('rendered', JSON.stringify(arrClientRenderings));
                    localStorage.setItem('cached', JSON.stringify(arrCachedViews));
                    if (elementsUpdated > 0 && elementsUpdated < 15) {
                        //console.info('Updated: ' + updated);
                    }
                    if (elementsNotFound.length > 0) {
                        console.error('Not found: ' + elementsNotFound);
                    }
                }
            } catch (error) {
                console.error(error);
                eventSent = false;
            }
        });
}

//todo: move to a helper file and optimize it
function decodeBase64(data) {
    const binaryString = atob(data);
    //return binaryString;
    const bytes = new Uint8Array(binaryString.length);
    //console.log(binaryString.length);
    for (let i = 0; i < binaryString.length; i++) {
        bytes[i] = binaryString.charCodeAt(i);
    }
    return new TextDecoder().decode(bytes);
}

function runScripts(domElement) {
    domElement.querySelectorAll('script').forEach(script => {
        const newScript = document.createElement('script');
        Array.from(script.attributes).forEach(attr => {
            newScript.setAttribute(attr.name, attr.value);
        });
        newScript.appendChild(document.createTextNode(script.innerHTML));
        script.parentNode.replaceChild(newScript, script);
    });
}

function reset() {
    localStorage.removeItem('rootId');
    localStorage.removeItem('rendered');
    localStorage.removeItem('cached');
}

function hasUrlParam(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.has(name);
}

function removeQueryParams() {
    window.history.replaceState({}, document.title, window.location.pathname);
}

function hasCachedValues() {
    rootId = localStorage.getItem('rootId');
    arrCachedViews = localStorage.getItem('cached') || '{}';
    arrCachedViews = JSON.parse(arrCachedViews);
    arrClientRenderings = localStorage.getItem('rendered') || '[]';
    arrClientRenderings = JSON.parse(arrClientRenderings);
    return Object.keys(arrCachedViews).length > 0;
}

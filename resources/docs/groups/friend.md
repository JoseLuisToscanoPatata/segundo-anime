# Friend

API Endpoints for working with friends

## Add an existing user as friend




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/friends" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/friends"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-friends" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-friends"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-friends"></code></pre>
</div>
<div id="execution-error-POSTapi-friends" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-friends"></code></pre>
</div>
<form id="form-POSTapi-friends" data-method="POST" data-path="api/friends" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-friends', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/friends</code></b>
</p>
</form>


## Get a friend info (useless)




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/friends/reprehenderit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/friends/reprehenderit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-friends--friend-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-friends--friend-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-friends--friend-"></code></pre>
</div>
<div id="execution-error-GETapi-friends--friend-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-friends--friend-"></code></pre>
</div>
<form id="form-GETapi-friends--friend-" data-method="GET" data-path="api/friends/{friend}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-friends--friend-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/friends/{friend}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>friend</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="friend" data-endpoint="GETapi-friends--friend-" data-component="url" required  hidden>
<br>

</p>
</form>


## Confirm a friend invitation you recieve (set the confirmation date to now)




> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/friends/aut" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/friends/aut"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response => response.json());
```


<div id="execution-results-PUTapi-friends--friend-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-friends--friend-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-friends--friend-"></code></pre>
</div>
<div id="execution-error-PUTapi-friends--friend-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-friends--friend-"></code></pre>
</div>
<form id="form-PUTapi-friends--friend-" data-method="PUT" data-path="api/friends/{friend}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-friends--friend-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/friends/{friend}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/friends/{friend}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>friend</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="friend" data-endpoint="PUTapi-friends--friend-" data-component="url" required  hidden>
<br>

</p>
</form>


## Remove a friendship you belong to




> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/friends/eum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/friends/eum"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


<div id="execution-results-DELETEapi-friends--friend-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-friends--friend-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-friends--friend-"></code></pre>
</div>
<div id="execution-error-DELETEapi-friends--friend-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-friends--friend-"></code></pre>
</div>
<form id="form-DELETEapi-friends--friend-" data-method="DELETE" data-path="api/friends/{friend}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-friends--friend-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/friends/{friend}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>friend</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="friend" data-endpoint="DELETEapi-friends--friend-" data-component="url" required  hidden>
<br>

</p>
</form>


## Get every friend of the specified user, both confirmed as not confirmed yet.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/friendsIndex/facilis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/friendsIndex/facilis"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```
<div id="execution-results-GETapi-friendsIndex--friend-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-friendsIndex--friend-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-friendsIndex--friend-"></code></pre>
</div>
<div id="execution-error-GETapi-friendsIndex--friend-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-friendsIndex--friend-"></code></pre>
</div>
<form id="form-GETapi-friendsIndex--friend-" data-method="GET" data-path="api/friendsIndex/{friend}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-friendsIndex--friend-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/friendsIndex/{friend}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>friend</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="friend" data-endpoint="GETapi-friendsIndex--friend-" data-component="url" required  hidden>
<br>

</p>
</form>




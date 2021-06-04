# Watch (Anime List)

API Endpoints for working with users anime lists

## Get all animes in an user list




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/watches/architecto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches/architecto"
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
<div id="execution-results-GETapi-watches--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-watches--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-watches--user-"></code></pre>
</div>
<div id="execution-error-GETapi-watches--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-watches--user-"></code></pre>
</div>
<form id="form-GETapi-watches--user-" data-method="GET" data-path="api/watches/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-watches--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/watches/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="GETapi-watches--user-" data-component="url" required  hidden>
<br>

</p>
</form>


## Get the anime watch status from any user




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/watches/modi/temporibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches/modi/temporibus"
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
<div id="execution-results-GETapi-watches--anime---user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-watches--anime---user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-watches--anime---user-"></code></pre>
</div>
<div id="execution-error-GETapi-watches--anime---user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-watches--anime---user-"></code></pre>
</div>
<form id="form-GETapi-watches--anime---user-" data-method="GET" data-path="api/watches/{anime}/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-watches--anime---user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/watches/{anime}/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>anime</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anime" data-endpoint="GETapi-watches--anime---user-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="GETapi-watches--anime---user-" data-component="url" required  hidden>
<br>

</p>
</form>


## Add a new anime to an user list.




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/watches" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches"
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


<div id="execution-results-POSTapi-watches" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-watches"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-watches"></code></pre>
</div>
<div id="execution-error-POSTapi-watches" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-watches"></code></pre>
</div>
<form id="form-POSTapi-watches" data-method="POST" data-path="api/watches" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-watches', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/watches</code></b>
</p>
</form>


## Update the specified anime watch status, score or favourite from an user




> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/watches/voluptatem/quae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches/voluptatem/quae"
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


<div id="execution-results-PUTapi-watches--anime---user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-watches--anime---user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-watches--anime---user-"></code></pre>
</div>
<div id="execution-error-PUTapi-watches--anime---user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-watches--anime---user-"></code></pre>
</div>
<form id="form-PUTapi-watches--anime---user-" data-method="PUT" data-path="api/watches/{anime}/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-watches--anime---user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/watches/{anime}/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>anime</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anime" data-endpoint="PUTapi-watches--anime---user-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="PUTapi-watches--anime---user-" data-component="url" required  hidden>
<br>

</p>
</form>


## Update the specified anime watch status, score or favourite from an user




> Example request:

```bash
curl -X PATCH \
    "http://localhost:8000/api/watches/voluptas/voluptatibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches/voluptas/voluptatibus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PATCH",
    headers,
}).then(response => response.json());
```


<div id="execution-results-PATCHapi-watches--anime---user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-watches--anime---user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-watches--anime---user-"></code></pre>
</div>
<div id="execution-error-PATCHapi-watches--anime---user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-watches--anime---user-"></code></pre>
</div>
<form id="form-PATCHapi-watches--anime---user-" data-method="PATCH" data-path="api/watches/{anime}/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-watches--anime---user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/watches/{anime}/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>anime</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anime" data-endpoint="PATCHapi-watches--anime---user-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="PATCHapi-watches--anime---user-" data-component="url" required  hidden>
<br>

</p>
</form>


## Delete the anime from an user list.




> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/watches/fuga/iste" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches/fuga/iste"
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


<div id="execution-results-DELETEapi-watches--anime---user-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-watches--anime---user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-watches--anime---user-"></code></pre>
</div>
<div id="execution-error-DELETEapi-watches--anime---user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-watches--anime---user-"></code></pre>
</div>
<form id="form-DELETEapi-watches--anime---user-" data-method="DELETE" data-path="api/watches/{anime}/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-watches--anime---user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/watches/{anime}/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>anime</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anime" data-endpoint="DELETEapi-watches--anime---user-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="DELETEapi-watches--anime---user-" data-component="url" required  hidden>
<br>

</p>
</form>




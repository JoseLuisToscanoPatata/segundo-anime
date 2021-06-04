# Anime

API Endpoints for working with animes

## Get every anime on the database




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/animes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/animes"
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
<div id="execution-results-GETapi-animes" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-animes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-animes"></code></pre>
</div>
<div id="execution-error-GETapi-animes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-animes"></code></pre>
</div>
<form id="form-GETapi-animes" data-method="GET" data-path="api/animes" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-animes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/animes</code></b>
</p>
</form>


## Store a newly created anime in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/animes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/animes"
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


<div id="execution-results-POSTapi-animes" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-animes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-animes"></code></pre>
</div>
<div id="execution-error-POSTapi-animes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-animes"></code></pre>
</div>
<form id="form-POSTapi-animes" data-method="POST" data-path="api/animes" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-animes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/animes</code></b>
</p>
</form>


## Get the data of the anime.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/animes/omnis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/animes/omnis"
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
<div id="execution-results-GETapi-animes--anime-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-animes--anime-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-animes--anime-"></code></pre>
</div>
<div id="execution-error-GETapi-animes--anime-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-animes--anime-"></code></pre>
</div>
<form id="form-GETapi-animes--anime-" data-method="GET" data-path="api/animes/{anime}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-animes--anime-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/animes/{anime}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>anime</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anime" data-endpoint="GETapi-animes--anime-" data-component="url" required  hidden>
<br>

</p>
</form>


## Update the specified anime in storage, given the id and the request with the new data




> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/animes/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/animes/et"
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


<div id="execution-results-PUTapi-animes--anime-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-animes--anime-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-animes--anime-"></code></pre>
</div>
<div id="execution-error-PUTapi-animes--anime-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-animes--anime-"></code></pre>
</div>
<form id="form-PUTapi-animes--anime-" data-method="PUT" data-path="api/animes/{anime}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-animes--anime-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/animes/{anime}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/animes/{anime}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>anime</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anime" data-endpoint="PUTapi-animes--anime-" data-component="url" required  hidden>
<br>

</p>
</form>


## Delete an anime from the database.




> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/animes/consequuntur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/animes/consequuntur"
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


<div id="execution-results-DELETEapi-animes--anime-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-animes--anime-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-animes--anime-"></code></pre>
</div>
<div id="execution-error-DELETEapi-animes--anime-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-animes--anime-"></code></pre>
</div>
<form id="form-DELETEapi-animes--anime-" data-method="DELETE" data-path="api/animes/{anime}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-animes--anime-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/animes/{anime}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>anime</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="anime" data-endpoint="DELETEapi-animes--anime-" data-component="url" required  hidden>
<br>

</p>
</form>




# Manga

API Endpoints for working with mangas

## Get every manga on the database




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/mangas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/mangas"
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
<div id="execution-results-GETapi-mangas" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-mangas"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mangas"></code></pre>
</div>
<div id="execution-error-GETapi-mangas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mangas"></code></pre>
</div>
<form id="form-GETapi-mangas" data-method="GET" data-path="api/mangas" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-mangas', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/mangas</code></b>
</p>
</form>


## Store a newly created anime in storage.




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/mangas" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/mangas"
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


<div id="execution-results-POSTapi-mangas" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-mangas"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-mangas"></code></pre>
</div>
<div id="execution-error-POSTapi-mangas" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-mangas"></code></pre>
</div>
<form id="form-POSTapi-mangas" data-method="POST" data-path="api/mangas" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-mangas', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/mangas</code></b>
</p>
</form>


## Get the data of the manga.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/mangas/fuga" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/mangas/fuga"
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
<div id="execution-results-GETapi-mangas--manga-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-mangas--manga-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-mangas--manga-"></code></pre>
</div>
<div id="execution-error-GETapi-mangas--manga-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-mangas--manga-"></code></pre>
</div>
<form id="form-GETapi-mangas--manga-" data-method="GET" data-path="api/mangas/{manga}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-mangas--manga-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/mangas/{manga}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>manga</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="manga" data-endpoint="GETapi-mangas--manga-" data-component="url" required  hidden>
<br>

</p>
</form>


## Update the specified manga in storage, given the id and the request with the new data




> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/mangas/blanditiis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/mangas/blanditiis"
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


<div id="execution-results-PUTapi-mangas--manga-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-mangas--manga-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-mangas--manga-"></code></pre>
</div>
<div id="execution-error-PUTapi-mangas--manga-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-mangas--manga-"></code></pre>
</div>
<form id="form-PUTapi-mangas--manga-" data-method="PUT" data-path="api/mangas/{manga}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-mangas--manga-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/mangas/{manga}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/mangas/{manga}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>manga</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="manga" data-endpoint="PUTapi-mangas--manga-" data-component="url" required  hidden>
<br>

</p>
</form>


## Delete a manga from the database.




> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/mangas/recusandae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/mangas/recusandae"
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


<div id="execution-results-DELETEapi-mangas--manga-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-mangas--manga-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-mangas--manga-"></code></pre>
</div>
<div id="execution-error-DELETEapi-mangas--manga-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-mangas--manga-"></code></pre>
</div>
<form id="form-DELETEapi-mangas--manga-" data-method="DELETE" data-path="api/mangas/{manga}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-mangas--manga-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/mangas/{manga}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>manga</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="manga" data-endpoint="DELETEapi-mangas--manga-" data-component="url" required  hidden>
<br>

</p>
</form>




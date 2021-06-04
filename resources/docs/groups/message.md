# Message

API Endpoints for working with user messages

## See all message you belong to (both sent by and to you)




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/messages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/messages"
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
<div id="execution-results-GETapi-messages" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-messages"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-messages"></code></pre>
</div>
<div id="execution-error-GETapi-messages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-messages"></code></pre>
</div>
<form id="form-GETapi-messages" data-method="GET" data-path="api/messages" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-messages', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/messages</code></b>
</p>
</form>


## Send a new message




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/messages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/messages"
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


<div id="execution-results-POSTapi-messages" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-messages"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-messages"></code></pre>
</div>
<div id="execution-error-POSTapi-messages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-messages"></code></pre>
</div>
<form id="form-POSTapi-messages" data-method="POST" data-path="api/messages" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-messages', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/messages</code></b>
</p>
</form>


## Display a message you belong to




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/messages/eum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/messages/eum"
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
<div id="execution-results-GETapi-messages--message-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-messages--message-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-messages--message-"></code></pre>
</div>
<div id="execution-error-GETapi-messages--message-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-messages--message-"></code></pre>
</div>
<form id="form-GETapi-messages--message-" data-method="GET" data-path="api/messages/{message}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-messages--message-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/messages/{message}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>message</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="message" data-endpoint="GETapi-messages--message-" data-component="url" required  hidden>
<br>

</p>
</form>


## Delete a message you have created




> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/messages/perspiciatis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/messages/perspiciatis"
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


<div id="execution-results-DELETEapi-messages--message-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-messages--message-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-messages--message-"></code></pre>
</div>
<div id="execution-error-DELETEapi-messages--message-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-messages--message-"></code></pre>
</div>
<form id="form-DELETEapi-messages--message-" data-method="DELETE" data-path="api/messages/{message}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-messages--message-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/messages/{message}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>message</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="message" data-endpoint="DELETEapi-messages--message-" data-component="url" required  hidden>
<br>

</p>
</form>




# Message

API Endpoints for working with user messages

## Index

<small class="badge badge-darkred">requires authentication</small>

See all message you belong to (both sent by and to you)

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/messages" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/messages"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": "success",
    "data": [
        "Array of messages recieved",
        "Array of messages sent"
    ]
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
<form id="form-GETapi-messages" data-method="GET" data-path="api/messages" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-messages', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/messages</code></b>
</p>
<p>
<label id="auth-GETapi-messages" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-messages" data-component="header"></label>
</p>
</form>


## Store

<small class="badge badge-darkred">requires authentication</small>

Send a new message

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/messages" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"Message":{"message":"\"Me gustan las patatas\"","recipient":3}}'

```

```javascript
const url = new URL(
    "http://localhost:8000/api/messages"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "Message": {
        "message": "\"Me gustan las patatas\"",
        "recipient": 3
    }
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": "success",
    "message": "Message send successfully :)",
    "data": {
        "id": 1,
        "recipient": 1,
        "emisor": 3,
        "message": "Me gustan las patatas"
    }
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "You cant send a message to yourself"
}
```
<div id="execution-results-POSTapi-messages" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-messages"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-messages"></code></pre>
</div>
<div id="execution-error-POSTapi-messages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-messages"></code></pre>
</div>
<form id="form-POSTapi-messages" data-method="POST" data-path="api/messages" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-messages', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/messages</code></b>
</p>
<p>
<label id="auth-POSTapi-messages" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-messages" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<details>
<summary>
<b><code>Message</code></b>&nbsp;&nbsp;<small>object</small>  &nbsp;
<br>
Message defailts
</summary>
<br>
<p>
<b><code>Message.message</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="Message.message" data-endpoint="POSTapi-messages" data-component="body" required  hidden>
<br>
Message you want to send
</p>
<p>
<b><code>Message.recipient</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="Message.recipient" data-endpoint="POSTapi-messages" data-component="body" required  hidden>
<br>
anime synopsis
</p>
</details>
</p>

</form>


## Show

<small class="badge badge-darkred">requires authentication</small>

Show a message you have sent or recieved

> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/messages/dolore" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/messages/dolore"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": "success",
    "data": {
        "id": 1,
        "recipient": 1,
        "emisor": 2,
        "message": "Ostia pilotes"
    }
}
```
> Example response (403):

```json
{
    "status": "failed",
    "message": "You cant get a message you dont own :("
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Message not found :("
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
<form id="form-GETapi-messages--message-" data-method="GET" data-path="api/messages/{message}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-messages--message-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/messages/{message}</code></b>
</p>
<p>
<label id="auth-GETapi-messages--message-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-messages--message-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>message</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="message" data-endpoint="GETapi-messages--message-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="GETapi-messages--message-" data-component="url" required  hidden>
<br>
The ID of the another user.
</p>
</form>


## Destroy

<small class="badge badge-darkred">requires authentication</small>

Delete a message you have sent

> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/messages/alias" \
    -H "Authorization: Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/messages/alias"
);

let headers = {
    "Authorization": "Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "status": "success",
    "message": "Message deleted successfully :)"
}
```
> Example response (403):

```json
{
    "status": "failed",
    "message": "You cant destroy a message you dont own :("
}
```
> Example response (404):

```json
{
    "status": "failed",
    "message": "Message not found:("
}
```
<div id="execution-results-DELETEapi-messages--message-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-messages--message-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-messages--message-"></code></pre>
</div>
<div id="execution-error-DELETEapi-messages--message-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-messages--message-"></code></pre>
</div>
<form id="form-DELETEapi-messages--message-" data-method="DELETE" data-path="api/messages/{message}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer 9|DHkymJIqAO1g3mkS2rACLjhIzwny0BBV6wdvRIwj","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-messages--message-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/messages/{message}</code></b>
</p>
<p>
<label id="auth-DELETEapi-messages--message-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-messages--message-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>message</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="message" data-endpoint="DELETEapi-messages--message-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEapi-messages--message-" data-component="url" required  hidden>
<br>
The ID of the message.
</p>
</form>




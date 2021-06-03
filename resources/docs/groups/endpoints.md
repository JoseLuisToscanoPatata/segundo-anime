# Endpoints


## Get the index of a given version.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/docs/search-index/rem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/docs/search-index/rem"
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


> Example response (403):

```json
{
    "message": "",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\HttpException",
    "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php",
    "line": 1116,
    "trace": [
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\helpers.php",
            "line": 44,
            "function": "abort",
            "class": "Illuminate\\Foundation\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\helpers.php",
            "line": 64,
            "function": "abort"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\binarytorch\\larecipe\\src\\Http\\Controllers\\SearchController.php",
            "line": 58,
            "function": "abort_if"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\binarytorch\\larecipe\\src\\Http\\Controllers\\SearchController.php",
            "line": 40,
            "function": "authorizeAccessSearch",
            "class": "BinaryTorch\\LaRecipe\\Http\\Controllers\\SearchController",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "__invoke",
            "class": "BinaryTorch\\LaRecipe\\Http\\Controllers\\SearchController",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 254,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 197,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 695,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\inertiajs\\inertia-laravel\\src\\Middleware.php",
            "line": 82,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Inertia\\Middleware",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\jetstream\\src\\Http\\Middleware\\ShareInertiaData.php",
            "line": 61,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Laravel\\Jetstream\\Http\\Middleware\\ShareInertiaData",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\AuthenticateSession.php",
            "line": 39,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\AuthenticateSession",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 64,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 697,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 672,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 636,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 625,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 40,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\fruitcake\\laravel-cors\\src\\HandleCors.php",
            "line": 38,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 614,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 288,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\symfony\\console\\Application.php",
            "line": 974,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\symfony\\console\\Application.php",
            "line": 291,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\symfony\\console\\Application.php",
            "line": 167,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 92,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETdocs-search-index--version-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETdocs-search-index--version-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETdocs-search-index--version-"></code></pre>
</div>
<div id="execution-error-GETdocs-search-index--version-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdocs-search-index--version-"></code></pre>
</div>
<form id="form-GETdocs-search-index--version-" data-method="GET" data-path="docs/search-index/{version}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETdocs-search-index--version-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETdocs-search-index--version-" onclick="tryItOut('GETdocs-search-index--version-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETdocs-search-index--version-" onclick="cancelTryOut('GETdocs-search-index--version-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETdocs-search-index--version-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>docs/search-index/{version}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>version</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="version" data-endpoint="GETdocs-search-index--version-" data-component="url" required  hidden>
<br>

</p>
</form>


## docs/styles/{style}




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/docs/styles/repellat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/docs/styles/repellat"
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


> Example response (500):

```json
{
    "message": "Undefined array key \"repellat\"",
    "exception": "ErrorException",
    "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\binarytorch\\larecipe\\src\\Http\\Controllers\\StyleController.php",
    "line": 17,
    "trace": [
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\binarytorch\\larecipe\\src\\Http\\Controllers\\StyleController.php",
            "line": 17,
            "function": "handleError",
            "class": "Illuminate\\Foundation\\Bootstrap\\HandleExceptions",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "__invoke",
            "class": "BinaryTorch\\LaRecipe\\Http\\Controllers\\StyleController",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 254,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 197,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 695,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\inertiajs\\inertia-laravel\\src\\Middleware.php",
            "line": 82,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Inertia\\Middleware",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\jetstream\\src\\Http\\Middleware\\ShareInertiaData.php",
            "line": 61,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Laravel\\Jetstream\\Http\\Middleware\\ShareInertiaData",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\AuthenticateSession.php",
            "line": 39,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\AuthenticateSession",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 64,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 697,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 672,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 636,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 625,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 40,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\fruitcake\\laravel-cors\\src\\HandleCors.php",
            "line": 38,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 614,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 288,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\symfony\\console\\Application.php",
            "line": 974,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\symfony\\console\\Application.php",
            "line": 291,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\symfony\\console\\Application.php",
            "line": 167,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 92,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETdocs-styles--style-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETdocs-styles--style-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETdocs-styles--style-"></code></pre>
</div>
<div id="execution-error-GETdocs-styles--style-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdocs-styles--style-"></code></pre>
</div>
<form id="form-GETdocs-styles--style-" data-method="GET" data-path="docs/styles/{style}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETdocs-styles--style-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETdocs-styles--style-" onclick="tryItOut('GETdocs-styles--style-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETdocs-styles--style-" onclick="cancelTryOut('GETdocs-styles--style-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETdocs-styles--style-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>docs/styles/{style}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>style</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="style" data-endpoint="GETdocs-styles--style-" data-component="url" required  hidden>
<br>

</p>
</form>


## docs/scripts/{script}




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/docs/scripts/facilis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/docs/scripts/facilis"
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


> Example response (500):

```json
{
    "message": "Undefined array key \"facilis\"",
    "exception": "ErrorException",
    "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\binarytorch\\larecipe\\src\\Http\\Controllers\\ScriptController.php",
    "line": 17,
    "trace": [
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\binarytorch\\larecipe\\src\\Http\\Controllers\\ScriptController.php",
            "line": 17,
            "function": "handleError",
            "class": "Illuminate\\Foundation\\Bootstrap\\HandleExceptions",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "__invoke",
            "class": "BinaryTorch\\LaRecipe\\Http\\Controllers\\ScriptController",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 254,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 197,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 695,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\inertiajs\\inertia-laravel\\src\\Middleware.php",
            "line": 82,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Inertia\\Middleware",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\jetstream\\src\\Http\\Middleware\\ShareInertiaData.php",
            "line": 61,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Laravel\\Jetstream\\Http\\Middleware\\ShareInertiaData",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\AuthenticateSession.php",
            "line": 39,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\AuthenticateSession",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 64,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 697,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 672,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 636,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 625,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 40,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\fruitcake\\laravel-cors\\src\\HandleCors.php",
            "line": 38,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 614,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 288,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\symfony\\console\\Application.php",
            "line": 974,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\symfony\\console\\Application.php",
            "line": 291,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\symfony\\console\\Application.php",
            "line": 167,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 92,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "C:\\xampp\\htdocs\\a\\segundo-anime\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETdocs-scripts--script-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETdocs-scripts--script-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETdocs-scripts--script-"></code></pre>
</div>
<div id="execution-error-GETdocs-scripts--script-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdocs-scripts--script-"></code></pre>
</div>
<form id="form-GETdocs-scripts--script-" data-method="GET" data-path="docs/scripts/{script}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETdocs-scripts--script-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETdocs-scripts--script-" onclick="tryItOut('GETdocs-scripts--script-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETdocs-scripts--script-" onclick="cancelTryOut('GETdocs-scripts--script-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETdocs-scripts--script-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>docs/scripts/{script}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>script</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="script" data-endpoint="GETdocs-scripts--script-" data-component="url" required  hidden>
<br>

</p>
</form>


## Redirect the index page of docs to the default version.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/docs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/docs"
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


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost:8000/docs/1.0/overview'" />

        <title>Redirecting to http://localhost:8000/docs/1.0/overview</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost:8000/docs/1.0/overview">http://localhost:8000/docs/1.0/overview</a>.
    </body>
</html>
```
<div id="execution-results-GETdocs" hidden>
    <blockquote>Received response<span id="execution-response-status-GETdocs"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETdocs"></code></pre>
</div>
<div id="execution-error-GETdocs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdocs"></code></pre>
</div>
<form id="form-GETdocs" data-method="GET" data-path="docs" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETdocs', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETdocs" onclick="tryItOut('GETdocs');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETdocs" onclick="cancelTryOut('GETdocs');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETdocs" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>docs</code></b>
</p>
</form>


## Show a documentation page.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/docs/eum/necessitatibus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/docs/eum/necessitatibus"
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


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost:8000/docs/1.0/overview'" />

        <title>Redirecting to http://localhost:8000/docs/1.0/overview</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost:8000/docs/1.0/overview">http://localhost:8000/docs/1.0/overview</a>.
    </body>
</html>
```
<div id="execution-results-GETdocs--version---page--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETdocs--version---page--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETdocs--version---page--"></code></pre>
</div>
<div id="execution-error-GETdocs--version---page--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdocs--version---page--"></code></pre>
</div>
<form id="form-GETdocs--version---page--" data-method="GET" data-path="docs/{version}/{page?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETdocs--version---page--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETdocs--version---page--" onclick="tryItOut('GETdocs--version---page--');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETdocs--version---page--" onclick="cancelTryOut('GETdocs--version---page--');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETdocs--version---page--" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>docs/{version}/{page?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>version</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="version" data-endpoint="GETdocs--version---page--" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>page</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="page" data-endpoint="GETdocs--version---page--" data-component="url"  hidden>
<br>

</p>
</form>


## Show the login view.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/login"
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


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="2ZJ3jFcpcvBglRHqKmZnJLW6ck0xdG5rwktPUpXR">
        <link rel="shortcut icon" href="http://localhost:8000/img/mrsaturn3.svg">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

        <!-- Scripts -->
        <script type="text/javascript">
    const Ziggy = {"url":"http:\/\/localhost:8000","port":8000,"defaults":{},"routes":{"larecipe.search":{"uri":"docs\/search-index\/{version}","methods":["GET","HEAD"]},"larecipe.styles":{"uri":"docs\/styles\/{style}","methods":["GET","HEAD"]},"larecipe.scripts":{"uri":"docs\/scripts\/{script}","methods":["GET","HEAD"]},"larecipe.index":{"uri":"docs","methods":["GET","HEAD"]},"larecipe.show":{"uri":"docs\/{version}\/{page?}","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.update":{"uri":"reset-password","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"verification.notice":{"uri":"email\/verify","methods":["GET","HEAD"]},"verification.verify":{"uri":"email\/verify\/{id}\/{hash}","methods":["GET","HEAD"]},"verification.send":{"uri":"email\/verification-notification","methods":["POST"]},"user-profile-information.update":{"uri":"user\/profile-information","methods":["PUT"]},"user-password.update":{"uri":"user\/password","methods":["PUT"]},"password.confirm":{"uri":"user\/confirm-password","methods":["GET","HEAD"]},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"]},"two-factor.login":{"uri":"two-factor-challenge","methods":["GET","HEAD"]},"two-factor.enable":{"uri":"user\/two-factor-authentication","methods":["POST"]},"two-factor.disable":{"uri":"user\/two-factor-authentication","methods":["DELETE"]},"two-factor.qr-code":{"uri":"user\/two-factor-qr-code","methods":["GET","HEAD"]},"two-factor.recovery-codes":{"uri":"user\/two-factor-recovery-codes","methods":["GET","HEAD"]},"terms.show":{"uri":"terms-of-service","methods":["GET","HEAD"]},"policy.show":{"uri":"privacy-policy","methods":["GET","HEAD"]},"profile.show":{"uri":"user\/profile","methods":["GET","HEAD"]},"other-browser-sessions.destroy":{"uri":"user\/other-browser-sessions","methods":["DELETE"]},"current-user-photo.destroy":{"uri":"user\/profile-photo","methods":["DELETE"]},"current-user.destroy":{"uri":"user","methods":["DELETE"]},"users.index":{"uri":"api\/users","methods":["GET","HEAD"]},"users.show":{"uri":"api\/users\/{user}","methods":["GET","HEAD"]},"users.update":{"uri":"api\/users\/{user}","methods":["PUT","PATCH"]},"users.destroy":{"uri":"api\/users\/{user}","methods":["DELETE"]},"animes.index":{"uri":"api\/animes","methods":["GET","HEAD"]},"animes.store":{"uri":"api\/animes","methods":["POST"]},"animes.show":{"uri":"api\/animes\/{anime}","methods":["GET","HEAD"]},"animes.update":{"uri":"api\/animes\/{anime}","methods":["PUT","PATCH"]},"animes.destroy":{"uri":"api\/animes\/{anime}","methods":["DELETE"]},"mangas.index":{"uri":"api\/mangas","methods":["GET","HEAD"]},"mangas.store":{"uri":"api\/mangas","methods":["POST"]},"mangas.show":{"uri":"api\/mangas\/{manga}","methods":["GET","HEAD"]},"mangas.update":{"uri":"api\/mangas\/{manga}","methods":["PUT","PATCH"]},"mangas.destroy":{"uri":"api\/mangas\/{manga}","methods":["DELETE"]},"reads.index":{"uri":"api\/reads\/{user}","methods":["GET","HEAD"]},"reads.show":{"uri":"api\/reads\/{manga}\/{user}","methods":["GET","HEAD"]},"reads.store":{"uri":"api\/reads","methods":["POST"]},"reads.update":{"uri":"api\/reads\/{manga}\/{user}","methods":["PATCH"]},"reads.destroy":{"uri":"api\/reads\/{manga}\/{user}","methods":["DELETE"]},"watches.index":{"uri":"api\/watches\/{user}","methods":["GET","HEAD"]},"watches.show":{"uri":"api\/watches\/{anime}\/{user}","methods":["GET","HEAD"]},"watches.store":{"uri":"api\/watches","methods":["POST"]},"watches.update":{"uri":"api\/watches\/{anime}\/{user}","methods":["PATCH"]},"watches.destroy":{"uri":"api\/watches\/{anime}\/{user}","methods":["DELETE"]},"friends.store":{"uri":"api\/friends","methods":["POST"]},"friends.show":{"uri":"api\/friends\/{friend}","methods":["GET","HEAD"]},"friends.update":{"uri":"api\/friends\/{friend}","methods":["PUT","PATCH"]},"friends.destroy":{"uri":"api\/friends\/{friend}","methods":["DELETE"]},"friends.index":{"uri":"api\/friendsIndex\/{friend}","methods":["GET","HEAD"]},"messages.index":{"uri":"api\/messages","methods":["GET","HEAD"]},"messages.store":{"uri":"api\/messages","methods":["POST"]},"messages.show":{"uri":"api\/messages\/{message}","methods":["GET","HEAD"]},"messages.destroy":{"uri":"api\/messages\/{message}","methods":["DELETE"]},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"AnimeList":{"uri":"AnimeList","methods":["GET","HEAD"]},"AnimeUserList":{"uri":"AnimeUserList\/{id}","methods":["GET","HEAD"]},"AnimeProfile":{"uri":"AnimeProfile\/{id}","methods":["GET","HEAD"]},"MangaList":{"uri":"MangaList","methods":["GET","HEAD"]},"MangaUserList":{"uri":"MangaUserList\/{id}","methods":["GET","HEAD"]},"MangaProfile":{"uri":"MangaProfile\/{id}","methods":["GET","HEAD"]},"FriendsList":{"uri":"FriendsList\/{id}","methods":["GET","HEAD"]},"MessagesList":{"uri":"MessagesList","methods":["GET","HEAD"]},"UserShow":{"uri":"UserShow\/{id}","methods":["GET","HEAD"]},"SharedLists":{"uri":"SharedLists\/{usu2?}\/{tipo?}\/{ambos?}","methods":["GET","HEAD"]},"UserAdminList":{"uri":"UserAdminList","methods":["GET","HEAD"]},"MangaAdminList":{"uri":"MangaAdminList","methods":["GET","HEAD"]},"AnimeAdminList":{"uri":"AnimeAdminList","methods":["GET","HEAD"]}}};

    !function(t,e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define(e):(t=t||self).route=e()}(this,function(){var t=Object.prototype.hasOwnProperty,e=Array.isArray,r=function(){for(var t=[],e=0;e<256;++e)t.push("%"+((e<16?"0":"")+e.toString(16)).toUpperCase());return t}(),n=function(t,e){for(var r=e&&e.plainObjects?Object.create(null):{},n=0;n<t.length;++n)void 0!==t[n]&&(r[n]=t[n]);return r},o={arrayToObject:n,assign:function(t,e){return Object.keys(e).reduce(function(t,r){return t[r]=e[r],t},t)},combine:function(t,e){return[].concat(t,e)},compact:function(t){for(var r=[{obj:{o:t},prop:"o"}],n=[],o=0;o<r.length;++o)for(var i=r[o],u=i.obj[i.prop],f=Object.keys(u),s=0;s<f.length;++s){var a=f[s],c=u[a];"object"==typeof c&&null!==c&&-1===n.indexOf(c)&&(r.push({obj:u,prop:a}),n.push(c))}return function(t){for(;t.length>1;){var r=t.pop(),n=r.obj[r.prop];if(e(n)){for(var o=[],i=0;i<n.length;++i)void 0!==n[i]&&o.push(n[i]);r.obj[r.prop]=o}}}(r),t},decode:function(t,e,r){var n=t.replace(/\+/g," ");if("iso-8859-1"===r)return n.replace(/%[0-9a-f]{2}/gi,unescape);try{return decodeURIComponent(n)}catch(t){return n}},encode:function(t,e,n){if(0===t.length)return t;var o=t;if("symbol"==typeof t?o=Symbol.prototype.toString.call(t):"string"!=typeof t&&(o=String(t)),"iso-8859-1"===n)return escape(o).replace(/%u[0-9a-f]{4}/gi,function(t){return"%26%23"+parseInt(t.slice(2),16)+"%3B"});for(var i="",u=0;u<o.length;++u){var f=o.charCodeAt(u);45===f||46===f||95===f||126===f||f>=48&&f<=57||f>=65&&f<=90||f>=97&&f<=122?i+=o.charAt(u):f<128?i+=r[f]:f<2048?i+=r[192|f>>6]+r[128|63&f]:f<55296||f>=57344?i+=r[224|f>>12]+r[128|f>>6&63]+r[128|63&f]:(f=65536+((1023&f)<<10|1023&o.charCodeAt(u+=1)),i+=r[240|f>>18]+r[128|f>>12&63]+r[128|f>>6&63]+r[128|63&f])}return i},isBuffer:function(t){return!(!t||"object"!=typeof t||!(t.constructor&&t.constructor.isBuffer&&t.constructor.isBuffer(t)))},isRegExp:function(t){return"[object RegExp]"===Object.prototype.toString.call(t)},maybeMap:function(t,r){if(e(t)){for(var n=[],o=0;o<t.length;o+=1)n.push(r(t[o]));return n}return r(t)},merge:function r(o,i,u){if(!i)return o;if("object"!=typeof i){if(e(o))o.push(i);else{if(!o||"object"!=typeof o)return[o,i];(u&&(u.plainObjects||u.allowPrototypes)||!t.call(Object.prototype,i))&&(o[i]=!0)}return o}if(!o||"object"!=typeof o)return[o].concat(i);var f=o;return e(o)&&!e(i)&&(f=n(o,u)),e(o)&&e(i)?(i.forEach(function(e,n){if(t.call(o,n)){var i=o[n];i&&"object"==typeof i&&e&&"object"==typeof e?o[n]=r(i,e,u):o.push(e)}else o[n]=e}),o):Object.keys(i).reduce(function(e,n){var o=i[n];return e[n]=t.call(e,n)?r(e[n],o,u):o,e},f)}},i=String.prototype.replace,u=/%20/g,f={RFC1738:"RFC1738",RFC3986:"RFC3986"},s=o.assign({default:f.RFC3986,formatters:{RFC1738:function(t){return i.call(t,u,"+")},RFC3986:function(t){return String(t)}}},f),a=Object.prototype.hasOwnProperty,c={brackets:function(t){return t+"[]"},comma:"comma",indices:function(t,e){return t+"["+e+"]"},repeat:function(t){return t}},l=Array.isArray,p=Array.prototype.push,d=function(t,e){p.apply(t,l(e)?e:[e])},y=Date.prototype.toISOString,h=s.default,b={addQueryPrefix:!1,allowDots:!1,charset:"utf-8",charsetSentinel:!1,delimiter:"&",encode:!0,encoder:o.encode,encodeValuesOnly:!1,format:h,formatter:s.formatters[h],indices:!1,serializeDate:function(t){return y.call(t)},skipNulls:!1,strictNullHandling:!1},v=function t(e,r,n,i,u,f,s,a,c,p,y,h,v){var m,g=e;if("function"==typeof s?g=s(r,g):g instanceof Date?g=p(g):"comma"===n&&l(g)&&(g=o.maybeMap(g,function(t){return t instanceof Date?p(t):t}).join(",")),null===g){if(i)return f&&!h?f(r,b.encoder,v,"key"):r;g=""}if("string"==typeof(m=g)||"number"==typeof m||"boolean"==typeof m||"symbol"==typeof m||"bigint"==typeof m||o.isBuffer(g))return f?[y(h?r:f(r,b.encoder,v,"key"))+"="+y(f(g,b.encoder,v,"value"))]:[y(r)+"="+y(String(g))];var w,j=[];if(void 0===g)return j;if(l(s))w=s;else{var O=Object.keys(g);w=a?O.sort(a):O}for(var E=0;E<w.length;++E){var S=w[E],N=g[S];if(!u||null!==N){var R=l(g)?"function"==typeof n?n(r,S):r:r+(c?"."+S:"["+S+"]");d(j,t(N,R,n,i,u,f,s,a,c,p,y,h,v))}}return j},m=Object.prototype.hasOwnProperty,g=Array.isArray,w={allowDots:!1,allowPrototypes:!1,arrayLimit:20,charset:"utf-8",charsetSentinel:!1,comma:!1,decoder:o.decode,delimiter:"&",depth:5,ignoreQueryPrefix:!1,interpretNumericEntities:!1,parameterLimit:1e3,parseArrays:!0,plainObjects:!1,strictNullHandling:!1},j=function(t){return t.replace(/&#(\d+);/g,function(t,e){return String.fromCharCode(parseInt(e,10))})},O=function(t,e){return t&&"string"==typeof t&&e.comma&&t.indexOf(",")>-1?t.split(","):t},E=function(t,e,r,n){if(t){var o=r.allowDots?t.replace(/\.([^.[]+)/g,"[$1]"):t,i=/(\[[^[\]]*])/g,u=r.depth>0&&/(\[[^[\]]*])/.exec(o),f=u?o.slice(0,u.index):o,s=[];if(f){if(!r.plainObjects&&m.call(Object.prototype,f)&&!r.allowPrototypes)return;s.push(f)}for(var a=0;r.depth>0&&null!==(u=i.exec(o))&&a<r.depth;){if(a+=1,!r.plainObjects&&m.call(Object.prototype,u[1].slice(1,-1))&&!r.allowPrototypes)return;s.push(u[1])}return u&&s.push("["+o.slice(u.index)+"]"),function(t,e,r,n){for(var o=n?e:O(e,r),i=t.length-1;i>=0;--i){var u,f=t[i];if("[]"===f&&r.parseArrays)u=[].concat(o);else{u=r.plainObjects?Object.create(null):{};var s="["===f.charAt(0)&&"]"===f.charAt(f.length-1)?f.slice(1,-1):f,a=parseInt(s,10);r.parseArrays||""!==s?!isNaN(a)&&f!==s&&String(a)===s&&a>=0&&r.parseArrays&&a<=r.arrayLimit?(u=[])[a]=o:u[s]=o:u={0:o}}o=u}return o}(s,e,r,n)}},S=function(t,e){var r=function(t){if(!t)return w;if(null!=t.decoder&&"function"!=typeof t.decoder)throw new TypeError("Decoder has to be a function.");if(void 0!==t.charset&&"utf-8"!==t.charset&&"iso-8859-1"!==t.charset)throw new TypeError("The charset option must be either utf-8, iso-8859-1, or undefined");return{allowDots:void 0===t.allowDots?w.allowDots:!!t.allowDots,allowPrototypes:"boolean"==typeof t.allowPrototypes?t.allowPrototypes:w.allowPrototypes,arrayLimit:"number"==typeof t.arrayLimit?t.arrayLimit:w.arrayLimit,charset:void 0===t.charset?w.charset:t.charset,charsetSentinel:"boolean"==typeof t.charsetSentinel?t.charsetSentinel:w.charsetSentinel,comma:"boolean"==typeof t.comma?t.comma:w.comma,decoder:"function"==typeof t.decoder?t.decoder:w.decoder,delimiter:"string"==typeof t.delimiter||o.isRegExp(t.delimiter)?t.delimiter:w.delimiter,depth:"number"==typeof t.depth||!1===t.depth?+t.depth:w.depth,ignoreQueryPrefix:!0===t.ignoreQueryPrefix,interpretNumericEntities:"boolean"==typeof t.interpretNumericEntities?t.interpretNumericEntities:w.interpretNumericEntities,parameterLimit:"number"==typeof t.parameterLimit?t.parameterLimit:w.parameterLimit,parseArrays:!1!==t.parseArrays,plainObjects:"boolean"==typeof t.plainObjects?t.plainObjects:w.plainObjects,strictNullHandling:"boolean"==typeof t.strictNullHandling?t.strictNullHandling:w.strictNullHandling}}(e);if(""===t||null==t)return r.plainObjects?Object.create(null):{};for(var n="string"==typeof t?function(t,e){var r,n={},i=(e.ignoreQueryPrefix?t.replace(/^\?/,""):t).split(e.delimiter,Infinity===e.parameterLimit?void 0:e.parameterLimit),u=-1,f=e.charset;if(e.charsetSentinel)for(r=0;r<i.length;++r)0===i[r].indexOf("utf8=")&&("utf8=%E2%9C%93"===i[r]?f="utf-8":"utf8=%26%2310003%3B"===i[r]&&(f="iso-8859-1"),u=r,r=i.length);for(r=0;r<i.length;++r)if(r!==u){var s,a,c=i[r],l=c.indexOf("]="),p=-1===l?c.indexOf("="):l+1;-1===p?(s=e.decoder(c,w.decoder,f,"key"),a=e.strictNullHandling?null:""):(s=e.decoder(c.slice(0,p),w.decoder,f,"key"),a=o.maybeMap(O(c.slice(p+1),e),function(t){return e.decoder(t,w.decoder,f,"value")})),a&&e.interpretNumericEntities&&"iso-8859-1"===f&&(a=j(a)),c.indexOf("[]=")>-1&&(a=g(a)?[a]:a),n[s]=m.call(n,s)?o.combine(n[s],a):a}return n}(t,r):t,i=r.plainObjects?Object.create(null):{},u=Object.keys(n),f=0;f<u.length;++f){var s=u[f],a=E(s,n[s],r,"string"==typeof t);i=o.merge(i,a,r)}return o.compact(i)};class N{constructor(t,e,r){var n;this.name=t,this.definition=e,this.bindings=null!=(n=e.bindings)?n:{},this.config=r}get template(){return((this.config.absolute?this.definition.domain?""+this.config.url.match(/^\w+:\/\//)[0]+this.definition.domain+(this.config.port?":"+this.config.port:""):this.config.url:"")+"/"+this.definition.uri).replace(/\/+$/,"")}get parameterSegments(){var t,e;return null!=(t=null===(e=this.template.match(/{[^}?]+\??}/g))||void 0===e?void 0:e.map(t=>({name:t.replace(/{|\??}/g,""),required:!/\?}$/.test(t)})))?t:[]}matchesUrl(t){if(!this.definition.methods.includes("GET"))return!1;const e=this.template.replace(/\/{[^}?]*\?}/g,"(/[^/?]+)?").replace(/{[^}]+}/g,"[^/?]+").replace(/^\w+:\/\//,"");return new RegExp("^"+e+"$").test(t.replace(/\/+$/,"").split("?").shift())}compile(t){return this.parameterSegments.length?this.template.replace(/{([^}?]+)\??}/g,(e,r)=>{var n;if([null,void 0].includes(t[r])&&this.parameterSegments.find(({name:t})=>t===r).required)throw new Error("Ziggy error: '"+r+"' parameter is required for route '"+this.name+"'.");return encodeURIComponent(null!=(n=t[r])?n:"")}).replace(/\/+$/,""):this.template}}class R extends String{constructor(t,e,r=!0,n){var o;if(super(),this.t=null!=(o=null!=n?n:Ziggy)?o:null===globalThis||void 0===globalThis?void 0:globalThis.Ziggy,this.t={...this.t,absolute:r},t){if(!this.t.routes[t])throw new Error("Ziggy error: route '"+t+"' is not in the route list.");this.i=new N(t,this.t.routes[t],this.t),this.u=this.s(e)}}toString(){const t=Object.keys(this.u).filter(t=>!this.i.parameterSegments.some(({name:e})=>e===t)).filter(t=>"_query"!==t).reduce((t,e)=>({...t,[e]:this.u[e]}),{});return this.i.compile(this.u)+function(t,e){var r,n=t,o=function(t){if(!t)return b;if(null!=t.encoder&&"function"!=typeof t.encoder)throw new TypeError("Encoder has to be a function.");var e=t.charset||b.charset;if(void 0!==t.charset&&"utf-8"!==t.charset&&"iso-8859-1"!==t.charset)throw new TypeError("The charset option must be either utf-8, iso-8859-1, or undefined");var r=s.default;if(void 0!==t.format){if(!a.call(s.formatters,t.format))throw new TypeError("Unknown format option provided.");r=t.format}var n=s.formatters[r],o=b.filter;return("function"==typeof t.filter||l(t.filter))&&(o=t.filter),{addQueryPrefix:"boolean"==typeof t.addQueryPrefix?t.addQueryPrefix:b.addQueryPrefix,allowDots:void 0===t.allowDots?b.allowDots:!!t.allowDots,charset:e,charsetSentinel:"boolean"==typeof t.charsetSentinel?t.charsetSentinel:b.charsetSentinel,delimiter:void 0===t.delimiter?b.delimiter:t.delimiter,encode:"boolean"==typeof t.encode?t.encode:b.encode,encoder:"function"==typeof t.encoder?t.encoder:b.encoder,encodeValuesOnly:"boolean"==typeof t.encodeValuesOnly?t.encodeValuesOnly:b.encodeValuesOnly,filter:o,formatter:n,serializeDate:"function"==typeof t.serializeDate?t.serializeDate:b.serializeDate,skipNulls:"boolean"==typeof t.skipNulls?t.skipNulls:b.skipNulls,sort:"function"==typeof t.sort?t.sort:null,strictNullHandling:"boolean"==typeof t.strictNullHandling?t.strictNullHandling:b.strictNullHandling}}(e);"function"==typeof o.filter?n=(0,o.filter)("",n):l(o.filter)&&(r=o.filter);var i=[];if("object"!=typeof n||null===n)return"";var u=c[e&&e.arrayFormat in c?e.arrayFormat:e&&"indices"in e?e.indices?"indices":"repeat":"indices"];r||(r=Object.keys(n)),o.sort&&r.sort(o.sort);for(var f=0;f<r.length;++f){var p=r[f];o.skipNulls&&null===n[p]||d(i,v(n[p],p,u,o.strictNullHandling,o.skipNulls,o.encode?o.encoder:null,o.filter,o.sort,o.allowDots,o.serializeDate,o.formatter,o.encodeValuesOnly,o.charset))}var y=i.join(o.delimiter),h=!0===o.addQueryPrefix?"?":"";return o.charsetSentinel&&(h+="iso-8859-1"===o.charset?"utf8=%26%2310003%3B&":"utf8=%E2%9C%93&"),y.length>0?h+y:""}({...t,...this.u._query},{addQueryPrefix:!0,arrayFormat:"indices",encodeValuesOnly:!0,skipNulls:!0,encoder:(t,e)=>"boolean"==typeof t?Number(t):e(t)})}current(t,e){const r=this.t.absolute?window.location.host+window.location.pathname:window.location.pathname.replace(this.t.url.replace(/^\w*:\/\/[^/]+/,""),"").replace(/^\/+/,"/"),[n,o]=Object.entries(this.t.routes).find(([e,n])=>new N(t,n,this.t).matchesUrl(r))||[void 0,void 0];if(!t)return n;const i=new RegExp("^"+t.replace(".","\\.").replace("*",".*")+"$").test(n);if([null,void 0].includes(e)||!i)return i;const u=new N(n,o,this.t);e=this.s(e,u);const f=this.l(o);return!(!Object.values(e).every(t=>!t)||Object.values(f).length)||Object.entries(e).every(([t,e])=>f[t]==e)}get params(){return this.l(this.t.routes[this.current()])}has(t){return Object.keys(this.t.routes).includes(t)}s(t={},e=this.i){t=["string","number"].includes(typeof t)?[t]:t;const r=e.parameterSegments.filter(({name:t})=>!this.t.defaults[t]);return Array.isArray(t)?t=t.reduce((t,e,n)=>r[n]?{...t,[r[n].name]:e}:{...t,[e]:""},{}):1!==r.length||t[r[0].name]||!t.hasOwnProperty(Object.values(e.bindings)[0])&&!t.hasOwnProperty("id")||(t={[r[0].name]:t}),{...this.p(e),...this.h(t,e.bindings)}}p(t){return t.parameterSegments.filter(({name:t})=>this.t.defaults[t]).reduce((t,{name:e},r)=>({...t,[e]:this.t.defaults[e]}),{})}h(t,e={}){return Object.entries(t).reduce((t,[r,n])=>{if(!n||"object"!=typeof n||Array.isArray(n)||"_query"===r)return{...t,[r]:n};if(!n.hasOwnProperty(e[r])){if(!n.hasOwnProperty("id"))throw new Error("Ziggy error: object passed as '"+r+"' parameter is missing route model binding key '"+e[r]+"'.");e[r]="id"}return{...t,[r]:n[e[r]]}},{})}l(t){var e;let r=window.location.pathname.replace(this.t.url.replace(/^\w*:\/\/[^/]+/,""),"").replace(/^\/+/,"");const n=(t,e="",r)=>{const[n,o]=[t,e].map(t=>t.split(r));return o.reduce((t,e,r)=>/^{[^}?]+\??}$/.test(e)&&n[r]?{...t,[e.replace(/^{|\??}$/g,"")]:n[r]}:t,{})};return{...n(window.location.host,t.domain,"."),...n(r,t.uri,"/"),...S(null===(e=window.location.search)||void 0===e?void 0:e.replace(/^\?/,""))}}valueOf(){return this.toString()}check(t){return this.has(t)}}return function(t,e,r,n){const o=new R(t,e,r,n);return t?o.toString():o}});

</script>        <script src="/js/app.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div id="app" data-page="{&quot;component&quot;:&quot;Auth\/Login&quot;,&quot;props&quot;:{&quot;jetstream&quot;:{&quot;canCreateTeams&quot;:false,&quot;canManageTwoFactorAuthentication&quot;:true,&quot;canUpdatePassword&quot;:true,&quot;canUpdateProfileInformation&quot;:true,&quot;flash&quot;:[],&quot;hasAccountDeletionFeatures&quot;:true,&quot;hasApiFeatures&quot;:false,&quot;hasTeamFeatures&quot;:false,&quot;hasTermsAndPrivacyPolicyFeature&quot;:true,&quot;managesProfilePhotos&quot;:true},&quot;user&quot;:null,&quot;errorBags&quot;:[],&quot;errors&quot;:{},&quot;clave&quot;:&quot;&quot;,&quot;usuario&quot;:&quot;&quot;,&quot;canResetPassword&quot;:true,&quot;status&quot;:null},&quot;url&quot;:&quot;login&quot;,&quot;version&quot;:&quot;0f4e2ee0f7e2ca9da665d2f8035743df&quot;}"></div>
    </body>
</html>

```
<div id="execution-results-GETlogin" hidden>
    <blockquote>Received response<span id="execution-response-status-GETlogin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETlogin"></code></pre>
</div>
<div id="execution-error-GETlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlogin"></code></pre>
</div>
<form id="form-GETlogin" data-method="GET" data-path="login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETlogin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETlogin" onclick="tryItOut('GETlogin');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETlogin" onclick="cancelTryOut('GETlogin');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETlogin" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>login</code></b>
</p>
</form>


## Attempt to authenticate a new session.




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"est","password":"autem"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "est",
    "password": "autem"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTlogin" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTlogin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogin"></code></pre>
</div>
<div id="execution-error-POSTlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogin"></code></pre>
</div>
<form id="form-POSTlogin" data-method="POST" data-path="login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTlogin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTlogin" onclick="tryItOut('POSTlogin');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTlogin" onclick="cancelTryOut('POSTlogin');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTlogin" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTlogin" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTlogin" data-component="body" required  hidden>
<br>

</p>

</form>


## Destroy an authenticated session.




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/logout"
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


<div id="execution-results-POSTlogout" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTlogout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogout"></code></pre>
</div>
<div id="execution-error-POSTlogout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogout"></code></pre>
</div>
<form id="form-POSTlogout" data-method="POST" data-path="logout" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTlogout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTlogout" onclick="tryItOut('POSTlogout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTlogout" onclick="cancelTryOut('POSTlogout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTlogout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>logout</code></b>
</p>
</form>


## Show the reset password link request view.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/forgot-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/forgot-password"
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


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="2ZJ3jFcpcvBglRHqKmZnJLW6ck0xdG5rwktPUpXR">
        <link rel="shortcut icon" href="http://localhost:8000/img/mrsaturn3.svg">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

        <!-- Scripts -->
        <script type="text/javascript">
    (function () {
        const routes = {"larecipe.search":{"uri":"docs\/search-index\/{version}","methods":["GET","HEAD"]},"larecipe.styles":{"uri":"docs\/styles\/{style}","methods":["GET","HEAD"]},"larecipe.scripts":{"uri":"docs\/scripts\/{script}","methods":["GET","HEAD"]},"larecipe.index":{"uri":"docs","methods":["GET","HEAD"]},"larecipe.show":{"uri":"docs\/{version}\/{page?}","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.update":{"uri":"reset-password","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"verification.notice":{"uri":"email\/verify","methods":["GET","HEAD"]},"verification.verify":{"uri":"email\/verify\/{id}\/{hash}","methods":["GET","HEAD"]},"verification.send":{"uri":"email\/verification-notification","methods":["POST"]},"user-profile-information.update":{"uri":"user\/profile-information","methods":["PUT"]},"user-password.update":{"uri":"user\/password","methods":["PUT"]},"password.confirm":{"uri":"user\/confirm-password","methods":["GET","HEAD"]},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"]},"two-factor.login":{"uri":"two-factor-challenge","methods":["GET","HEAD"]},"two-factor.enable":{"uri":"user\/two-factor-authentication","methods":["POST"]},"two-factor.disable":{"uri":"user\/two-factor-authentication","methods":["DELETE"]},"two-factor.qr-code":{"uri":"user\/two-factor-qr-code","methods":["GET","HEAD"]},"two-factor.recovery-codes":{"uri":"user\/two-factor-recovery-codes","methods":["GET","HEAD"]},"terms.show":{"uri":"terms-of-service","methods":["GET","HEAD"]},"policy.show":{"uri":"privacy-policy","methods":["GET","HEAD"]},"profile.show":{"uri":"user\/profile","methods":["GET","HEAD"]},"other-browser-sessions.destroy":{"uri":"user\/other-browser-sessions","methods":["DELETE"]},"current-user-photo.destroy":{"uri":"user\/profile-photo","methods":["DELETE"]},"current-user.destroy":{"uri":"user","methods":["DELETE"]},"users.index":{"uri":"api\/users","methods":["GET","HEAD"]},"users.show":{"uri":"api\/users\/{user}","methods":["GET","HEAD"]},"users.update":{"uri":"api\/users\/{user}","methods":["PUT","PATCH"]},"users.destroy":{"uri":"api\/users\/{user}","methods":["DELETE"]},"animes.index":{"uri":"api\/animes","methods":["GET","HEAD"]},"animes.store":{"uri":"api\/animes","methods":["POST"]},"animes.show":{"uri":"api\/animes\/{anime}","methods":["GET","HEAD"]},"animes.update":{"uri":"api\/animes\/{anime}","methods":["PUT","PATCH"]},"animes.destroy":{"uri":"api\/animes\/{anime}","methods":["DELETE"]},"mangas.index":{"uri":"api\/mangas","methods":["GET","HEAD"]},"mangas.store":{"uri":"api\/mangas","methods":["POST"]},"mangas.show":{"uri":"api\/mangas\/{manga}","methods":["GET","HEAD"]},"mangas.update":{"uri":"api\/mangas\/{manga}","methods":["PUT","PATCH"]},"mangas.destroy":{"uri":"api\/mangas\/{manga}","methods":["DELETE"]},"reads.index":{"uri":"api\/reads\/{user}","methods":["GET","HEAD"]},"reads.show":{"uri":"api\/reads\/{manga}\/{user}","methods":["GET","HEAD"]},"reads.store":{"uri":"api\/reads","methods":["POST"]},"reads.update":{"uri":"api\/reads\/{manga}\/{user}","methods":["PATCH"]},"reads.destroy":{"uri":"api\/reads\/{manga}\/{user}","methods":["DELETE"]},"watches.index":{"uri":"api\/watches\/{user}","methods":["GET","HEAD"]},"watches.show":{"uri":"api\/watches\/{anime}\/{user}","methods":["GET","HEAD"]},"watches.store":{"uri":"api\/watches","methods":["POST"]},"watches.update":{"uri":"api\/watches\/{anime}\/{user}","methods":["PATCH"]},"watches.destroy":{"uri":"api\/watches\/{anime}\/{user}","methods":["DELETE"]},"friends.store":{"uri":"api\/friends","methods":["POST"]},"friends.show":{"uri":"api\/friends\/{friend}","methods":["GET","HEAD"]},"friends.update":{"uri":"api\/friends\/{friend}","methods":["PUT","PATCH"]},"friends.destroy":{"uri":"api\/friends\/{friend}","methods":["DELETE"]},"friends.index":{"uri":"api\/friendsIndex\/{friend}","methods":["GET","HEAD"]},"messages.index":{"uri":"api\/messages","methods":["GET","HEAD"]},"messages.store":{"uri":"api\/messages","methods":["POST"]},"messages.show":{"uri":"api\/messages\/{message}","methods":["GET","HEAD"]},"messages.destroy":{"uri":"api\/messages\/{message}","methods":["DELETE"]},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"AnimeList":{"uri":"AnimeList","methods":["GET","HEAD"]},"AnimeUserList":{"uri":"AnimeUserList\/{id}","methods":["GET","HEAD"]},"AnimeProfile":{"uri":"AnimeProfile\/{id}","methods":["GET","HEAD"]},"MangaList":{"uri":"MangaList","methods":["GET","HEAD"]},"MangaUserList":{"uri":"MangaUserList\/{id}","methods":["GET","HEAD"]},"MangaProfile":{"uri":"MangaProfile\/{id}","methods":["GET","HEAD"]},"FriendsList":{"uri":"FriendsList\/{id}","methods":["GET","HEAD"]},"MessagesList":{"uri":"MessagesList","methods":["GET","HEAD"]},"UserShow":{"uri":"UserShow\/{id}","methods":["GET","HEAD"]},"SharedLists":{"uri":"SharedLists\/{usu2?}\/{tipo?}\/{ambos?}","methods":["GET","HEAD"]},"UserAdminList":{"uri":"UserAdminList","methods":["GET","HEAD"]},"MangaAdminList":{"uri":"MangaAdminList","methods":["GET","HEAD"]},"AnimeAdminList":{"uri":"AnimeAdminList","methods":["GET","HEAD"]}};

        for (let name in routes) {
            Ziggy.routes[name] = routes[name];
        }
    })();
</script>        <script src="/js/app.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div id="app" data-page="{&quot;component&quot;:&quot;Auth\/ForgotPassword&quot;,&quot;props&quot;:{&quot;jetstream&quot;:{&quot;canCreateTeams&quot;:false,&quot;canManageTwoFactorAuthentication&quot;:true,&quot;canUpdatePassword&quot;:true,&quot;canUpdateProfileInformation&quot;:true,&quot;flash&quot;:[],&quot;hasAccountDeletionFeatures&quot;:true,&quot;hasApiFeatures&quot;:false,&quot;hasTeamFeatures&quot;:false,&quot;hasTermsAndPrivacyPolicyFeature&quot;:true,&quot;managesProfilePhotos&quot;:true},&quot;user&quot;:null,&quot;errorBags&quot;:[],&quot;errors&quot;:{},&quot;clave&quot;:&quot;&quot;,&quot;usuario&quot;:&quot;&quot;,&quot;status&quot;:null},&quot;url&quot;:&quot;forgot-password&quot;,&quot;version&quot;:&quot;0f4e2ee0f7e2ca9da665d2f8035743df&quot;}"></div>
    </body>
</html>

```
<div id="execution-results-GETforgot-password" hidden>
    <blockquote>Received response<span id="execution-response-status-GETforgot-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETforgot-password"></code></pre>
</div>
<div id="execution-error-GETforgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETforgot-password"></code></pre>
</div>
<form id="form-GETforgot-password" data-method="GET" data-path="forgot-password" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETforgot-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETforgot-password" onclick="tryItOut('GETforgot-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETforgot-password" onclick="cancelTryOut('GETforgot-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETforgot-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>forgot-password</code></b>
</p>
</form>


## Show the new password view.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/reset-password/adipisci" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/reset-password/adipisci"
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


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="2ZJ3jFcpcvBglRHqKmZnJLW6ck0xdG5rwktPUpXR">
        <link rel="shortcut icon" href="http://localhost:8000/img/mrsaturn3.svg">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

        <!-- Scripts -->
        <script type="text/javascript">
    (function () {
        const routes = {"larecipe.search":{"uri":"docs\/search-index\/{version}","methods":["GET","HEAD"]},"larecipe.styles":{"uri":"docs\/styles\/{style}","methods":["GET","HEAD"]},"larecipe.scripts":{"uri":"docs\/scripts\/{script}","methods":["GET","HEAD"]},"larecipe.index":{"uri":"docs","methods":["GET","HEAD"]},"larecipe.show":{"uri":"docs\/{version}\/{page?}","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.update":{"uri":"reset-password","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"verification.notice":{"uri":"email\/verify","methods":["GET","HEAD"]},"verification.verify":{"uri":"email\/verify\/{id}\/{hash}","methods":["GET","HEAD"]},"verification.send":{"uri":"email\/verification-notification","methods":["POST"]},"user-profile-information.update":{"uri":"user\/profile-information","methods":["PUT"]},"user-password.update":{"uri":"user\/password","methods":["PUT"]},"password.confirm":{"uri":"user\/confirm-password","methods":["GET","HEAD"]},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"]},"two-factor.login":{"uri":"two-factor-challenge","methods":["GET","HEAD"]},"two-factor.enable":{"uri":"user\/two-factor-authentication","methods":["POST"]},"two-factor.disable":{"uri":"user\/two-factor-authentication","methods":["DELETE"]},"two-factor.qr-code":{"uri":"user\/two-factor-qr-code","methods":["GET","HEAD"]},"two-factor.recovery-codes":{"uri":"user\/two-factor-recovery-codes","methods":["GET","HEAD"]},"terms.show":{"uri":"terms-of-service","methods":["GET","HEAD"]},"policy.show":{"uri":"privacy-policy","methods":["GET","HEAD"]},"profile.show":{"uri":"user\/profile","methods":["GET","HEAD"]},"other-browser-sessions.destroy":{"uri":"user\/other-browser-sessions","methods":["DELETE"]},"current-user-photo.destroy":{"uri":"user\/profile-photo","methods":["DELETE"]},"current-user.destroy":{"uri":"user","methods":["DELETE"]},"users.index":{"uri":"api\/users","methods":["GET","HEAD"]},"users.show":{"uri":"api\/users\/{user}","methods":["GET","HEAD"]},"users.update":{"uri":"api\/users\/{user}","methods":["PUT","PATCH"]},"users.destroy":{"uri":"api\/users\/{user}","methods":["DELETE"]},"animes.index":{"uri":"api\/animes","methods":["GET","HEAD"]},"animes.store":{"uri":"api\/animes","methods":["POST"]},"animes.show":{"uri":"api\/animes\/{anime}","methods":["GET","HEAD"]},"animes.update":{"uri":"api\/animes\/{anime}","methods":["PUT","PATCH"]},"animes.destroy":{"uri":"api\/animes\/{anime}","methods":["DELETE"]},"mangas.index":{"uri":"api\/mangas","methods":["GET","HEAD"]},"mangas.store":{"uri":"api\/mangas","methods":["POST"]},"mangas.show":{"uri":"api\/mangas\/{manga}","methods":["GET","HEAD"]},"mangas.update":{"uri":"api\/mangas\/{manga}","methods":["PUT","PATCH"]},"mangas.destroy":{"uri":"api\/mangas\/{manga}","methods":["DELETE"]},"reads.index":{"uri":"api\/reads\/{user}","methods":["GET","HEAD"]},"reads.show":{"uri":"api\/reads\/{manga}\/{user}","methods":["GET","HEAD"]},"reads.store":{"uri":"api\/reads","methods":["POST"]},"reads.update":{"uri":"api\/reads\/{manga}\/{user}","methods":["PATCH"]},"reads.destroy":{"uri":"api\/reads\/{manga}\/{user}","methods":["DELETE"]},"watches.index":{"uri":"api\/watches\/{user}","methods":["GET","HEAD"]},"watches.show":{"uri":"api\/watches\/{anime}\/{user}","methods":["GET","HEAD"]},"watches.store":{"uri":"api\/watches","methods":["POST"]},"watches.update":{"uri":"api\/watches\/{anime}\/{user}","methods":["PATCH"]},"watches.destroy":{"uri":"api\/watches\/{anime}\/{user}","methods":["DELETE"]},"friends.store":{"uri":"api\/friends","methods":["POST"]},"friends.show":{"uri":"api\/friends\/{friend}","methods":["GET","HEAD"]},"friends.update":{"uri":"api\/friends\/{friend}","methods":["PUT","PATCH"]},"friends.destroy":{"uri":"api\/friends\/{friend}","methods":["DELETE"]},"friends.index":{"uri":"api\/friendsIndex\/{friend}","methods":["GET","HEAD"]},"messages.index":{"uri":"api\/messages","methods":["GET","HEAD"]},"messages.store":{"uri":"api\/messages","methods":["POST"]},"messages.show":{"uri":"api\/messages\/{message}","methods":["GET","HEAD"]},"messages.destroy":{"uri":"api\/messages\/{message}","methods":["DELETE"]},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"AnimeList":{"uri":"AnimeList","methods":["GET","HEAD"]},"AnimeUserList":{"uri":"AnimeUserList\/{id}","methods":["GET","HEAD"]},"AnimeProfile":{"uri":"AnimeProfile\/{id}","methods":["GET","HEAD"]},"MangaList":{"uri":"MangaList","methods":["GET","HEAD"]},"MangaUserList":{"uri":"MangaUserList\/{id}","methods":["GET","HEAD"]},"MangaProfile":{"uri":"MangaProfile\/{id}","methods":["GET","HEAD"]},"FriendsList":{"uri":"FriendsList\/{id}","methods":["GET","HEAD"]},"MessagesList":{"uri":"MessagesList","methods":["GET","HEAD"]},"UserShow":{"uri":"UserShow\/{id}","methods":["GET","HEAD"]},"SharedLists":{"uri":"SharedLists\/{usu2?}\/{tipo?}\/{ambos?}","methods":["GET","HEAD"]},"UserAdminList":{"uri":"UserAdminList","methods":["GET","HEAD"]},"MangaAdminList":{"uri":"MangaAdminList","methods":["GET","HEAD"]},"AnimeAdminList":{"uri":"AnimeAdminList","methods":["GET","HEAD"]}};

        for (let name in routes) {
            Ziggy.routes[name] = routes[name];
        }
    })();
</script>        <script src="/js/app.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div id="app" data-page="{&quot;component&quot;:&quot;Auth\/ResetPassword&quot;,&quot;props&quot;:{&quot;jetstream&quot;:{&quot;canCreateTeams&quot;:false,&quot;canManageTwoFactorAuthentication&quot;:true,&quot;canUpdatePassword&quot;:true,&quot;canUpdateProfileInformation&quot;:true,&quot;flash&quot;:[],&quot;hasAccountDeletionFeatures&quot;:true,&quot;hasApiFeatures&quot;:false,&quot;hasTeamFeatures&quot;:false,&quot;hasTermsAndPrivacyPolicyFeature&quot;:true,&quot;managesProfilePhotos&quot;:true},&quot;user&quot;:null,&quot;errorBags&quot;:[],&quot;errors&quot;:{},&quot;clave&quot;:&quot;&quot;,&quot;usuario&quot;:&quot;&quot;,&quot;email&quot;:null,&quot;token&quot;:&quot;adipisci&quot;},&quot;url&quot;:&quot;reset-password\/adipisci&quot;,&quot;version&quot;:&quot;0f4e2ee0f7e2ca9da665d2f8035743df&quot;}"></div>
    </body>
</html>

```
<div id="execution-results-GETreset-password--token-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETreset-password--token-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETreset-password--token-"></code></pre>
</div>
<div id="execution-error-GETreset-password--token-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETreset-password--token-"></code></pre>
</div>
<form id="form-GETreset-password--token-" data-method="GET" data-path="reset-password/{token}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETreset-password--token-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETreset-password--token-" onclick="tryItOut('GETreset-password--token-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETreset-password--token-" onclick="cancelTryOut('GETreset-password--token-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETreset-password--token-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>reset-password/{token}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="token" data-endpoint="GETreset-password--token-" data-component="url" required  hidden>
<br>

</p>
</form>


## Send a reset link to the given user.




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/forgot-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/forgot-password"
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


<div id="execution-results-POSTforgot-password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTforgot-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTforgot-password"></code></pre>
</div>
<div id="execution-error-POSTforgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTforgot-password"></code></pre>
</div>
<form id="form-POSTforgot-password" data-method="POST" data-path="forgot-password" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTforgot-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTforgot-password" onclick="tryItOut('POSTforgot-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTforgot-password" onclick="cancelTryOut('POSTforgot-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTforgot-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>forgot-password</code></b>
</p>
</form>


## Reset the user&#039;s password.




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/reset-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/reset-password"
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


<div id="execution-results-POSTreset-password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTreset-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTreset-password"></code></pre>
</div>
<div id="execution-error-POSTreset-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTreset-password"></code></pre>
</div>
<form id="form-POSTreset-password" data-method="POST" data-path="reset-password" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTreset-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTreset-password" onclick="tryItOut('POSTreset-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTreset-password" onclick="cancelTryOut('POSTreset-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTreset-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>reset-password</code></b>
</p>
</form>


## Show the registration view.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/register"
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


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="2ZJ3jFcpcvBglRHqKmZnJLW6ck0xdG5rwktPUpXR">
        <link rel="shortcut icon" href="http://localhost:8000/img/mrsaturn3.svg">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

        <!-- Scripts -->
        <script type="text/javascript">
    (function () {
        const routes = {"larecipe.search":{"uri":"docs\/search-index\/{version}","methods":["GET","HEAD"]},"larecipe.styles":{"uri":"docs\/styles\/{style}","methods":["GET","HEAD"]},"larecipe.scripts":{"uri":"docs\/scripts\/{script}","methods":["GET","HEAD"]},"larecipe.index":{"uri":"docs","methods":["GET","HEAD"]},"larecipe.show":{"uri":"docs\/{version}\/{page?}","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.update":{"uri":"reset-password","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"verification.notice":{"uri":"email\/verify","methods":["GET","HEAD"]},"verification.verify":{"uri":"email\/verify\/{id}\/{hash}","methods":["GET","HEAD"]},"verification.send":{"uri":"email\/verification-notification","methods":["POST"]},"user-profile-information.update":{"uri":"user\/profile-information","methods":["PUT"]},"user-password.update":{"uri":"user\/password","methods":["PUT"]},"password.confirm":{"uri":"user\/confirm-password","methods":["GET","HEAD"]},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"]},"two-factor.login":{"uri":"two-factor-challenge","methods":["GET","HEAD"]},"two-factor.enable":{"uri":"user\/two-factor-authentication","methods":["POST"]},"two-factor.disable":{"uri":"user\/two-factor-authentication","methods":["DELETE"]},"two-factor.qr-code":{"uri":"user\/two-factor-qr-code","methods":["GET","HEAD"]},"two-factor.recovery-codes":{"uri":"user\/two-factor-recovery-codes","methods":["GET","HEAD"]},"terms.show":{"uri":"terms-of-service","methods":["GET","HEAD"]},"policy.show":{"uri":"privacy-policy","methods":["GET","HEAD"]},"profile.show":{"uri":"user\/profile","methods":["GET","HEAD"]},"other-browser-sessions.destroy":{"uri":"user\/other-browser-sessions","methods":["DELETE"]},"current-user-photo.destroy":{"uri":"user\/profile-photo","methods":["DELETE"]},"current-user.destroy":{"uri":"user","methods":["DELETE"]},"users.index":{"uri":"api\/users","methods":["GET","HEAD"]},"users.show":{"uri":"api\/users\/{user}","methods":["GET","HEAD"]},"users.update":{"uri":"api\/users\/{user}","methods":["PUT","PATCH"]},"users.destroy":{"uri":"api\/users\/{user}","methods":["DELETE"]},"animes.index":{"uri":"api\/animes","methods":["GET","HEAD"]},"animes.store":{"uri":"api\/animes","methods":["POST"]},"animes.show":{"uri":"api\/animes\/{anime}","methods":["GET","HEAD"]},"animes.update":{"uri":"api\/animes\/{anime}","methods":["PUT","PATCH"]},"animes.destroy":{"uri":"api\/animes\/{anime}","methods":["DELETE"]},"mangas.index":{"uri":"api\/mangas","methods":["GET","HEAD"]},"mangas.store":{"uri":"api\/mangas","methods":["POST"]},"mangas.show":{"uri":"api\/mangas\/{manga}","methods":["GET","HEAD"]},"mangas.update":{"uri":"api\/mangas\/{manga}","methods":["PUT","PATCH"]},"mangas.destroy":{"uri":"api\/mangas\/{manga}","methods":["DELETE"]},"reads.index":{"uri":"api\/reads\/{user}","methods":["GET","HEAD"]},"reads.show":{"uri":"api\/reads\/{manga}\/{user}","methods":["GET","HEAD"]},"reads.store":{"uri":"api\/reads","methods":["POST"]},"reads.update":{"uri":"api\/reads\/{manga}\/{user}","methods":["PATCH"]},"reads.destroy":{"uri":"api\/reads\/{manga}\/{user}","methods":["DELETE"]},"watches.index":{"uri":"api\/watches\/{user}","methods":["GET","HEAD"]},"watches.show":{"uri":"api\/watches\/{anime}\/{user}","methods":["GET","HEAD"]},"watches.store":{"uri":"api\/watches","methods":["POST"]},"watches.update":{"uri":"api\/watches\/{anime}\/{user}","methods":["PATCH"]},"watches.destroy":{"uri":"api\/watches\/{anime}\/{user}","methods":["DELETE"]},"friends.store":{"uri":"api\/friends","methods":["POST"]},"friends.show":{"uri":"api\/friends\/{friend}","methods":["GET","HEAD"]},"friends.update":{"uri":"api\/friends\/{friend}","methods":["PUT","PATCH"]},"friends.destroy":{"uri":"api\/friends\/{friend}","methods":["DELETE"]},"friends.index":{"uri":"api\/friendsIndex\/{friend}","methods":["GET","HEAD"]},"messages.index":{"uri":"api\/messages","methods":["GET","HEAD"]},"messages.store":{"uri":"api\/messages","methods":["POST"]},"messages.show":{"uri":"api\/messages\/{message}","methods":["GET","HEAD"]},"messages.destroy":{"uri":"api\/messages\/{message}","methods":["DELETE"]},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"AnimeList":{"uri":"AnimeList","methods":["GET","HEAD"]},"AnimeUserList":{"uri":"AnimeUserList\/{id}","methods":["GET","HEAD"]},"AnimeProfile":{"uri":"AnimeProfile\/{id}","methods":["GET","HEAD"]},"MangaList":{"uri":"MangaList","methods":["GET","HEAD"]},"MangaUserList":{"uri":"MangaUserList\/{id}","methods":["GET","HEAD"]},"MangaProfile":{"uri":"MangaProfile\/{id}","methods":["GET","HEAD"]},"FriendsList":{"uri":"FriendsList\/{id}","methods":["GET","HEAD"]},"MessagesList":{"uri":"MessagesList","methods":["GET","HEAD"]},"UserShow":{"uri":"UserShow\/{id}","methods":["GET","HEAD"]},"SharedLists":{"uri":"SharedLists\/{usu2?}\/{tipo?}\/{ambos?}","methods":["GET","HEAD"]},"UserAdminList":{"uri":"UserAdminList","methods":["GET","HEAD"]},"MangaAdminList":{"uri":"MangaAdminList","methods":["GET","HEAD"]},"AnimeAdminList":{"uri":"AnimeAdminList","methods":["GET","HEAD"]}};

        for (let name in routes) {
            Ziggy.routes[name] = routes[name];
        }
    })();
</script>        <script src="/js/app.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div id="app" data-page="{&quot;component&quot;:&quot;Auth\/Register&quot;,&quot;props&quot;:{&quot;jetstream&quot;:{&quot;canCreateTeams&quot;:false,&quot;canManageTwoFactorAuthentication&quot;:true,&quot;canUpdatePassword&quot;:true,&quot;canUpdateProfileInformation&quot;:true,&quot;flash&quot;:[],&quot;hasAccountDeletionFeatures&quot;:true,&quot;hasApiFeatures&quot;:false,&quot;hasTeamFeatures&quot;:false,&quot;hasTermsAndPrivacyPolicyFeature&quot;:true,&quot;managesProfilePhotos&quot;:true},&quot;user&quot;:null,&quot;errorBags&quot;:[],&quot;errors&quot;:{},&quot;clave&quot;:&quot;&quot;,&quot;usuario&quot;:&quot;&quot;},&quot;url&quot;:&quot;register&quot;,&quot;version&quot;:&quot;0f4e2ee0f7e2ca9da665d2f8035743df&quot;}"></div>
    </body>
</html>

```
<div id="execution-results-GETregister" hidden>
    <blockquote>Received response<span id="execution-response-status-GETregister"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETregister"></code></pre>
</div>
<div id="execution-error-GETregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETregister"></code></pre>
</div>
<form id="form-GETregister" data-method="GET" data-path="register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETregister', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETregister" onclick="tryItOut('GETregister');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETregister" onclick="cancelTryOut('GETregister');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETregister" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>register</code></b>
</p>
</form>


## Create a new registered user.




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/register"
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


<div id="execution-results-POSTregister" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTregister"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTregister"></code></pre>
</div>
<div id="execution-error-POSTregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTregister"></code></pre>
</div>
<form id="form-POSTregister" data-method="POST" data-path="register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTregister', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTregister" onclick="tryItOut('POSTregister');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTregister" onclick="cancelTryOut('POSTregister');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTregister" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>register</code></b>
</p>
</form>


## Display the email verification prompt.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/email/verify" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/email/verify"
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
<div id="execution-results-GETemail-verify" hidden>
    <blockquote>Received response<span id="execution-response-status-GETemail-verify"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETemail-verify"></code></pre>
</div>
<div id="execution-error-GETemail-verify" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETemail-verify"></code></pre>
</div>
<form id="form-GETemail-verify" data-method="GET" data-path="email/verify" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETemail-verify', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETemail-verify" onclick="tryItOut('GETemail-verify');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETemail-verify" onclick="cancelTryOut('GETemail-verify');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETemail-verify" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>email/verify</code></b>
</p>
</form>


## Mark the authenticated user&#039;s email address as verified.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/email/verify/nobis/repudiandae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/email/verify/nobis/repudiandae"
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
<div id="execution-results-GETemail-verify--id---hash-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETemail-verify--id---hash-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETemail-verify--id---hash-"></code></pre>
</div>
<div id="execution-error-GETemail-verify--id---hash-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETemail-verify--id---hash-"></code></pre>
</div>
<form id="form-GETemail-verify--id---hash-" data-method="GET" data-path="email/verify/{id}/{hash}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETemail-verify--id---hash-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETemail-verify--id---hash-" onclick="tryItOut('GETemail-verify--id---hash-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETemail-verify--id---hash-" onclick="cancelTryOut('GETemail-verify--id---hash-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETemail-verify--id---hash-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>email/verify/{id}/{hash}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETemail-verify--id---hash-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>hash</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="hash" data-endpoint="GETemail-verify--id---hash-" data-component="url" required  hidden>
<br>

</p>
</form>


## Send a new email verification notification.




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/email/verification-notification" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/email/verification-notification"
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


<div id="execution-results-POSTemail-verification-notification" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTemail-verification-notification"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTemail-verification-notification"></code></pre>
</div>
<div id="execution-error-POSTemail-verification-notification" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTemail-verification-notification"></code></pre>
</div>
<form id="form-POSTemail-verification-notification" data-method="POST" data-path="email/verification-notification" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTemail-verification-notification', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTemail-verification-notification" onclick="tryItOut('POSTemail-verification-notification');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTemail-verification-notification" onclick="cancelTryOut('POSTemail-verification-notification');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTemail-verification-notification" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>email/verification-notification</code></b>
</p>
</form>


## Update the user&#039;s profile information.




> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/user/profile-information" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/user/profile-information"
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


<div id="execution-results-PUTuser-profile-information" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTuser-profile-information"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTuser-profile-information"></code></pre>
</div>
<div id="execution-error-PUTuser-profile-information" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTuser-profile-information"></code></pre>
</div>
<form id="form-PUTuser-profile-information" data-method="PUT" data-path="user/profile-information" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTuser-profile-information', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTuser-profile-information" onclick="tryItOut('PUTuser-profile-information');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTuser-profile-information" onclick="cancelTryOut('PUTuser-profile-information');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTuser-profile-information" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>user/profile-information</code></b>
</p>
</form>


## Update the user&#039;s password.




> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/user/password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/user/password"
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


<div id="execution-results-PUTuser-password" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTuser-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTuser-password"></code></pre>
</div>
<div id="execution-error-PUTuser-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTuser-password"></code></pre>
</div>
<form id="form-PUTuser-password" data-method="PUT" data-path="user/password" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTuser-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTuser-password" onclick="tryItOut('PUTuser-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTuser-password" onclick="cancelTryOut('PUTuser-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTuser-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>user/password</code></b>
</p>
</form>


## Show the confirm password view.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/user/confirm-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/user/confirm-password"
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
<div id="execution-results-GETuser-confirm-password" hidden>
    <blockquote>Received response<span id="execution-response-status-GETuser-confirm-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-confirm-password"></code></pre>
</div>
<div id="execution-error-GETuser-confirm-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-confirm-password"></code></pre>
</div>
<form id="form-GETuser-confirm-password" data-method="GET" data-path="user/confirm-password" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETuser-confirm-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETuser-confirm-password" onclick="tryItOut('GETuser-confirm-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETuser-confirm-password" onclick="cancelTryOut('GETuser-confirm-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETuser-confirm-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>user/confirm-password</code></b>
</p>
</form>


## Get the password confirmation status.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/user/confirmed-password-status" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/user/confirmed-password-status"
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
<div id="execution-results-GETuser-confirmed-password-status" hidden>
    <blockquote>Received response<span id="execution-response-status-GETuser-confirmed-password-status"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-confirmed-password-status"></code></pre>
</div>
<div id="execution-error-GETuser-confirmed-password-status" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-confirmed-password-status"></code></pre>
</div>
<form id="form-GETuser-confirmed-password-status" data-method="GET" data-path="user/confirmed-password-status" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETuser-confirmed-password-status', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETuser-confirmed-password-status" onclick="tryItOut('GETuser-confirmed-password-status');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETuser-confirmed-password-status" onclick="cancelTryOut('GETuser-confirmed-password-status');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETuser-confirmed-password-status" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>user/confirmed-password-status</code></b>
</p>
</form>


## Confirm the user&#039;s password.




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/user/confirm-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/user/confirm-password"
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


<div id="execution-results-POSTuser-confirm-password" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTuser-confirm-password"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTuser-confirm-password"></code></pre>
</div>
<div id="execution-error-POSTuser-confirm-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTuser-confirm-password"></code></pre>
</div>
<form id="form-POSTuser-confirm-password" data-method="POST" data-path="user/confirm-password" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTuser-confirm-password', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTuser-confirm-password" onclick="tryItOut('POSTuser-confirm-password');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTuser-confirm-password" onclick="cancelTryOut('POSTuser-confirm-password');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTuser-confirm-password" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>user/confirm-password</code></b>
</p>
</form>


## Show the two factor authentication challenge view.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/two-factor-challenge" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"quaerat","recovery_code":"eum"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/two-factor-challenge"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "quaerat",
    "recovery_code": "eum"
}

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (302):

```json

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="refresh" content="0;url='http://localhost:8000/login'" />

        <title>Redirecting to http://localhost:8000/login</title>
    </head>
    <body>
        Redirecting to <a href="http://localhost:8000/login">http://localhost:8000/login</a>.
    </body>
</html>
```
<div id="execution-results-GETtwo-factor-challenge" hidden>
    <blockquote>Received response<span id="execution-response-status-GETtwo-factor-challenge"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETtwo-factor-challenge"></code></pre>
</div>
<div id="execution-error-GETtwo-factor-challenge" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETtwo-factor-challenge"></code></pre>
</div>
<form id="form-GETtwo-factor-challenge" data-method="GET" data-path="two-factor-challenge" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETtwo-factor-challenge', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETtwo-factor-challenge" onclick="tryItOut('GETtwo-factor-challenge');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETtwo-factor-challenge" onclick="cancelTryOut('GETtwo-factor-challenge');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETtwo-factor-challenge" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>two-factor-challenge</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>code</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="code" data-endpoint="GETtwo-factor-challenge" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>recovery_code</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="recovery_code" data-endpoint="GETtwo-factor-challenge" data-component="body"  hidden>
<br>

</p>

</form>


## Attempt to authenticate a new session using the two factor authentication code.




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/two-factor-challenge" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"code":"ad","recovery_code":"earum"}'

```

```javascript
const url = new URL(
    "http://localhost:8000/two-factor-challenge"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "code": "ad",
    "recovery_code": "earum"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


<div id="execution-results-POSTtwo-factor-challenge" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTtwo-factor-challenge"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTtwo-factor-challenge"></code></pre>
</div>
<div id="execution-error-POSTtwo-factor-challenge" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTtwo-factor-challenge"></code></pre>
</div>
<form id="form-POSTtwo-factor-challenge" data-method="POST" data-path="two-factor-challenge" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTtwo-factor-challenge', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTtwo-factor-challenge" onclick="tryItOut('POSTtwo-factor-challenge');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTtwo-factor-challenge" onclick="cancelTryOut('POSTtwo-factor-challenge');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTtwo-factor-challenge" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>two-factor-challenge</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>code</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="code" data-endpoint="POSTtwo-factor-challenge" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>recovery_code</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="recovery_code" data-endpoint="POSTtwo-factor-challenge" data-component="body"  hidden>
<br>

</p>

</form>


## Enable two factor authentication for the user.




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/user/two-factor-authentication" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/user/two-factor-authentication"
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


<div id="execution-results-POSTuser-two-factor-authentication" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTuser-two-factor-authentication"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTuser-two-factor-authentication"></code></pre>
</div>
<div id="execution-error-POSTuser-two-factor-authentication" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTuser-two-factor-authentication"></code></pre>
</div>
<form id="form-POSTuser-two-factor-authentication" data-method="POST" data-path="user/two-factor-authentication" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTuser-two-factor-authentication', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTuser-two-factor-authentication" onclick="tryItOut('POSTuser-two-factor-authentication');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTuser-two-factor-authentication" onclick="cancelTryOut('POSTuser-two-factor-authentication');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTuser-two-factor-authentication" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>user/two-factor-authentication</code></b>
</p>
</form>


## Disable two factor authentication for the user.




> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/user/two-factor-authentication" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/user/two-factor-authentication"
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


<div id="execution-results-DELETEuser-two-factor-authentication" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEuser-two-factor-authentication"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEuser-two-factor-authentication"></code></pre>
</div>
<div id="execution-error-DELETEuser-two-factor-authentication" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEuser-two-factor-authentication"></code></pre>
</div>
<form id="form-DELETEuser-two-factor-authentication" data-method="DELETE" data-path="user/two-factor-authentication" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEuser-two-factor-authentication', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEuser-two-factor-authentication" onclick="tryItOut('DELETEuser-two-factor-authentication');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEuser-two-factor-authentication" onclick="cancelTryOut('DELETEuser-two-factor-authentication');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEuser-two-factor-authentication" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>user/two-factor-authentication</code></b>
</p>
</form>


## Get the SVG element for the user&#039;s two factor authentication QR code.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/user/two-factor-qr-code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/user/two-factor-qr-code"
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
<div id="execution-results-GETuser-two-factor-qr-code" hidden>
    <blockquote>Received response<span id="execution-response-status-GETuser-two-factor-qr-code"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-two-factor-qr-code"></code></pre>
</div>
<div id="execution-error-GETuser-two-factor-qr-code" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-two-factor-qr-code"></code></pre>
</div>
<form id="form-GETuser-two-factor-qr-code" data-method="GET" data-path="user/two-factor-qr-code" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETuser-two-factor-qr-code', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETuser-two-factor-qr-code" onclick="tryItOut('GETuser-two-factor-qr-code');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETuser-two-factor-qr-code" onclick="cancelTryOut('GETuser-two-factor-qr-code');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETuser-two-factor-qr-code" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>user/two-factor-qr-code</code></b>
</p>
</form>


## Get the two factor authentication recovery codes for authenticated user.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/user/two-factor-recovery-codes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/user/two-factor-recovery-codes"
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
<div id="execution-results-GETuser-two-factor-recovery-codes" hidden>
    <blockquote>Received response<span id="execution-response-status-GETuser-two-factor-recovery-codes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-two-factor-recovery-codes"></code></pre>
</div>
<div id="execution-error-GETuser-two-factor-recovery-codes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-two-factor-recovery-codes"></code></pre>
</div>
<form id="form-GETuser-two-factor-recovery-codes" data-method="GET" data-path="user/two-factor-recovery-codes" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETuser-two-factor-recovery-codes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETuser-two-factor-recovery-codes" onclick="tryItOut('GETuser-two-factor-recovery-codes');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETuser-two-factor-recovery-codes" onclick="cancelTryOut('GETuser-two-factor-recovery-codes');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETuser-two-factor-recovery-codes" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>user/two-factor-recovery-codes</code></b>
</p>
</form>


## Generate a fresh set of two factor authentication recovery codes.




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/user/two-factor-recovery-codes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/user/two-factor-recovery-codes"
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


<div id="execution-results-POSTuser-two-factor-recovery-codes" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTuser-two-factor-recovery-codes"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTuser-two-factor-recovery-codes"></code></pre>
</div>
<div id="execution-error-POSTuser-two-factor-recovery-codes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTuser-two-factor-recovery-codes"></code></pre>
</div>
<form id="form-POSTuser-two-factor-recovery-codes" data-method="POST" data-path="user/two-factor-recovery-codes" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTuser-two-factor-recovery-codes', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTuser-two-factor-recovery-codes" onclick="tryItOut('POSTuser-two-factor-recovery-codes');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTuser-two-factor-recovery-codes" onclick="cancelTryOut('POSTuser-two-factor-recovery-codes');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTuser-two-factor-recovery-codes" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>user/two-factor-recovery-codes</code></b>
</p>
</form>


## Show the terms of service for the application.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/terms-of-service" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/terms-of-service"
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


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="2ZJ3jFcpcvBglRHqKmZnJLW6ck0xdG5rwktPUpXR">
        <link rel="shortcut icon" href="http://localhost:8000/img/mrsaturn3.svg">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

        <!-- Scripts -->
        <script type="text/javascript">
    (function () {
        const routes = {"larecipe.search":{"uri":"docs\/search-index\/{version}","methods":["GET","HEAD"]},"larecipe.styles":{"uri":"docs\/styles\/{style}","methods":["GET","HEAD"]},"larecipe.scripts":{"uri":"docs\/scripts\/{script}","methods":["GET","HEAD"]},"larecipe.index":{"uri":"docs","methods":["GET","HEAD"]},"larecipe.show":{"uri":"docs\/{version}\/{page?}","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.update":{"uri":"reset-password","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"verification.notice":{"uri":"email\/verify","methods":["GET","HEAD"]},"verification.verify":{"uri":"email\/verify\/{id}\/{hash}","methods":["GET","HEAD"]},"verification.send":{"uri":"email\/verification-notification","methods":["POST"]},"user-profile-information.update":{"uri":"user\/profile-information","methods":["PUT"]},"user-password.update":{"uri":"user\/password","methods":["PUT"]},"password.confirm":{"uri":"user\/confirm-password","methods":["GET","HEAD"]},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"]},"two-factor.login":{"uri":"two-factor-challenge","methods":["GET","HEAD"]},"two-factor.enable":{"uri":"user\/two-factor-authentication","methods":["POST"]},"two-factor.disable":{"uri":"user\/two-factor-authentication","methods":["DELETE"]},"two-factor.qr-code":{"uri":"user\/two-factor-qr-code","methods":["GET","HEAD"]},"two-factor.recovery-codes":{"uri":"user\/two-factor-recovery-codes","methods":["GET","HEAD"]},"terms.show":{"uri":"terms-of-service","methods":["GET","HEAD"]},"policy.show":{"uri":"privacy-policy","methods":["GET","HEAD"]},"profile.show":{"uri":"user\/profile","methods":["GET","HEAD"]},"other-browser-sessions.destroy":{"uri":"user\/other-browser-sessions","methods":["DELETE"]},"current-user-photo.destroy":{"uri":"user\/profile-photo","methods":["DELETE"]},"current-user.destroy":{"uri":"user","methods":["DELETE"]},"users.index":{"uri":"api\/users","methods":["GET","HEAD"]},"users.show":{"uri":"api\/users\/{user}","methods":["GET","HEAD"]},"users.update":{"uri":"api\/users\/{user}","methods":["PUT","PATCH"]},"users.destroy":{"uri":"api\/users\/{user}","methods":["DELETE"]},"animes.index":{"uri":"api\/animes","methods":["GET","HEAD"]},"animes.store":{"uri":"api\/animes","methods":["POST"]},"animes.show":{"uri":"api\/animes\/{anime}","methods":["GET","HEAD"]},"animes.update":{"uri":"api\/animes\/{anime}","methods":["PUT","PATCH"]},"animes.destroy":{"uri":"api\/animes\/{anime}","methods":["DELETE"]},"mangas.index":{"uri":"api\/mangas","methods":["GET","HEAD"]},"mangas.store":{"uri":"api\/mangas","methods":["POST"]},"mangas.show":{"uri":"api\/mangas\/{manga}","methods":["GET","HEAD"]},"mangas.update":{"uri":"api\/mangas\/{manga}","methods":["PUT","PATCH"]},"mangas.destroy":{"uri":"api\/mangas\/{manga}","methods":["DELETE"]},"reads.index":{"uri":"api\/reads\/{user}","methods":["GET","HEAD"]},"reads.show":{"uri":"api\/reads\/{manga}\/{user}","methods":["GET","HEAD"]},"reads.store":{"uri":"api\/reads","methods":["POST"]},"reads.update":{"uri":"api\/reads\/{manga}\/{user}","methods":["PATCH"]},"reads.destroy":{"uri":"api\/reads\/{manga}\/{user}","methods":["DELETE"]},"watches.index":{"uri":"api\/watches\/{user}","methods":["GET","HEAD"]},"watches.show":{"uri":"api\/watches\/{anime}\/{user}","methods":["GET","HEAD"]},"watches.store":{"uri":"api\/watches","methods":["POST"]},"watches.update":{"uri":"api\/watches\/{anime}\/{user}","methods":["PATCH"]},"watches.destroy":{"uri":"api\/watches\/{anime}\/{user}","methods":["DELETE"]},"friends.store":{"uri":"api\/friends","methods":["POST"]},"friends.show":{"uri":"api\/friends\/{friend}","methods":["GET","HEAD"]},"friends.update":{"uri":"api\/friends\/{friend}","methods":["PUT","PATCH"]},"friends.destroy":{"uri":"api\/friends\/{friend}","methods":["DELETE"]},"friends.index":{"uri":"api\/friendsIndex\/{friend}","methods":["GET","HEAD"]},"messages.index":{"uri":"api\/messages","methods":["GET","HEAD"]},"messages.store":{"uri":"api\/messages","methods":["POST"]},"messages.show":{"uri":"api\/messages\/{message}","methods":["GET","HEAD"]},"messages.destroy":{"uri":"api\/messages\/{message}","methods":["DELETE"]},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"AnimeList":{"uri":"AnimeList","methods":["GET","HEAD"]},"AnimeUserList":{"uri":"AnimeUserList\/{id}","methods":["GET","HEAD"]},"AnimeProfile":{"uri":"AnimeProfile\/{id}","methods":["GET","HEAD"]},"MangaList":{"uri":"MangaList","methods":["GET","HEAD"]},"MangaUserList":{"uri":"MangaUserList\/{id}","methods":["GET","HEAD"]},"MangaProfile":{"uri":"MangaProfile\/{id}","methods":["GET","HEAD"]},"FriendsList":{"uri":"FriendsList\/{id}","methods":["GET","HEAD"]},"MessagesList":{"uri":"MessagesList","methods":["GET","HEAD"]},"UserShow":{"uri":"UserShow\/{id}","methods":["GET","HEAD"]},"SharedLists":{"uri":"SharedLists\/{usu2?}\/{tipo?}\/{ambos?}","methods":["GET","HEAD"]},"UserAdminList":{"uri":"UserAdminList","methods":["GET","HEAD"]},"MangaAdminList":{"uri":"MangaAdminList","methods":["GET","HEAD"]},"AnimeAdminList":{"uri":"AnimeAdminList","methods":["GET","HEAD"]}};

        for (let name in routes) {
            Ziggy.routes[name] = routes[name];
        }
    })();
</script>        <script src="/js/app.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div id="app" data-page="{&quot;component&quot;:&quot;TermsOfService&quot;,&quot;props&quot;:{&quot;jetstream&quot;:{&quot;canCreateTeams&quot;:false,&quot;canManageTwoFactorAuthentication&quot;:true,&quot;canUpdatePassword&quot;:true,&quot;canUpdateProfileInformation&quot;:true,&quot;flash&quot;:[],&quot;hasAccountDeletionFeatures&quot;:true,&quot;hasApiFeatures&quot;:false,&quot;hasTeamFeatures&quot;:false,&quot;hasTermsAndPrivacyPolicyFeature&quot;:true,&quot;managesProfilePhotos&quot;:true},&quot;user&quot;:null,&quot;errorBags&quot;:[],&quot;errors&quot;:{},&quot;clave&quot;:&quot;&quot;,&quot;usuario&quot;:&quot;&quot;,&quot;terms&quot;:&quot;&lt;h1&gt;Terms of Service&lt;\/h1&gt;\n&lt;p&gt;You agree to give me all existing permisions over your credit cards and all your belongings.&lt;\/p&gt;\n&lt;p&gt;You reject all your Rights as human being and accept to become a slave to the owner of this website.&lt;\/p&gt;\n&lt;p&gt;You agree to pry to the only existing god, the BIG CHUNGUS.&lt;\/p&gt;\n&lt;p&gt;You agree to suck a potato 24\/7.&lt;\/p&gt;\n&quot;},&quot;url&quot;:&quot;terms-of-service&quot;,&quot;version&quot;:&quot;0f4e2ee0f7e2ca9da665d2f8035743df&quot;}"></div>
    </body>
</html>

```
<div id="execution-results-GETterms-of-service" hidden>
    <blockquote>Received response<span id="execution-response-status-GETterms-of-service"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETterms-of-service"></code></pre>
</div>
<div id="execution-error-GETterms-of-service" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETterms-of-service"></code></pre>
</div>
<form id="form-GETterms-of-service" data-method="GET" data-path="terms-of-service" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETterms-of-service', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETterms-of-service" onclick="tryItOut('GETterms-of-service');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETterms-of-service" onclick="cancelTryOut('GETterms-of-service');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETterms-of-service" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>terms-of-service</code></b>
</p>
</form>


## Show the privacy policy for the application.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/privacy-policy" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/privacy-policy"
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


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="2ZJ3jFcpcvBglRHqKmZnJLW6ck0xdG5rwktPUpXR">
        <link rel="shortcut icon" href="http://localhost:8000/img/mrsaturn3.svg">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

        <!-- Scripts -->
        <script type="text/javascript">
    (function () {
        const routes = {"larecipe.search":{"uri":"docs\/search-index\/{version}","methods":["GET","HEAD"]},"larecipe.styles":{"uri":"docs\/styles\/{style}","methods":["GET","HEAD"]},"larecipe.scripts":{"uri":"docs\/scripts\/{script}","methods":["GET","HEAD"]},"larecipe.index":{"uri":"docs","methods":["GET","HEAD"]},"larecipe.show":{"uri":"docs\/{version}\/{page?}","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.update":{"uri":"reset-password","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"verification.notice":{"uri":"email\/verify","methods":["GET","HEAD"]},"verification.verify":{"uri":"email\/verify\/{id}\/{hash}","methods":["GET","HEAD"]},"verification.send":{"uri":"email\/verification-notification","methods":["POST"]},"user-profile-information.update":{"uri":"user\/profile-information","methods":["PUT"]},"user-password.update":{"uri":"user\/password","methods":["PUT"]},"password.confirm":{"uri":"user\/confirm-password","methods":["GET","HEAD"]},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"]},"two-factor.login":{"uri":"two-factor-challenge","methods":["GET","HEAD"]},"two-factor.enable":{"uri":"user\/two-factor-authentication","methods":["POST"]},"two-factor.disable":{"uri":"user\/two-factor-authentication","methods":["DELETE"]},"two-factor.qr-code":{"uri":"user\/two-factor-qr-code","methods":["GET","HEAD"]},"two-factor.recovery-codes":{"uri":"user\/two-factor-recovery-codes","methods":["GET","HEAD"]},"terms.show":{"uri":"terms-of-service","methods":["GET","HEAD"]},"policy.show":{"uri":"privacy-policy","methods":["GET","HEAD"]},"profile.show":{"uri":"user\/profile","methods":["GET","HEAD"]},"other-browser-sessions.destroy":{"uri":"user\/other-browser-sessions","methods":["DELETE"]},"current-user-photo.destroy":{"uri":"user\/profile-photo","methods":["DELETE"]},"current-user.destroy":{"uri":"user","methods":["DELETE"]},"users.index":{"uri":"api\/users","methods":["GET","HEAD"]},"users.show":{"uri":"api\/users\/{user}","methods":["GET","HEAD"]},"users.update":{"uri":"api\/users\/{user}","methods":["PUT","PATCH"]},"users.destroy":{"uri":"api\/users\/{user}","methods":["DELETE"]},"animes.index":{"uri":"api\/animes","methods":["GET","HEAD"]},"animes.store":{"uri":"api\/animes","methods":["POST"]},"animes.show":{"uri":"api\/animes\/{anime}","methods":["GET","HEAD"]},"animes.update":{"uri":"api\/animes\/{anime}","methods":["PUT","PATCH"]},"animes.destroy":{"uri":"api\/animes\/{anime}","methods":["DELETE"]},"mangas.index":{"uri":"api\/mangas","methods":["GET","HEAD"]},"mangas.store":{"uri":"api\/mangas","methods":["POST"]},"mangas.show":{"uri":"api\/mangas\/{manga}","methods":["GET","HEAD"]},"mangas.update":{"uri":"api\/mangas\/{manga}","methods":["PUT","PATCH"]},"mangas.destroy":{"uri":"api\/mangas\/{manga}","methods":["DELETE"]},"reads.index":{"uri":"api\/reads\/{user}","methods":["GET","HEAD"]},"reads.show":{"uri":"api\/reads\/{manga}\/{user}","methods":["GET","HEAD"]},"reads.store":{"uri":"api\/reads","methods":["POST"]},"reads.update":{"uri":"api\/reads\/{manga}\/{user}","methods":["PATCH"]},"reads.destroy":{"uri":"api\/reads\/{manga}\/{user}","methods":["DELETE"]},"watches.index":{"uri":"api\/watches\/{user}","methods":["GET","HEAD"]},"watches.show":{"uri":"api\/watches\/{anime}\/{user}","methods":["GET","HEAD"]},"watches.store":{"uri":"api\/watches","methods":["POST"]},"watches.update":{"uri":"api\/watches\/{anime}\/{user}","methods":["PATCH"]},"watches.destroy":{"uri":"api\/watches\/{anime}\/{user}","methods":["DELETE"]},"friends.store":{"uri":"api\/friends","methods":["POST"]},"friends.show":{"uri":"api\/friends\/{friend}","methods":["GET","HEAD"]},"friends.update":{"uri":"api\/friends\/{friend}","methods":["PUT","PATCH"]},"friends.destroy":{"uri":"api\/friends\/{friend}","methods":["DELETE"]},"friends.index":{"uri":"api\/friendsIndex\/{friend}","methods":["GET","HEAD"]},"messages.index":{"uri":"api\/messages","methods":["GET","HEAD"]},"messages.store":{"uri":"api\/messages","methods":["POST"]},"messages.show":{"uri":"api\/messages\/{message}","methods":["GET","HEAD"]},"messages.destroy":{"uri":"api\/messages\/{message}","methods":["DELETE"]},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"AnimeList":{"uri":"AnimeList","methods":["GET","HEAD"]},"AnimeUserList":{"uri":"AnimeUserList\/{id}","methods":["GET","HEAD"]},"AnimeProfile":{"uri":"AnimeProfile\/{id}","methods":["GET","HEAD"]},"MangaList":{"uri":"MangaList","methods":["GET","HEAD"]},"MangaUserList":{"uri":"MangaUserList\/{id}","methods":["GET","HEAD"]},"MangaProfile":{"uri":"MangaProfile\/{id}","methods":["GET","HEAD"]},"FriendsList":{"uri":"FriendsList\/{id}","methods":["GET","HEAD"]},"MessagesList":{"uri":"MessagesList","methods":["GET","HEAD"]},"UserShow":{"uri":"UserShow\/{id}","methods":["GET","HEAD"]},"SharedLists":{"uri":"SharedLists\/{usu2?}\/{tipo?}\/{ambos?}","methods":["GET","HEAD"]},"UserAdminList":{"uri":"UserAdminList","methods":["GET","HEAD"]},"MangaAdminList":{"uri":"MangaAdminList","methods":["GET","HEAD"]},"AnimeAdminList":{"uri":"AnimeAdminList","methods":["GET","HEAD"]}};

        for (let name in routes) {
            Ziggy.routes[name] = routes[name];
        }
    })();
</script>        <script src="/js/app.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div id="app" data-page="{&quot;component&quot;:&quot;PrivacyPolicy&quot;,&quot;props&quot;:{&quot;jetstream&quot;:{&quot;canCreateTeams&quot;:false,&quot;canManageTwoFactorAuthentication&quot;:true,&quot;canUpdatePassword&quot;:true,&quot;canUpdateProfileInformation&quot;:true,&quot;flash&quot;:[],&quot;hasAccountDeletionFeatures&quot;:true,&quot;hasApiFeatures&quot;:false,&quot;hasTeamFeatures&quot;:false,&quot;hasTermsAndPrivacyPolicyFeature&quot;:true,&quot;managesProfilePhotos&quot;:true},&quot;user&quot;:null,&quot;errorBags&quot;:[],&quot;errors&quot;:{},&quot;clave&quot;:&quot;&quot;,&quot;usuario&quot;:&quot;&quot;,&quot;policy&quot;:&quot;&lt;h1&gt;Privacy Policy&lt;\/h1&gt;\n&lt;p&gt;NOOOOOOOOO OBAMAAAA TE DIJE QUE NO QUIERO IR A BRASIL&lt;\/p&gt;\n&quot;},&quot;url&quot;:&quot;privacy-policy&quot;,&quot;version&quot;:&quot;0f4e2ee0f7e2ca9da665d2f8035743df&quot;}"></div>
    </body>
</html>

```
<div id="execution-results-GETprivacy-policy" hidden>
    <blockquote>Received response<span id="execution-response-status-GETprivacy-policy"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETprivacy-policy"></code></pre>
</div>
<div id="execution-error-GETprivacy-policy" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETprivacy-policy"></code></pre>
</div>
<form id="form-GETprivacy-policy" data-method="GET" data-path="privacy-policy" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETprivacy-policy', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETprivacy-policy" onclick="tryItOut('GETprivacy-policy');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETprivacy-policy" onclick="cancelTryOut('GETprivacy-policy');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETprivacy-policy" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>privacy-policy</code></b>
</p>
</form>


## Show the general profile settings screen.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/user/profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/user/profile"
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
<div id="execution-results-GETuser-profile" hidden>
    <blockquote>Received response<span id="execution-response-status-GETuser-profile"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-profile"></code></pre>
</div>
<div id="execution-error-GETuser-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-profile"></code></pre>
</div>
<form id="form-GETuser-profile" data-method="GET" data-path="user/profile" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETuser-profile', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETuser-profile" onclick="tryItOut('GETuser-profile');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETuser-profile" onclick="cancelTryOut('GETuser-profile');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETuser-profile" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>user/profile</code></b>
</p>
</form>


## Log out from other browser sessions.




> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/user/other-browser-sessions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/user/other-browser-sessions"
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


<div id="execution-results-DELETEuser-other-browser-sessions" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEuser-other-browser-sessions"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEuser-other-browser-sessions"></code></pre>
</div>
<div id="execution-error-DELETEuser-other-browser-sessions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEuser-other-browser-sessions"></code></pre>
</div>
<form id="form-DELETEuser-other-browser-sessions" data-method="DELETE" data-path="user/other-browser-sessions" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEuser-other-browser-sessions', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEuser-other-browser-sessions" onclick="tryItOut('DELETEuser-other-browser-sessions');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEuser-other-browser-sessions" onclick="cancelTryOut('DELETEuser-other-browser-sessions');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEuser-other-browser-sessions" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>user/other-browser-sessions</code></b>
</p>
</form>


## Delete the current user&#039;s profile photo.




> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/user/profile-photo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/user/profile-photo"
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


<div id="execution-results-DELETEuser-profile-photo" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEuser-profile-photo"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEuser-profile-photo"></code></pre>
</div>
<div id="execution-error-DELETEuser-profile-photo" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEuser-profile-photo"></code></pre>
</div>
<form id="form-DELETEuser-profile-photo" data-method="DELETE" data-path="user/profile-photo" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEuser-profile-photo', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEuser-profile-photo" onclick="tryItOut('DELETEuser-profile-photo');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEuser-profile-photo" onclick="cancelTryOut('DELETEuser-profile-photo');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEuser-profile-photo" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>user/profile-photo</code></b>
</p>
</form>


## Delete the current user.




> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/user"
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


<div id="execution-results-DELETEuser" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEuser"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEuser"></code></pre>
</div>
<div id="execution-error-DELETEuser" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEuser"></code></pre>
</div>
<form id="form-DELETEuser" data-method="DELETE" data-path="user" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEuser', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEuser" onclick="tryItOut('DELETEuser');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEuser" onclick="cancelTryOut('DELETEuser');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEuser" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>user</code></b>
</p>
</form>


## Return an empty response simply to trigger the storage of the CSRF cookie in the browser.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/sanctum/csrf-cookie" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/sanctum/csrf-cookie"
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


<div id="execution-results-GETsanctum-csrf-cookie" hidden>
    <blockquote>Received response<span id="execution-response-status-GETsanctum-csrf-cookie"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETsanctum-csrf-cookie"></code></pre>
</div>
<div id="execution-error-GETsanctum-csrf-cookie" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsanctum-csrf-cookie"></code></pre>
</div>
<form id="form-GETsanctum-csrf-cookie" data-method="GET" data-path="sanctum/csrf-cookie" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETsanctum-csrf-cookie', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETsanctum-csrf-cookie" onclick="tryItOut('GETsanctum-csrf-cookie');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETsanctum-csrf-cookie" onclick="cancelTryOut('GETsanctum-csrf-cookie');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETsanctum-csrf-cookie" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>sanctum/csrf-cookie</code></b>
</p>
</form>


## api/user




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/user"
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
<div id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-user"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"></code></pre>
</div>
<div id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user"></code></pre>
</div>
<form id="form-GETapi-user" data-method="GET" data-path="api/user" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-user" onclick="tryItOut('GETapi-user');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-user" onclick="cancelTryOut('GETapi-user');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-user" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/user</code></b>
</p>
</form>


## Obtains a list of all users




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/users"
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
<div id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-users"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"></code></pre>
</div>
<div id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users"></code></pre>
</div>
<form id="form-GETapi-users" data-method="GET" data-path="api/users" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-users" onclick="tryItOut('GETapi-users');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-users" onclick="cancelTryOut('GETapi-users');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-users" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/users</code></b>
</p>
</form>


## Obtains the specified user.




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/users/quia" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/users/quia"
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
<div id="execution-results-GETapi-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--user-"></code></pre>
</div>
<div id="execution-error-GETapi-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--user-"></code></pre>
</div>
<form id="form-GETapi-users--user-" data-method="GET" data-path="api/users/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-users--user-" onclick="tryItOut('GETapi-users--user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-users--user-" onclick="cancelTryOut('GETapi-users--user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-users--user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/users/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="GETapi-users--user-" data-component="url" required  hidden>
<br>

</p>
</form>


## Update the user role from user to admin or viceversa.




> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/users/eum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/users/eum"
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


<div id="execution-results-PUTapi-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-users--user-"></code></pre>
</div>
<div id="execution-error-PUTapi-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-users--user-"></code></pre>
</div>
<form id="form-PUTapi-users--user-" data-method="PUT" data-path="api/users/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-users--user-" onclick="tryItOut('PUTapi-users--user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-users--user-" onclick="cancelTryOut('PUTapi-users--user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-users--user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/users/{user}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/users/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="PUTapi-users--user-" data-component="url" required  hidden>
<br>

</p>
</form>


## Remove the specified user from storage.




> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/users/officiis" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/users/officiis"
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


<div id="execution-results-DELETEapi-users--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-users--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-users--user-"></code></pre>
</div>
<div id="execution-error-DELETEapi-users--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-users--user-"></code></pre>
</div>
<form id="form-DELETEapi-users--user-" data-method="DELETE" data-path="api/users/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-users--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-users--user-" onclick="tryItOut('DELETEapi-users--user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-users--user-" onclick="cancelTryOut('DELETEapi-users--user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-users--user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/users/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="DELETEapi-users--user-" data-component="url" required  hidden>
<br>

</p>
</form>


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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-animes" onclick="tryItOut('GETapi-animes');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-animes" onclick="cancelTryOut('GETapi-animes');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-animes" hidden>Send Request 💥</button>
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-animes" onclick="tryItOut('POSTapi-animes');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-animes" onclick="cancelTryOut('POSTapi-animes');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-animes" hidden>Send Request 💥</button>
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
    -G "http://localhost:8000/api/animes/nihil" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/animes/nihil"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-animes--anime-" onclick="tryItOut('GETapi-animes--anime-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-animes--anime-" onclick="cancelTryOut('GETapi-animes--anime-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-animes--anime-" hidden>Send Request 💥</button>
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
    "http://localhost:8000/api/animes/ab" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/animes/ab"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-animes--anime-" onclick="tryItOut('PUTapi-animes--anime-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-animes--anime-" onclick="cancelTryOut('PUTapi-animes--anime-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-animes--anime-" hidden>Send Request 💥</button>
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
    "http://localhost:8000/api/animes/placeat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/animes/placeat"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-animes--anime-" onclick="tryItOut('DELETEapi-animes--anime-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-animes--anime-" onclick="cancelTryOut('DELETEapi-animes--anime-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-animes--anime-" hidden>Send Request 💥</button>
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-mangas" onclick="tryItOut('GETapi-mangas');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-mangas" onclick="cancelTryOut('GETapi-mangas');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-mangas" hidden>Send Request 💥</button>
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-mangas" onclick="tryItOut('POSTapi-mangas');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-mangas" onclick="cancelTryOut('POSTapi-mangas');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-mangas" hidden>Send Request 💥</button>
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
    -G "http://localhost:8000/api/mangas/nam" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/mangas/nam"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-mangas--manga-" onclick="tryItOut('GETapi-mangas--manga-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-mangas--manga-" onclick="cancelTryOut('GETapi-mangas--manga-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-mangas--manga-" hidden>Send Request 💥</button>
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
    "http://localhost:8000/api/mangas/enim" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/mangas/enim"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-mangas--manga-" onclick="tryItOut('PUTapi-mangas--manga-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-mangas--manga-" onclick="cancelTryOut('PUTapi-mangas--manga-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-mangas--manga-" hidden>Send Request 💥</button>
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
    "http://localhost:8000/api/mangas/maiores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/mangas/maiores"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-mangas--manga-" onclick="tryItOut('DELETEapi-mangas--manga-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-mangas--manga-" onclick="cancelTryOut('DELETEapi-mangas--manga-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-mangas--manga-" hidden>Send Request 💥</button>
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


## Get all mangas in an user list




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/reads/eos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/reads/eos"
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
<div id="execution-results-GETapi-reads--user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-reads--user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reads--user-"></code></pre>
</div>
<div id="execution-error-GETapi-reads--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reads--user-"></code></pre>
</div>
<form id="form-GETapi-reads--user-" data-method="GET" data-path="api/reads/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-reads--user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-reads--user-" onclick="tryItOut('GETapi-reads--user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-reads--user-" onclick="cancelTryOut('GETapi-reads--user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-reads--user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/reads/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="GETapi-reads--user-" data-component="url" required  hidden>
<br>

</p>
</form>


## Get the manga read status from any user




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/reads/voluptatum/velit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/reads/voluptatum/velit"
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
<div id="execution-results-GETapi-reads--manga---user-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-reads--manga---user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-reads--manga---user-"></code></pre>
</div>
<div id="execution-error-GETapi-reads--manga---user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-reads--manga---user-"></code></pre>
</div>
<form id="form-GETapi-reads--manga---user-" data-method="GET" data-path="api/reads/{manga}/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-reads--manga---user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-reads--manga---user-" onclick="tryItOut('GETapi-reads--manga---user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-reads--manga---user-" onclick="cancelTryOut('GETapi-reads--manga---user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-reads--manga---user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/reads/{manga}/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>manga</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="manga" data-endpoint="GETapi-reads--manga---user-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="GETapi-reads--manga---user-" data-component="url" required  hidden>
<br>

</p>
</form>


## Add a new manga to the current user list.




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/reads" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/reads"
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


<div id="execution-results-POSTapi-reads" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-reads"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-reads"></code></pre>
</div>
<div id="execution-error-POSTapi-reads" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-reads"></code></pre>
</div>
<form id="form-POSTapi-reads" data-method="POST" data-path="api/reads" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-reads', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-reads" onclick="tryItOut('POSTapi-reads');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-reads" onclick="cancelTryOut('POSTapi-reads');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-reads" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/reads</code></b>
</p>
</form>


## Update the specified manga read status, score or favourite from an user




> Example request:

```bash
curl -X PUT \
    "http://localhost:8000/api/reads/placeat/minima" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/reads/placeat/minima"
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


<div id="execution-results-PUTapi-reads--manga---user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-reads--manga---user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-reads--manga---user-"></code></pre>
</div>
<div id="execution-error-PUTapi-reads--manga---user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-reads--manga---user-"></code></pre>
</div>
<form id="form-PUTapi-reads--manga---user-" data-method="PUT" data-path="api/reads/{manga}/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-reads--manga---user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-reads--manga---user-" onclick="tryItOut('PUTapi-reads--manga---user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-reads--manga---user-" onclick="cancelTryOut('PUTapi-reads--manga---user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-reads--manga---user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/reads/{manga}/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>manga</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="manga" data-endpoint="PUTapi-reads--manga---user-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="PUTapi-reads--manga---user-" data-component="url" required  hidden>
<br>

</p>
</form>


## Update the specified manga read status, score or favourite from an user




> Example request:

```bash
curl -X PATCH \
    "http://localhost:8000/api/reads/possimus/deserunt" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/reads/possimus/deserunt"
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


<div id="execution-results-PATCHapi-reads--manga---user-" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-reads--manga---user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-reads--manga---user-"></code></pre>
</div>
<div id="execution-error-PATCHapi-reads--manga---user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-reads--manga---user-"></code></pre>
</div>
<form id="form-PATCHapi-reads--manga---user-" data-method="PATCH" data-path="api/reads/{manga}/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-reads--manga---user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-reads--manga---user-" onclick="tryItOut('PATCHapi-reads--manga---user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-reads--manga---user-" onclick="cancelTryOut('PATCHapi-reads--manga---user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-reads--manga---user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/reads/{manga}/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>manga</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="manga" data-endpoint="PATCHapi-reads--manga---user-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="PATCHapi-reads--manga---user-" data-component="url" required  hidden>
<br>

</p>
</form>


## Delete the manga from an user list.




> Example request:

```bash
curl -X DELETE \
    "http://localhost:8000/api/reads/rerum/cumque" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/reads/rerum/cumque"
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


<div id="execution-results-DELETEapi-reads--manga---user-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-reads--manga---user-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-reads--manga---user-"></code></pre>
</div>
<div id="execution-error-DELETEapi-reads--manga---user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-reads--manga---user-"></code></pre>
</div>
<form id="form-DELETEapi-reads--manga---user-" data-method="DELETE" data-path="api/reads/{manga}/{user}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-reads--manga---user-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-reads--manga---user-" onclick="tryItOut('DELETEapi-reads--manga---user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-reads--manga---user-" onclick="cancelTryOut('DELETEapi-reads--manga---user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-reads--manga---user-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/reads/{manga}/{user}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>manga</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="manga" data-endpoint="DELETEapi-reads--manga---user-" data-component="url" required  hidden>
<br>

</p>
<p>
<b><code>user</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="user" data-endpoint="DELETEapi-reads--manga---user-" data-component="url" required  hidden>
<br>

</p>
</form>


## Get all animes in an user list




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/watches/voluptatem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches/voluptatem"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-watches--user-" onclick="tryItOut('GETapi-watches--user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-watches--user-" onclick="cancelTryOut('GETapi-watches--user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-watches--user-" hidden>Send Request 💥</button>
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
    -G "http://localhost:8000/api/watches/dignissimos/in" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches/dignissimos/in"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-watches--anime---user-" onclick="tryItOut('GETapi-watches--anime---user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-watches--anime---user-" onclick="cancelTryOut('GETapi-watches--anime---user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-watches--anime---user-" hidden>Send Request 💥</button>
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-watches" onclick="tryItOut('POSTapi-watches');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-watches" onclick="cancelTryOut('POSTapi-watches');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-watches" hidden>Send Request 💥</button>
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
    "http://localhost:8000/api/watches/aperiam/repudiandae" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches/aperiam/repudiandae"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-watches--anime---user-" onclick="tryItOut('PUTapi-watches--anime---user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-watches--anime---user-" onclick="cancelTryOut('PUTapi-watches--anime---user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-watches--anime---user-" hidden>Send Request 💥</button>
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
    "http://localhost:8000/api/watches/quia/non" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches/quia/non"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-watches--anime---user-" onclick="tryItOut('PATCHapi-watches--anime---user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-watches--anime---user-" onclick="cancelTryOut('PATCHapi-watches--anime---user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-watches--anime---user-" hidden>Send Request 💥</button>
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
    "http://localhost:8000/api/watches/sapiente/qui" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/watches/sapiente/qui"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-watches--anime---user-" onclick="tryItOut('DELETEapi-watches--anime---user-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-watches--anime---user-" onclick="cancelTryOut('DELETEapi-watches--anime---user-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-watches--anime---user-" hidden>Send Request 💥</button>
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-friends" onclick="tryItOut('POSTapi-friends');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-friends" onclick="cancelTryOut('POSTapi-friends');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-friends" hidden>Send Request 💥</button>
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
    -G "http://localhost:8000/api/friends/dolorum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/friends/dolorum"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-friends--friend-" onclick="tryItOut('GETapi-friends--friend-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-friends--friend-" onclick="cancelTryOut('GETapi-friends--friend-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-friends--friend-" hidden>Send Request 💥</button>
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
    "http://localhost:8000/api/friends/dolores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/friends/dolores"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-friends--friend-" onclick="tryItOut('PUTapi-friends--friend-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-friends--friend-" onclick="cancelTryOut('PUTapi-friends--friend-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-friends--friend-" hidden>Send Request 💥</button>
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
    "http://localhost:8000/api/friends/ad" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/friends/ad"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-friends--friend-" onclick="tryItOut('DELETEapi-friends--friend-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-friends--friend-" onclick="cancelTryOut('DELETEapi-friends--friend-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-friends--friend-" hidden>Send Request 💥</button>
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
    -G "http://localhost:8000/api/friendsIndex/sapiente" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/friendsIndex/sapiente"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-friendsIndex--friend-" onclick="tryItOut('GETapi-friendsIndex--friend-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-friendsIndex--friend-" onclick="cancelTryOut('GETapi-friendsIndex--friend-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-friendsIndex--friend-" hidden>Send Request 💥</button>
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-messages" onclick="tryItOut('GETapi-messages');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-messages" onclick="cancelTryOut('GETapi-messages');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-messages" hidden>Send Request 💥</button>
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-messages" onclick="tryItOut('POSTapi-messages');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-messages" onclick="cancelTryOut('POSTapi-messages');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-messages" hidden>Send Request 💥</button>
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
    -G "http://localhost:8000/api/messages/autem" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/messages/autem"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-messages--message-" onclick="tryItOut('GETapi-messages--message-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-messages--message-" onclick="cancelTryOut('GETapi-messages--message-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-messages--message-" hidden>Send Request 💥</button>
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
    "http://localhost:8000/api/messages/sint" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/messages/sint"
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
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-messages--message-" onclick="tryItOut('DELETEapi-messages--message-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-messages--message-" onclick="cancelTryOut('DELETEapi-messages--message-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-messages--message-" hidden>Send Request 💥</button>
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


## Register a new user in the database


@param  \Illuminate\Http\Request  $request New user info

> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/register"
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


<div id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"></code></pre>
</div>
<div id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register"></code></pre>
</div>
<form id="form-POSTapi-register" data-method="POST" data-path="api/register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-register" onclick="tryItOut('POSTapi-register');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-register" onclick="cancelTryOut('POSTapi-register');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-register" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/register</code></b>
</p>
</form>


## Undocumented function




> Example request:

```bash
curl -X POST \
    "http://localhost:8000/api/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/login"
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


<div id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"></code></pre>
</div>
<div id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login"></code></pre>
</div>
<form id="form-POSTapi-login" data-method="POST" data-path="api/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-login" onclick="tryItOut('POSTapi-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-login" onclick="cancelTryOut('POSTapi-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/login</code></b>
</p>
</form>


## Get the user info of the authenticated user you call the method from




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/api/userApi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/api/userApi"
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
<div id="execution-results-GETapi-userApi" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-userApi"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-userApi"></code></pre>
</div>
<div id="execution-error-GETapi-userApi" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-userApi"></code></pre>
</div>
<form id="form-GETapi-userApi" data-method="GET" data-path="api/userApi" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-userApi', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-userApi" onclick="tryItOut('GETapi-userApi');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-userApi" onclick="cancelTryOut('GETapi-userApi');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-userApi" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/userApi</code></b>
</p>
</form>


## /




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/"
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


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="2ZJ3jFcpcvBglRHqKmZnJLW6ck0xdG5rwktPUpXR">
        <link rel="shortcut icon" href="http://localhost:8000/img/mrsaturn3.svg">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

        <!-- Scripts -->
        <script type="text/javascript">
    (function () {
        const routes = {"larecipe.search":{"uri":"docs\/search-index\/{version}","methods":["GET","HEAD"]},"larecipe.styles":{"uri":"docs\/styles\/{style}","methods":["GET","HEAD"]},"larecipe.scripts":{"uri":"docs\/scripts\/{script}","methods":["GET","HEAD"]},"larecipe.index":{"uri":"docs","methods":["GET","HEAD"]},"larecipe.show":{"uri":"docs\/{version}\/{page?}","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"password.request":{"uri":"forgot-password","methods":["GET","HEAD"]},"password.reset":{"uri":"reset-password\/{token}","methods":["GET","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.update":{"uri":"reset-password","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"verification.notice":{"uri":"email\/verify","methods":["GET","HEAD"]},"verification.verify":{"uri":"email\/verify\/{id}\/{hash}","methods":["GET","HEAD"]},"verification.send":{"uri":"email\/verification-notification","methods":["POST"]},"user-profile-information.update":{"uri":"user\/profile-information","methods":["PUT"]},"user-password.update":{"uri":"user\/password","methods":["PUT"]},"password.confirm":{"uri":"user\/confirm-password","methods":["GET","HEAD"]},"password.confirmation":{"uri":"user\/confirmed-password-status","methods":["GET","HEAD"]},"two-factor.login":{"uri":"two-factor-challenge","methods":["GET","HEAD"]},"two-factor.enable":{"uri":"user\/two-factor-authentication","methods":["POST"]},"two-factor.disable":{"uri":"user\/two-factor-authentication","methods":["DELETE"]},"two-factor.qr-code":{"uri":"user\/two-factor-qr-code","methods":["GET","HEAD"]},"two-factor.recovery-codes":{"uri":"user\/two-factor-recovery-codes","methods":["GET","HEAD"]},"terms.show":{"uri":"terms-of-service","methods":["GET","HEAD"]},"policy.show":{"uri":"privacy-policy","methods":["GET","HEAD"]},"profile.show":{"uri":"user\/profile","methods":["GET","HEAD"]},"other-browser-sessions.destroy":{"uri":"user\/other-browser-sessions","methods":["DELETE"]},"current-user-photo.destroy":{"uri":"user\/profile-photo","methods":["DELETE"]},"current-user.destroy":{"uri":"user","methods":["DELETE"]},"users.index":{"uri":"api\/users","methods":["GET","HEAD"]},"users.show":{"uri":"api\/users\/{user}","methods":["GET","HEAD"]},"users.update":{"uri":"api\/users\/{user}","methods":["PUT","PATCH"]},"users.destroy":{"uri":"api\/users\/{user}","methods":["DELETE"]},"animes.index":{"uri":"api\/animes","methods":["GET","HEAD"]},"animes.store":{"uri":"api\/animes","methods":["POST"]},"animes.show":{"uri":"api\/animes\/{anime}","methods":["GET","HEAD"]},"animes.update":{"uri":"api\/animes\/{anime}","methods":["PUT","PATCH"]},"animes.destroy":{"uri":"api\/animes\/{anime}","methods":["DELETE"]},"mangas.index":{"uri":"api\/mangas","methods":["GET","HEAD"]},"mangas.store":{"uri":"api\/mangas","methods":["POST"]},"mangas.show":{"uri":"api\/mangas\/{manga}","methods":["GET","HEAD"]},"mangas.update":{"uri":"api\/mangas\/{manga}","methods":["PUT","PATCH"]},"mangas.destroy":{"uri":"api\/mangas\/{manga}","methods":["DELETE"]},"reads.index":{"uri":"api\/reads\/{user}","methods":["GET","HEAD"]},"reads.show":{"uri":"api\/reads\/{manga}\/{user}","methods":["GET","HEAD"]},"reads.store":{"uri":"api\/reads","methods":["POST"]},"reads.update":{"uri":"api\/reads\/{manga}\/{user}","methods":["PATCH"]},"reads.destroy":{"uri":"api\/reads\/{manga}\/{user}","methods":["DELETE"]},"watches.index":{"uri":"api\/watches\/{user}","methods":["GET","HEAD"]},"watches.show":{"uri":"api\/watches\/{anime}\/{user}","methods":["GET","HEAD"]},"watches.store":{"uri":"api\/watches","methods":["POST"]},"watches.update":{"uri":"api\/watches\/{anime}\/{user}","methods":["PATCH"]},"watches.destroy":{"uri":"api\/watches\/{anime}\/{user}","methods":["DELETE"]},"friends.store":{"uri":"api\/friends","methods":["POST"]},"friends.show":{"uri":"api\/friends\/{friend}","methods":["GET","HEAD"]},"friends.update":{"uri":"api\/friends\/{friend}","methods":["PUT","PATCH"]},"friends.destroy":{"uri":"api\/friends\/{friend}","methods":["DELETE"]},"friends.index":{"uri":"api\/friendsIndex\/{friend}","methods":["GET","HEAD"]},"messages.index":{"uri":"api\/messages","methods":["GET","HEAD"]},"messages.store":{"uri":"api\/messages","methods":["POST"]},"messages.show":{"uri":"api\/messages\/{message}","methods":["GET","HEAD"]},"messages.destroy":{"uri":"api\/messages\/{message}","methods":["DELETE"]},"dashboard":{"uri":"dashboard","methods":["GET","HEAD"]},"AnimeList":{"uri":"AnimeList","methods":["GET","HEAD"]},"AnimeUserList":{"uri":"AnimeUserList\/{id}","methods":["GET","HEAD"]},"AnimeProfile":{"uri":"AnimeProfile\/{id}","methods":["GET","HEAD"]},"MangaList":{"uri":"MangaList","methods":["GET","HEAD"]},"MangaUserList":{"uri":"MangaUserList\/{id}","methods":["GET","HEAD"]},"MangaProfile":{"uri":"MangaProfile\/{id}","methods":["GET","HEAD"]},"FriendsList":{"uri":"FriendsList\/{id}","methods":["GET","HEAD"]},"MessagesList":{"uri":"MessagesList","methods":["GET","HEAD"]},"UserShow":{"uri":"UserShow\/{id}","methods":["GET","HEAD"]},"SharedLists":{"uri":"SharedLists\/{usu2?}\/{tipo?}\/{ambos?}","methods":["GET","HEAD"]},"UserAdminList":{"uri":"UserAdminList","methods":["GET","HEAD"]},"MangaAdminList":{"uri":"MangaAdminList","methods":["GET","HEAD"]},"AnimeAdminList":{"uri":"AnimeAdminList","methods":["GET","HEAD"]}};

        for (let name in routes) {
            Ziggy.routes[name] = routes[name];
        }
    })();
</script>        <script src="/js/app.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div id="app" data-page="{&quot;component&quot;:&quot;Welcome&quot;,&quot;props&quot;:{&quot;jetstream&quot;:{&quot;canCreateTeams&quot;:false,&quot;canManageTwoFactorAuthentication&quot;:true,&quot;canUpdatePassword&quot;:true,&quot;canUpdateProfileInformation&quot;:true,&quot;flash&quot;:[],&quot;hasAccountDeletionFeatures&quot;:true,&quot;hasApiFeatures&quot;:false,&quot;hasTeamFeatures&quot;:false,&quot;hasTermsAndPrivacyPolicyFeature&quot;:true,&quot;managesProfilePhotos&quot;:true},&quot;user&quot;:null,&quot;errorBags&quot;:[],&quot;errors&quot;:{},&quot;clave&quot;:&quot;&quot;,&quot;usuario&quot;:&quot;&quot;,&quot;canLogin&quot;:true,&quot;canRegister&quot;:true,&quot;laravelVersion&quot;:&quot;8.45.0&quot;,&quot;phpVersion&quot;:&quot;8.0.1&quot;},&quot;url&quot;:&quot;\/&quot;,&quot;version&quot;:&quot;0f4e2ee0f7e2ca9da665d2f8035743df&quot;}"></div>
    </body>
</html>

```
<div id="execution-results-GET-" hidden>
    <blockquote>Received response<span id="execution-response-status-GET-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GET-"></code></pre>
</div>
<div id="execution-error-GET-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-"></code></pre>
</div>
<form id="form-GET-" data-method="GET" data-path="/" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GET-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GET-" onclick="tryItOut('GET-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GET-" onclick="cancelTryOut('GET-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GET-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>/</code></b>
</p>
</form>


## dashboard




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/dashboard" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/dashboard"
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
<div id="execution-results-GETdashboard" hidden>
    <blockquote>Received response<span id="execution-response-status-GETdashboard"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETdashboard"></code></pre>
</div>
<div id="execution-error-GETdashboard" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdashboard"></code></pre>
</div>
<form id="form-GETdashboard" data-method="GET" data-path="dashboard" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETdashboard', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETdashboard" onclick="tryItOut('GETdashboard');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETdashboard" onclick="cancelTryOut('GETdashboard');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETdashboard" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>dashboard</code></b>
</p>
</form>


## AnimeList




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/AnimeList" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/AnimeList"
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
<div id="execution-results-GETAnimeList" hidden>
    <blockquote>Received response<span id="execution-response-status-GETAnimeList"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETAnimeList"></code></pre>
</div>
<div id="execution-error-GETAnimeList" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETAnimeList"></code></pre>
</div>
<form id="form-GETAnimeList" data-method="GET" data-path="AnimeList" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETAnimeList', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETAnimeList" onclick="tryItOut('GETAnimeList');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETAnimeList" onclick="cancelTryOut('GETAnimeList');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETAnimeList" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>AnimeList</code></b>
</p>
</form>


## AnimeUserList/{id}




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/AnimeUserList/magni" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/AnimeUserList/magni"
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
<div id="execution-results-GETAnimeUserList--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETAnimeUserList--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETAnimeUserList--id-"></code></pre>
</div>
<div id="execution-error-GETAnimeUserList--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETAnimeUserList--id-"></code></pre>
</div>
<form id="form-GETAnimeUserList--id-" data-method="GET" data-path="AnimeUserList/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETAnimeUserList--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETAnimeUserList--id-" onclick="tryItOut('GETAnimeUserList--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETAnimeUserList--id-" onclick="cancelTryOut('GETAnimeUserList--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETAnimeUserList--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>AnimeUserList/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETAnimeUserList--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## AnimeProfile/{id}




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/AnimeProfile/eos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/AnimeProfile/eos"
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
<div id="execution-results-GETAnimeProfile--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETAnimeProfile--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETAnimeProfile--id-"></code></pre>
</div>
<div id="execution-error-GETAnimeProfile--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETAnimeProfile--id-"></code></pre>
</div>
<form id="form-GETAnimeProfile--id-" data-method="GET" data-path="AnimeProfile/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETAnimeProfile--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETAnimeProfile--id-" onclick="tryItOut('GETAnimeProfile--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETAnimeProfile--id-" onclick="cancelTryOut('GETAnimeProfile--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETAnimeProfile--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>AnimeProfile/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETAnimeProfile--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## MangaList




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/MangaList" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/MangaList"
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
<div id="execution-results-GETMangaList" hidden>
    <blockquote>Received response<span id="execution-response-status-GETMangaList"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETMangaList"></code></pre>
</div>
<div id="execution-error-GETMangaList" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETMangaList"></code></pre>
</div>
<form id="form-GETMangaList" data-method="GET" data-path="MangaList" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETMangaList', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETMangaList" onclick="tryItOut('GETMangaList');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETMangaList" onclick="cancelTryOut('GETMangaList');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETMangaList" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>MangaList</code></b>
</p>
</form>


## MangaUserList/{id}




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/MangaUserList/iusto" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/MangaUserList/iusto"
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
<div id="execution-results-GETMangaUserList--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETMangaUserList--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETMangaUserList--id-"></code></pre>
</div>
<div id="execution-error-GETMangaUserList--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETMangaUserList--id-"></code></pre>
</div>
<form id="form-GETMangaUserList--id-" data-method="GET" data-path="MangaUserList/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETMangaUserList--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETMangaUserList--id-" onclick="tryItOut('GETMangaUserList--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETMangaUserList--id-" onclick="cancelTryOut('GETMangaUserList--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETMangaUserList--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>MangaUserList/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETMangaUserList--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## MangaProfile/{id}




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/MangaProfile/quaerat" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/MangaProfile/quaerat"
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
<div id="execution-results-GETMangaProfile--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETMangaProfile--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETMangaProfile--id-"></code></pre>
</div>
<div id="execution-error-GETMangaProfile--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETMangaProfile--id-"></code></pre>
</div>
<form id="form-GETMangaProfile--id-" data-method="GET" data-path="MangaProfile/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETMangaProfile--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETMangaProfile--id-" onclick="tryItOut('GETMangaProfile--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETMangaProfile--id-" onclick="cancelTryOut('GETMangaProfile--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETMangaProfile--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>MangaProfile/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETMangaProfile--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## FriendsList/{id}




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/FriendsList/et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/FriendsList/et"
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
<div id="execution-results-GETFriendsList--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETFriendsList--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETFriendsList--id-"></code></pre>
</div>
<div id="execution-error-GETFriendsList--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETFriendsList--id-"></code></pre>
</div>
<form id="form-GETFriendsList--id-" data-method="GET" data-path="FriendsList/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETFriendsList--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETFriendsList--id-" onclick="tryItOut('GETFriendsList--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETFriendsList--id-" onclick="cancelTryOut('GETFriendsList--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETFriendsList--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>FriendsList/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETFriendsList--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## MessagesList




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/MessagesList" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/MessagesList"
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
<div id="execution-results-GETMessagesList" hidden>
    <blockquote>Received response<span id="execution-response-status-GETMessagesList"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETMessagesList"></code></pre>
</div>
<div id="execution-error-GETMessagesList" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETMessagesList"></code></pre>
</div>
<form id="form-GETMessagesList" data-method="GET" data-path="MessagesList" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETMessagesList', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETMessagesList" onclick="tryItOut('GETMessagesList');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETMessagesList" onclick="cancelTryOut('GETMessagesList');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETMessagesList" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>MessagesList</code></b>
</p>
</form>


## UserShow/{id}




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/UserShow/magni" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/UserShow/magni"
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
<div id="execution-results-GETUserShow--id-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETUserShow--id-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETUserShow--id-"></code></pre>
</div>
<div id="execution-error-GETUserShow--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETUserShow--id-"></code></pre>
</div>
<form id="form-GETUserShow--id-" data-method="GET" data-path="UserShow/{id}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETUserShow--id-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETUserShow--id-" onclick="tryItOut('GETUserShow--id-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETUserShow--id-" onclick="cancelTryOut('GETUserShow--id-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETUserShow--id-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>UserShow/{id}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETUserShow--id-" data-component="url" required  hidden>
<br>

</p>
</form>


## SharedLists/{usu2?}/{tipo?}/{ambos?}




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/SharedLists/illo/quisquam/expedita" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/SharedLists/illo/quisquam/expedita"
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
<div id="execution-results-GETSharedLists--usu2----tipo----ambos--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETSharedLists--usu2----tipo----ambos--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETSharedLists--usu2----tipo----ambos--"></code></pre>
</div>
<div id="execution-error-GETSharedLists--usu2----tipo----ambos--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETSharedLists--usu2----tipo----ambos--"></code></pre>
</div>
<form id="form-GETSharedLists--usu2----tipo----ambos--" data-method="GET" data-path="SharedLists/{usu2?}/{tipo?}/{ambos?}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETSharedLists--usu2----tipo----ambos--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETSharedLists--usu2----tipo----ambos--" onclick="tryItOut('GETSharedLists--usu2----tipo----ambos--');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETSharedLists--usu2----tipo----ambos--" onclick="cancelTryOut('GETSharedLists--usu2----tipo----ambos--');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETSharedLists--usu2----tipo----ambos--" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>SharedLists/{usu2?}/{tipo?}/{ambos?}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>usu2</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="usu2" data-endpoint="GETSharedLists--usu2----tipo----ambos--" data-component="url"  hidden>
<br>

</p>
<p>
<b><code>tipo</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="tipo" data-endpoint="GETSharedLists--usu2----tipo----ambos--" data-component="url"  hidden>
<br>

</p>
<p>
<b><code>ambos</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="ambos" data-endpoint="GETSharedLists--usu2----tipo----ambos--" data-component="url"  hidden>
<br>

</p>
</form>


## UserAdminList




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/UserAdminList" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/UserAdminList"
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
<div id="execution-results-GETUserAdminList" hidden>
    <blockquote>Received response<span id="execution-response-status-GETUserAdminList"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETUserAdminList"></code></pre>
</div>
<div id="execution-error-GETUserAdminList" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETUserAdminList"></code></pre>
</div>
<form id="form-GETUserAdminList" data-method="GET" data-path="UserAdminList" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETUserAdminList', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETUserAdminList" onclick="tryItOut('GETUserAdminList');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETUserAdminList" onclick="cancelTryOut('GETUserAdminList');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETUserAdminList" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>UserAdminList</code></b>
</p>
</form>


## MangaAdminList




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/MangaAdminList" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/MangaAdminList"
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
<div id="execution-results-GETMangaAdminList" hidden>
    <blockquote>Received response<span id="execution-response-status-GETMangaAdminList"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETMangaAdminList"></code></pre>
</div>
<div id="execution-error-GETMangaAdminList" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETMangaAdminList"></code></pre>
</div>
<form id="form-GETMangaAdminList" data-method="GET" data-path="MangaAdminList" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETMangaAdminList', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETMangaAdminList" onclick="tryItOut('GETMangaAdminList');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETMangaAdminList" onclick="cancelTryOut('GETMangaAdminList');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETMangaAdminList" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>MangaAdminList</code></b>
</p>
</form>


## AnimeAdminList




> Example request:

```bash
curl -X GET \
    -G "http://localhost:8000/AnimeAdminList" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost:8000/AnimeAdminList"
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
<div id="execution-results-GETAnimeAdminList" hidden>
    <blockquote>Received response<span id="execution-response-status-GETAnimeAdminList"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETAnimeAdminList"></code></pre>
</div>
<div id="execution-error-GETAnimeAdminList" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETAnimeAdminList"></code></pre>
</div>
<form id="form-GETAnimeAdminList" data-method="GET" data-path="AnimeAdminList" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETAnimeAdminList', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETAnimeAdminList" onclick="tryItOut('GETAnimeAdminList');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETAnimeAdminList" onclick="cancelTryOut('GETAnimeAdminList');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETAnimeAdminList" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>AnimeAdminList</code></b>
</p>
</form>



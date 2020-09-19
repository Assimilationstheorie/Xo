/* Firefox version >= 80.0 */
class Request
{
    method = 'GET'
    cors = 'cors'
    credentials = 'same-origin'
    headers = {}

    constructor()
    {
        this.headers = new Headers()
    }

    Method(str = 'GET')
    {
        this.method = str;

        return this;
    }

    Get()
    {
        this.Method('GET');

        return this;
    }

    Post()
    {
        this.Method('POST');

        return this;
    }

    Put()
    {
        this.Method('PUT');

        return this;
    }

    Delete()
    {
        this.Method('DELETE');

        return this;
    }

    Cors(str = 'cors')
    {
        // (*) cors, no-cors, same-origin
        this.cors = str;

        return this;
    }

    CorsSameOrigin()
    {
        this.Cors('same-origin');

        return this;
    }

    CorsNo()
    {
        this.Cors('no-cors');

        return this;
    }

    Credentials(str = 'same-origin')
    {
        // (*) same-origin, include, omit
        this.credentials = str;

        return this;
    }

    CredentialsOmit()
    {
        this.Credentials('omit');

        return this;
    }

    CredentialsInclude()
    {
        this.Credentials('include');

        return this;
    }

    BearerToken(token = '')
    {
        this.headers.append('Authorization', 'Bearer ' + token);

        return this;
    }

    Header(type = 'Content-Type', value = 'application/json;charset=utf-8')
    {
        this.headers.append(type, value);

        return this;
    }

    async Send(url, data)
    {
        let opt = {
            method: this.method,
            mode: this.cors,
            credentials: this.credentials,
            headers: this.headers
        }

        if(this.method != 'GET' || this.method == 'HEAD')
        {
            opt.body = data;
        }

        let dd = await (await fetch(url, opt)).text();

        return dd;
    }

    async SendJson(url, data)
    {
        let opt = {
            method: this.method,
            mode: this.cors,
            credentials: this.credentials,
            headers: this.headers
        }

        if(this.method != 'GET' || this.method == 'HEAD')
        {
            opt.body = data;
        }

        let dd = await (await fetch(url, opt)).json();

        return dd;
    }
}

export default Request;

/*
// Include
<script src="request.js" type="module"></script>

// Import only from HTTP not from file:///
// import Request from 'request.js'

// After load
window.onload = () => {
    SendData();
}

// Request function
function SendData()
{
    // Object to json string
    let json = JSON.stringify({
        title: 'Super title',
        body: 'Extra message',
        userId: 1
    })

    // Form id="form1"
    let f = document.getElementById('form1');

    // First form
    let data = new FormData(document.forms[0]);

    // Data
    data.append("id",123);
    data.append("name","Max");

    // Send form with files and data and get text response
    new Request()
    .Post()
    .Send('http://domain.xx/api.php', data)
    .then((p) => {
        console.log("Response: ", p);
    });

    // Get json string from server
    new Request()
    .Get()
    .CredentialsInclude()
    .SendJson('https://jsonplaceholder.typicode.com/posts')
    .then((p) => {
        console.log("Response: ", p);
    });

    // Send json string and get json string from server with credentials (cookies)
    new Request()
    .Post()
    .CredentialsInclude()
    .BearerToken('token-hash-here')
    .Header('Content-Type','application/json;charset=utf-8')
    .SendJson('https://jsonplaceholder.typicode.com/posts', json)
    .then((p) => {
        console.log("Response: ", p);
    });

    // Delete and get text response from server
    new Request()
    .Delete()
    .CredentialsInclude()
    .Send('https://jsonplaceholder.typicode.com/posts?userId=1')
    .then((p) => {
        console.log("Response: ", p);
    });

    // Sample headers
    // 'Content-Type': 'application/json;charset=utf-8'
    // 'Content-Type': 'application/x-www-form-urlencoded'
    // 'Content-Type': 'multipart/form-data'
}

*/

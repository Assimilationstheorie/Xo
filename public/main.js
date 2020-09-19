import Request from '/js/xo/request.js';

window.onload = () =>
{
	let json = JSON.stringify({
		title: 'foo',
		body: 'bar',
		userId: 1
	});

	let data = new FormData();
    data.append("title","foo");
	data.append("body","bar");
	data.append("userId",1);

	// // POST
	// new Request()
	// .Post()
	// .BearerToken('token-123')
	// .Header("Content-type", "application/json; charset=UTF-8")
	// .SendJson('https://jsonplaceholder.typicode.com/posts', json)
	// .then((p) => {
	// 	console.log("Response: ", p);
	// });

	// POST
	// new Request()
	// .Post()
	// .BearerToken('token-123')
	// .CorsSameOrigin()
	// .CredentialsInclude()
	// .Send('http://xo.xx/api.php', data)
	// .then((p) => {
	// 	console.log("Response: ", p);
	// });

	// // GET
	// new Request()
	// .BearerToken('token-123')
	// .SendJson('https://jsonplaceholder.typicode.com/posts?_start=90&_limit=15')
	// .then((p) => {
	// 	console.log("Response: ", p);
	// });

}
import Request from '/js/xo/request.js';

window.onload = () =>
{
	let json = JSON.stringify({
		title: 'foo',
		body: 'bar',
		userId: 1
	});

	// let data = new FormData(document.forms[0])
	let data = new FormData(); // Or FormData(document.forms[0])
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

	// // POST
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

window.onscroll = () => {
	// Add animation class if element visible
	InView('.inview')
}

/*
 * Add animation from data-animation if elemenet visible in window
 * <div class="inview" data-animation="blob">+</div>
 */
function InView(ele = '.inview')
{
	let items = document.querySelectorAll(ele);

	items.forEach((i) =>
	{
		let anim = i.dataset.animation;
		let wh = window.innerHeight - 50;
		let ws = window.scrollY;
		let offset = i.offsetTop;
		let wt = offset - ws;
		console.log("Offset", offset, "Top scroll", ws, "Win top", wt, "height", wh);
		if(wt < wh) { i.classList.add(anim); }
	})
}

function ErrorImage(it)
{
    it.src='/media/img/cross.png';
}

function ErrorAvatar(it)
{
    it.src='/media/img/avatar.jpg';
}
function ErrorImage(it)
{
    it.src='/media/img/cross.png';
}

function ErrorAvatar(it)
{
    it.src='/media/img/avatar.jpg';
}

function OpenFileInput()
{
	let div = document.querySelector('#file');
	div.click();
	console.log(div)
}

function GetFileName(it)
{
	let div = document.querySelector('#btn-file-select');
	let file = it.files[0];
	div.innerText = 'Selected file ... '+file.name;
	console.log(file.name);
}
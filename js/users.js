const searchBar = document.querySelector(".search input"),
searchBtn = document.querySelector(".search button"),
usersList = document.querySelector(".users-list");

searchBtn.onclick = ()=>{
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
  searchBar.value = "";
}

searchBar.onkeyup = ()=>{
	let searchTerm = searchBar.value;
	let xhr = new XMLHttpRequest(); //create xml Object
	xhr.open("POST", "php/search.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				let data = xhr.response;
				usersList.innerHTML = data;
			}
		}
	}
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	xhr.send("searchTerm=" + searchTerm);
}
	

setInterval(()=>{
	//start ajax
	let xhr = new XMLHttpRequest(); //create xml Object
	xhr.open("GET", "php/users.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
				let data = xhr.response;
				usersList.innerHTML = data;
			}
		}
	}
	xhr.send();
}, 500); //this function will run frequently after 500ms
const searchBar = document.querySelector(".users .search input"),
searchIcon = document.querySelector(".users .search button");

searchIcon.onclick = ()=>{
	search.classList.toggle("active");
	searchBar.focus();
	searchIcon.classlist.toggle("active");
}
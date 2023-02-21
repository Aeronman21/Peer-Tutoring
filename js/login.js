const form = document.querySelector(".login form"),
continueBtn =form.querySelector(".button input")
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{ // prevents submission
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if(xhr.status === 200){
              let data = xhr.response;
			  if(data == "success"){
				 location.href = "user.php";
				  
			  }else{
				  errorText.textContent = data;
				  errorText.style.display = "block";
			  }
			}  
		}      
	} 
	let formData = new FormData(form);
	xhr.send(formData);
}
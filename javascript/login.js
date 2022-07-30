const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();  //preventing form =>submitting
}

continueBtn.onclick = ()=>{
    //ajax start
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "php/login.php", true);
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                if (data == "success") {
                    location.href = "home.php";
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";   
                }
            }
        }
    }
    //we have to send the form data through ajax to php
    let formData = new FormData(form); //create new formdata ajax
    xhr.send(formData); //sending the form data to php
}
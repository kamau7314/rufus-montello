const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorTxt = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault();
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST" , "login/signup.php" ,true);
    xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        location.href = "user.php";

                    }else{
                        errorTxt.textContent = data;
                        errorTxt.style.display = "block";
                        
                    }
                }
            }
    }
    let formData = new FormData(form);  //creating formData object
    xhr.send(formData);//sending data to php
}
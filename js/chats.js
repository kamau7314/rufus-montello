const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST" , "login/insert-chat.php" ,true);
    xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                   inputField.value="";
                   
                       scrollToBottom();
                   
                }
            }
    }
    let formData = new FormData(form);  //creating formData object
    xhr.send(formData);//sending data to php
}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval ( ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "login/get-chat.php", true);
    xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let Data = xhr.response;
                    chatBox.innerHTML = Data;
                    if(!chatBox.classList.contains("active")){
                        scrollToBottom();
                    }
                //console.log(Data);
                }
            }
    }
    let formData = new FormData(form);  //creating formData object
    xhr.send(formData);//sending data to php
    
}, 500); //funtion will run frequently after 500ms

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}
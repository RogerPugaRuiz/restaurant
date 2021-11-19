
document.getElementById("username").addEventListener("input", function(e){
    let info = document.getElementsByClassName("info")[0];
    
    let xhr = new XMLHttpRequest();
    xhr.onload = function(){
        let data = xhr.responseText;
        if (data == 1){
            info.innerHTML = "User name already in use";
            e.target.style.color = "red";
        }else{
            info.innerHTML = "";
            e.target.style.color = "green";
        }
        
    }
    xhr.open("POST","fn-php/username_ajax.php");
    xhr.send(e.target.value);
});

document.getElementById("password").addEventListener("input", function(e){
    let info = document.getElementsByClassName("info")[1];
    // 8 characters, upper case, lower case and numbers are required
    let pattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    let xhr = new XMLHttpRequest();

    if  (pattern.test(e.target.value)){
        info.innerHTML = "";
    }else{
        info.innerHTML = "has less than 8 characters or does not contain capital letters, lower case letters or numbers";
    }
})

document.getElementById("name").addEventListener("input", function(e){
    let info = document.getElementsByClassName("info")[2];
    // only letters
    let pattern = /^[a-zA-Z]+[\s|-]?[a-zA-Z]+[\s|-]?[a-zA-Z]+$/;
    let xhr = new XMLHttpRequest();

    if  (pattern.test(e.target.value)){
        info.innerHTML = "";
    }else if (e.target.value.includes(" ")){
        info.innerHTML = "The field contains spaces on the sides";
    }else{
        info.innerHTML = "The name only can contain capital letters, lower case letters and not numbers";
    }
})
document.getElementById("surname").addEventListener("input", function(e){
    let info = document.getElementsByClassName("info")[3];
    // only letters
    let pattern = /^[a-zA-Z]+[\s|-]?[a-zA-Z]+[\s|-]?[a-zA-Z]+$/;
    let xhr = new XMLHttpRequest();

    if  (pattern.test(e.target.value)){
        info.innerHTML = "";
    }else if (e.target.value.includes(" ")){
        info.innerHTML = "The field contains spaces on the sides";
    }else{
        info.innerHTML = "The name only can contain capital letters, lower case letters and not numbers";
    }
})
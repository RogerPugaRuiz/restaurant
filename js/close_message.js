
document.addEventListener("DOMContentLoaded", function(){
    let block_content = document.getElementsByClassName("block-content")[0];
    try{
        let close_message = document.getElementsByClassName("close_message")[0];
    let message = document.getElementsByClassName("message")[0];
    close_message.addEventListener("click",function(){
        block_content.classList.toggle("activated");
        message.remove();
        });
    }catch(e){
        
    }

},false);
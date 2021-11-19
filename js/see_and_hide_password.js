

document.getElementById("togglePassword").addEventListener("click",function(e) {
    let password = document.getElementById("password");
    let type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('bi-eye');
})
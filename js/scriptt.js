let menuIcon = document.querySelector('#hamb')
let navbar = document.querySelector('.navbar')

menuIcon.onclick = () => {
    menuIcon.classList.toggle('fa-x')
    navbar.classList.toggle('active')
};

let menuDepart = document.querySelector('#departs')
let barra = document.querySelector('.barraDeparts')

menuDepart.onclick = () =>{
    menuDepart.classList.toggle('fa-x')
    barra.classList.toggle('active')
}



let btnSee = document.getElementById("btnR")
let senha =  document.getElementById("senha")
let textoSenha = document.querySelector(".seeText")
function btnClick(){
     let inputTypeIsPassword = senha.type == "password" 


    if(inputTypeIsPassword){
        showPassword()
    }
    else {
        hidePassword()
    }
}   

function showPassword(){
    senha.setAttribute("type", "text")
}

function hidePassword(){
    senha.setAttribute("type", "password")
    textoSenha.innerHTML("Ocultar senha")
}

/*
var ubicacionPrincipal= window.pageYOffset;

window.addEventListener("scroll", function(){
    let desplazamientoActual = window.pageYOffset;
    if(ubicacionPrincipal>=desplazamientoActual){
        this.document.getElementsByTagName("nav")[0].style.top = "0px"
    }else{
        this.document.getElementsByTagName("nav")[0].style.top = "-100px"
    }
    ubicacionPrincipal= desplazamientoActual;
});
*/
//Menu

let enlacesHeader = document.querySelectorAll(".enlaces-header")[0];
let semaforo = true

document.querySelectorAll(".desplegable")[0].addEventListener("click", function(){
    if(semaforo){
        document.querySelectorAll(".desplegable")[0].style.color ="#fff";
        semaforo= false;
    }else{
        document.querySelectorAll(".desplegable")[0].style.color ="#000";
        semaforo= true;
        }
    
    enlacesHeader.classList.toggle("despliegue")
});
/*
let ubicacionPrincipal= window.pageYOffset;

window.addEventListener("scroll", function(){
    let desplazamientoActual = window.pageYOffset;
    if(ubicacionPrincipal>=desplazamientoActual){
        this.document.getElementsByTagName("nav")[0].style.top = "0px"
    }else{
        this.document.getElementsByTagName("nav")[0].style.top = "-100px"
    }
    ubicacionPrincipal= desplazamientoActual;
})

*/
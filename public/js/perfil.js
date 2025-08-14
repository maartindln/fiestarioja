let xUsu = document.getElementById("xUsuario");
let xCorreo = document.getElementById("xCorreo");
let mostrarContraseña = document.getElementById("ojo");
let ocultarContraseña = document.getElementById("ojoOculto");
let mostrarContraseña2 = document.getElementById("ojoConfirmar");
let ocultarContraseña2 = document.getElementById("ojoOcultoConfirmar");

let inputUsu = document.getElementById("inputUsu");
let inputCorreo = document.getElementById("inputCorreo");
let inputContraseña = document.getElementById("inputContraseña");
let inputContraseña2 = document.getElementById("confirmarContrasena");


xUsu.addEventListener("click", () => {
    inputUsu.value= "";

});

xCorreo.addEventListener("click", () => {
    inputCorreo.value= "";

});

mostrarContraseña.addEventListener("click", () => {
    inputContraseña.type="text";
    mostrarContraseña.style.display="none";
    ocultarContraseña.style.display="inline";

});

ocultarContraseña.addEventListener("click", () => {
    inputContraseña.type="password";
    mostrarContraseña.style.display="inline";
    ocultarContraseña.style.display="none";

});

mostrarContraseña2.addEventListener("click", () => {
    inputContraseña2.type="text";
    mostrarContraseña2.style.display="none";
    ocultarContraseña2.style.display="inline";

});

ocultarContraseña2.addEventListener("click", () => {
    inputContraseña2.type="password";
    mostrarContraseña2.style.display="inline";
    ocultarContraseña2.style.display="none";

});

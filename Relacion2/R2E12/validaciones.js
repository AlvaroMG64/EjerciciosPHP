// añadimos un eventListener al formulario, para que se dispare la ejecución de las validaciones
// otra opción hubiera sido, en el archivo 12formulario.php, poner dentro de la etiqueta <form>
// el evento onsubmit y la invocación de una función con nombre js, pero eso "emborrona" el código
// html, por lo que se prefiere manipular el evento directamente desde js

document.getElementById('form1').addEventListener("submit",function(event){
    
  event.preventDefault(); // frenamos el envio al action que es el comport. por defecto del botón submit...
                          // así podemos examinar el valor de cada campo antes de enviar
  var nota1 = parseFloat(document.getElementById('nota1').value);
  var nota2 = parseFloat(document.getElementById('nota2').value);
  // deben ser enteros, numéricos, entre 1 y 10 y tener algo
  var faltas = parseFloat(document.getElementById('faltas').value);
  // igual que las notas, salvo que puede ser 0 
  var nombre = document.getElementById('nombre').value;
  // no debe estar vacío, es requerido 
  var email = document.getElementById('email').value;
  // debe tener el formato de un email (por ahora no lo hemos resuelto)

  var correcto = true; // Hipótesis inicial, esta variable, si cambia a false es por encontrar un error

  if ((!Number.isInteger(nota1))||(nota1<1)||(nota1>10)){
    marcarError('nota1');  // Le paso el id de este campo a una función y señala en rojo y muestra error
    correcto = false;
  }

  if ((!Number.isInteger(nota2))||(nota2<1)||(nota2>10)){
    marcarError('nota2');  // Le paso el id de este campo a una función y señala en rojo y muestra error
    correcto = false;
  }

  if ((!Number.isInteger(faltas))||(faltas<0)){
    marcarError('faltas');  // Le paso el id de este campo a una función y señala en rojo y muestra error
    correcto = false;
  }
   
  // y para nota2 y faltas y
  if (nombre.trim()==""){
    marcarError('nombre');  // Le paso el id de este campo a una función y señala en rojo y muestra error
    correcto = false;
  }

  if (correcto) document.getElementById('form1').submit();
  // Si han ido bien todas las comprobaciones,
  // Se activa de nuevo el evento submit y se envía todo al action del form

});

// Aquí asociamos un eventListener a cada campo de entrada para que, si
// Después de un error se modifica su valor, desaparezcan los mensajes de error

document.getElementById('nota1').addEventListener("change",function(){
    limpiarError('nota1');
});

document.getElementById('nota2').addEventListener("change",function(){
    limpiarError('nota2');
});

document.getElementById('faltas').addEventListener("change",function(){
    limpiarError('faltas');
});

document.getElementById('nombre').addEventListener("change",function(){
    limpiarError('nombre');
});

// Estas dos funciones se crean refactorizando el código de validación, y por
// Modularidad. En lugar de repetirse por cada campo, se parametriza
// Una función que o marcaError (señaliza error), o limpiaError
// Observese que para acceder a una característica de estilo, se utiliza
// El mismo nombre que tenía en CSS, pero juntando las palabras, quitando
// El guión intermedio, y utilizando el lowerCamelCase como nomenclatura
// Asi border-color pasa a ser borderColor

function marcarError(identificador){
    document.getElementById(identificador+'Help').style.visibility="visible";
    document.getElementById(identificador).style.borderColor="red";
}

function limpiarError(identificador){
    document.getElementById(identificador+'Help').style.visibility="hidden";
    document.getElementById(identificador).style.borderColor="#dee2e6";
}
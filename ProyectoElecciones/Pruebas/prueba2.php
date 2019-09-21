<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript">
/* Funcion suma. */
function SumarAutomatico (valor) {
    var TotalSuma = 0;  
    valor = parseInt(valor); // Convertir a numero entero (número).
  
    TotalSuma = document.getElementById('resultado').value;
    // Valida y pone en cero "0".
    TotalSuma = (TotalSuma == null || TotalSuma == undefined || TotalSuma == "") ? 0 : TotalSuma;
    /* Variable generando la suma. */
    TotalSuma = (parseInt(TotalSuma) + parseInt(valor));
    // Escribir el resultado en el value de ID=resultado.
    document.getElementById('resultado').value = TotalSuma;
}
</script>
</head>
<body>
<h1>Sumar de manera automática con javaScript</h1>
<br>
<span>Número #1</span>
<input type="text" id="minumero1" onchange="SumarAutomatico(this.value);" />
<br/ >
<span>Número #2</span>
<input type="text" id="minumero2" onchange="SumarAutomatico(this.value);" />
<br/ >
<span>Número #3</span>
<input type="text" id="minumero3" onchange="SumarAutomatico(this.value);" />
<br/ >
<br/ >
<span>El resultado de la suma es: </span> <span id="MiTotal"></span><br>
<input type="text" id="resultado" />
 
</div>
</body>
</html>
function SumarAutomatico (valor) {
    var TotalSuma = 0;  
    valor = parseInt(valor); // Convertir a numero entero (número).
  
    TotalSuma = document.getElementById('tv-c1').value;
    // Valida y pone en cero "0".
    TotalSuma = (TotalSuma == null || TotalSuma == undefined || TotalSuma == "") ? 0 : TotalSuma;
    /* Variable generando la suma. */
    TotalSuma = (parseInt(TotalSuma) + parseInt(valor));
    // Escribir el resultado en el value de ID=resultado.
    document.getElementById('tv-c1').value = TotalSuma;
}
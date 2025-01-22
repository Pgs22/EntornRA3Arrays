<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pract3RA4</title>
</head>
<body>
    <h1>Práctica 3 - RA3 Arrays</h1>  
    <br>  
    <h2>EJERCICIO 1</h2>
    <?php
        /*
        Creamos una variable con la función array() y le damos un nombre y un valor.      
        Para crear array asociativa se basa en darle al dato un nombre clave, usando una flecha con los símbolos => 
        El dato puede ser un número o un texto y tanto la clave como el dato tienen que estar entre comillas
        */
        $datos = array("nombre" => "Sara", "apellido" => "Martinez", "edad" => "23", "ciudad" => "Barcelona"); 
        /*
        Creamos un contador con la varible $contar 
        para poder numerar cada dato que imprimimos en cada vuelta del array, 
        A la variable $contar le damos el valor de 1 porque queremos que empiece por 1.
        */
        $contar = 1;
        /*
        Usamos foreach para recorrer el Array y en cada vuelta hacemos un enter después 
        de imprimir el echo, e incrementamos el valor de la variable $contar con el operador ++
        */
        foreach ($datos as $value) {
            echo "Dato " . $contar . "º :" . $value . "<br>";
            $contar++;
        }
        echo "<br>"; //Hacemos un enter para separar el siguiente ejercicio
    ?>

    <h2>EJERCICIO 2</h2>    
    <?php
        /*
        Para mostrar los datos y las claves del ejercicio anterior,
        se usa $key para poder imprimir ambos, los datos y las claves
        y hacemos un enter en cada vuelta y al finalizar la lista fuera del bucle para separar el ejercicio
        */
        foreach ($datos as $key => $value) {
            echo " $key: $value <br>";
        }    
        echo "<br>";
    ?>
    <h2>EJERCICIO 3</h2>  
    <?php        
        /*
        Para modificar el array usamos el nombre de la variable $datos que le asignamos al crearla 
        y entrecorchetes y entrecomillas indicamos el nombre de la clave que esté asociado el dato
        y con el signo igual le podemos asignar un nuevo valor, en este caso: 24
        */
        $datos["edad"] = 24;
        /*
        Podemos usar el contador que ya creamos en el ejercicio 2, pero como habrá cambiado su valor,
        mejor lo inicializamos de nuevo a 1
        */
        $contar = 1;
        /*
        Para mostrar la información: Usamos foreach para recorrer el Array
        y en cada vuelta hacemos un enter después de imprimir el echo,
        e incrementamos el valor de la variable $contar con el operador ++
        */
        foreach ($datos as $value) {
            echo "Dato " . $contar . "º :" . $value . "<br>";
            $contar++;
        }  
        echo "<br>";
    ?>
    <h2>EJERCICIO 4</h2>  
    <?php
    /*
    Del Array del ejercicio 1, borramos la ciudad del array $datos usamos el nombre de la clave asociativa al dato.
    Para borrar usamos la función unset() indicando el nombre del array 
    y entre corchetes y entrecomillas, el nombre de la clave
    */
        unset($datos["ciudad"]);
    /*
    Para mostrar la información usamos la función var_dump()
    Podemos usar los tag "</pre>" para que lo muestre con un formato más legible:
        echo "</pre>"; var_dump(value: $datos); "</pre>";        
    */
        var_dump($datos);
        echo "<br>";
    ?> 
    <h2>EJERCICIO 5</h2>  
    <?php
        //Creamos la variable letters con la cadena de texto.
        $letters = "a,b,c,d,e,f";
        /*Con la función explode() usamos la variable $letters creando un array con nombre $lettersArray
        y separamos la cadena de texto usandondo como delimitador la coma de esta cadena de texto 
        que tiene que dividir y guardar en un array
        */
        $lettersArray = explode(",", $letters);
        /*
        Para ordenar en orden descendiente el contenido del array, usamos la función arsort() indicando
        dentro del paréntesis el nombre del array.
        */
        arsort($lettersArray);
        $contar = 6;   
        foreach ($lettersArray as $value) {
            echo "letter " . $contar . "º: " . $value . "<br>";
            $contar--;
        }  
        echo "<br>";
    ?> 
    <h2>EJERCICIO 6</h2>    
    <?php
        //Creamos un array asociativo para registrar las notas
        $notas = array("Miguel" => "5", "Luís" => "7", "Marta" => "10", "Isabel" => "8", "Aitor" => "4", "Pepe" => "1");
        //Ordenamos el array en orden ascendente
        sort($notas);
        //Recorremos el array para imprimir la clave y el dato en cada vuelta
        foreach ($notas as $estudiante => $value) {
            echo " $estudiante: $value <br>";
        }    
        echo "<br>";
    ?>
    
    <h2>EJERCICIO 7</h2>    
    <?php
        //Usamos el array del ejercicio anterior y hacemos la suma de todos las notas de los estudiantes
        $sumaNotas = array_sum($notas);
        //Para hacer la media del total de la suma, primero contamos cuantos estudiantes tenemos
        $totalAlumnos = count($notas);
        /*
        Calculamos la media con los datos de las dos variables anteriores y guardamos el cálculo
        en la nueva variable notasMedia
        */
        $notasMedia = $sumaNotas/$totalAlumnos;
        /*
        Para mostrar el valor de la variable $notasMedia solo con dos decimales, usamos la función bcdiv()
        esta función redondea el valor haciendo una división para cortar decimales indicando num1, num2 y escala: 
        - el num1 el que vamos a dividir, en este caso el nombre de la variable $notasMedia que queremos redondear,
        - el num2 es un número por el que vamos dividir, elegimos el 1 para que no cambie su valor,
        - la escala indica el total de decimales que queremos
        Los tres valores separados por comas.
        */
        $mediaRedondeada = bcdiv($NotasMedia, '1', 2);
        //Imprimimos resultado
        echo "Media de las notas: $mediaRedondeada<br/>";
        //imprimimos el título del siguiente cálculo
        echo "Alumnos con nota por encima de la media:<br>";
        /*
        Para mostrar solo los estudiantes que tengan una nota por encima de la media, 
        se comprobará en cada vuelta del array:
        - con un foreach recorremos el array y asignamos a la variable $nota el valor de cada dato del array,
        que es la nota del estudiante.
        - con un if conseguimos que solo imprima el nombre del estudiante que cumpla la condición,
        en este caso la nota del estudiante con que sea mayor que la notaMedia
        */
        foreach ($notas as $alumno => $nota) {
            if ($nota > $notasMedia) {
                echo $alumno . "<br>"; // Se imprimirá el nombre clave del array $notas (el dato es la nota)
            }  
        }
    ?>
    
    <h2>Ejercicio 8</h2>
    <?php
    /*
    Usamos el array que ya tenemos de $notas
    Creamos una variable $notaMax y le damos el valor de la máxima nota
    Y para obtener el valor máximo del array usamos la función max()
    */
    $notaMax = max($notas);
    /*
    Para imprimir el nombre clave del array que tiene asignada la nota más alta
    recorremos el array con el foreach y buscamos el nombre clave usando el if para 
    añadir condición, que sea igual a la nota más alta que encuentre.
    */
    echo "La nota más alta es " . max($notas);
    foreach ($notas as $alumno => $nota){
        if ($nota == $notaMax){
            echo " y el mejor alumno es $alumno";
        }
    }    
    ?>

</body>    
</html> 
<?php
// Definición del inventario de cómics
$inventario = [
    'suspense_terror' => [
        ['titulo' => 'The Long Halloween', 'editorial' => 'DC', 'autor' => 'Tim Sale', 'idioma' => 'Inglés', 'precio' => 20, 'stock' => 10],
        ['titulo' => 'Uzumaki', 'editorial' => 'Planeta', 'autor' => 'Junji Ito', 'idioma' => 'Japonés', 'precio' => 25, 'stock' => 15],
        ['titulo' => 'Tomie', 'editorial' => 'Planeta', 'autor' => 'Junji Ito', 'idioma' => 'Japonés', 'precio' => 25, 'stock' => 20],
    ],
    'accion' => [
        ['titulo' => 'Berserk Deluxe Edition 1', 'editorial' => 'Dark Horse', 'autor' => 'Kentaro Miura', 'idioma' => 'Japonés', 'precio' => 30, 'stock' => 12],
    ],
    // Puedes agregar más categorías y cómics según sea necesario
];

// main
// antes descuento
mostrarComicsEnTabla();
mostrarValorAlmacen();
aplicarDescuentoManga();
// mostramos el inventario actualizado
mostrarComicsEnTabla();
mostrarValorAlmacen();

function mostrarComicsEnTabla()
{
    global $inventario;
    echo '<br>';
    echo '<table border="1">';
    echo '<tr><th>Categoría</th><th>Título</th><th>Editorial</th><th>Autor</th><th>Idioma</th><th>Precio</th><th>Stock</th></tr>';

    foreach ($inventario as $categoria => $comics) {
        foreach ($comics as $comic) {
            echo '<tr>';
            echo "<td>$categoria</td>";
            echo "<td>{$comic['titulo']}</td>";
            echo "<td>{$comic['editorial']}</td>";
            echo "<td>{$comic['autor']}</td>";
            echo "<td>{$comic['idioma']}</td>";
            echo "<td>{$comic['precio']}</td>";
            echo "<td>{$comic['stock']}</td>";
            echo '</tr>';
        }
    }

    echo '</table>';
}

function mostrarValorAlmacen()
{
    // Calcular valor almacén total multiplicando stock por precio
    global $inventario;
    $valorAlmacen = 0;    
    /*
    Para multiplicar stock por precio del arrays multidimensionales, recorremos el array con dos foreach()
    Hacemos dentro del segundo foreach el cálculo en cada vuelta y vamos sumando el resultado a la variable que inicializamos fuera del bucle
    para que una vez termine el bucle nos imprima el total que ha sumado.
    */
    foreach ($inventario as $categoria => $productos) {
        foreach ($productos as $producto) {
            $valorAlmacen += $producto['stock'] * $producto['precio'];
        }
    }
    echo "Total valor almacen es: {$valorAlmacen}";
}

function aplicarDescuentoManga()
{
    global $inventario;
    /*
    El operador (&) lo añadimos dentro del for,
    en el segundo array &$comic que es la categoria y 
    el tercer array &$comicDes que es el donde está cada nombre clave y valor.
    para poder modificar el array multidimensional $inventario que está fuera del bucle for
    */
    foreach ($inventario as $categorias => &$comic) {
        foreach ($comic as &$comicDes) {
            if ($comicDes['idioma'] == "Japonés"){
                $comicDes['precio'] = $comicDes['precio'] * 0.7; // Aplicar descuento del 30% 
            }
        }
    }

    /*    
    foreach ($inventario['accion'] as &$comic) {
        if ($comic['idioma'] == 'Japonés') {
            $comic['precio'] = $comic['precio'] * 0.7; // Aplicar descuento del 30%
        }
    }
    */
    
    /*
    El error del código original comentado arriba, 
    estaba en que faltaba añadir un foreach para poder recorrer la segunda array porque
    es un array multidimensional
    El segundo error es, que queremos aplicar el descuento a todas las categorias, y esta selección solo
    se aplicaba a la categoría accion.
    */
}
?>



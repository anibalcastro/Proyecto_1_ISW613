<?php 
/**
 * Establece conexion
 */
function conexion(){
    return mysqli_connect('127.0.0.1','root','','mynews');
}

/**
 * Agrega a nuevos usuarios
 */
function agregarUsuarios(&$name, &$last_Name, &$email, &$password, &$adress, &$adress2, &$country, &$city, &$zip, &$phone){
    $connection = conexion();

    //consulta
    $sqlInsert = "INSERT INTO `users`( `email`, `password`, `first_name`, `last_name`, `adress`, `adress2`, `country`, `city`, `zip`, `phone`, `role_id`) VALUES ('$email','$password','$name','$last_Name','$adress','$adress2','$country','$city','$zip','$phone', 2)";

    //ejecutamos consulta
    mysqli_query($connection, $sqlInsert);
     
    //cerramos conexión
    mysqli_close($connection);
}

?>
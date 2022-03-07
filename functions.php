<?php

//se retorna la conexión
function conexion(){
  return  $connection = mysqli_connect('127.0.0.1','root','','mynews');
}

/**
 * Valida si el usuario ingresado
 * existe en la base de datos
 * por medio del $email y $password
 */
function authenticate($email, $password){
 
  $connection = conexion();
  
  //consulta para saber existencia
  $sqlUsuarios = "SELECT * FROM users WHERE  `email` = '$email' AND `password` = '$password'";
  
  //resultado si el existe o no
  $result = mysqli_query($connection, $sqlUsuarios);
  
  //si el sql viene vacio, cierra conexión y retorna falso.
  if ($result == ""){
    mysqli_close($connection);
    return false;
  }
  // si viene lleno, cierra conexión y retorna el resultado.
  else{
    mysqli_close($connection);
    return $result->fetch_array(MYSQLI_ASSOC);
  }
}

?>
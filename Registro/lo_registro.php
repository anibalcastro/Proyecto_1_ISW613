<?php
    if ($_POST){
        $name = $_REQUEST['nameU'];
        $last_Name = $_REQUEST['lastU'];
        $email = $_REQUEST['emailU'];
        $password = $_REQUEST['passwordU'];
        $adress = $_REQUEST['adress1U'];
        $adress2 = $_REQUEST['adress2U'];
        $country = $_REQUEST['countryU'];
        $city = $_REQUEST['cityU'];
        $zip = $_REQUEST['zipU'];
        $phone = $_REQUEST['phoneU'];

        //conexión
        $connection = mysqli_connect('127.0.0.1','root','','mynews');

        //consulta
        $sqlInsert = "INSERT INTO `users`( `email`, `password`, `first_name`, `last_name`, `adress`, `adress2`, `country`, `city`, `zip`, `phone`, `role_id`) VALUES ('$email','$password','$name','$last_Name','$adress','$adress2','$country','$city','$city','$phone', 2)";

        //ejecutamos consulta
        mysqli_query($connection, $sqlInsert);
        
        //cerramos conexión
        mysqli_close($connection);

        //redirecciona
        header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/index.php?status=success&message=Sucessfully-Created');
    }
?>
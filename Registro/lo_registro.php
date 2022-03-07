<?php
    
    //Valida si alguno de los campos que viene está vacio
    if (!empty($_POST['nameU']) && !empty($_POST['lastU']) && !empty($_POST['passwordU']) && !empty($_POST['adress1U']) && !empty($_POST['adress2U']) && !empty($_POST['countryU']) && !empty($_POST['cityU']) && !empty($_POST['zipU']) && !empty($_POST['phoneU']) && !empty($_POST['emailU'])  ){
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
        $sqlInsert = "INSERT INTO `users`( `email`, `password`, `first_name`, `last_name`, `adress`, `adress2`, `country`, `city`, `zip`, `phone`, `role_id`) VALUES ('$email','$password','$name','$last_Name','$adress','$adress2','$country','$city','$zip','$phone', 2)";

        //ejecutamos consulta
        mysqli_query($connection, $sqlInsert);
        
        //cerramos conexión
        mysqli_close($connection);

        //redirecciona
        header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/index.php?status=success&message=Sucessfully-Created');
    }
    else{
        header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Registro/registro.php?status=success&message=Error-Fill-the-blanks');
    }
?>
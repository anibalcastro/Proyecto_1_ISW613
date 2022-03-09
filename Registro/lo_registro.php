<?php
    include('funcionesRegistro.php');


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

        agregarUsuarios($name, $last_Name, $email, $password, $adress, $adress2, $country, $city, $zip, $phone);

        //redirecciona
        header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/index.php?status=success&message=Sucessfully-Created');
    }
    else{
        header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Registro/registro.php?status=success&message=Error-Fill-the-blanks');
    }
?>
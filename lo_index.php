<?php
    require('functions.php');

    if($_POST){

        $email = $_REQUEST['emailU'];
        $password = $_REQUEST['passwordU'];

        $user = authenticate($email,$password);
        
        if ($user){
            session_start();
            $_SESSION['user'] = $user;

            if ($user['role_id'] === 1){
                //redirecciona a administrador
                header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Administrador/categorias.php?status=success&message=Bienvenido');
            }
            else{
                //redirecciona a usuario
                header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/Usuario/portada.php?status=success&message=Bienvenido');
            }
        }
        else{
            //contraseña incorrecta
            header('Location: http://utnweb.com/web2/Proyecto_1_ISW613/index.php?status=Constraseña-Incorrecta');
        }
        die;
        

    }
?>
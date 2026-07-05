
    <?php
    require 'conexion.php';
    $email=filter_input(INPUT_GET, 'email');
    $contrasenia=md5(filter_input(INPUT_GET, 'contrasenia')."Maproom");

    $consulta=$conexion->prepare("SELECT * FROM usuario WHERE email = :email AND contrasenia=:contrasenia");
    $consulta->bindParam(':email', $email);
    $consulta->bindParam(':contrasenia', $contrasenia);
    $consulta->execute();
    $email=$consulta->fetch(pdo::FETCH_ASSOC);
    echo "Hola";
    if($email==false){
        header('location:./index.php?accion=incorrect');
    }else{
        session_start();
        $_SESSION['id']=$email["id"];
        $_SESSION['nombre']=$email["nombre"];
        $_SESSION['apellido']=$email["apellido"];
        $_SESSION['telefono']=$email["telefono"];
        $_SESSION['dni']=$email["dni"];
        $_SESSION['email']=$email;

        header('location:./index.php?accion=correct');
    }
    
    ?>
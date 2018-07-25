<?php
    
session_start();
include ("conexion.php");


  $mensaje;
  if($conexion)
   {
        if (isset($_POST['cajatexto']) and (isset($_POST['puntaje']))) 
        {
            $comentario = $_POST['cajatexto'];
            if (!$comentario == "")
            {
                $puntaje = $_POST['puntaje'];
                if ($puntaje != -2)
                {    
                   $emailPi = $_SESSION['Email_piloto'];
                   $emailCo = $_SESSION['Email_copiloto'];
                   $patente = $_SESSION['patente'];
                   $idviaje = $_SESSION['id_viaje'];
                   $resultado = $conexion -> query("INSERT INTO votaciones(Email_piloto,Email_copiloto,patente,calificacion,comentario,id_viaje) VALUES ($emailPi, $emailCo , $patente, '$puntaje', '$comentario', $idviaje)");
                   if ($resultado)
                   {
                       $_SESSION['votexitosa'] = false;
                       header("Location:MisViajesCopi.php");
                   }
                   else
                   {
                       echo "Ha surgido un error y no se pudo guardar su votacion.";
                   }
                }               
            }  
        }  
    }
    else{
    echo "No se pudo cargar los datos";
    header("Location:VotarPiloto.php");
    }


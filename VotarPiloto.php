<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- css boostrap -->
            <link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="estilos6.css">
        <title>Un aventon</title>
    </head>
    <?php
      session_start();
      include ("class_funciones.php");
      $fun = new funciones();
      ?>
    
    <script>
        function validar_Datos()
        {
           valor = document.getElementById("cajatexto").value;
    
           if (valor == null || valor == "")
           {
              window.alert('El campo comentario esta vacio.');
              return false;
           }
    
        valor2 = document.getElementById("puntaje").value;
        if (valor2 == -2)
        {
           window.alert('No se ha seleccionado un puntaje.');
           return false;
        }
    
         return true;
       }
     </script>
    <body style="background-color: white">
        <form name="f1" action="RegistrarComentarioYVotoAPiloto.php" method = "post" onsubmit="return validar_Datos()">
        <label id="titulo" >Su viaje a finalizado. Por favor, ingrese un comentario y calificacion para evaluar al piloto.</label>
           <label id="comentario">Ingrese un comentario</label>
           <div class="container">
             <textarea name="cajatexto" value="comentario" class="textarea" id="cajatexto" aria-label="Comentario"></textarea>
             <label id="puntuacion">Seleccione una puntuacion</label>
              <select type="number" name="puntaje" value="puntaje" id="puntaje">
                <option value="-2">Seleccione una puntuacion</option>
                <option value="1">Bueno (+1)</option>
                <option value="0">Regular (0)</option>
                <option value="-1">Malo (-1)</option>
              </select> 
             <?php
                    $email = $_SESSION['Email_piloto'];
                    $consulta="SELECT Foto FROM usuarios WHERE Email = '$email'";
                    if($resul=mysqli_query($conexion,$consulta)){
                      $row=mysqli_fetch_array($resul);
                    }
                    else
                        echo "no encuetra";
                    
                    if($row['Foto'] == null)
                        echo '<img src="icono_users.png" />';
                    else
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Foto']).'" />';    
                ?>   
             <table class="table table-user-information" id="grilla">
                 <?php
                    
                    $consulta2="SELECT * FROM usuarios WHERE Email = '$email'";
                    $resultadoConsulta28= mysqli_query($conexion,$consulta2);
                    $registroPi = mysqli_fetch_array($resultadoConsulta28);
                 ?>
                        <tr>
                            <td>
                                <label>Nombre: 
                            </td>
                            <td>
                                <?php 
                                    $nombre = $registroPi['Nombre'];
                                        echo "$nombre";
                                ?>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Apellido: 
                            </td>
                            <td>
                                <?php 
                                    $apellido = $registroPi['Apellido'];
                                        echo "$apellido";
                                ?>
                                </label>
                            </td>
                        </tr>
             </table>
             <label id="titulo2">Foto de perfil del piloto.</label>
           </div>  
           <img id="logo" src="logo.jpg" width="50px" height="50px">
        <button type="submit" value="submit" id="votar">Enviar votacion</button>
        </form>
     </body>
     
     
    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
</html>


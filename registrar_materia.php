<?php 
include('./includes/header.html');
include('./includes/navbar.html');
require('./bd/bd.php');

$message="";
    
if (!empty($_POST['Nomb_materia']) && !empty($_POST['Cod_materia']) && !empty($_POST['Cred']) && !empty($_POST['Cod_P'])) {
    $sql = "INSERT INTO tb_materia (Nomb_materia,Cod_materia,Cred,Cod_P) VALUES (:Nomb_materia, :Cod_materia,:Cred,:Cod_P)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Nomb_materia', $_POST['Nomb_materia']);
    $stmt->bindParam(':Cod_materia',$_POST['Cod_materia']);
    $stmt->bindParam(':Cred',$_POST['Cred']);
    $stmt->bindParam(':Cod_P',$_POST['Cod_P']);
    if ($stmt->execute()) {
      $message = 'Nueva Materia Agregada';
    } else {
      $message = 'Error al agregar materia';
    }
}else{
    $message='Por Favor introduzca todos los datos';
}

  

  
?>
<body>
<?php  if(!empty($message)): ?>
    <div class="alert alert-dark" role="alert"><?= $message ?></div>
<?php endif; ?>
 <div class="col-md-4 mx-auto">
        <!--Formulario para registrar materias -->
    <form action="registrar_Materia.php" method="post">
     <div class=" card mt-4 text-center" >
        <div class="card-header">
            <h3>Registrar Materia</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Nombre de la materia: </label>
                <input type="text" name="Nomb_materia" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Codigo de la materia:</label>
                <input type="text" name="Cod_materia" id="">
            </div>
            <div class="form-group">
                <label for=""> Creditos de la materia:</label>
                <input type="text" name="Cred" id="">
            </div>
            <div class="form-group">
                <label for="">Codigo del profesor que la imparte:</label>
                <input type="text" name="Cod_P" id="">
            </div>
            <button type="submit" value="Send" class="btn btn-primary">Registrar</button>
        </div>
        </div>
    </form>
    </div>
</body>
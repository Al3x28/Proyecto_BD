<?php 
include('./includes/header.html');
include('./includes/navbar.html');
require('./bd/bd.php');

$message="";

if (!empty($_POST['Nomb_P']) && !empty($_POST['Cod_P'])) {
    $sql = "INSERT INTO tb_profesor (Nomb_P, Cod_P) VALUES (:Nomb_P, :Cod_P)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Nomb_P', $_POST['Nomb_P']);
    $stmt->bindParam(':Cod_P',$_POST['Cod_P']);

    if ($stmt->execute()) {
      $message = 'Profesor registrado con exito';
    } else {
      $message = 'Error al registrar profesor, puede el codigo puede estar ya asignado';
    }
  }
?>

<body>

<?php  if(!empty($message)): ?>
    <div class="alert alert-dark" role="alert"><?= $message ?></div>
<?php endif; ?>

    <!--Formulario para registrar profesores-->
    <div class="col-md-4 mx-auto">
    <form action="registrar_Profesor.php" method="post">
     <div class=" card mt-4 text-center" >
        <div class="card-header">
            <h3>Registrar Profesor</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Nombre del Profesor: </label>
                <input type="text" name="Nomb_P" id="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Codigo del Profesor:</label>
                <input type="text" name="Cod_P" id="">
            </div>
            <button type="submit" value="Send" class="btn btn-secondary">Registrar</button>
        </div>
        </div>
    </form>
    </div>

</body>
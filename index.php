<!DOCTYPE html>
<?php
require_once('dbcon.php');
?>
<html lang="es">
<head>
  <title>Control de Operaciones por Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../styles.css">
  <script src="assets/js/jquery.min.js"></script>

</head>
<body>
  <div class="header-bar">
    <div class="logo-container">
        <img src="../img/LOGOCWO.png" alt="Logo" class="logo">
    </div>
    <div class="header-title">Dashboard Producción</div>
    <div class="ingreso-btn-container">
        <a href="ingreso.php" class="btn-principal">📝 Ingresar Producción</a>
        <a href="controloperativo/index.php" class="btn-principal">📋 Control Operativo</a>
        <a href="concentrado_demos.php" class="btn-principal">🎯 Concentrado Demos</a>
        <a href="nomina.php" class="btn-principal">💰 Generar Nomina</a>
        <a href="ranking.php" class="btn-principal">🏆 Ranking</a>
        <span class="navbar-right">
          <button class="btn-salir" onclick="window.location.href='https://www.cleanworkorangemx.com/cwo/dashboard.php'">Salir</button>
        </span>
    </div>
  </div>
  <div class="container">
    <div class="card">
      <div class="card-header">
        Control de Operaciones
      </div>
      <div class="card-body" style="width:100%;height:auto;">
        <form class="form-ingreso" method="post">
          <div class="row">
            <div class="col-md-4">
              <label for="cbxCHotel">Cliente:</label>
              <select name="cbxCHotel" id="cbxCHotel" class="form-control compacto-campo" required>
                <option value="">Seleccione:</option>
                <?php 
                  $result2 = mysqli_query($con,"SELECT * FROM codhotel ORDER BY hotel");
                  while ($r2 = mysqli_fetch_array($result2)){
                    echo '<option value="'.$r2[1].'"> '.$r2[2].'</option>';
                  }
                ?>
              </select>
            </div>
            <div class="col-md-4">
              <label for="cbxServicio">Servicio:</label>
              <select name="cbxServicio" id="cbxServicio" class="form-control compacto-campo" required>
                <option value="">Seleccione:</option>
                <?php 
                  $result = mysqli_query($con,"SELECT * FROM baseprecios WHERE segmento ='Hoteleria' AND categoria = 'Nuevo' ORDER BY descripcion");
                  while ($r = mysqli_fetch_array($result)){
                    echo '<option value="'.$r[1].'">'.$r[2].'</option>';
                  }
                ?>
              </select>
            </div>
            <div class="col-md-4">
              <label for="cantidad">Cantidad:</label>
              <input type="number" id="cantidad" name="cantidad" class="form-control compacto-campo" min="1" required>
            </div>
            <div class="col-md-4">
              <label for="fechaini">Fecha Inicio:</label>
              <input type="date" class="form-control compacto-campo" id="fechaini" name="fechaini" required>
            </div>
            <div class="col-md-4">
              <label for="fechafin">Fecha Fin:</label>
              <input type="date" class="form-control compacto-campo" id="fechafin" name="fechafin" required>
            </div>
            <div class="col-md-4 d-flex align-items-end justify-content-end">
              <button type="submit" class="btn-principal" style="margin-bottom:8px;">Registrar operación</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- Aquí puedes incluir tu tabla, por ejemplo usando ver.php -->
    <div style="margin-top:22px;">
      <?php include('ver.php'); ?>
    </div>
  </div>
  <script>
    function ShowSelected2(){
      var codigo=document.getElementById('cbxCHotel').value;
      document.getElementById('cliente').value = codigo;
    }
    function ShowSelected(){
      var clave=document.getElementById('cbxServicio').value;
      document.getElementById('servicio').value = clave;
    }
  </script>
</body>
</html>
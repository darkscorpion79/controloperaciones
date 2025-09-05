<?php
// Simulación de edición
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$operacion = $fecha = $estado = '';
if ($id) {
    // Aquí iría la consulta a la BD para cargar los datos
    // Simulado:
    $operacion = 'Revisión equipo';
    $fecha = '2025-09-04';
    $estado = 'Pendiente';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $id ? "Editar" : "Registrar" ?> Operación</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="header-bar">
    <div class="logo-container">
        <img src="../../img/LOGOCWO.png" alt="Logo" class="logo">
    </div>
    <div class="header-title"><?= $id ? "Editar Operación" : "Registrar Nueva Operación" ?></div>
    <div class="ingreso-btn-container">
        <a href="index.php" class="btn-principal">📋 Volver al listado</a>
    </div>
</div>
<div class="form-card">
    <h2><?= $id ? "Editar operación" : "Registrar operación" ?></h2>
    <form method="post" action="">
        <label for="operacion">Operación</label>
        <input type="text" name="operacion" id="operacion" required value="<?= htmlspecialchars($operacion) ?>">

        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" required value="<?= htmlspecialchars($fecha) ?>">

        <label for="estado">Estado</label>
        <select name="estado" id="estado" required>
            <option value="Pendiente" <?= $estado=='Pendiente' ? 'selected':'' ?>>Pendiente</option>
            <option value="Programado" <?= $estado=='Programado' ? 'selected':'' ?>>Programado</option>
            <option value="Completado" <?= $estado=='Completado' ? 'selected':'' ?>>Completado</option>
        </select>

        <div class="form-btns">
            <button type="submit" class="btn-principal">💾 Guardar</button>
            <a href="index.php" class="btn-principal" style="background:var(--text-light);">Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>
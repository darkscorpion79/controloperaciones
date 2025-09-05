<?php
	require_once('dbcon.php');

	echo "<table class='table table-hover table-striped tabla-detalle'>
			<thead>
				<tr>
					<th>Id</th>
					<th>Cliente</th>
					<th>Servicio</th>
					<th>Cantidad</th>
					<th>Fecha Inicio</th>
					<th>Fecha Fin</th>
					<th>Realizados</th>
					<th>Pendientes</th>
					<th>Progreso</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>";
	$cuenta=0;
	$resultcli=mysqli_query($con, "SELECT * FROM controlh");
	while($vercli=mysqli_fetch_row($resultcli)){
		$clientectrl=$vercli[1];
		$srvctrl=trim($vercli[2]);
		$cantctrl=$vercli[3];
		$fechainictrl=$vercli[4];
		$fechafinctrl=$vercli[5];	

		$resultord=mysqli_query($con, "SELECT * FROM ordenes WHERE fechaarriv BETWEEN '$fechainictrl' AND '$fechafinctrl' ");
		while ($verord = mysqli_fetch_row($resultord)) {
			$srv=substr($verord[5],0,3);								
			$cliente=$verord[4];
			$fecha=$verord[7];
			
			if ($cliente==$clientectrl && $srvctrl==$srv){
				$cuenta++;
			}	
		}
		$restan=$cantctrl-$cuenta;
		$porcentaje = $cantctrl > 0 ? round(($cuenta/$cantctrl)*100) : 0;
		$editar = ($restan==0) ? "none" : "block";
		echo "<tr>
				<td>{$vercli[0]}</td>
				<td>{$vercli[1]}</td>
				<td>{$vercli[2]}</td>
				<td>{$vercli[3]}</td>
				<td>{$vercli[4]}</td>
				<td>{$vercli[5]}</td>
				<td>{$cuenta}</td>
				<td>{$restan}</td>
				<td>
				  <div class='progress-cwo'>
					<div class='progress-bar-cwo' style='width: {$porcentaje}%;'>
					  {$porcentaje}%
					</div>
				  </div>
				</td>
				<td>
					<button class='btn btn-success btn-sm editar-btn' data-id='{$vercli[0]}' data-toggle='modal' data-target='#exampleModal' style='display:".$editar."'>Editar</button>
				</td>
				<td>
					<button class='btn btn-danger btn-sm borrar-btn' data-id='{$vercli[0]}' style='display:".$editar."'>Borrar</button>
				</td>
			</tr>";
		$cuenta=0;
	}
	echo "</tbody></table>";
?>
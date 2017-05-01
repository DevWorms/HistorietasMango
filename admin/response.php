<style type="text/css">
	.aprove{
		font-size: 110%;
		font-weight: bold;
		color: green;
		text-align: center;
	}

	.fail{
		font-size: 110%;
		font-weight: bold;
		color:red;
		text-align: center;
	}

	.iconoResponse{
		font-size: 115%;
		font-weight: bold;
	}

</style>
<?php 
	if (session_status() == PHP_SESSION_NONE) {
    	session_start();
    	echo "INICIAR SECION";
	}
	$op = 0;
	if(isset($_SESSION['messageStatus'],$_SESSION['op'])){
		$mensaje = $_SESSION['messageStatus'];
		$op = $_SESSION['op'];
 ?>
 	<div id="modal-success" title="Operación" style="overflow-x:hidden;display: none" class='<?php if($op == 1){echo "aprove";}else if($op==0){echo "fail";}?>'>
 		<br>
 		<?php echo $mensaje;?>
 		<?php
 			// esto pone un icono de palomita o tache segun el valor de op
 			if($op==1){
 				echo "<br><i class='glyphicon glyphicon-ok iconoResponse'></i>";
 			}
 			else if($op == 0){
 				echo "<br><i class='glyphicon glyphicon-remove iconoResponse'></i>";
 			}
		//reseteamos la variables de session y las unseteamos
		$_SESSION["messageStatus"] = "";
		$_SESSION['op']= "";
		unset($_SESSION['op']);
		unset($_SESSION["messageStatus"]);
 		?>
 	</div>
 <?php }?>

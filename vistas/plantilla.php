<!DOCTYPE html>
<html lang="es">
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo SERVERURL ;?>vistas/css/main.css">
	<?php include "vistas/modulos/script.php"; ?>
</head>
<body>
  <?php		
		$peticionAjax=false;

    require_once "./controladores/vistasControlador.php";

    $vt = new vistasControlador();
    $vistasR=$vt->obtener_vistas_controlador();

		if($vistasR=="login" || $vistasR=="404"):
			if($vistasR=="login"){
				require_once "./vistas/contenidos/login-view.php";
			}else{
				require_once "./vistas/contenidos/404-view.php";
			}
      
    else:
			session_start(['name'=>'NIPSASESSION']);
			require_once "./controladores/loginControlador.php";

			#validar si esta iniciada la session
			$lc=new loginControlador();
			if(!isset($_SESSION['token_nipsasession'])|| !isset($_SESSION['usuario_nipsasession']) ){
				$lc->forzar_cierre_sesion_controlador();
			}
 
  ?>
	<!-- SideBar -->
	<?php include "vistas/modulos/navlateral.php";
	?>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<?php include "vistas/modulos/navbar.php"; ?>
		
    <!-- Content page -->
    <?php require_once $vistasR; ?>
		
		
  </section>
		<?php
			include "./vistas/modulos/logoutScript.php";
		endif; 
		?>

	<!--====== Scripts -->
	<script>
		$.material.init();
	</script>
	
</body>
</html>
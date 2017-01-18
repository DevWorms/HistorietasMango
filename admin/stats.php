  <?php 
    require_once 'class/Funciones.php';
 ?>

  <br><br>
  
  <div class="col-md-4" id="page_recarga" style="text-align:center;">                        
      <div class="panel panel-default" style="background-color:#8ed4ff;">
          <div class="panel-body">
              <h2>Número de usuarios registrados</h2>  
               <h2> <strong> <?php echo ObtenerNumeroUsuarios(); ?> </strong></h2>
          </div>
      </div>
  </div>

  <div class="col-md-4" id="page_recarga" style="text-align:center;">                        
      <div class="panel panel-default" style="background-color:#8ed4ff;">
          <div class="panel-body">
              <h2>Número de revistas</h2>  
               <h2> <strong> <?php echo ObtenerNumeroRevistas(); ?> </strong></h2>
          </div>
      </div>
  </div>

  <div class="col-md-4" id="page_recarga" style="text-align:center;">                        
      <div class="panel panel-default" style="background-color:#8ed4ff;">
          <div class="panel-body">
              <h2>Número de suscriptores al boletín</h2>  
               <h2> <strong> <?php echo ObtenerNumeroBoletin(); ?> </strong></h2>
          </div>
      </div>
  </div>

  <div class="col-md-4" id="page_recarga" style="text-align:center;">                        
      <div class="panel panel-default" style="background-color:#8ed4ff;">
          <div class="panel-body">
              <h2>Edad Promedio</h2>  
               <h2> <strong> <?php echo ObtenerEdad(); ?> </strong></h2>
          </div>
      </div>
  </div>

  <div class="col-md-4" id="page_recarga" style="text-align:center;">                        
      <div class="panel panel-default" style="background-color:#8ed4ff;">
          <div class="panel-body">
              <h2>Mujeres</h2>  
               <h2> <strong> <?php echo ObtenerNumeroMujeres(); ?> </strong></h2>
          </div>
      </div>
  </div>

  <div class="col-md-4" id="page_recarga" style="text-align:center;">                        
      <div class="panel panel-default" style="background-color:#8ed4ff;">
          <div class="panel-body">
              <h2>Hombres</h2>  
               <h2> <strong> <?php echo ObtenerNumeroHombres(); ?> </strong></h2>
          </div>
      </div>
  </div>
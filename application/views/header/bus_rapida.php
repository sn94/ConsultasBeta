 
<body style="padding: 50px 0px 0px 0px;">
 

<?php  include('application/views/header/menu_collapse.php'); ?>



<div class="row no-gutters" style="background-color: #ECEEEF;">
     
  <div id="titular" class="col-12 col-md-5 mb-0 pb-0">
  
 <div class="jumbotron text-center mb-0">
<div class="container">
<h1>Departamento de Inform&aacute;tica</h1>

  <p class="lead">Policia Nacional</p>
  <hr class="my-4"> 
  <a href="<?= base_url();  ?>"> <img id="logo-page" src="<?= base_url() ?>img/logo200.png" class="mx-auto d-block"/>  </a>
 
  <p style="width:100%;text-align: center;" >
  <?= $this->Utilidades_model->ver_fecha() ?></p>
</div>
</div> 
  </div> 
  
                  
        <div id="panel-buscar"  class="col-12 offset-md-1 col-md-5 mx-auto py-5 my-0"   > 
        <div  class="card p-0 m-0">
          
        <div class="card-header bg-success text-white"> <h5>Buscar</h5></div>
        <div class="card-block">
        <form class="form-inline" id="form-bus-fast" onsubmit=" event.preventDefault();">
   
  <label class="sr-only" for="txt-bus-fast">Username</label>
  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon">CI&deg;</div>
    <input type="text" class="form-control"   id="txt-bus-fast" autofocus="" 
    onkeypress="if(event.keyCode == 13) busquedaRapida(); " />
  </div>
 

  <button type="button" class="btn btn-primary" onclick="busquedaRapida()">Enviar</button>
</form>
        </div>
        </div><!-- END CARD -->
        </div>
    
</div>
    
            
     
             
            
     

 

 

 


 

 
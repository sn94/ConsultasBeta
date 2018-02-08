 
<div class="container">
<nav class="navbar navbar-inverse navbar-toggleable-sm bg-success text-white fixed-top">


<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
 data-target="#Navbar"> <span class="navbar-toggler-icon"></span></button>
 
 <a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url(); ?>img/logo100.png" width="30" height="30" 
  class="d-inline-block align-top" alt="" />M&oacute;dulo consultas</a>
 

  
 <div id="Navbar" class="collapse navbar-collapse bg-success">
 
  
 <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
 <li class="nav-item active"> <a class="nav-link" href="<?= base_url();  ?>"><span class="fa fa-home"></span> Inicio</a></li>
 <li class="nav-item">  <a class="nav-link" href="#news"><span class="fa fa-user"></span> Usuario: <?=  $this->nativesession->get("usr") ?> </a></li>
 <li class="nav-item">
  <a  class="nav-link"  href="http://172.16.0.98/swp/index.php">
    <span class="fa fa-sign-out"></span> Salir (Log out)
  </a>
</li>
 <li class="nav-item dropdown">
 <a class="nav-link dropdown-toggle" id="switchBus" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tipo de b&uacute;squeda</a>
 <div class="dropdown-menu bg-success" aria-labelledby="switchBus">
 <a class="dropdown-item" href="<?= base_url("index.php/Welcome/fastSearch") ?>"><span class="fa fa-forward"></span> B&uacute;squeda r&aacute;pida</a>
 <a class="dropdown-item" href="<?= base_url("index.php/Welcome/customSearch") ?>"><span class="fa fa-wrench"></span> Personalizada</a>
 </div>
 </li>
 
  </ul>
  
  
    
    
 </div><!--  navbar collpse -->
 
 
</nav>
</div>

<!--
<div class="topnav" id="myTopnav">
   </div> -->
<!--
<div style="padding-left:16px">
  <h2>Departamento de Inform&aacute;tica</h2>
  <p>Policia Nacional</p>
</div>  -->

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}


</script>
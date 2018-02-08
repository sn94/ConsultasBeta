 
<form   id="formulario-bus" class="m-0" style="font-size: 12px; font-weight: bolder;">
<div class="container">
<div class="form-group row">
<div class="col-12">
<select id="modos-bus" class="form-control" onchange="modalidadDeBusqueda()">
<option value="1">C&eacute;dula de Identidad</option>
<option value="2" selected="selected">Nombres y apellidos</option>
<option value="3">Port. de veh&iacute;culo</option></select><br /></div>
</div><!-- end form group -->
<div class="form-group row">
<div class="col-12">
<div class="input-group">
 <input type="text" autofocus name="txtbusqueda" class="form-control text-icon-search"  style="padding-left: 32px;"  onkeypress="if(event.keyCode == 13) PrimeraConsulta('<?= base_url('index.php/consulta') ?>');" required >
<button class="btn btn-danger" type="button" onclick="PrimeraConsulta('<?= base_url('index.php/consulta') ?>');">Buscar</button>
</div> 
</div>
</div><!-- end form group --> 

</div>


<!--
<form class="form-horizontal"  id="formulario-bus"
style="width: 100%; padding: 10px;background-image:  url(img/fondo2.jpg);
border: 1px solid #07080B;  color: floralwhite;font-weight: lighter; 
box-shadow: inset 3px 3px 3px rgba(255,255,255,.7), inset -2px -2px 3px rgba(0,0,0,.1), 2px 2px 10px rgba(0,0,0,.1);
 

" action="http://172.16.0.98/ConsultasBeta/consulta" method="get">

 
<div class="row">
<div class="col">
<select id="modos-bus" class="form-control" onchange="modalidadDeBusqueda()">
<option value="1">C&eacute;dula de Identidad</option>
<option value="2" selected="selected">Nombres y apellidos</option>
<option value="3">Port. de veh&iacute;culo</option></select><br /></div>
 

<div class="col-lg-12">
 <div class="input-group input-group-lg">
 <input type="text" name="txtbusqueda" class="form-control text-icon-search"  style="padding-left: 32px;"  onkeypress="if(event.keyCode == 13) PrimeraConsulta('<?= base_url('index.php/consulta') ?>');" required >

      <span class="input-group-btn input-group-lg"><button class="btn btn-danger" type="button" onclick="PrimeraConsulta('<?= base_url('index.php/consulta') ?>');">Buscar</button></span>
    </div>
 </div>
  
     
 </div>-->
 <br />
  


<div class="container" id="opc-bus-nom"> 


 <div class="form-group row">
<label class="col-form-label col-12 col-md-3">Nacionalidad: </label>
<div class="col-12 col-md-9">
<input type="text" id="busqueda-nacion" class="form-control auto-com-nacio" style="color: #07080B;" placeholder="PARAGUAYA"/>
</div>
 </div><!-- end form group -->




<div class="form-group row">

 <div class="col-12 col-md-5"><input class="form-control" type="text" name="valor-edad1" value="" placeholder="Edad desde" ></div>
<div class="col-12 col-md-5"><input class="form-control" type="text" name="valor-edad2" value="" placeholder="Edad hasta" ></div>

</div><!-- en form group -->

 
<div class="form-group row" >
<div class="col-12 col-md-3">
<div class="form-check">
<label class="form-check-label">
 <input type="radio" name="sex" value="F"  class="form-check-input" checked > Femenino
</label>
</div><!-- end form check -->
</div>
<div class="col-12 col-md-3">
<div class="form-check">
<label class="form-check-label">
 <input type="radio" name="sex" value="M"  class="form-check-input "checked > Masculino
</label>
</div><!-- end form check -->
</div>

<div class="col-12  col-md-6">
<div class="form-check">
<label class="form-check-label">
<input type="checkbox" class="form-check-input" value="si" name="check-policia"> Es personal policial? </label>
</div><!-- end form check -->
</div>


</div><!-- end form group -->

 

</div><!-- end busqueda por  nombre -->






 <div id="opc-bus-veh"  class="container" style="width: 100%;"  >
  <b class="subt-in">Vehiculo: </b>
  
  <select class="form-control" name="opc-vehiculos">
   <option value="1">Nro. Chapa</option>
   <option value="2">Nro. Chasis</option>
    <option value="3">Nro. Motor</option>
     <option value="4">Chapa prov.</option>
      <option value="5">Chapa s/C&eacute;dula</option>
  </select><br />
     <input type="text" name="txt-bus-vehi" class="form-control" placeholder="Vehiculo"/>
 </div> 

 
<!--      fin PARAMETROS    -->



  </form>
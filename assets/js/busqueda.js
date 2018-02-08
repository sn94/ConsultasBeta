
 
function peticion( textUrl, htmlBeforeSend, htmlValBeforeSend, datosObj, htmlSuccess, htmlError ){
 $.ajax( {
url: textUrl, 
beforeSend: function () { $( htmlBeforeSend).html( htmlValBeforeSend ); }, 
data: datosObj ,
success: function (data) {  $( htmlSuccess).html(data);  },
error: function (jqXHR, textStatus, errorThrown){
    $( htmlError ).html("<div class='alert alert-warning alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Codigo: "+jqXHR.status+"</strong><br/><strong> Descr. Estado: "+textStatus+"</strong><br/><strong> Error: "+errorThrown+"</strong></div>");  
     },
timeout: 10000
 
});   
}






function peticion_post( textUrl, datosObj, htmlSuccess, divname ){
 $.ajax( {
url: textUrl,   
data: datosObj ,
method: "post",
success: function (data) { 
    if(data){
       $( divname ).html(data) ; 
    }
      },
    
error: function (jqXHR, textStatus, errorThrown){
    $( divname ).html("<div class='alert alert-warning alert-dismissable'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Codigo: "+jqXHR.status+"</strong><br/><strong> Descr. Estado: "+textStatus+"</strong><br/><strong> Error: "+errorThrown+"</strong></div>");
   },
timeout: 10000
 
});   
}



function consulta_especi(baseruta, idpanel, nropanel) { 

var nro= parseInt(nropanel);

var urlsrc="";
switch(nro) {
case 1:
 urlsrc='vistas/paneles/v_personal_html.php';break;
case 2: 
urlsrc='judiciales/'+idpanel;break;
case 3:
urlsrc='penitenciarios/'+idpanel;break;
case 4:
urlsrc='residencia/'+idpanel;break;
case 5:
urlsrc='comisarias/'+idpanel;break;
case 6:
urlsrc='vehiculos/'+idpanel;break;
case 7:
urlsrc='armas/'+idpanel;break;
}

urlsrc= baseruta+'/'+urlsrc;
peticion( urlsrc, "div#panel-"+ idpanel+"-"+nropanel,
"<p><img style='width: 40px; height: 40px;' src='img/wait.gif'></p>", {'valor': idpanel}, 
"div#panel-"+ idpanel+"-"+nropanel,"div#panel-"+ idpanel+"-"+nropanel );

}


function consultar( ruta ){ 

var punto_page= $('input:hidden[id=punto-page]').val();
/** Parametros principales   **/
var seleccion= $('select#modos-bus').val(); /** buscar por ci o nombre **/
var valor= $('input:text[name=txtbusqueda]').val();


/**  busqueda avanzada junto con nombre **/
/**     intervalo de edad **/
var edad_desde= $('input:text[name=valor-edad1]').val();
var edad_hasta= $('input:text[name=valor-edad2]').val();


/**   sEXO   **/
var sexo_r= $('input:radio[name=sex]:checked').val();

/**   Es Policia  **/
var es_policia= $('input:checkbox[name=check-policia]:checked').val();


/** Nacionalidad  **/
var nacionalidad= $('input:text[id=busqueda-nacion]').val(); 

/** Vehiculos **/

var vehiculo= $('select[name=opc-vehiculos]').val();
var txt_vehi= $('input:text[name=txt-bus-vehi]').val();

/** Armas  **/


/**     Conjuncion de params **/
var DatoS= {
    "punto_pagina": punto_page,
    "tipo_bus": seleccion,
    "valor": valor ,
     "edad_desde": edad_desde ,"edad_hasta":edad_hasta, 
     'sexo': sexo_r,
      'es_oficial':  es_policia,
      'nacionalidad': nacionalidad,
      'vehiculos' : vehiculo, 'txtvehi': txt_vehi};


peticion(  ruta,
 "div#panel-resultados",  
 "<p><img style='width: 40px; height: 40px;' src='../../img/wait.gif'></p>", DatoS, 
 "div#panel-resultados", "div#panel-resultados" );


}/** Fin metodo consultar **/



function PrimeraConsulta( ruta ){
 $('input:hidden[id=punto-page]').val("0") ;
consultar( ruta); 
}

function paginaAnterior( ruta ){
var actual= parseInt( $('input:hidden[id=punto-page]').val()  );
var atras= parseInt( actual)-5;
if( atras < 0) atras= 0;

$('input:hidden[id=punto-page]').val( atras );
consultar( ruta );
}


function paginaSiguiente( ruta ){
var actual= $('input:hidden[id=punto-page]').val() ;
var sig= parseInt( actual) + 5;
$('input:hidden[id=punto-page]').val( sig );
consultar( ruta );
}





function autocompletado_nacio( availableTags){
  /*  var arr = [];
    var Objarray= Object.keys( availableTags ).map( function(key){
        console.log( availableTags[key]);// Fila es Objeto
        // Procesar la fila objeto
        
        arr.push( availableTags[key].descrip );
        //Iterando campos de la fila 
/*for(var x in availableTags[key]){
  arr.push(availableTags[key][x]); console.log(" FILA " + availableTags[key][x]);
  }*/
  /*** *****/
      /*  return [ key, availableTags[key] ];
        
    });
    */
/*var arr = [];
for(var x in availableTags){
  arr.push(availableTags[x]);
}*/
var arr=["uno","dos","tres"];
     $( "#busqueda-nacion" ).autocomplete({
      source: availableTags
    });
}


function peticion_nacionalidad( textUrl ){
  
//autocompletado_nacio(  arreglo );
}



function  buscar_nacionali( ur){
         //obtenemos el texto introducido en el campo de búsqueda
 var existe= $(".auto-com-nacio").length;
 if( existe >  0 ){
  /************************/
  url_nacio= ur;
 var arreglo= [];  
$.getJSON( url_nacio,  function( items ){
var obj= items; var t=0;

var objson=  Object.keys( obj ).map( function(key){
   arreglo.push( obj[key].descrip ); 
   console.log(  obj[key].descrip );
     return [ key, obj[key] ];
});

} );  /** End json **/

 $( ".auto-com-nacio" ).autocomplete({ source: arreglo });   
 }/**************/
  }
        

function grabarFallecimiento( nroced){
/*var tx_ci= $("input:text[name=txt-ci-fall]").val();
var tx_lugar=$("input:text[name=txt-lug-fall]").val();
var tx_causa= $("input:text[name=txt-causa-fall]").val();
var tx_juris= $("input:text[name=txt-juris-fall]").val();
var tx_horaf= $("input:text[name=txt-hora-fall]").val();
var tx_fechaf= $("input:text[name=txt-fecha-fall]").val();
var tx_obs= $("input:text[name=txt-obs-fall]").val();
var tx_med_f= $("input:text[name=txt-med-fore]").val();
var tx_interv= $("input:text[name=txt-inter-fall]").val();
var tx_circuns= $("input:text[name=txt-circ-fall]").val();
var tx_usu= $("input:text[name=txt-usu-fall]").val();
var tx_fechag= $("input:text[name=txt-fechag-fall]").val();
var tx_depen= $("input:text[name=txt-depen-fall]").val();

var DatoS= {"ci": tx_ci,  "lugar": tx_lugar, "causa": tx_causa , "jurisdiccion": tx_juris,
"horaf": tx_horaf, "fechaf": tx_fechaf, "obs" : tx_obs, "medicof": tx_med_f,
"intervinientes": tx_interv, "circunstancia": tx_circuns, "usu": tx_usu, "fechag": tx_fechag,
"dependencia": tx_depen};*/

var serializado= $('form#death-form-'+nroced).serialize(); 
peticion_post( 'http://172.16.0.98/ConsultasBeta/index.php/abm/fallecimiento/'+nroced, serializado , "Registrado. ", "#res-form-fall-"+nroced);
      
}



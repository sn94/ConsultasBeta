<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
     
     public function __construct(){
        
       parent::__construct();  
       $this->load->helper("url");
       $this->load->model("Referenciales_model");
       $this->load->model("Utilidades_model");
       $this->load->model("Consulta_model");
       $this->load->model("Vehiculo_model");
       
        $this->load->model("Persona_model");
        $this->load->model("RegistroJudicial_model");
        $this->load->model("RegistroPenitenc_model");
        

     }
     

	public function index()
	{
	   $this->load->helper( array('form', 'url'));
       $this->load->library("form_validation");
	   $cis= $this->Consulta_model->obtenerPagina();
    $this->load->view("jstab1");
          
       foreach( $cis as $it){
        $nrodoc= $it['nrodoc']; 
 /**     Vistas      **********/
         $dat_basicos= $this->Persona_model->obtDatosBasicos($nrodoc);
 $datos['fallecido']= $dat_fall; 
 $datos['lugar_fall']= $dat_lugfall;
 $datos['causa_fall']= $dat_caufall;
 $datos['circu_fall']= $dat_circuns;
 $datos['personal']=$dat_basicos;
 $datos['judi']= $dat_judi;  
 $datos['nroci']= $nrodoc;
  $this->load->view("pestanas", $datos  );
   }/** End for each **/
   if( sizeof($cis) > 0)
  $this->load->view("tab1footer");
        }
        
        
       

public function CerrarSesion(){
  $this->load->library("Nativesession");
  $this->Nativesession->delete("usr");
  $this->Nativesession->delete("depend");

} 



/** RELATIVOS A LA PERSONA **/
public function Basicos($nrodoc){

 
 $dat_fall= $this->Persona_model->fallecido( $nrodoc );/** B O O L E A N **/
 $dat_lugfall= $this->Referenciales_model->lugarFallecimiento();
 $dat_caufall= $this->Referenciales_model->causaFallecimiento();
 $dat_circuns= $this->Referenciales_model->circunstanciaFallecimiento();
  
$dat_basicos= $this->Persona_model->obtDatosBasicos($nrodoc);
 $datos['fallecido']= $dat_fall; 
 $datos['lugar_fall']= $dat_lugfall;
 $datos['causa_fall']= $dat_caufall;
 $datos['circu_fall']= $dat_circuns;
 $datos['personal']=$dat_basicos;
 $datos['judi']= $dat_judi; 
 $this->load->view("jquery_subtabs", array("nroci"=> $nrodoc, 'datos'=>$datos)  );
}
        
        
public function familiares($nrodoc){
    
 $dat_familia= $this->Persona_model->datosFamiliares($nrodoc ); 
 if(sizeof($dat_familia) > 0){
   $this->load->view("paneles/personal/vista_familia", array('nroci'=>$nrodoc, 'familia' => $dat_familia)  ); 
 }else{
    $err['datos']= array("TITULO" => "No se encuentra datos", 
    "MENSAJE" => "No se registran datos en esta seccion" );
    $this->load->view("errors/errores", $err);  
 }
  }


/** RELACIONES DE PARENTESCO QUE TIENE UNA PERSONA DE CI nrodoc  **/
public function parentescos($nrodoc){
$RES['parentesco']= $this->Persona_model->datosParentesco( $nrodoc );
if( sizeof($RES['parentesco']) > 0){
$this->load->view("paneles/personal/vista_parentesco", $RES);
}else{
$err['datos']= array("TITULO" => "Sin datos", 
    "MENSAJE" => "No se registran datos en esta seccion" );
    $this->load->view("errors/errores", $err);
}

}




/*** INFORMACION DE LA PERSONA COMO PERSONAL POLICIAL **/
public function policias($nrodoc){

 $dat_policia= $this->Persona_model->obt_datos_policia( $nrodoc );
 if( sizeof( $dat_policia) > 0 ){
    $this->load->view("paneles/personal/vista_policia", array('poli'=>$dat_policia));
 }else{
      $err['datos']= array("TITULO" => "No se encuentra datos", 
    "MENSAJE" => "No se registran datos en esta seccion" );
    $this->load->view("errors/errores", $err);
 }
}



/*** registros DE ENTRADAS Y SALIDAS DEL PAIS **/
public function entsal($nrodoc){
 $ent_sal['ent_sal']=$this->Persona_model->obtDatosEntSalPais(   $nrodoc  );
 $ent_sal['estado_mov']= $this->Persona_model->personaEnElPais(   $nrodoc  );
 $ent_sal['nrodoc']= $nrodoc;
 
 if( $ent_sal['estado_mov'] == "")
 $ent_sal= array();
 
  $this->load->view("paneles/personal/vista_ent_sal", $ent_sal );
}






public function fichaje($nrodoc){
 $datos= $this->Persona_model->datos_fichaje( $nrodoc );
 if( sizeof($datos) > 0){
    $args['fichaje_d']= $datos;
  $this->load->view("paneles/personal/vista_fichaje", $args );
  
 } else{
     $err['datos']= array("TITULO" => "No se encuentra datos", 
    "MENSAJE" => "No se registran datos en esta seccion" );
    $this->load->view("errors/errores", $err);
 }

    
}



    public function judiciales( $nrodoc ){
 
$datos['Cap']= $this->RegistroJudicial_model->obtener_datos_captura( $nrodoc);
$datos['Det']= $this->RegistroJudicial_model->detalles_captura( $nrodoc );
 

if( sizeof($datos['Cap'])>0  &&  sizeof($datos['Det'])>0  ){
   $this->load->view("paneles/v_judicial_html", $datos );
}
else{
     $err['datos']= array("TITULO" => "No se encuentra datos", 
    "MENSAJE" => "No se registran datos en esta seccion" );
    $this->load->view("errors/errores", $err);
}
  }
  
  
  public function penitenciarios( $nrodoc ){
$datos['peni']= $this->RegistroPenitenc_model->obtDatosPenitenciarios( $nrodoc );
if( sizeof($datos['peni']) > 0){
   $this->load->view("paneles/v_penitenc_html", $datos );    
}else{
    $err['datos']= array("TITULO" => "No se encuentra datos", 
    "MENSAJE" => "No se registran datos en esta seccion" );
    $this->load->view("errors/errores", $err);
}
  }
            
        
  public function residencia( $nrodoc){
  $AR= $this->Persona_model->movi_domicilio( $nrodoc);
  if( sizeof( $AR) > 0 ){
     $datos['domi']= $AR; $this->load->view('paneles/v_vidaresi_html', $datos);
  }else{
      $err['datos']= array("TITULO" => "No se encuentra datos", 
    "MENSAJE" => "No se registran datos en esta seccion" );
    $this->load->view("errors/errores", $err);
  }
  
   }
        
    
   public function comisarias( $nrodoc){
  $ar= $this->Persona_model->registroPolicialPorEntradas($nrodoc); 
   if( sizeof( $ar) > 0){
     $datos['deten']= $ar; $this->load->view('paneles/v_comisari_html', $datos);
   }
   else{
     $err['datos']= array("TITULO" => "No se encuentra datos", 
    "MENSAJE" => "No se registran datos en esta seccion" );
    $this->load->view("errors/errores", $err);
   }
  }
   

/** DATOS DE FALLECIMIENTO ***/

  public function fallecido($ci){
  $res['fall']= $this->Persona_model->datosFallecimiento($ci);
  $this->load->view("paneles/personal/vista_fallecido",  $res );
} 
    



  public function vehiculos( $nrodoc){
   $vehiculo_titu= $this->Vehiculo_model->obtener_vehi_titular( $nrodoc );
   
   /** Recorrer los ids de vehiculos **/
   foreach( $vehiculo_titu as $v_id){
   $param['v_id']= $v_id['id_vehic'];
   
    $datos['vehiculo_dato']= $this->Vehiculo_model->datos_vehiculo( $param );
      
    $datos['vehiculo_denu']= $this->Vehiculo_model->datos_denuncia( $param);
      
    $datos['vehiculo_titu']= $this->Vehiculo_model->obtener_datos_titular( $param );
    
    $this->load->view("paneles/vehiculo/lista_prin", $datos);
   $this->load->view("paneles/vehiculo/lista_denu", $datos);
       $this->load->view("paneles/vehiculo/lista_titu", $datos);     
   }/** fin recorrido de ids de vehiculos **/
   if( sizeof($vehiculo_titu) <= 0)
   $this->load->view("templates/success", array('titulo'=>'Sin resultados','mensaje'=>"No se ha encontrado registros de vehiculos para esta persona")  );
  }
  
  
  
  
  
    public function armas( $nrodoc){
   $datos['armas']= $this->Persona_model->obt_portacion_de_armas( $nrodoc );
   $this->load->view('paneles/v_posearma_html', $datos);
   if( sizeof($datos['armas']) <= 0 )
  $this->load->view("templates/success", array('titulo'=>'Sin resultados','mensaje'=>"No se ha encontrado registros de armas para esta persona")  );
  
  }
    
    
    
    public function nacionalidades($cad=""){
        $res=  $this->Referenciales_model->nacionali_json(  $cad );
         echo $res;
    }
    
    
    
    
    
    
    
    
    
    
    
    /** PARA  BUSQUEDA RAPIDA      *****/
  public function fastSearch($ci){
     
     /** Obtener datos personales **/
  $datos['basico']= $this->Persona_model->obtDatosBasicos($ci);
  $datos['captura']=  $this->Persona_model->tiene_captura( $ci);
  $this->load->view("fastSearch", $datos  ); 
     }  
    
    
    
    
    
    
    
            
}

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
        
        $dat_basicos= $this->Persona_model->obtDatosBasicos($nrodoc);
        $dat_familia= $this->Persona_model->datosFamiliares($nrodoc );
        $dat_policia= $this->Persona_model->obt_datos_policia( $nrodoc );
        
        
        $dat_p=  $this->Persona_model->obtDatosPersonales( $nrodoc );
       $dat_domi= $this->Persona_model->movi_domicilio( $nrodoc);
       $dat_poli= $this->Persona_model->obt_datos_policia( $nrodoc );
        $dat_judi= $this->Persona_model->campoJudicial( $nrodoc);
        $dat_fall= $this->Persona_model->fallecido( $nrodoc );/** B O O L E A N **/
        $dat_captur= $this->Persona_model->tiene_captura( $nrodoc);
        $dat_lugfall= $this->Referenciales_model->lugarFallecimiento();
        $dat_caufall= $this->Referenciales_model->causaFallecimiento();
        $dat_circuns= $this->Referenciales_model->circunstanciaFallecimiento();
       $datos['personal']= $dat_p;
        $datos['domi']= $dat_domi;
        $datos['poli']= $dat_poli;
        $datos['judi']= $dat_judi;
      $datos['fallecido']= $dat_fall;
        $datos['captu']=  $dat_captur;
        $datos['lugar_fall']= $dat_lugfall;
        $datos['causa_fall']= $dat_caufall;
        $datos['circu_fall']= $dat_circuns;
         
       $this->load->view("tab_p1", $datos); /** Estructura inicial de pestanias **/
        $this->load->view("paneles/personal/vista_basica", $datos);
        $this->load->view("paneles/personal/vista_familia", $datos);
        $this->load->view("paneles/personal/vista_ent_sal", $datos);
        $this->load->view("paneles/personal/vista_policia", $datos);
        $this->load->view("tab_p2", $datos);/** Estructura final de pestanias **/
       
       }/** End for each **/
       $this->load->view("tab1footer");
        }
        
        
        
    public function judiciales( $nrodoc ){
 
$datos['Cap']= $this->RegistroJudicial_model->obtener_datos_captura( $nrodoc);
$datos['Det']= $this->RegistroJudicial_model->detalles_captura( $nrodoc );
 //sizeof( $Cap);
$this->load->view("paneles/v_judicial_html", $datos );
  }
  
  
  public function penitenciarios( $nrodoc ){
$datos['peni']= $this->RegistroPenitenc_model->obtDatosPenitenciarios( $nrodoc );
$this->load->view("paneles/v_penitenc_html", $datos );
  }
            
        
  public function residencia( $nrodoc){
   $datos['domi']= $this->Persona_model->movi_domicilio( $nrodoc);
   $this->load->view('paneles/v_vidaresi_html', $datos);
  }
        
    
   public function comisarias( $nrodoc){
   $datos['fichaje_d']= $this->Persona_model->datos_fichaje($nrodoc);
   $this->load->view('paneles/v_comisari_html', $datos);
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
    
    
    
            
}

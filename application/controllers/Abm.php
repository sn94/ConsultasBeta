<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Abm extends CI_Controller {

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
        $this->load->model("Persona_model"); 
        $this->load->model("Referenciales_model");

     }
     
     
     
	public function index(){
	   
   }
        
  
  public function fallecimiento( $nrodocu){
    
       $this->load->helper( array('form', 'url'));
$this->load->library("form_validation");
/** Reglas validacion **/
 $this->form_validation->set_rules('fechaf', 'Fecha de fallec.', 'required', array('required'=>'Indique la fecha de fallec.'));
 $this->form_validation->set_rules('txt-hora-fall', 'Hora de fallec.', 'required', array('required'=>'Indique la hora de fallec.'));
 

if( $this->form_validation->run() == FALSE){
    $lug_fall= $this->Referenciales_model->lugarFallecimiento();
     $dat_caufall= $this->Referenciales_model->causaFallecimiento();
     $dat_circuns= $this->Referenciales_model->circunstanciaFallecimiento();
    $datos['lugar_fall']= $lug_fall;
    $datos['nroci']= $nrodocu;
    $datos['causa_fall']= $dat_caufall;
    $datos['circu_fall']= $dat_circuns;
  $this->load->view("forms/reg_falleci" , $datos  );   

}else{
    if($this->Persona_model->registrarFallecimiento())
    $this->load->view("templates/success", array('titulo'=>'Registro exitoso', 'mensaje'=>'Se han registrado los datos de fallecimiento') );
}/** validation ok **/
 
  }       
  
  
  
  
  
  
  public function ent_sal_Pais( $nrodocu){
    
$this->load->helper( array('form', 'url'));
$this->load->library("form_validation");
/** Reglas validacion **/
 $this->form_validation->set_rules('txt-destino', 'Destino', 'required', array('required'=>'Indique el lugar de destino'));
 $this->form_validation->set_rules('txt-fecha-ent-sal', 'Fecha', 'required',  array('required'=>'Detalle la fecha')  );
$this->form_validation->set_rules('txt-medio-tras', 'Medio de traslado', 'required', array('required'=>'Detalle el medio de traslado'));


if( $this->form_validation->run() == FALSE){  
 $this->load->view("forms/reg_ent_sal", array('nroci' => $nrodocu)  );   
}else{
    
/** LLamar al modelo **/
if($this->Persona_model->regEntSalPais())
$this->load->view("templates/success", 
array('titulo'=>'Registro exitoso', 
'mensaje'=>'Se han registrado los datos de entrada/salida') );
else
$this->load->view("errors/errores", 
array('TITULO'=>'Registro fallido', 
'MENSAJE'=>'Hubo un error al tratar de grabar datos de<br/>entrada y salida del pais') );

}/** validation ok **/
 
  }       
  
  
  
  
            
}

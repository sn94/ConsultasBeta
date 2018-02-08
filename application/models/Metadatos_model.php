<?php
	
class Metadatos_model extends CI_Model{
    
  private $DB1;
  private $DB2; 
  
  
    public function __construct(){
        
        parent::__construct();
        $this->DB1= $this->load->database('default', TRUE);
        $this->DB2= $this->load->database('sistema', TRUE);
         
    }
    
     public function campos_tabla($nomtabla){
       $xx= $this->DB1->query( "select * from $nomtabla limit 1 offset 0" );
        
       $datos= $xx->list_fields();
        return $datos;
     }


 public function show_campos_tabla($nomtabla){
       $xx= $this->DB1->query( "select * from $nomtabla limit 1 offset 0" );
       $datos= $xx->list_fields();
        foreach($datos as $it){
         echo "$it <br/>";   
        }
     }
}
<?php
	
class Persona_model extends CI_Model{
    
    
private $DB1;
private $DB2;
private $DB3;

   
public function __construct(){
parent::__construct(); 
$this->DB1 = $this->load->database('default', TRUE);
$this->DB2 = $this->load->database('armas', TRUE);  
$this->DB3 = $this->load->database('sistema', TRUE);  
$this->load->model("Utilidades_model");
$this->load->model("Metadatos_model");
}
    

public function obtDatosPersonales($nrodocu){
    
$sql= "select a.tipodoc,a.nrodoc,a.nropro,a.nombre,a.apellido,a.fechanac,b.descrip as nac_desc,
  c.descrip as nacio_orig,a.lugnac, 
  
   (case when a.sexo='M' then 'MASCULINO' 
  else 'FEMENINO' end ) as sexo,
  
  (case when a.sexo='M' then (
  case when a.estado_civil='SO' then 'SOLTERO' 
   when a.estado_civil='CA' then 'CASADO' 
   when a.estado_civil='SE' then 'SEPARADO' 
   when a.estado_civil='DI' then 'DIVORCIADO' 
   when a.estado_civil='VI' then 'VIUDO' 
   when a.estado_civil='ME' then 'MENOR'  end ) 
  else  (
  case when a.estado_civil='SO' then 'SOLTERA' 
   when a.estado_civil='CA' then 'CASADA' 
   when a.estado_civil='SE' then 'SEPARADA' 
   when a.estado_civil='DI' then 'DIVORCIADA' 
   when a.estado_civil='VI' then 'VIUDA' 
   when a.estado_civil='ME' then 'MENOR'  end )     end ) as estado_civil,
  
  d.descripcion as profesion,a.domicilio,a.barrio_ciudad, 
  a.telefono,a.celular,a.padre_cedul,a.padre_nombre, a.padre_apelli,a.madre_cedul,a.madre_nombre,a.madre_apelli,
  a.conyu_cedul,a.conyu_nombre,a.conyu_apelli, a.ubicacion,a.fechaimp, a.fech_activa,a.fech_vencim,a.donante_org,
  a.orig_datos,a.fechagra,a.usuario,
  (case when (e.cedpol is not null) then 'si' else 'no' end) as ispolice,
  (case when (e.cedpol is not null) then
  (case when e.estado='ACTIVO' then 'ES PERSONAL POLICIAL' 
  when (e.estado='INACTIVO' and e.motibaja='BAJA') then  'PERSONAL POLICIAL DADO DE BAJA' 
  when (e.estado='INACTIVO' and e.motibaja='PASE A RETIRO') then 'PERSONAL POLICIAL EN SITUACION DE RETIRO' 
  end  
  ) 
  else 'NO ES PERSONAL POLICIAL' end ) as cedpol,
  e.estado,e.motibaja,age(fechanac) as edad50  from personas a 
  left join nacio b on (b.idnacio=a.nacio) left join nacio c on (c.idnacio=a.nacio_orig) left join profesiones d on 
  (d.idprofesiones=a.profesion) left join pers001p e on (e.cedpol=a.nrodoc)  left join fallecido f on  
  f.cedula=a.nrodoc WHERE a.nrodoc='$nrodocu'";
  
//echo ("<iframe src='http://172.16.0.20/id_consultas/ver_foto_pn.php?cedula=$nrodoc115&tipo=2' width='170' //height='250' frameborder='0' scrolling='no' target='_blank'></iframe>") ;
	
$datos= array(); 
 $res=  $this->DB1->query(  $sql );
  $datos= $res->result_array();
  return $datos;
}

    
public function obtDatosBasicos($nrodocu){
    
$sql= "select a.tipodoc,a.nrodoc,a.nropro,a.nombre,a.apellido,a.fechanac,b.descrip as nac_desc,
  c.descrip as nacio_orig,a.lugnac, 
  
   (case when a.sexo='M' then 'MASCULINO' 
  else 'FEMENINO' end ) as sexo,
  
  (case when a.sexo='M' then (
  case when a.estado_civil='SO' then 'SOLTERO' 
   when a.estado_civil='CA' then 'CASADO' 
   when a.estado_civil='SE' then 'SEPARADO' 
   when a.estado_civil='DI' then 'DIVORCIADO' 
   when a.estado_civil='VI' then 'VIUDO' 
   when a.estado_civil='ME' then 'MENOR'  end ) 
  else  (
  case when a.estado_civil='SO' then 'SOLTERA' 
   when a.estado_civil='CA' then 'CASADA' 
   when a.estado_civil='SE' then 'SEPARADA' 
   when a.estado_civil='DI' then 'DIVORCIADA' 
   when a.estado_civil='VI' then 'VIUDA' 
   when a.estado_civil='ME' then 'MENOR'  end )     end ) as estado_civil,
  
  d.descripcion as profesion,a.domicilio,a.barrio_ciudad, 
  a.telefono,a.celular, a.ubicacion,a.fechaimp, a.fech_activa,a.fech_vencim,a.donante_org,
  a.orig_datos,a.fechagra,a.usuario,
  (case when (e.cedpol is not null) then 'si' else 'no' end) as ispolice,
  (case when (e.cedpol is not null) then
  (case when e.estado='ACTIVO' then 'ES PERSONAL POLICIAL' 
  when (e.estado='INACTIVO' and e.motibaja='BAJA') then  'PERSONAL POLICIAL DADO DE BAJA' 
  when (e.estado='INACTIVO' and e.motibaja='PASE A RETIRO') then 'PERSONAL POLICIAL EN SITUACION DE RETIRO' 
  end  
  ) 
  else 'NO ES PERSONAL POLICIAL' end ) as cedpol,
  e.estado,e.motibaja,age(fechanac) as edad50  from personas a 
  left join nacio b on (b.idnacio=a.nacio) left join nacio c on (c.idnacio=a.nacio_orig) left join profesiones d on 
  (d.idprofesiones=a.profesion) left join pers001p e on (e.cedpol=a.nrodoc)  left join fallecido f on  
  f.cedula=a.nrodoc WHERE a.nrodoc='$nrodocu'";
  
//echo ("<iframe src='http://172.16.0.20/id_consultas/ver_foto_pn.php?cedula=$nrodoc115&tipo=2' width='170' //height='250' frameborder='0' scrolling='no' target='_blank'></iframe>") ;
	
$datos= array(); 
 $res=  $this->DB1->query(  $sql );
  $datos= $res->result_array(); $xx=0;
 
  foreach($datos as $it){
    $captu= $this->tiene_captura( $nrodocu); 
    $mail= $this->movi_domicilio($nrodocu); $mail= array_column($mail,'mail');$mail= sizeof($mail)>0 ?$mail[0]:'*****';
    $datos[$xx]['mail']= $mail;
    $datos[$xx]['captu']=$captu;$xx++;
  }
  return $datos;
}


public function datosFamiliares($nrodocu){
$sql="select 
(case when a.padre_cedul='' or a.padre_cedul is null then '*******' 
else a.padre_cedul end) as padre_cedul,
(case when a.padre_nombre='' or a.padre_nombre is null then '*******' 
else a.padre_nombre end) as padre_nombre,
(case when a.padre_apelli='' or a.padre_apelli is null then '*******' 
else a.padre_apelli end) as padre_apelli,
 (case when a.madre_cedul='' or a.madre_cedul is null then '*******' 
else a.madre_cedul end) as madre_cedul,
(case when a.madre_nombre='' or a.madre_nombre is null then '*******' 
else a.madre_nombre end) as madre_nombre,
(case when a.madre_apelli='' or a.madre_apelli is null then '*******' 
else a.madre_apelli end) as madre_apelli,
  (case when a.conyu_cedul='' or a.conyu_cedul is null then '*******' 
else a.conyu_cedul end) as conyu_cedul,
(case when a.conyu_nombre='' or a.conyu_nombre is null then '*******' 
else a.conyu_nombre end) as conyu_nombre,
(case when a.conyu_apelli='' or a.conyu_apelli is null then '*******' 
else a.conyu_apelli end) as conyu_apelli
 from personas a where a.nrodoc='$nrodocu'";
$datos= array(); 
 $res=  $this->DB1->query(  $sql );
  $datos= $res->result_array();
  return $datos;
}
    

public function datosParentesco($nrodocu){
$query=  $this->DB1->query('select nrodoc, nrodoc_vinc,vinculo,telefono,domicilio,observa 
 from parentesco');  
 $datos= array(); 
 if( $query->num_rows() > 0){
    $datos= $res->result_array();
 }
  return $datos;
} 
    
    
    
public function campoJudicial($nrocedula){
 
 $datos= array();
 
  $sql_ca="select trae_esta('$nrocedula')";
	 $rs_ca = $this->DB1->query($sql_ca);
   $row_ca=$rs_ca->result_array;
   
	$situ_captu="";
    foreach($row_ca as $it){
    $situ_captu= $it['trae_esta'];    
    }
    
    $ante_desc="";
if ($situ_captu=='TIENE PROBLEMA JUDICIAL'){
       $ante_desc='Debe registrar la situacion(Consulta o Detencion), caso contrario el Sistema asumira que la persona por la cual consulta se encuentra DETENIDA...';
	   //  boton 
   }
   $datos= array("titulo"=> $situ_captu,  "descri"=> $ante_desc);
 return $datos;
}

  
    
    
    
    
public function  obt_datos_policia($nrodocumento){

$sql1= "select por.nrodoc, pro.descripcion as profesion,  por.tipodoc, nacio.descrip as nacio, por.usuario, por.fecha_ing, por.decreto_nro,
 por.fechagrab, por.servi_porta, por.otro_doc, por.nombre, por.apellido, por.fechanac, por.lugnac, por.domicilio, por.estado, por.motivo,
por.barrio_ciudad, por.telefono, por.celular, per.descri4 as lug_servi, por.promocion, por.credpol, gra.descrip as grado_actual, por.motibaja,
por.antigue, por.fecha_baja 
from policias por 
left join pers002p per on por.lug_servi=per.codigo 
left join grado gra on por.grado_actual=gra.id 
left join nacio on por.nacio=nacio.idnacio 
left join profesiones pro on por.profesion=pro.idprofesiones 
where por.nrodoc='$nrodocumento'";


$datos=  array();
$res15 = $this->DB2->query($sql1);
 $datos=  $res15->result_array();
  return $datos;
}







public function  obt_portacion_de_armas($nrodocumento){


 $sql_movi = "select  tra.id_por, tra.nrodoc, tra.id_arma, tra.serie_nro, ar.tipo_arma, ar.tipo_uso, 
 ar.calibre, ar.marca, nacio.descrip as procede, ar.situacion 
 from transfe tra 
 left join armas ar left join nacio on ar.procedencia=nacio.idnacio on tra.id_arma=ar.id_arma 
  where tra.nrodoc='$nrodocumento'  order by ar.tipo_arma, ar.serie_nro";
 

$sql1= "select por.nrodoc, pro.descripcion as profesion,  por.tipodoc, nacio.descrip as nacio, por.usuario, por.fecha_ing, por.decreto_nro,
 porechagrab, por.servi_porta, por.otro_doc, por.nombre, por.apellido, por.fechanac, por.lugnac, por.domicilio, por.estado, por.motivo,
por.barrio_ciudad, por.telefono, por.celular, per.descri4 as lug_servi, por.promocion, por.credpol, gra.descrip as grado_actual, por.motibaja,
por.anti.fgue, por.fecha_baja
from policias por
left join pers002p per on por.lug_servi=per.codigo
left join grado gra on por.grado_actual=gra.id
left join nacio on por.nacio=nacio.idnacio
left join profesiones pro on por.profesion=pro.idprofesiones
where nrodoc='$nrodocumento'";

 $res15 = $this->DB2->query($sql_movi);
 $resu= $res15->result_array();
 return $resu;
}




public function movi_domicilio( $nrodocu){

  $sql12="select domicilio,domicilio_nro,telefono, mail, referencia, coordenada, observa
    from residencia.movi_domicilio
   where nrodoc='$nrodocu' order by fechagra desc";

$datos= array();
 $res= $this->DB1->query( $sql12 );
   $datos= $res->result_array();
    return $datos; 
}




/** capturas **/
public function tiene_captura( $nrodocumento ){
$datos= false; 
  
//registro de causa - el antecedente
$sql= "select cidcap from cap001 where cidcap='".$nrodocumento."' and grupo_esta='1'";

$res1=  $this->DB1->query(  $sql );

if(  $res1->num_rows() >0){ $datos= true;}
return $datos;
}





public function  datos_fichaje($nrodocumento){

$sql15="select b.etn_descri,c.ciu_descri,d.dbar_descri,e.prof_descri,f.est_descri,g.cut_descri,a.nrodoc,a.alias,
a.domicilio,a.estatura,a.linea_baja,a.linea_celular1,a.linea_celular2,a.observacion,a.usugra,a.dependgra,a.fechagra
from deportivo.fichas a inner join deportivo.etnias b on(b.etn_id=a.etn_id) inner join deportivo.ciudades c on (c.ciu_id=a.ciu_id) 
inner join deportivo.barrios d on(d.dbar_id=a.dbar_id) inner join deportivo.profesiones e on(e.prof_id=a.prof_id) 
inner join deportivo.estados_civiles f on(f.est_id=a.est_id) inner join deportivo.cutis g on(g.cut_id=a.cut_id) 
 where nrodoc='$nrodocumento'";


$res15 = $this->DB1->query($sql15);
 
$rowper15 = $res15->result_array();
 
return $rowper15;
 }





public function fallecido($nrodoc){
$datos= false; 
  
//registro de causa - el antecedente
$sql= "select nrodoc from fallecidos.fallecidos where nrodoc='$nrodoc'";

$res1=  $this->DB1->query(  $sql );
$this->DB1->error();
if(  $res1->num_rows() >0){ $datos= true;}
return $datos;    
}



public function datosFallecimiento($nrodoc){
$sql=" select  lu.descrip as lugarfalle, ci.descrip as circufalle, f.medico_foren,f.causa,f.intervinientes,f.jurisdiccion,
 f.fecha_falle, f.hora_falle,f.observa, f.edad, f.dependgra,f.usugra, f.fechagra from 
 fallecidos.fallecidos f inner join fallecidos.lugar_falleci lu on f.lugfallec_id=lu.id 
 inner join fallecidos.circunstancia ci on ci.id=f.circun_id 
where f.nrodoc= '$nrodoc' "; 
$res=  $this->DB1->query($sql);
$res= $res->result_array(); return $res;
}


public function registroPolicialPorEntradas($nrodoc){
/** Registro Policial **/
$sql= "select tm.tmov_descri as tipomov, lugd.lug_descri as lugardeten,rp.fecha as fechadeten,
 rp.motivo as motivodeten,rp.familiar as familiardeten, rp.polic_interv as policiainte, 
 rp.observacion as obsdeten,
rd.fecha as fechamov, tm1.tmov_descri as tipomovdet, rd.nrodoc as ci, rd.motivo as motivomov, lugr.lrem_descri as lugarrem,
 rd.polic_interv as polimov, rd.observacion as obsmov  
 from deportivo.regpolicial rp  
inner join deportivo.lugardeten lugd on rp.lug_id=lugd.lug_id 
inner join deportivo.tipos_movim tm on tm.tmov_id=rp.tmov_id 
inner join deportivo.regdetalle rd on rp.reg_id= rd.reg_id 
inner join deportivo.tipos_movim tm1 on tm1.tmov_id= rd.tmov_id 
inner join deportivo.lugremision lugr on lugr.lrem_id= rd.lrem_id
 where rp.nrodoc='$nrodoc'";
 $query= $this->DB1->query(  $sql );
 $res=  $query->result_array();   return  $res;
 
}

public function registrarFallecimiento(){
/** Obtener fecha de nacimiento ***/
$fecha_nac="";
foreach($this->obtDatosPersonales( $this->input->post('txt-ci-fall') ) as $it ){$fecha_nac= $it['fechanac'];}
$edad= $this->Utilidades_model->calcEdad( $fecha_nac);

//Convertir a timestamp

 $data = array(
        'nrodoc' => $this->input->post('txt-ci-fall'),
        'circun_id' => $this->input->post('txt-circ-fall'),
        'lugfallec_id' => $this->input->post('txt-lug-fall'),
         'medico_foren' => $this->input->post('txt-med-fore'),
        'causa' => $this->input->post('txt-causa-fall'),
        'intervinientes' => $this->input->post('txt-interv-fall'),
         'jurisdiccion' => $this->input->post('txt-juris-fall'),
        'fecha_falle' =>  $this->input->post('fechaf-'.$this->input->post('txt-ci-fall')  ),
        'hora_falle' => $this->input->post('txt-hora-fall'),
         'observa' => $this->input->post('txt-obs-fall'),
        'edad' => $edad,
        'dependgra' =>  $this->nativesession->get("depend"),
         'usugra' => $this->nativesession->get("usr"),
        'fechagra' => $this->Utilidades_model->getTodayDate() ); 

 $ins_sql= $this->DB1->insert_string( 'fallecidos.fallecidos', $data);
 $retorno= false;
 
 if($this->DB1->query( $ins_sql))  $retorno= true;
 $this->DB1->error(); 
return $retorno;
}


public function personaEnElPais( $nrodocu ){
 $sql= "select coalesce( max(id_ent_sal), 0) as maxi from  deportivo.ent_sal_pais where nrodoc='$nrodocu'"; 
 $q1= $this->DB1->query( $sql);
 if(  $row= $q1->row_array()){
 $cod=  $row['maxi']; 
 if( ((int)$cod) > 0 ){
 $sql2= "select tipo_mov from deportivo.ent_sal_pais where id_ent_sal=$cod";
 $q2= $this->DB1->query( $sql2);
 if( $ro= $q2->row_array()){   return  $ro['tipo_mov']; }else{   return ""; }/** ** **/
 /** *** **/    
 }else{ return "";}

 }else{  return "";  }
}





public function obtDatosEntSalPais($nrodocu){
 

$sql= "select id_ent_sal, ent_sal_destino,
 concat(   concat(date_part('day', ent_sal_fecha), '/'), 
 concat(   concat(  date_part('month', ent_sal_fecha), '/') , 
  date_part('year', ent_sal_fecha) )    ) as ent_sal_fecha, ent_sal_medio, ent_sal_chapa, ent_sal_observ , tipo_mov  
from deportivo.ent_sal_pais where nrodoc='$nrodocu'" ; 
$res=  $this->DB1->query($sql);
$resu=  $res->result_array(); 
return  $resu;
}



public function regEntSalPais(){
  // 4123421
$data = array(
        'nrodoc' => $this->input->post('txt-ci-ent-sal'),
        'ent_sal_destino' => $this->input->post('txt-destino'),
        'ent_sal_fecha' => $this->input->post('txt-fecha-ent-sal'),
         'ent_sal_medio' => $this->input->post('txt-medio-tras'),
        'ent_sal_chapa' => $this->input->post('txt-medio-chapa'),
        'ent_sal_observ' => $this->input->post('txt-obs-ent-sal'),
        'tipo_mov'=> $this->input->post('opc-mov')  
        
        
        );
    
 $scr=   $this->DB1->insert_string( 'deportivo.ent_sal_pais', $data);

 
 $retorno= false;
 
 if($this->DB1->query( $scr))
$retorno= true;
$this->DB1->error(); 

return $retorno;
}





}
<?php



function obtDatosPenitenciarios($nrodocu){
$sql_carcel = "select * from espenitencia.espe_movimiento where 
nrodoc='$nrodocu' order by fecha_ent";
$Datos= array();


$mdb2 =& MDB2::connect('pgsql://postgres:cocotelo@172.16.0.98/trabajo');

  if (PEAR::isError($mdb2)) {
    mostrarError( $mdb2);
      die($mdb2->getMessage());
  }else{
    $mdb2->setFetchMode( MDB2_FETCHMODE_ASSOC);
    $res=& $mdb2->query(  $sql_carcel );
    
    if (PEAR::isError($res)) {
    mostrarError( $mdb2);
      die($mdb2->getMessage());
  }
     
    $datos=  $res->fetchAll();
    
    $conta=0;
    foreach($datos as $re){
        
        /** Variables a insertar en el arrar Datos **/
        $fecha_ent;
        $fecha_sal;
        $entrada;
        $salida;
        $fecha_mov;
        $mov;
        $estado;
        /**       **        **/
        
  $tipomov=$re['tipo_mov'];
	$esta=$re['estado'];
	$fechamov=$re['fecha_mov'];
	$fechaent=$re['fecha_ent'];
	$fechasal=$re['fecha_sal'];
    /** **/ 
    
	if (($fechaent=='1777-07-07') and ($fechasal=='1777-07-07')){
		$fecha_ent='';
		$fecha_sal='';
		$entrada='';
		$salida='';
	}
	
	if (($fechaent!='1777-07-07')and ($fechasal=='1777-07-07')){
		$fecha_ent=date("d-m-Y",strtotime($fechaent)); 
		$fecha_sal='';
		$entrada='ENTRADA';
	}

	if (($fechaent!='1777-07-07')and ($fechasal!='1777-07-07')){
		$fecha_ent=date("d-m-Y",strtotime($fechaent));
		$fecha_sal=date("d-m-Y",strtotime($fechasal)); 
		$salida='SALIDA';
		$entrada='ENTRADA';
	}

	if (($fechaent=='1777-07-07')and ($fechasal!='1777-07-07')){
		$fecha_ent='';
		$fecha_sal=date("d-m-Y",strtotime($fechasal)); 
		$salida='SALIDA';
		$entrada='';
	}

///////////****************************************************
	if (($fechamov=='1777-07-07')or ($fechamov=='')){
		$fecha_mov='';
	}else{
		$fecha_mov=date("d-m-Y",strtotime($fechamov)); 
	}

	if($esta=='Recluido'){
	$estado='RECLUIDO';
	}
	if($esta=='lib_medi'){
	$estado='LIBERTAD C/MEDIDAS';
	}
	if($esta=='Libertad'){
	$estado='LIBERTAD';
	}
	
if($tipomov=='traslado'){ 
$mov='TRASLADADO';
}
if($tipomov=='Comparecencia'){ 
$mov='COMPARECENCIA';
}

/** **/
 /** Insercion **/   
$Datos[$conta]= array('fecha_ent'=>$fecha_ent , 'fecha_sal'=> $fecha_sal, 
'entrada'=>$entrada, 'salida'=> $salida, 'fecha_mov'=> $fecha_mov,
'mov' => $mov,  'estado'=> $estado, 'lugar'=> $re['l_reclu'], 'causa'=> $re['causa']);

$conta++;
}/** end foreach **/
    
  }/** Conexion Exitosa **/
    return $Datos;
}





?>
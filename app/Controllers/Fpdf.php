<?php 
namespace App\Controllers;

class Fpdf extends BaseController
{
	

	public function index()
	{	$session = session();
        if ( $session->has('CURP') and ($session->ID_C ==1 or $session->ID_C ==2 or $session->ID_C ==5) and $session->Status ==1)
        {	include('conec.php');
    		$db = db_connect();
    		
        	$url=uri_string();
        	$folio=substr($url, -14);
        	//cancelar nueva visualizacion
        	
		    //extraccion de consulta de validez
		    $builder = $db->table('t_receta');
		    $builder->select('estatus');
		    $builder->where('ID_RECETA', $folio);
		    $query = $builder->get();
		    $VALI=$query->getResultArray();
		    foreach($VALI as $VALIZ){}
		    if($VALIZ['estatus']=='1'){
		    $builder = $db->table('t_receta');
		    $builder->set('estatus',0,false);
		    $builder->where('ID_RECETA', $folio);
		    $builder->update();
		    

		    //prueba de validez

		    $builder = $db->table('t_receta');
		    $builder->select('SSA');
		    $builder->where('ID_RECETA', $folio);
		    $query = $builder->get();
		    $tot=$query->getResultArray();
		    $guia=$tot;
		    $ins=0;
		    $name1='';
		    $name2='';
		    $name3='';
		    foreach($tot as $totall){
		    if($ins==0){
		    	$name1=$totall['SSA'];
		    }
		   	elseif ($ins==1) {
		   		$name2=$totall['SSA'];
		   	}
		   	elseif($ins==2){
		   		$name3=$totall['SSA'];
		   	}
		   	$ins=$ins+1;
		   }
		   if(count($guia)==1){

			$sql=mysqli_query($conexion, "SELECT nom_pac,CURP_P,nom_ser,edad_pac,sexo_pac,t_receta.SSA,desc_produc,c_solicitada,c_surtida, FOLIO_R FROM `t_receta` INNER JOIN `t_productos` INNER JOIN `t_servicio` ON  t_productos.SSA=t_receta.SSA AND t_servicio.ID_SER=t_receta.ID_SER WHERE ID_RECETA='$folio' AND t_productos.SSA ='$name1'");
			$date=mysqli_fetch_array($sql);
			$date2=array('-----','-----','-----','-----');
			$date3=array('-----','-----','-----','-----');
			}
			if(count($guia)==2){

			$sql=mysqli_query($conexion, "SELECT nom_pac,CURP_P,nom_ser,edad_pac,sexo_pac,t_receta.SSA,desc_produc,c_solicitada,c_surtida, FOLIO_R FROM `t_receta`INNER JOIN t_productos INNER JOIN t_servicio ON t_servicio.ID_SER=t_receta.ID_SER AND t_productos.SSA=t_receta.SSA WHERE ID_RECETA='$folio' AND t_productos.SSA ='$name1'");
			$sql2=mysqli_query($conexion, "SELECT t_receta.SSA,desc_produc,c_solicitada,c_surtida FROM `t_receta`INNER JOIN t_productos INNER JOIN t_servicio ON t_servicio.ID_SER=t_receta.ID_SER AND t_productos.SSA=t_receta.SSA WHERE ID_RECETA='$folio' AND t_productos.SSA ='$name2'");
			$date=mysqli_fetch_array($sql);
			$date2=mysqli_fetch_array($sql2);
			$date3=array('-----','-----','','-----','-----');
			}
			if(count($guia)==3){

			$sql=mysqli_query($conexion, "SELECT nom_pac,CURP_P,nom_ser,edad_pac,sexo_pac,t_receta.SSA,desc_produc,c_solicitada,c_surtida,FOLIO_R FROM `t_receta`INNER JOIN t_productos INNER JOIN t_servicio ON t_servicio.ID_SER=t_receta.ID_SER AND t_productos.SSA=t_receta.SSA WHERE ID_RECETA='$folio' AND t_productos.SSA ='$name1'");
			$sql2=mysqli_query($conexion, "SELECT t_receta.SSA,desc_produc,c_solicitada,c_surtida FROM `t_receta`INNER JOIN t_productos INNER JOIN t_servicio ON t_servicio.ID_SER=t_receta.ID_SER AND t_productos.SSA=t_receta.SSA WHERE ID_RECETA='$folio' AND t_productos.SSA ='$name2'");
			$sql3=mysqli_query($conexion, "SELECT t_receta.SSA,desc_produc,c_solicitada,c_surtida FROM `t_receta`INNER JOIN t_productos INNER JOIN t_servicio ON t_servicio.ID_SER=t_receta.ID_SER AND t_productos.SSA=t_receta.SSA WHERE ID_RECETA='$folio' AND t_productos.SSA ='$name3'");
			$date=mysqli_fetch_array($sql);
			$date2=mysqli_fetch_array($sql2);
			$date3=mysqli_fetch_array($sql3);

			}
			$resultado=mysqli_num_rows($sql);
			if ($resultado>0){
				while ($date ){
			?>
			<?php
			$dele=strlen($date['6']);
			$descrip=$date['6'];
			if($dele>=115){
				$val_n=$dele-115;
				$descrip=substr($date['6'], 0, -$val_n);
			}
			$dele=strlen($date['2']);
			$servv=$date['2'];
			if($dele>=45){
				$val_n=$dele-45;
				$servv=substr($date['2'], 0, -$val_n);
			}
			$dele=strlen($date2['1']);
			$descrip2=$date2['1'];
			if($dele>=115){
				$val_n=$dele-115;
				$descrip2=substr($date2['1'], 0, -$val_n);
			}
			$dele=strlen($date3['1']);
			$descrip3=$date3['1'];
			if($dele>=115){
				$val_n=$dele-115;
				$descrip3=substr($date3['1'], 0, -$val_n);
			}

			//Titulo principal y logo
			$fpdf=new \FPDF();
			$fpdf->AddPage('portrait', 'letter');
			// encabezado
			$fpdf->SetFont('Times','',15);
			$fpdf->SetXY(10,10);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->Cell(0,0,'SECRETARIA DE SALUD', 0, 0, 'C');
			$fpdf->SetXY(10,10);
			$fpdf->Cell(0,15,'INSTITUTO DE SALUD DEL ESTADO DE CHIAPAS', 0, 0, 'C');
			$fpdf->SetXY(10,10);
			$fpdf->Cell(0,25,'HOSPITAL DE LAS CULTURAS', 0, 0, 'C');
			$fpdf->SetFont('Times','B',18);
			$fpdf->SetXY(10,25);
			$fpdf->Cell(0,25,'RECETA MEDICA', 0, 0, 'C');
			$fpdf->Image('img/sse1.png', 180, 5, 30,20, 'png');
			$fpdf->Image('img/ssf.png', 5, 5, 30,20, 'png');

				//FOLIO
				$fpdf->SetXY(155,35);
				$fpdf->SetFont('Times', 'B',10);
				$fpdf->Cell(50, 4, 'TICKET:'.$folio,1,0, 'L');
				$fpdf->SetFont('Times', '');
				//$this->Cell(20, 10, $date['8'],1,0, 'C',1);*/
				//folio 2
				$fpdf->SetXY(10,35);
				$fpdf->SetFont('Times', 'B',10);
				$fpdf->Cell(60, 4, 'FOLIO DE RECETA:'.$date[9],1,0, 'L');
				$fpdf->SetFont('Times', '');
				//DATOS DEL HOSPITAL

				$fpdf->SetLineWidth(1);
				$fpdf->SetDrawColor(212,193,156);
				$fpdf->Line(10,40,210,40);
				$fpdf->SetY(42);
				$fpdf->SetLineWidth(0.2);
				$fpdf->SetDrawColor(79,79,79);
				$fpdf->SetFontSize(10);
				$fpdf->SetFont('Times', 'B',8);
				$fpdf->SetFillColor(98,17,50);
				$fpdf->SetTextColor(255,255,255);
				$fpdf->Cell(200, 4, 'DATOS DEL HOSPITAL',1,0,'C',1);
				$fpdf->Ln();
				$fpdf->SetTextColor(0,0,0);
				$fpdf->SetFillColor(238,233,224);
				$fpdf->SetFont('Times', 'B',8);
				$fpdf->Cell(55, 4, 'UNIDAD MEDICA:',1,0, 'C',1);
				$fpdf->SetFont('Times', 'B',8);
				$fpdf->Cell(105, 4, 'DOMICILIO DE LA UNIDAD MEDICA:',1,0, 'C',1);
				$fpdf->SetFont('Times', 'B',8);
				$fpdf->Cell(40, 4, 'FECHA DE ELABORACION:',1,1, 'C',1);
				$fpdf->SetFont('Times', 'I');
				$fpdf->Cell(55, 6, 'Hospital de las Culturas',1,0, 'C',1);
				$fpdf->SetFont('Times', 'I');
				$fpdf->Cell(105, 6, 'Boulevard Javier Lopez Moreno, 29264 San Cristobal de las Casas, Chis.',1,0, 'C',1);
				$fpdf->SetFont('Times', 'I');
				$fpdf->Cell(40, 6,substr($folio, 0,-10).'/'.substr($folio, 4,-8).'/'.substr($folio, 6,-6).'-'.substr($folio, 8,-4).':'.substr($folio, 10,-2),1,0, 'C',1);
				
				
				
				//Datos del paciente
				$fpdf->SetY(60);
				$fpdf->SetLineWidth(1);
				$fpdf->SetDrawColor(212,193,156);
				$fpdf->Line(10,58,210,58);
				$fpdf->SetLineWidth(0.2);
				$fpdf->SetDrawColor(79,79,79);
				$fpdf->SetFont('Times', 'B',10);
				$fpdf->SetFillColor(98,17,50);
				$fpdf->SetTextColor(255,255,255);
				$fpdf->Cell(180, 4, 'DATOS DEL PACIENTE',1,0,'C',1);
				$fpdf->Ln();
				$fpdf->SetTextColor(0,0,0);
				$fpdf->SetFillColor(238,233,224);
				$fpdf->SetFontSize(8);

				$fpdf->SetFont('Times', 'B');
			$fpdf->Cell(35, 6, 'NOMBRE COMPLETO',1,0, 'C',1);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(145, 6, $date['0'],1,1, 'C',1);

			$fpdf->SetFont('Times', 'B');
			$fpdf->Cell(10, 6, 'CURP',1,0, 'C',1);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(42 , 6, $date['1'],1,0, 'C',1);

			$fpdf->SetFont('Times', 'B');
			$fpdf->Cell(18, 6, 'SERVICIO',1,0, 'C',1);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(60, 6, $servv,1,0, 'C',1);

			$fpdf->SetFont('Times', 'B');
			$fpdf->Cell(10, 6, 'EDAD',1,0, 'C',1);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(10, 6, $date['3'],1,0, 'C',1);

			$fpdf->SetFont('Times', 'B');
			$fpdf->Cell(10, 6, 'SEXO',1,0, 'C',1);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 6, $date['4'],1,0, 'C',1);
			$fpdf->Ln();

			//QR
				$fpdf->Image('img/test.png', 190, 60, 18,18);


			//MEDICAMENTOS
			$fpdf->SetLineWidth(1);
			$fpdf->SetDrawColor(212,193,156);
			$fpdf->Line(10,79,210,79);
			$fpdf->SetY(80);
			$fpdf->SetLineWidth(0.2);
			$fpdf->SetDrawColor(79,79,79);
			$fpdf->SetFontSize(6);
			$fpdf->SetFont('Times', 'B');
			$fpdf->SetFillColor(98,17,50);
			$fpdf->SetTextColor(255,255,255);
			$fpdf->Cell(20, 4, 'CLAVE',1,0,'C',1);
			$fpdf->Cell(140, 4, 'MONBRE GENERICO DEL MEDICAMENTO (CUADRO BASICO Y CATALOGO DEL SECTOR SALUD)',1,0,'C',1);
			$fpdf->Cell(20, 4, 'C. RECETADA',1,0,'C',1);
			$fpdf->Cell(20, 4, 'C. SURTIDA',1,1,'C',1);
			
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8, $date['5'],1,0, 'C',1);

			//desc
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(140, 8, $descrip.'...',1,0, 'C',1);

			//CANTIDAD RECETADA 

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8,$date['7'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8, $date['8'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8, $date2['0'],1,0, 'C',1);

			//desc
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(140, 8, $descrip2.'...',1,0, 'C',1);

			//CANTIDAD RECETADA 

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8,$date2['2'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8, $date2['3'],1,0, 'C',1);
			$fpdf->Ln();

			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8, $date3['0'],1,0, 'C',1);

			//desc
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(140, 8, $descrip3.'...',1,0, 'C',1);

			//CANTIDAD RECETADA 

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8,$date3['2'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8, $date3['3'],1,0, 'C',1);
			$fpdf->Ln();




			//DATOS DEL JEFE DE SERVICIO 
			$fpdf->SetLineWidth(0.2);
			$fpdf->SetDrawColor(79,79,79);
			$fpdf->SetFontSize(10);
			$fpdf->SetFont('Times', 'B',10);
			$fpdf->SetFillColor(98,17,50);
			$fpdf->SetTextColor(255,255,255);
			$fpdf->Cell(130, 4, 'ENCARGADO DE FARMACIA',1,0,'C',1);
			$fpdf->SetFont('Times', 'B',10);
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(98,17,50);
			$fpdf->Cell(70, 4, 'PACIENTE/DOCTOR/ENFERMERA',1,0,'C',1);
			$fpdf->Ln();

			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetFont('Times', 'B',8);
			$fpdf->Cell(70, 4, 'NOMBRE COMPLETO',1,0, 'C',1);
			$fpdf->SetFont('Times', 'B',8);
			$fpdf->Cell(40, 4, 'CURP ',1,0, 'C',1);
			$fpdf->SetFont('Times', 'B',8);
			$fpdf->Cell(20, 4, 'FIRMA',1,0, 'C',1);
			$fpdf->Cell(40, 4, 'NOMBRE',1,0,'C',1);
			$fpdf->Cell(30, 4, 'FIRMA',1,0,'C',1);
			$fpdf->Ln();


			//NOMBRE COMPLETO

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 6, $session->nom_per.' '.$session->ape_per,1,0, 'C',1);

			//CURP
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(40, 6, $session->CURP,1,0, 'C',1);

			//FIRMA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 6, '',1,0, 'C',1);

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(40, 6, '',1,0, 'C',1);
			$fpdf->Cell(30, 6, '',1,0, 'C',1);

			$fpdf->Ln();

			
			

	

			//copia


				// encabezado
				$fpdf->SetFont('Times','',15);
				$fpdf->SetXY(10,135);
				$fpdf->SetTextColor(0,0,0);
				$fpdf->Cell(0,0,'SECRETARIA DE SALUD', 0, 0, 'C');
				$fpdf->SetXY(10,135);
				$fpdf->Cell(0,15,'INSTITUTO DE SALUD DEL ESTADO DE CHIAPAS', 0, 0, 'C');
				$fpdf->SetXY(10,135);
				$fpdf->Cell(0,25,'HOSPITAL DE LAS CULTURAS', 0, 0, 'C');
				$fpdf->SetFont('Times','B',18);
				$fpdf->SetXY(10,135);
				$fpdf->Cell(0,45,'RECETA MEDICA', 0, 0, 'C');
				$fpdf->SetFont('Times','I',10);
				$fpdf->SetXY(10,145);
				$fpdf->Cell(0,35,'COPIA', 0, 0, 'C');
				$fpdf->Image('img/sse1.png', 180, 135, 30,20, 'png');
				$fpdf->Image('img/ssf.png', 5, 135, 30,20, 'png');

				//FOLIO
				$fpdf->SetXY(155,160);
				$fpdf->SetFont('Times', 'B',10);
				$fpdf->Cell(50, 4, 'TICKET:'.$folio,1,0, 'L');
				$fpdf->SetFont('Times', '');
				//$this->Cell(20, 10, $date['8'],1,0, 'C',1);*/
				//FLIO 2
				$fpdf->SetXY(10,160);
				$fpdf->SetFont('Times', 'B',10);
				$fpdf->Cell(60, 4, 'FOLIO DE RECETA:'.$date[9],1,0, 'L');
				$fpdf->SetFont('Times', '');

				//DATOS DEL HOSPITAL

				$fpdf->SetLineWidth(1);
				$fpdf->SetDrawColor(212,193,156);
				$fpdf->Line(10,40,210,40);
				$fpdf->SetY(165);
				$fpdf->SetLineWidth(0.2);
				$fpdf->SetDrawColor(79,79,79);
				$fpdf->SetFontSize(10);
				$fpdf->SetFont('Times', 'B',8);
				$fpdf->SetFillColor(98,17,50);
				$fpdf->SetTextColor(255,255,255);
				$fpdf->Cell(200, 4, 'DATOS DEL HOSPITAL',1,0,'C',1);
				$fpdf->Ln();
				$fpdf->SetTextColor(0,0,0);
				$fpdf->SetFillColor(238,233,224);
				$fpdf->SetFont('Times', 'B',8);
				$fpdf->Cell(55, 4, 'UNIDAD MEDICA:',1,0, 'C',1);
				$fpdf->SetFont('Times', 'B',8);
				$fpdf->Cell(105, 4, 'DOMICILIO DE LA UNIDAD MEDICA:',1,0, 'C',1);
				$fpdf->SetFont('Times', 'B',8);
				$fpdf->Cell(40, 4, 'FECHA DE ELABORACION:',1,1, 'C',1);
				$fpdf->SetFont('Times', 'I');
				$fpdf->Cell(55, 6, 'Hospital de las Culturas',1,0, 'C',1);
				$fpdf->SetFont('Times', 'I');
				$fpdf->Cell(105, 6, 'Boulevard Javier Lopez Moreno, 29264 San Cristobal de las Casas, Chis.',1,0, 'C',1);
				$fpdf->SetFont('Times', 'I');
				$fpdf->Cell(40, 6,substr($folio, 0,-10).'/'.substr($folio, 4,-8).'/'.substr($folio, 6,-6).'-'.substr($folio, 8,-4).':'.substr($folio, 10,-2),1,0, 'C',1);



				//Datos del paciente
				$fpdf->SetY(183);
				$fpdf->SetLineWidth(1);
				$fpdf->SetDrawColor(212,193,156);
				$fpdf->Line(10,58,205,58);
				$fpdf->SetLineWidth(0.2);
				$fpdf->SetDrawColor(79,79,79);
				$fpdf->SetFont('Times', 'B',10);
				$fpdf->SetFillColor(98,17,50);
				$fpdf->SetTextColor(255,255,255);
				$fpdf->Cell(180, 4, 'DATOS DEL PACIENTE',1,0,'C',1);
				$fpdf->Ln();
				$fpdf->SetTextColor(0,0,0);
				$fpdf->SetFillColor(238,233,224);
				$fpdf->SetFontSize(8);

				$fpdf->SetFont('Times', 'B');
				$fpdf->Cell(35, 6, 'NOMBRE COMPLETO',1,0, 'C',1);
				$fpdf->SetFont('Times', 'I');
				$fpdf->Cell(145, 6, $date['0'],1,1, 'C',1);

				$fpdf->SetFont('Times', 'B');
				$fpdf->Cell(10, 6, 'CURP',1,0, 'C',1);
				$fpdf->SetFont('Times', 'I');
				$fpdf->Cell(42 , 6, $date['1'],1,0, 'C',1);

				$fpdf->SetFont('Times', 'B');
				$fpdf->Cell(18, 6, 'SERVICIO',1,0, 'C',1);
				$fpdf->SetFont('Times', 'I');
				$fpdf->Cell(60, 6, $date['2'],1,0, 'C',1);

				$fpdf->SetFont('Times', 'B');
				$fpdf->Cell(10, 6, 'EDAD',1,0, 'C',1);
				$fpdf->SetFont('Times', 'I');
				$fpdf->Cell(10, 6, $date['3'],1,0, 'C',1);

				$fpdf->SetFont('Times', 'B');
				$fpdf->Cell(10, 6, 'SEXO',1,0, 'C',1);
				$fpdf->SetFont('Times', 'I');
				$fpdf->Cell(20, 6, $date['4'],1,0, 'C',1);
				$fpdf->Ln();



				//QR
				$fpdf->Image('img/test.png', 190, 183, 18,18);


				//MEDICAMENTOS
				$fpdf->SetLineWidth(1);
				$fpdf->SetDrawColor(212,193,156);
				$fpdf->Line(10,79,205,79);
				$fpdf->SetY(203);
				$fpdf->SetLineWidth(0.2);
				$fpdf->SetDrawColor(79,79,79);
				$fpdf->SetFontSize(6);
				$fpdf->SetFont('Times', 'B');
				$fpdf->SetFillColor(98,17,50);
				$fpdf->SetTextColor(255,255,255);
				$fpdf->Cell(20, 4, 'CLAVE',1,0,'C',1);
				$fpdf->Cell(140, 4, 'MONBRE GENERICO DEL MEDICAMENTO (CUADRO BASICO Y CATALOGO DEL SECTOR SALUD)',1,0,'C',1);
				$fpdf->Cell(20, 4, 'C. RECETADA',1,0,'C',1);
				$fpdf->Cell(20, 4, 'C. SURTIDA',1,1,'C',1);

				//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8, $date['5'],1,0, 'C',1);

			//desc
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(140, 8, $descrip.'...',1,0, 'C',1);

			//CANTIDAD RECETADA 

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8,$date['7'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8, $date['8'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8, $date2['0'],1,0, 'C',1);

			//desc
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(140, 8, $descrip2.'...',1,0, 'C',1);

			//CANTIDAD RECETADA 

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8,$date2['2'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8, $date2['3'],1,0, 'C',1);
			$fpdf->Ln();

			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8, $date3['0'],1,0, 'C',1);

			//desc
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(140, 8, $descrip3.'...',1,0, 'C',1);

			//CANTIDAD RECETADA 

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8,$date3['2'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 8, $date3['3'],1,0, 'C',1);
			$fpdf->Ln();





//DATOS DEL JEFE DE SERVICIO 
$fpdf->SetLineWidth(0.2);
$fpdf->SetDrawColor(79,79,79);
$fpdf->SetFontSize(10);
$fpdf->SetFont('Times', 'B',10);
$fpdf->SetFillColor(98,17,50);
$fpdf->SetTextColor(255,255,255);
$fpdf->Cell(130, 4, 'ENCARGADO DE FARMACIA',1,0,'C',1);
$fpdf->SetFont('Times', 'B',10);
$fpdf->SetFillColor(238,233,224);
$fpdf->SetTextColor(98,17,50);
$fpdf->Cell(70, 4, 'PACIENTE/DOCTOR/ENFERMERA',1,0,'C',1);
$fpdf->Ln();

$fpdf->SetTextColor(0,0,0);
$fpdf->SetFillColor(238,233,224);
$fpdf->SetFont('Times', 'B',8);
$fpdf->Cell(70, 4, 'NOMBRE COMPLETO',1,0, 'C',1);
$fpdf->SetFont('Times', 'B',8);
$fpdf->Cell(40, 4, 'CURP ',1,0, 'C',1);
$fpdf->SetFont('Times', 'B',8);
$fpdf->Cell(20, 4, 'FIRMA',1,0, 'C',1);
$fpdf->Cell(40, 4, 'NOMBRE',1,0,'C',1);
$fpdf->Cell(30, 4, 'FIRMA',1,0,'C',1);
$fpdf->Ln();
//NOMBRE COMPLETO

$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 6, $session->nom_per.' '.$session->ape_per,1,0, 'C',1);

//CURP
$fpdf->SetFont('Times', 'I');
$fpdf->Cell(40, 6, $session->CURP,1,0, 'C',1);

//FIRMA

$fpdf->SetFont('Times', 'I');
$fpdf->Cell(20, 6, '',1,0, 'C',1);

$fpdf->SetFont('Times', 'I');
$fpdf->Cell(40, 6, '',1,0, 'C',1);
$fpdf->Cell(30, 6, '',1,0, 'C',1);

$fpdf->Ln();







			$this->response->SetHeader('Content-Type','application/pdf');
			$fpdf->Output();
			}
			}
		}else{
			return redirect()->to(base_url().'/Receta_med');
		}
	}
    else{
        $session->destroy();
        return redirect()->to(base_url() . '/Login');
    }

	}
}
?>







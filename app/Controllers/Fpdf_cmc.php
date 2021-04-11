<?php 
namespace App\Controllers;

class Fpdf_cmc extends BaseController
{
	

	public function index()
	{	$session = session();
        if ( $session->has('CURP') and ($session->ID_C ==1 or $session->ID_C ==7) and $session->Status ==1)
        {	include('conec.php');
        	$url=uri_string();
        	$folio=substr($url, -14);
			$data=('-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-,-');
			$db = db_connect();
		    $builder = $db->table('t_rcmc');
		    $builder->select('SSA');
		    $builder->where('ID_RCMC', $folio);
		    $query = $builder->get();
		    $tot=$query->getResultArray();
		    $guia=$tot;
		    $ins=0;
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
		   	elseif ($ins==3) {
		   		$name4=$totall['SSA'];
		   	}
		   	elseif($ins==4){
		   		$name5=$totall['SSA'];
		   	}
		   	elseif ($ins==5) {
		   		$name6=$totall['SSA'];
		   	}
		   	elseif($ins==6){
		   		$name7=$totall['SSA'];
		   	}
		   	elseif ($ins==7) {
		   		$name8=$totall['SSA'];
		   	}
		   	elseif($ins==8){
		   		$name9=$totall['SSA'];
		   	}
		   	elseif ($ins==9) {
		   		$name10=$totall['SSA'];
		   	}
		   	elseif($ins==10){
		   		$name11=$totall['SSA'];
		   	}
		   	elseif($ins==11){
		   		$name12=$totall['SSA'];
		   	}
		   	$ins=$ins+1;
		   }

		   if(count($guia)>=1){

			$sql=mysqli_query($conexion, "SELECT turno,ID_SER ,t_rcmc.SSA,desc_produc,presentacion,c_solicitada FROM `t_rcmc`INNER JOIN t_productos ON t_productos.SSA=t_rcmc.SSA WHERE ID_RCMC='$folio' AND t_productos.SSA ='$name1'");
			$date=mysqli_fetch_array($sql);
			$date2=array('-----','-----','-----','-----','-----');
			$date3=array('-----','-----','-----','-----','-----');
			$date4=array('-----','-----','-----','-----','-----');
			$date5=array('-----','-----','-----','-----','-----');
			$date6=array('-----','-----','-----','-----','-----');
			$date7=array('-----','-----','-----','-----','-----');
			$date8=array('-----','-----','-----','-----','-----');
			$date9=array('-----','-----','-----','-----','-----');
			$date10=array('-----','-----','-----','-----','-----');
			$date11=array('-----','-----','-----','-----','-----');
			$date12=array('-----','-----','-----','-----','-----');
			}
			if(count($guia)>=2){

			$sql2=mysqli_query($conexion, "SELECT t_rcmc.SSA,desc_produc,presentacion,c_solicitada FROM `t_rcmc`INNER JOIN t_productos ON t_productos.SSA=t_rcmc.SSA WHERE ID_RCMC='$folio' AND t_productos.SSA ='$name2'");
			$date2=mysqli_fetch_array($sql2);
			}
			if(count($guia)>=3){

			$sql3=mysqli_query($conexion, "SELECT t_rcmc.SSA,desc_produc,presentacion,c_solicitada FROM `t_rcmc`INNER JOIN t_productos ON t_productos.SSA=t_rcmc.SSA WHERE ID_RCMC='$folio' AND t_productos.SSA ='$name3'");
			$date3=mysqli_fetch_array($sql3);
			}
			if(count($guia)>=4){

			$sql4=mysqli_query($conexion, "SELECT t_rcmc.SSA,desc_produc,presentacion,c_solicitada FROM `t_rcmc`INNER JOIN t_productos ON t_productos.SSA=t_rcmc.SSA WHERE ID_RCMC='$folio' AND t_productos.SSA ='$name4'");
			$date4=mysqli_fetch_array($sql4);
			}
			if(count($guia)>=5){

			$sql5=mysqli_query($conexion, "SELECT t_rcmc.SSA,desc_produc,presentacion,c_solicitada FROM `t_rcmc`INNER JOIN t_productos ON t_productos.SSA=t_rcmc.SSA WHERE ID_RCMC='$folio' AND t_productos.SSA ='$name5'");
			$date5=mysqli_fetch_array($sql5);
			}
			if(count($guia)>=6){

			$sql6=mysqli_query($conexion, "SELECT t_rcmc.SSA,desc_produc,presentacion,c_solicitada FROM `t_rcmc`INNER JOIN t_productos ON t_productos.SSA=t_rcmc.SSA WHERE ID_RCMC='$folio' AND t_productos.SSA ='$name6'");
			$date6=mysqli_fetch_array($sql6);
			}
			if(count($guia)>=7){

			$sql7=mysqli_query($conexion, "SELECT t_rcmc.SSA,desc_produc,presentacion,c_solicitada FROM `t_rcmc`INNER JOIN t_productos ON t_productos.SSA=t_rcmc.SSA WHERE ID_RCMC='$folio' AND t_productos.SSA ='$name7'");
			$date7=mysqli_fetch_array($sql7);
			}
			if(count($guia)>=8){

			$sql8=mysqli_query($conexion, "SELECT t_rcmc.SSA,desc_produc,presentacion,c_solicitada FROM `t_rcmc`INNER JOIN t_productos ON t_productos.SSA=t_rcmc.SSA WHERE ID_RCMC='$folio' AND t_productos.SSA ='$name8'");
			$date8=mysqli_fetch_array($sql8);
			}
			if(count($guia)>=9){

			$sql9=mysqli_query($conexion, "SELECT t_rcmc.SSA,desc_produc,presentacion,c_solicitada FROM `t_rcmc`INNER JOIN t_productos ON t_productos.SSA=t_rcmc.SSA WHERE ID_RCMC='$folio' AND t_productos.SSA ='$name9'");
			$date9=mysqli_fetch_array($sql9);
			}
			if(count($guia)>=10){

			$sql10=mysqli_query($conexion, "SELECT t_rcmc.SSA,desc_produc,presentacion,c_solicitada FROM `t_rcmc`INNER JOIN t_productos ON t_productos.SSA=t_rcmc.SSA WHERE ID_RCMC='$folio' AND t_productos.SSA ='$name10'");
			$date10=mysqli_fetch_array($sql10);
			}
			if(count($guia)>=11){

			$sql11=mysqli_query($conexion, "SELECT t_rcmc.SSA,desc_produc,presentacion,c_solicitada FROM `t_rcmc`INNER JOIN t_productos ON t_productos.SSA=t_rcmc.SSA WHERE ID_RCMC='$folio' AND t_productos.SSA ='$name11'");
			$date11=mysqli_fetch_array($sql11);
			}
			if(count($guia)>=12){

			$sql12=mysqli_query($conexion, "SELECT t_rcmc.SSA,desc_produc,presentacion,c_solicitada FROM `t_rcmc`INNER JOIN t_productos ON t_productos.SSA=t_rcmc.SSA WHERE ID_RCMC='$folio' AND t_productos.SSA ='$name12'");
			$date12=mysqli_fetch_array($sql12);
			}
			$resultado=mysqli_num_rows($sql);
			if ($resultado>0){
				while ($date ){
			?>
			<?php

			//Titulo principal y logo
			$fpdf=new \FPDF();
			$fpdf->AddPage('landscape', 'letter');
 
			//encabezado
			$fpdf->SetFont('Times','',15);
			$fpdf->SetY(10);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->Cell(0,0,'SECRETARIA DE SALUD', 0, 0, 'C');
			$fpdf->SetXY(10,10);
			$fpdf->Cell(0,15,'INSTITUTO DE SALUD DEL ESTADO DE CHIAPAS', 0, 0, 'C');
			$fpdf->SetFont('Times','B',18);
			$fpdf->SetXY(10,10);
			$fpdf->Cell(0,30,'RECETARIO COLECTIVO MATERIAL DE CURACION', 0, 0, 'C');
			//$fpdf->Image('sse1.png', 240, 5, 30,20, 'png');
			//$fpdf->Image('ssf.png', 5, 8, 30,20, 'png');

			 //FOLIO
			 $fpdf->SetXY(220,35);
			 $fpdf->SetFont('Times', 'B',10);
			 $fpdf->Cell(50, 4, 'FOLIO:'.$folio,1,0, 'L');
			 $fpdf->SetFont('Times', '');
			 //$fpdf->Cell(20, 10, $data['8'],1,0, 'C',1);



			//DATOS DEL HOSPITAL

			$fpdf->SetLineWidth(1);
			$fpdf->SetDrawColor(212,193,156);
			$fpdf->Line(10,40,270,40);
			$fpdf->SetY(42);
			$fpdf->SetLineWidth(0.2);
			$fpdf->SetDrawColor(79,79,79);
			$fpdf->SetFontSize(10);
			$fpdf->SetFont('Times', 'B',18);
			$fpdf->SetFillColor(98,17,50);
			$fpdf->SetTextColor(255,255,255);
			$fpdf->Cell(260, 10, 'DATOS DEL HOSPITAL',1,0,'C',1);
			$fpdf->Ln();
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetFont('Times', 'B',8);
			$fpdf->Cell(60, 6, 'UNIDAD MEDICA:',1,0, 'C',1);
			$fpdf->SetFont('Times', 'B',8);
			$fpdf->Cell(40, 6, 'CLAVE DE JURISDICCION:',1,0, 'C',1);
			$fpdf->SetFont('Times', 'B',8);
			$fpdf->Cell(40, 6, 'COBERTURA:',1,0, 'C',1);
			$fpdf->SetFont('Times', 'B',8);
			$fpdf->Cell(40, 6, 'TURNO',1,0, 'C',1);
			$fpdf->SetFont('Times', 'B',8);
			$fpdf->Cell(40, 6, 'HORA',1,0, 'C',1);
			$fpdf->SetFont('Times', 'B',8);
			$fpdf->Cell(40, 6, 'FECHA DE ELABORACION:',1,1, 'C',1);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(60, 8, 'Hospital de las Culturas',1,0, 'C',1);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(40, 8, '02',1,0, 'C',1);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(40, 8, 'Poblacion abierta',1,0, 'C',1);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(40, 8, $date[0],1,0, 'C',1);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(40, 8,date('H:i') ,1,0, 'C',1);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(40, 8,date('d/m/Y'),1,0, 'C',1);


			//MEDICAMENTOS
			$fpdf->SetLineWidth(1);
			$fpdf->SetDrawColor(212,193,156);
			$fpdf->Line(10,68,270,68);
			$fpdf->SetY(70);
			$fpdf->SetLineWidth(0.2);
			$fpdf->SetDrawColor(79,79,79);
			$fpdf->SetFontSize(6);
			$fpdf->SetFont('Times', 'B');
			$fpdf->SetFillColor(98,17,50);
			$fpdf->SetTextColor(255,255,255);
			$fpdf->Cell(20, 4, 'CLAVE',1,0,'C',1);
			$fpdf->Cell(120, 4, 'presentacion',1,0,'C',1);
			$fpdf->Cell(70, 4, 'PRESENTACION',1,0,'C',1);
			$fpdf->Cell(25, 4, 'C. SOLICITADA',1,0,'C',1);
			$fpdf->Cell(25, 4, 'C. SURTIDA',1,1,'C',1);

			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $date[2],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $date[3],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $date[4],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$date[5],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();

			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $date2[0],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $date2[1],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $date2[2],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$date2[3],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $date3[0],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $date3[1],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $date3[2],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$date3[3],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $date4[0],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $date4[1],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $date4[2],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$date4[3],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $date5[0],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $date5[1],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $date5[2],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$date5[3],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $date6[0],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $date6[1],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $date6[2],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$date6[3],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $date7[0],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $date7[1],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $date7[2],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$date7[3],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $date8[0],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $date8[1],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $date8[2],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$date8[3],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $date9[0],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $date9[1],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $date9[2],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$date9[3],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $date10[0],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $date10[1],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $date10[2],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$date10[3],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $date11[0],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $date11[1],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4,	$date11[2],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$date11[3],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $date12[0],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $date12[1],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $date12[2],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$date12[3],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $data['15'],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $data['15'],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $data['15'],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$data['16'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $data['15'],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $data['15'],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $data['15'],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$data['16'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $data['15'],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $data['15'],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $data['15'],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$data['16'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $data['15'],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $data['15'],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $data['15'],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$data['16'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $data['15'],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $data['15'],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $data['15'],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$data['16'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $data['15'],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $data['15'],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $data['15'],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$data['16'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $data['15'],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $data['15'],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $data['15'],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$data['16'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $data['15'],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $data['15'],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $data['15'],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$data['16'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $data['15'],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $data['15'],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $data['15'],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$data['16'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $data['15'],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $data['15'],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $data['15'],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont
			('Times', 'I');
			$fpdf->Cell(25, 4,$data['16'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();
			//SSA
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 4, $data['15'],1,0, 'C',1);

			//DESC
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(120, 4, $data['15'],1,0, 'C',1);

			//PRESENTACION
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(70, 4, $data['15'],1,0, 'C',1);

			//CANTIDAD SOLICITADA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4,$data['16'],1,0, 'C',1);

			//CANTIDAD SURTIDA
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 4, $data['17'],1,0, 'C',1);
			$fpdf->Ln();




			//DATOS DEL JEFE DE SERVICIO 

			$fpdf->SetLineWidth(1);
			$fpdf->SetDrawColor(212,193,156);
			$fpdf->Line(10,168,270,168);
			$fpdf->SetY(170);
			$fpdf->SetLineWidth(0.2);
			$fpdf->SetDrawColor(79,79,79);
			$fpdf->SetFontSize(10);
			$fpdf->SetFont('Times', 'B',18);
			$fpdf->SetFillColor(98,17,50);
			$fpdf->SetTextColor(255,255,255);
			$fpdf->Cell(150, 6, 'JEFE DE SERVICIO',1,0,'C',1);
			$fpdf->Ln();
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetFont('Times', 'B',8);
			$fpdf->Cell(75, 6, 'NOMBRE COMPLETO:',1,0, 'C',1);
			$fpdf->SetFont('Times', 'B',8);
			$fpdf->Cell(35, 6, 'CLAVE DE SERVICIO ',1,0, 'C',1);
			$fpdf->SetFont('Times', 'B',8);
			$fpdf->Cell(20, 6, 'CEDULA',1,0, 'C',1);
			$fpdf->SetFont('Times', 'B',8);
			$fpdf->Cell(20, 6, 'FIRMA',1,1, 'C',1);

			//NOMBRE COMPLETO

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(75, 12, $session->nom_per.$session->ape_per,1,0, 'C',1);

			//CLAVE

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(35, 12, $date[1],1,0, 'C',1);

			//CEDULA PROFECIONAL

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 12, $session->cedu_per,1,0, 'C',1);

			//FIRMA

			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(20, 12, '',1,0, 'C',1);
			$fpdf->Ln();

			//FIRMAS
			$fpdf->SetXY(160,170);
			$fpdf->SetLineWidth(0.2);
			$fpdf->SetDrawColor(79,79,79);
			$fpdf->SetFont('Times', 'B',10);
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetTextColor(98,17,50);
			$fpdf->Cell(110, 6, 'NOMBRE Y FIRMA DE QUIEN ',1,1,'C',1);
			$fpdf->SetXY(160,176);
			$fpdf->Cell(25, 6, 'SOLICITA',1,0,'C',1);
			$fpdf->Cell(25, 6, 'SURTE',1,0,'C',1);
			$fpdf->Cell(60, 6, 'RECIBE SERV. ENFEREMERIA',1,0,'C',1);
			$fpdf->SetTextColor(0,0,0);
			$fpdf->SetFillColor(238,233,224);
			$fpdf->SetFontSize(8);
			$fpdf->SetXY(160,182);
			$fpdf->SetFont('Times', 'I');
			$fpdf->Cell(25, 12, '',1,0, 'C',1);
			$fpdf->Cell(25, 12, '',1,0, 'C',1);
			$fpdf->Cell(60, 12, '',1,0, 'C',1);
			$this->response->SetHeader('Content-Type','application/pdf');
			$fpdf->Output();
			}
			}
	}
    else{
        $session->destroy();
        return redirect()->to(base_url() . '/Login');
    }

	}
}
?>
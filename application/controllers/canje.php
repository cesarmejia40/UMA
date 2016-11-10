<?php

/**
 * Created by PhpStorm.
 * User: Keyling
 * Date: 03/12/2015
 * Time: 04:23 PM
 */
class Canje extends CI_Controller
{
    private $aplicados=0;
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        $data['frp']= $this->canjes->master();
        $this->load->view('templates/header_home_admin');
        $this->load->view('admin/canje_view', $data);
        $this->load->view('templates/footer_admin');
    }
    public function canjePremio(){
        $data['articulos']= $this->canjes->articulos();
        $this->load->view('templates/header_home_admin');
        $this->load->view('admin/canje_premio_view', $data);
        $this->load->view('templates/footer_admin');
    }
    public function cargarArticulos(){
        $cod= $this->uri->segment(2);
        $dataArt= $this->canjes->articuloLinea($cod);
        $i=0;
        $json= array();
        foreach($dataArt as $key){
            $table= array(
                'articulo' => $key['tctNombreProd'],
                'codigo' =>$key['tctCodigo'],
                'puntos'=>$key['tctPuntos']
            );
            $json[]=$table;
        }
        echo json_encode($json);
    }
    public function cargarClientes($cod){
        $dataCls = $this->canjes->clientePts($cod);
      
     echo json_encode($dataCls);
    }
    
/*para el estado de cuenta por cliente*/
    public function cargamdpEdoCta($cod,$Desde,$Hasta)
    {
        echo $cod;
        $dataCls = $this->canjes->mdpEdoCta($cod,$Desde,$Hasta);
        $i=0;
        $json= array();
        foreach($dataCls as $key){
            $json['data'][$i]['NFactura'] = $key['itmFact'];
            $json['data'][$i]['FFactura'] = $key['itmDate'];
            $json['data'][$i]['Puntos'] = $key['itmPts'];
            $json['data'][$i]['PtsAplicados'] = $key['APLI'];
            $json['data'][$i]['PtsDisponibles'] = $key['itmDisponible'];
            $json['data'][$i]['Estado'] = $key['Estado'];
            //$json['data'][$i]['PtsSinAplicar'] = "<label class='milabel' id='label_".$key['itmFact']."'>".$key['itmPts']."</label>";

            $i++;
        }
        echo json_encode($json);

    }

    public function cargarBouchers($cod)
    {
        $dataCls = $this->canjes->bouchers($cod);
        $i=0;
        $json= array();
        foreach($dataCls as $key){
            $json['data'][$i]['Fecha'] = $key['itmDate'];
            $json['data'][$i]['Factura'] = $key['itmFact'];
            $json['data'][$i]['Puntos'] = $key['itmPts'];
            $json['data'][$i]['PtsAplicados'] = 0;
            $json['data'][$i]['PtsSinAplicar'] = "<label class='milabel' id='label_".$key['itmFact']."'>".$key['itmPts']."</label>";

            $i++;
        }
        echo json_encode($json);
    }


    public function totalPtsCls($cod){
        $dataPts = $this->canjes->sumaPuntos($cod);
        echo json_encode($dataPts);
    }
    public function frp(){
        $frp= $this->uri->segment(2);
        $cli= $this->uri->segment(3);
        $ruta= $this->uri->segment(4);
        $datafrp = $this->canjes->guardar($frp, $cli, $ruta);
        echo json_encode($datafrp);
    }
    public function verFrp($cod){
       $datos= $this->canjes->getFrp($cod);
       $this->load->view('templates/header_home_admin');
       $this->load->view('admin/canje_frp_view', $datos);
       $this->load->view('templates/footer_admin');
    }
    public function verificarFrp($frp){
        $data = $this->canjes->verificar($frp);
        echo json_encode($data);
    }
    public function frplineasprod(){
        $codP= $this->uri->segment(2);
        $frp= $this->uri->segment(3);
        $cant= $this->uri->segment(4);
        $pts= $this->uri->segment(5);
        $data = $this->canjes->lineprod($codP,$frp, $cant, $pts);
        echo json_encode($data);
    }

    /**
     *
     */
    public function frplineasbouchCompleto(){
        $frp= $this->uri->segment(2);
        $bouch= $this->uri->segment(3);
        $apli= $this->uri->segment(4);

        $result = $this->calcular($frp, $bouch ,$apli);
        echo json_encode($result);
    }
    private function calcular($frp, $bouch ,$cant){

        $datafrpbouch = $this->canjes->frpRemanente($bouch);

        foreach($datafrpbouch as $key){
            $remannt = $key['itmRemainder'];
            if($remannt > $cant)
            {
                $descrip= "Aplic Parcial";
                $in= $this->canjes->linebouch($frp, $bouch, $cant, $descrip);
                if($in == 1){
                    $return = $remannt - $cant;
                    $this->canjes->updatefrp($key['itmk'], $return);
                }
                $cant= 0;
                $this.exit();
            }
            if($remannt <= $cant){
                $descrip= "Aplic Completo";
                if($remannt > $cant){
                    $remannt = $cant;
                }
                $in= $this->canjes->linebouch($frp, $bouch, $remannt, $descrip);
                if($in == 1){
                    $return = 0;
                    $this->canjes->updatefrp($key['itmk'], $return);
                }
                $cant= $cant - $remannt;
            }
        }
        return $cant;
    }
}
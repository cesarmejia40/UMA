<?php

/**
 * Created by PhpStorm.
 * User: Keyling
 * Date: 21/12/2015
 * Time: 10:27 AM
 */
class Reports extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        
    }
    public function index(){
         $data['clientes'] = $this->reportes->S_Clientes();
        $this->load->view('templates/header_home_admin');
        $this->load->view('admin/reportes_view',$data);
        $this->load->view('templates/footer_admin');
    }

    public function clientesReport($d1 , $d2,$d3){

       $data= $this->reportes->clientesRep($d1 , $d2,$d3);
       $json = array();
       $i=0;
       
       //echo count($data);
       if (count($data)>1) {
       foreach($data as $row){
            $json['data'][$i]['Num'] = $i+1;
            $json['data'][$i]['NumCliente'] = $row['itmDate'];
            $json['data'][$i]['Cliente'] = $row['itmFact'];
            $json['data'][$i]['Puntos'] = $row['Pts'];
            $json['data'][$i]['PtsApl'] = $row['ptos'];
            // $this->reportes->cangeable($row['itmCls']);itmStatusFact
            //$json['data'][$i]['PtsApl'] = $row['itmStatusFact'];
            /*if($row['itmStatusFact']=='CANCELADA') 
            {$json['data'][$i]['PtsApl'] = $row['ptos'];}
            else{$json['data'][$i]['PtsApl'] = '0';}$json['data'][$i]['canje'] = $row['canje'];*/
            $json['data'][$i]['Vendedor'] = $row['ItmSlpName'];
            $i++;
        }}
        else{
            $json['data'][$i]['Num'] = '';
            $json['data'][$i]['NumCliente'] = '';
            $json['data'][$i]['Cliente'] = '';
            $json['data'][$i]['Puntos'] = '';
            $json['data'][$i]['PtsApl'] = '';
            // $this->reportes->cangeable($row['itmCls']);itmStatusFact
            //$json['data'][$i]['PtsApl'] = $row['itmStatusFact'];
            /*if($row['itmStatusFact']=='CANCELADA') 
            {$json['data'][$i]['PtsApl'] = $row['ptos'];}
            else{$json['data'][$i]['PtsApl'] = '0';}$json['data'][$i]['canje'] = $row['canje'];*/
            $json['data'][$i]['Vendedor'] = '';
            $i++;
        }
        echo json_encode($json);
        


    }
    public function pxcReport($d1 , $d2){

        $data= $this->reportes->Rastrear($d1 , $d2);
        $json = array();
        $i=0;
        if (!($data)) {
            # code...
        } else {
            foreach( $data as $row){
                $json['data'][$i]['itmCls'] = $row['itmCls'];
                $json['data'][$i]['itmClsName'] = $row['itmClsName'];
                 //ENERO
                if($row['Ene']=='')
                {
                     $json['data'][$i]['Ene'] = '0';
                }
                else{
                     $json['data'][$i]['Ene'] = $row['Ene'];
                }
               //FEBRERO
                if ($row['Feb']=='') {
                    $json['data'][$i]['Feb'] = '0';
                }
                else
                {
                    $json['data'][$i]['Feb'] = $row['Feb'];
                }
                
                //MARZO
                if ($row['Mar']=='') {
                    $json['data'][$i]['Mar'] ='0';
                }
                else
                {
                     $json['data'][$i]['Mar'] = $row['Mar'];
                }
               // ABRIL
                if($row['Abr']==''){
                    $json['data'][$i]['Abr'] = '0';
                }
                else
                {
                    $json['data'][$i]['Abr'] = $row['Abr'];
                }
                //MAYO
                if($row['May']==''){
                     $json['data'][$i]['May'] ='0';
                }
                else{
                     $json['data'][$i]['May'] = $row['May'];
                }
               //JUNIO
                if( $row['Jun']==''){
                     $json['data'][$i]['Jun'] ='0';
                }
                else
                {
                     $json['data'][$i]['Jun'] = $row['Jun'];
                }
               //JULIO
                if($row['Jul']==''){
                    $json['data'][$i]['Jul'] ='0';
                }
                else{
                    $json['data'][$i]['Jul'] = $row['Jul'];
                }
                //AGOSTO
                if($row['Ago']==''){
                    $json['data'][$i]['Ago'] ='0';
                }
                else
                {
                   $json['data'][$i]['Ago'] = $row['Ago']; 
                }
                //SEPTIEMBRE
                if($row['Sep']=='')
                {
                     $json['data'][$i]['Sep'] ='0';
                }
                else
                {
                     $json['data'][$i]['Sep'] = $row['Sep'];
                }
               //OCTUBRE
                if($row['Oct']=='')
                {
                      $json['data'][$i]['Oct'] ='0';
                }
                else
                {
                      $json['data'][$i]['Oct'] = $row['Oct'];
                }
                //NOVIEMBRE
                if($row['Nov']==''){
                     $json['data'][$i]['Nov'] ='0';
                }
                else
                {
                   $json['data'][$i]['Nov'] = $row['Nov']; 
                }
                //DIECIEMBRE
              
               if($row['Dic']=='')
               {
                 $json['data'][$i]['Dic'] ='0';
               }
               else
               {
                 $json['data'][$i]['Dic'] = $row['Dic'];
               }
               
                $json['data'][$i]['itmSlpCode'] = $row['itmSlpCode'];
                $json['data'][$i]['ItmSlpName'] = $row['ItmSlpName'];
                $i++;
            }
        }
        echo json_encode($json);
    }
    public function frpReport($d1 , $d2){

    }
    public function mdpReport($d1 , $d2){
        $data= $this->reportes->mdpRep($d1,$d2);
        $json = array();
        $i=0;
        if(!$data)
        {
                $json['data'][$i]['Articulo'] = '';
                $json['data'][$i]['Descripcion'] = '';
                $json['data'][$i]['Cant'] = '';
                $json['data'][$i]['Puntos'] = '';
                $json['data'][$i]['Vendedor'] = '';

        }
        else
         {
            foreach( $data as $row){
                $json['data'][$i]['Articulo'] =  $row['itmProduc'];
                $json['data'][$i]['Descripcion'] = $row['itmDscripcion'];
                $json['data'][$i]['Cant'] = $row['Cant'];
                $json['data'][$i]['Puntos'] = $row['Pts'];
                $json['data'][$i]['Vendedor'] = $this->reportes->vendedor($d1,$d2,$row['itmProduc']);
                $i++;
            }
        }
        echo json_encode($json);
    }


    /*************  Reportes nuevos de Sistema de Puntos Uma       *************/    

    /**puntos por producto***/
    public function mdpPuntos ($d1,$d2)
    {

        $data = $this->reportes->ppuntos($d1,$d2);

        $json = array();
        $i=0;
        
            foreach( $data as $row){
                $json['data'][$i]['itmProduc'] = $row['itmProduc'];
                $json['data'][$i]['itmDscripcion'] = $row['itmDscripcion'];
                //ENERO
                if($row['Ene']=='')
                {
                     $json['data'][$i]['Ene'] = '-';
                }
                else{
                     $json['data'][$i]['Ene'] = $row['Ene'];
                }
               //FEBRERO
                if ($row['Feb']=='') {
                    $json['data'][$i]['Feb'] = '-';
                }
                else
                {
                    $json['data'][$i]['Feb'] = $row['Feb'];
                }
                
                //MARZO
                if ($row['Mar']=='') {
                    $json['data'][$i]['Mar'] ='-';
                }
                else
                {
                     $json['data'][$i]['Mar'] = $row['Mar'];
                }
               // ABRIL
                if($row['Abr']==''){
                    $json['data'][$i]['Abr'] = '-';
                }
                else
                {
                    $json['data'][$i]['Abr'] = $row['Abr'];
                }
                //MAYO
                if($row['May']==''){
                     $json['data'][$i]['May'] ='-';
                }
                else{
                     $json['data'][$i]['May'] = $row['May'];
                }
               //JUNIO
                if( $row['Jun']==''){
                     $json['data'][$i]['Jun'] ='-';
                }
                else
                {
                     $json['data'][$i]['Jun'] = $row['Jun'];
                }
               //JULIO
                if($row['Jul']==''){
                    $json['data'][$i]['Jul'] ='-';
                }
                else{
                    $json['data'][$i]['Jul'] = $row['Jul'];
                }
                //AGOSTO
                if($row['Ago']==''){
                    $json['data'][$i]['Ago'] ='-';
                }
                else
                {
                   $json['data'][$i]['Ago'] = $row['Ago']; 
                }
                //SEPTIEMBRE
                if($row['Sep']=='')
                {
                     $json['data'][$i]['Sep'] ='-';
                }
                else
                {
                     $json['data'][$i]['Sep'] = $row['Sep'];
                }
               //OCTUBRE
                if($row['Oct']=='')
                {
                      $json['data'][$i]['Oct'] ='-';
                }
                else
                {
                      $json['data'][$i]['Oct'] = $row['Oct'];
                }
                //NOVIEMBRE
                if($row['Nov']==''){
                     $json['data'][$i]['Nov'] ='-';
                }
                else
                {
                   $json['data'][$i]['Nov'] = $row['Nov']; 
                }
                //DIECIEMBRE
              
               if($row['Dic']=='')
               {
                 $json['data'][$i]['Dic'] ='-';
               }
               else
               {
                 $json['data'][$i]['Dic'] = $row['Dic'];
               }
               
                
                $i++;
            }
        
        echo json_encode($json);
    }

    /** puntos por clientes**/
    public function mdpPuntoCliente($d1,$d2)
    {
        $data = $this->reportes->puntoCliente($d1,$d2);

        $json = array();
        $i=0;
        
            foreach( $data as $row){
                $json['data'][$i]['SlpID'] = $row['SlpID'];
                $json['data'][$i]['SlpName'] = $row['SlpName'];
                $json['data'][$i]['itmClsName'] = $row['itmClsName'];
                $json['data'][$i]['Ene'] = $row['Ene'];
                $json['data'][$i]['Feb'] = $row['Feb'];
                $json['data'][$i]['Mar'] = $row['Mar'];
                $json['data'][$i]['Abr'] = $row['Abr'];
                $json['data'][$i]['May'] = $row['May'];
                $json['data'][$i]['Jun'] = $row['Jun'];
                $json['data'][$i]['Jul'] = $row['Jul'];
                $json['data'][$i]['Ago'] = $row['Ago'];
                $json['data'][$i]['Sep'] = $row['Sep'];
                $json['data'][$i]['Oct'] = $row['Oct'];
                $json['data'][$i]['Nov'] = $row['Nov'];
                $json['data'][$i]['Dic'] = $row['Dic'];
                
                $i++;
            }
        
        echo json_encode($json);
    }

    //facturas anuladas
    public function mdpFactAnulada($d1,$d2)
    {
        $data = $this->reportes->FactAnulada($d1,$d2);
        $data2 = $this->reportes->fac($d1,$d2);

        //var_dump($data2);
        
        $json = array();
         
        
        $i=0;

        foreach ($data as $row)
        {
            $json['data'][$i]['itmDate'] = $row['itmDate'];
            $json['data'][$i]['facts'] = $row['facts'];
            $json['data'][$i]['factura'] = $data2[$i]['factura'];
             
            
            $i++;
        }

      
         echo json_encode( $json);
    }

    

    /* Lista de Facturas*/

    public function mdpFactura ($d1,$d2)
    {

        $data = $this->reportes->factura($d1,$d2);
         $json = array();
            $i=0;
        
            foreach( $data as $row)
            {
                /*$json['data'][$i]['itmDate'] = $row['itmDate'];
                $json['data'][$i]['itmFact'] = $row['itmFact'];*/
                $json['data'][$i]['Num'] = $i+1;
                $json['data'][$i]['codigo'] = $row['COD'];
                $json['data'][$i]['nombre'] = $row['itmClsName'];
                $json['data'][$i]['ptos'] = $row['PTOS'];
               /* if($row['ItmStatusFact']=='CANCELADA'){
                    $json['data'][$i]['dispo'] = $row['DISPO'];
                }
                else{
                    $json['data'][$i]['dispo'] = '0';
                }*/
               $json['data'][$i]['dispo'] =$this->reportes->EstadoFactura($row['COD']);
                $json['data'][$i]['canje'] = $row['CANJEADO'];
                $json['data'][$i]['cod_vend'] = $row['ItmSlpCode'];
                $json['data'][$i]['vendedor'] = $row['ItmSlpName'];
                
                
                $i++;
            }        
        echo json_encode($json);
    }

}
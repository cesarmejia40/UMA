<?php
if($this->session->userdata('logged') == FALSE)
{
    redirect('login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>UMG - CLIENTE</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/index_home.css"  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/slider.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/jquery.dataTables.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/extensions/dataTables.colVis.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/extensions/dataTables.tableTools.css" />
</head>
<body>
<div id="container">
    <nav class="col s12">
        <nav>
            <div class="nav-wrapper">
                <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="mdi-navigation-menu"></i></a>
                <a href="principal" class="brand-logo"><img src="<?php echo base_url(); ?>assets/img/Untitled-1-01.png" /></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <!--<li><?php //echo $this->session->userdata('ClienteNombre').' ['.$this->session->userdata('idCliente').'] '.$this->session->userdata('username'); ?></li>-->
                    <li> 
                        <nav class="titulo_User">
                            <h6><?php echo $this->session->userdata('ClienteNombre').' ['.$this->session->userdata('idCliente')?></h6>
                            
                            <h6><?php echo $this->session->userdata('username') ?></h6>
                    </nav></li>
                    <li><a href="<?php echo base_url()?>index.php/salir" class="out"><i class="material-icons left">power_settings_new</i>SALIR</a></li>
                </ul>
            </div>
        </nav>
    </nav>
    <div class="col s12">
        <div class="brown lighten-5 lineas" >
            <b>PROGRAMA DE PUNTOS</b>
            <p>Podra consultar el estado de cuenta de sus productos disponibles</p>
        </div>
    </div>
</div>
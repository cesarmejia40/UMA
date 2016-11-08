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
    <title>UMG - ADMIN</title>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/index_home.css"  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/slider.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/chosen.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/jquery.dataTables.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/extensions/dataTables.colVis.css" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/media/css/extensions/dataTables.tableTools.css" />
    <style type="text/css" media="print">
        .oculto {display:none}
    </style>
</head>
<body>
<div id="container" class="oculto">
    <nav class="col s12">
        <nav>
            <div class="nav-wrapper">
                <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="mdi-navigation-menu"></i></a>
                <a href="menu" class="brand-logo"><img src="<?php echo base_url(); ?>assets/img/Untitled-1-01.png" /></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><?php echo $this->session->userdata('username'); ?></li>
                    <li> <?php echo  - $this->session->userdata('idCliente'); ?></li>
                    <li><a href="<?php echo base_url();?>index.php/salir" class="out"><i class="material-icons left">power_settings_new</i>SALIR</a></li>
                </ul>
            </div>
        </nav>
    </nav>
    <div class="col s12">
        <div class="brown lighten-5 lineas" >
            <b>PROGRAMA DE PUNTOS</b>
            <p>Vista Administrador</p>
        </div>
    </div>
</div>
 
    
    

<br><br><br>
 <div class="row oculto" style="text-align: center;">
     <div class="collection" >
         <div class="col m12">
             <div class="col m1"> <br></div>
             <?php
                switch ($this->session->userdata('Acceso')) {
                    case '2':
                        echo '
                             <div class="col m2"><a href="'.base_url('index.php/master').'" id="master" class="collection-item activo">MASTER</a></div>                          
                             <div class="col m2"><a href="'.base_url('index.php/canje').'" id="canje" class="collection-item activo">CANJE PUNTOS</a></div>                          
                             <div class="col m2"><a href="'.base_url('index.php/catalogo').'" id="catalogo" class="collection-item activo">CATÁLAGO</a></div>
                        ';

                    break;                    
                    default:
                        echo '
                             <div class="col m2"><a href="'.base_url('index.php/master').'" id="master" class="collection-item activo">MASTER</a></div>
                             <div class="col m2"><a href="'.base_url('index.php/usuarios').'" id="usuarios" class="collection-item activo">USUARIOS</a></div>
                             <div class="col m2"><a href="'.base_url('index.php/canje').'" id="canje" class="collection-item activo">CANJE PUNTOS</a></div>
                             <div class="col m2"><a href="'.base_url('index.php/catalogo').'" id="catalogo" class="collection-item activo">CATÁLAGO</a></div>
                             <div class="col m2"><a href="'.base_url('index.php/reportes').'" id="reportes" class="collection-item activo">REPORTES</a></div>
                        ';
                    break;
                }
             ?>
             
         </div>
    </div>
</div>

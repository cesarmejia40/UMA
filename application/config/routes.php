<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "login";
$route['404_override'] = '';
$route['pass'] = 'pass/updatepass';

$route['home']= "login/logueo";
$route['salir'] = "login/salir";

//$route['menu']= "login/index";
    /***********Rutas Clientes*************/
$route['principal']= "menu/principal";
$route['cuenta']= "menu/cuenta";
$route['bouchers']= "menu/bouchers";
$route['pagospendienes']= "menu/pagos";
$route['factura/(:any)']= "menu/factura/$1";
    /***********End Rutas Clientes*************/


    /********* RUTAS ADMIN **********/
$route['master']= "oitm/master";
$route['facturas/(:any)']= "oitm/facturas/$1";
$route['detalle/(:any)']= "oitm/detalle/$1";
$route['anular_total/(:any)/(:any)']= "oitm/AnularTotal/$1/$2";

    /*******Canje de premios********/
$route['canje']= "canje/index";
$route['canje_premio']= "canje/canjePremio";
$route['viewFrp/(:any)'] = "canje/verFrp/$1";
$route['cargarArt/(:any)']= "canje/cargarArticulos/$1";
$route['cargarCls/(:any)']= "canje/cargarClientes/$1";
$route['cargarBouch/(:any)']= "canje/cargarBouchers/$1";
//
$route['cargarEdoCta/(:any)/(:any)/(:any)']= "canje/cargamdpEdoCta/$1/$2/$3";

$route['totalPtsCls/(:any)']= "canje/totalPtsCls/$1";
$route['savefrp/(:any)/(:any)/(:any)']= "canje/frp/$1/$1/$1";
$route['lineprod/(:any)/(:any)/(:any)/(:any)']= "canje/frplineasprod/$1/$1/$1/$1";
$route['linebouchC/(:any)/(:any)/(:any)']= "canje/frplineasbouchCompleto/$1/$2/$3";
$route['verificarfrp/(:any)']= "canje/verificarFrp/$1";
    /*******Ende canje********/


    /*******Usuarios********/
$route['usuarios']= "usuarios/index";
$route['agregar_cliente']= "usuarios/agregar_cliente";
$route['save_cliente']= "usuarios/save_cliente";
$route['eliminar_cliente/(:any)']= "usuarios/eliminar_cliente/$1";
    /*******End Usuarios********/


$route['catalogo']= "Catalogo/index";
/* End of file routes.php */
/* Location: ./application/config/routes.php */

$route['facturas/(:any)']= "oitm/facturas/$1";


/************** REPORTES ***************/
$route['reportes']= "reports/index";
$route['clientesReport/(:any)/(:any)/(:any)'] = "reports/clientesReport/$1/$2/$3";
$route['pxcReport/(:any)/(:any)'] = "reports/pxcReport/$1/$2";
$route['frpReport/(:any)/(:any)'] = "reports/frpReport/$1/$2";
$route['mdpReport/(:any)/(:any)'] = "reports/mdpReport/$1/$2";
$route['mdpReport/(:any)/(:any)'] = "reports/mdpReport/$1/$2";
$route['mdpEdoCta']="reports/mdpEdoCta";


/*reportes INGRID...*/
$route['mdpPuntos/(:any)/(:any)'] = "reports/mdpPuntos/$1/$2";
$route['mdpPuntoCliente/(:any)/(:any)'] = "reports/mdpPuntoCliente/$1/$2";

$route['mdpFactAnulada/(:any)/(:any)'] = "reports/mdpFactAnulada/$1/$2";

$route['mdpFactura/(:any)/(:any)'] = "reports/mdpFactura/$1/$2";

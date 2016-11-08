<?php
/**
 * Created by Marangelo.
 * User: Maryan Espinoza
 * Date: 16/12/2015
 * Time: 02:26 PM
 */
class Estados{	
	public function FacturasEstados($id){
		switch ($id) {
			case 1:
				$Etd="ACTIVO";
			break;
			case 6:
				$Etd="Anulado";
			break;
			
			default:
				$Etd="Activo";
			break;
		}
	return $Etd;
	}
}
?>
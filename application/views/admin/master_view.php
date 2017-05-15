<div class="row">
        <div class="col s12">
          <div class="card blue-grey darken-1">            
             <div class="brown lighten-5 caja">
                <div class="row">
                    <div class="col m5 col s12 tituloC">
                        <b>Master de Cliente</b>
                    </div>
                </div>

                <div class="row ">
                    <div class="col s12">
                         <table id="TableCls" class="tableDatos table hover cell-border display " cellspacing="1" cellpadding="2">
                             <thead>
                                <tr>
                                    <td>N° CLIENTE</td>
                                    <td>CLIENTE</td>                                    
                                    <td>PTS</td>
                                    <td></td>
                                      <?php if ($this->session->userdata("Acceso") == 1 || $this->session->userdata("Acceso") == 2){ ?>
                                        <td></td>
                                     <?php }?>
                                </tr>
                             </thead>
                             <tbody>
                             <?php foreach ($Clientes-> result() as $Cls) { ?>
                        
                                 <tr>
                                     <td><?php echo $Cls->itmCls ?></td>
                                     <td><?php echo $Cls->itmClsName ?></td>                                     
                                     <td><?php echo number_format($Cls->itmPts) ?></td>
                                     <td><a href="oitm/facturas/<?php echo base64_encode($Cls->itmCls) ?>">VER</a></td>
                                     <?php if ($this->session->userdata("Acceso") == 1 || $this->session->userdata("Acceso") == 2){ ?>
                                     <td> <a class="btn-floating red" href="#" onclick="AnularTotal('<?php echo $Cls->itmCls ?>')"><i class="tiny material-icons">close</i></a></td>
                                     <?php }?>

                                 </tr>
                                                 
                             <?php }?>
                             
                             </tbody>
                         </table>
                    </div>
                </div>
                 <div id="modal2" class="modal bottom-sheet">
                     <div class="modal-content">
                         <h4></h4>
                         <p>Ingrese la razon por la cual la factura #<span id="factTotal"></span> sera eliminada</p>
                         <textarea id="totalWhy" class="materialize-textarea"></textarea>
                         <p>
                         <div style="display: none" id="Errowhay">
                             <span class="red-text text-darken-2">Campo Requerido!</span>
                         </div>
                         </p>
                     </div>
                     <div class="modal-footer">
                         <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" id="BtnAnularTotal">Proceder...</a>
                     </div>
                 </div>
            </div>
          </div>
        </div>
      </div>
            

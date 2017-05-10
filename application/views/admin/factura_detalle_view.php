<div class="col m9 col s12" id="ContenidoCentral">
    <div class="brown lighten-5 caja">
        <div class="row">
            <div class="backbtn">
                <a href="../../master" class="waves-effect waves-light btn"  style="background-color: #144229; color: #FFFFFF; border-radius: 5px; margin-top: -6px;">Regresar</a>
            </div>
        </div>
        <div class="row ">
            <div class="col s12 marginThen">
                 <table id="factDetalle" class="tableDatos table hover cell-border display " cellspacing="1" cellpadding="2">
                     <thead>
                        <tr>
                            <td>#</td>
                            <td>CANTIDAD</td>
                            <td>CÓDIGO DE PRODUCTO</td>
                            <td>DESCRIPCIÓN</td>
                            <td>PUNTOS</td>
                            <?php if ($this->session->userdata("Acceso") == 1 || $this->session->userdata("Acceso") == 2){?>
                            <td></td>
                              <?php }?> 
                        </tr>
                     </thead>
                     <tbody>                     
                         <?php 
                          if (!($ClFactDetalle)) {                                                                
                            } else {
                            $i=1;
                            foreach ($ClFactDetalle-> result() as $Facts) { 
                                $Total[]=$Facts->itmPts;?>
                            <tr>
                                <td><?php echo $i++?></td>
                                <td><?php echo $Facts->itmCnt ?></td>                                     
                                <td><?php echo $Facts->itmProduc ?></td>                                     
                                <td><?php echo $Facts->itmDscripcion ?></td>                                     
                                <td><?php echo $Facts->itmPts ?></td>
                                <td>  
                                <?php if ($this->session->userdata("Acceso") == 1 || $this->session->userdata("Acceso") == 2){?>                                  
                                    <a class="btn-floating red modal-trigger" href="#modal1" onclick="AnularParcial(<?php echo $Facts->itmk ?>)"><i class="material-icons">close</i></a>
                                    <!--<a class="btn-floating red"><i class="material-icons">close</i></a>-->
                                     <?php }?> 
                                </td>
                            </tr>                               
                        <?php }}?>                         
                     </tbody>
                 </table>
            </div>            
        </div>
        <div class="row">
            <div class="col m12 col s12">
                <div class="col m4">
                    <img src="<?php echo base_url();?>assets/img/Untitled-1-02.png" class="background" />
                </div>
                <div class="col m4" style="display:none">
                    <div class="cuadross cuadro3">
                        VIÑETA APLICADA<br><span>00/00/0000</span>
                    </div>
                </div>
                <div class="col m4">
                    <div class="cuadross cuadro4">
                        Pts POR ESTA COMPRA<br><span><?php echo array_sum($Total);?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4></h4>
        Transacción: <span id="IdNFac">00000</span>
        <p>Ingrese la razon por la cual esta linea sera eliminada</p>
         <textarea id="IdWhy" class="materialize-textarea"></textarea>
        <p>
        <div style="display: none" id="Errowhay">
            <span class="red-text text-darken-2">Campo Requerido!</span>
        </div>
        </p>
    </div>
    <div class="modal-footer">
        <a href="#" class=" modal-action modal-close waves-effect waves-green btn-flat" id="BtnAnularParcial">Proceder...</a>
    </div>
</div>

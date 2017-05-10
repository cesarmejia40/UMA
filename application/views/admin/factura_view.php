<div class="col m9 col s12" id="ContenidoCentral">
    <div class="brown lighten-5 caja">
        <div class="row">
            <div class="backbtn">
             <a  href="../../master" class="waves-effect waves-light btn" style="background-color: #144229; color: #FFFFFF; border-radius: 5px; margin-top: -6px;">REGRESAR</a>
            </div>
        </div>
        <div class="row ">
            <div class="col s12 marginThen">
                 <table id="tableFact" class="tableDatos table hover cell-border display " cellspacing="1" cellpadding="2">
                     <thead>
                        <tr>
                            <td>FACTURA</td>
                            <td>PTS</td>
                            <td>FECHA</td>
                               <?php if ($this->session->userdata("Acceso") == 1 || $this->session->userdata("Acceso") == 2){ ?>
                            <td></td>
                            <?php }?>
                        </tr>
                     </thead>
                     <tbody>                         
                        <?php 
                            if (!($ClFact)) {                                                                
                            } else {
                            foreach ($ClFact-> result() as $Facts) { ?>
                            <tr>
                                <td>
                                    <a href="../detalle/<?php echo $Facts->itmFact ?>"><?php echo $Facts->itmFact ?></a>                                     
                                </td> 
                                <td><?php echo $Facts->itmPts ?></td>                                     
                                <td><?php echo $Facts->itmDate ?></td>                                     
                                 
                                     <?php if ($this->session->userdata("Acceso") == 1 || $this->session->userdata("Acceso") == 2){ ?>
                                      <td><a class="btn-floating red modal-trigger" href="#modal1" onclick="AnularFull('<?php echo $Facts->itmFact ?>')"><i class="material-icons">close</i></a></td>
                                    <?php }?>
                                    <!--<a class="btn-floating red"><i class="material-icons">close</i></a>-->
                                
                            </tr>                               
                        <?php }}?>
                     </tbody>
                 </table>
            </div>
        </div>
        <div class="row">
            <img src="<?php echo base_url();?>assets/img/Untitled-1-02.png" class="background" />
        </div>
    </div>
</div>
<div id="modal1" class="modal">
    <div class="modal-content">
        <h4></h4>
        <p>Ingrese la razon por la cual esta factura #<span id="factWT">00000</span> sera eliminada</p>
         <textarea id="IdWhy" class="materialize-textarea"></textarea>
        <p>
           <div style="display: none" id="Errowhay">
                <span class="red-text text-darken-2">Campo Requerido!</span>
            </div>
        </p>


    </div>



    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" id="BtnAnularFact">Proceder...</a>
    </div>
</div>

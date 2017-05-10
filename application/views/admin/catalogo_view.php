
<div class="row" style="padding-left: 25px; padding-right: 25px; width=90%;">
<div class="col m12" >
<div class="col m12" >
<div class="card blue-grey darken-1">
<div class="brown lighten-5 caja">
<div class="row">
    <div  style="margin: 0 auto; width:90%; padding: 10px 10px;">
        <b>CATÁLOGO</b><br>
        <span class="subtitulo">ARTICULOS QUE VISUALIZA LOS CLIENTES</span>
    </div>
    <div class="" style="margin: 0 auto; width:90%; padding: 0px 5px; background-color:#b9dcbb;">
        <div class="" style="width:90%; padding: 20px 5px; margin: 0 auto; ">
            <div class="collection" style="border: 1px solid #b9dcbb;">
            <?php
            $attributes = array('method' => 'post', 'id' => 'FrmPremio','enctype'=>'multipart/form-data');

            echo form_open('catalogo/saveproduct', $attributes);
            ?> 
            <div class="col m4 coleccion">
                <div class="collection" style="border: 2px solid #b9dcbb; text-align:center;">                                        
                    <div id="image-holder">
                        <img src="<?php echo base_url(); ?>assets/img/cat/img_noDisponible.jpg" width="80%">
                    </div>                                  
                </div>
                <div class="col m12 col s12 btns">  
                    <div class="file-field input-field">
                        <div class="btn green darken-3 waves-effect waves-light">
                            <span>Cargar</span>                                                
                            <input id="fileUpload" name="userfile" type="file" />
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" >
                        </div>
                    </div><br>
                    <span class="form-help red-text text-darken-2"><span class="ast" ></span><?php echo form_error('upload'); ?></span>
                </div>
            </div>
            <div class="col m8">
                <div class="col m12 col s12 tituloC" >
                    <b>INGRESO DE ARTICULO</b><br>
                    <span class="subtitulo">INGRESO Y ACTUZALIZA LOS ARTICULOS</span>
                </div>

                <div class="row" >
                    <div class="input-field col m12" style="top:10px">
                        <input name="txtcod" type="text" class="validate" value="<?php echo set_value('txtcod'); ?>">
                        <label for="pass">COD. ARTICULO <span class="ast">*</span></label>
                        <span class="form-help"><span class="ast"></span>Ingrese el Codigo del Producto.</span>
                        <span class="form-help red-text text-darken-2"><span class="ast" ></span><?php echo form_error('txtcod'); ?></span>
                    </div>
                    <div class="input-field col m12" style="top:10px">
                        <input name="txtName" type="text" class="validate" value="<?php echo set_value('txtName'); ?>">
                        <label for="pass">NOMBRE DEL ARTICULO <span class="ast">*</span></label>
                        <span class="form-help"><span class="ast"></span>Ingrese el nombre, Código del articulo</span>
                        <span class="form-help red-text text-darken-2"><span class="ast" ></span><?php echo form_error('txtName'); ?></span>
                    </div>
                    <div class="input-field col m12" style="top:10px">
                        <input name="txtPts" id="idtxtPts" type="text" class="validate" value="<?php echo set_value('txtPts'); ?>">
                        <label for="pass">PUNTOS <span class="ast">*</span></label>
                        <span class="form-help"><span class="ast"></span>La cantidad de puntos.</span>
                        <span class="form-help red-text text-darken-2"><span class="ast" ></span><?php echo form_error('txtPts'); ?></span>
                    </div><br>
                    <div class="col m12 tituloC" align="right"  >
                        <input type="submit" class="btn green darken-3" value="Guardar" />
                    </div>
                </div>
            </div>
            </div>
        </div>

        </div>
    </div>

<div class="row">
    <div class="div-max-1">
        <div class="div-max-2">
            <div class="div-max-3">
                <b>ARTICULOS INGRESADOS</b><br>                                        
            </div>
            <div class="collection collection-2">
            <div class="div-cont-1">
                <div class="div-cont-2">
                <table border="1" id="table-view-cat-1">
                    <thead>
                        <tr>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                if (!($mtct)) {                                                                
                } else {
                foreach ($mtct-> result() as $Cls ) { ?>                                                    
                <tr class="border_bottom">
                    <td>
                        <div>
                            <div align="right"><a href="catalogo/EliminarProduct/<?php echo  $Cls->tctId?>" ><i class="Small material-icons botton-view-2">close</i></a></div>
                                <div>
                                    <a href="catalogo/EditarProduct/<?php echo  $Cls->tctId?>" >
                                    <img src="<?php echo base_url().'./uploads/'.$Cls->tctUrlimg.'';?>" width="150" height="150"></a>
                                </div>
                                <div>
                                    <span class="TituloProduc"><?php echo $Cls->tctNombreProd?></span>
                                    <br>
                                       COD. PRODC: <?php echo $Cls->tctCodigo?>
                                    <br>
                                    <span class="TituloPts"><?php echo $Cls->tctPuntos?> Pts.</span>                                                                 
                                </div>
                        </div>
                        </td>                                                                    
                        </tr>
                <?php }}?>
                    </tbody>
                </table>
                </div>
                <div class="div-cont-2">
                <table border="1" id="table-view-cat-2">
                    <thead>
                        <tr>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                if (!($mtct)) {                                                                
                } else {
                foreach ($mtct-> result() as $Cls ) { ?>                                                    
                <tr class="border_bottom">
                    <td>
                        <div>
                            <div align="right"><a href="catalogo/EliminarProduct/<?php echo  $Cls->tctId?>" ><i class="Small material-icons botton-view-2">close</i></a></div>
                                <div>
                                    <a href="catalogo/EditarProduct/<?php echo  $Cls->tctId?>" >
                                    <img src="<?php echo base_url().'./uploads/'.$Cls->tctUrlimg.'';?>" width="150" height="150"></a>
                                </div>
                                <div>
                                    <span class="TituloProduc"><?php echo $Cls->tctNombreProd?></span>
                                    <br>
                                       COD. PRODC: <?php echo $Cls->tctCodigo?>
                                    <br>
                                    <span class="TituloPts"><?php echo $Cls->tctPuntos?> Pts.</span>                                                                 
                                </div>
                        </div>
                        </td>                                                                    
                        </tr>
                <?php }}?>
                    </tbody>
                </table>
                </div>
                <div class="div-cont-2">
                <table border="1" id="table-view-cat-3">
                    <thead>
                        <tr>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                if (!($mtct)) {                                                                
                } else {
                foreach ($mtct-> result() as $Cls ) { ?>                                                    
                <tr class="border_bottom">
                    <td>
                        <div>
                            <div align="right"><a href="catalogo/EliminarProduct/<?php echo  $Cls->tctId?>" ><i class="Small material-icons botton-view-2">close</i></a></div>
                                <div>
                                    <a href="catalogo/EditarProduct/<?php echo  $Cls->tctId?>" >
                                    <img src="<?php echo base_url().'./uploads/'.$Cls->tctUrlimg.'';?>" width="150" height="150"></a>
                                </div>
                                <div>
                                    <span class="TituloProduc"><?php echo $Cls->tctNombreProd?></span>
                                    <br>
                                       COD. PRODC: <?php echo $Cls->tctCodigo?>
                                    <br>
                                    <span class="TituloPts"><?php echo $Cls->tctPuntos?> Pts.</span>                                                                 
                                </div>
                        </div>
                        </td>                                                                    
                        </tr>
                <?php }}?>
                    </tbody>
                </table>
                </div>
            </div>

        </div>
    </div>

    </div>
    </div>
</div>
</div>
</div>


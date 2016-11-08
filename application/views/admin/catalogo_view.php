
<div class="row" style="padding-left: 25px; padding-right: 25px;">
    <div class="col m12" >
        <div class="card blue-grey darken-1">
            <div class="brown lighten-5 caja">
                <div class="row">
                    <div class="col m12 col s12 tituloC">
                        <b>CATÁLOGO</b><br>
                        <span class="subtitulo">ARTICULOS QUE VISUALIZA LOS CLIENTES</span>
                    </div>
                    <div class="row" style="padding-left:10px;">
                        <div class="col m6 coleccion">
                            <div class="collection" style="border: 1px solid #b9dcbb;">
                                <?php
                                $attributes = array('method' => 'post', 'id' => 'FrmPremio','enctype'=>'multipart/form-data');

                                echo form_open('catalogo/saveproduct', $attributes);
                                ?>

                                <div class="col m4 coleccion">
                                    <div class="collection" style="border: 2px solid #b9dcbb; text-align:center;">                                        
                                        <div id="image-holder">
                                            <img src="<?php echo base_url(); ?>assets/img/cat/img_noDisponible.jpg" width="250px">   
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
                                    </form>   
                                </div>                                    
                            </div>

                        </div>  
             
                        <div class="col m6 coleccion">
                            <div class="collection" style="border: 1px solid #b9dcbb;">
                                
                                <div class="col m10">                                    
                                    <div class="col m12 col s12 tituloC" >
                                        <b>ARTICULOS INGRESADOS</b><br>
                                        
                                    </div>
                                        <table id="tableCatalogo" class="table " cellspacing="0" cellpadding="0">
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
                                                        <div style="text-align: left;width: 450px;margin: auto;"  >
                                                        <div align="right"><a href="catalogo/EliminarProduct/<?php echo  $Cls->tctId?>" ><i class="Small material-icons ">close</i></a></div>
                                                            <div style="width: 90px;float:left; border: 0px solid #b9dcbb;">
                                                               <a href="catalogo/EditarProduct/<?php echo  $Cls->tctId?>" >
                                                                   <img src="<?php echo base_url().'./uploads/'.$Cls->tctUrlimg.'';?>" width="140" height="140"></a>
                                                            </div>
                                                            <div style="margin-left:150px;border: 0px solid #b9dcbb;">
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


<?php
    
    foreach ($GetProduct -> result() as $key) 
    {
        $id = $key->tctId;
        $img = $key->tctUrlimg;
        $Frmcod = $key->tctCodigo;
        $FrmName = $key->tctNombreProd;
        $FrmPts = $key->tctPuntos;

        
    }
?>
<div class="row" style="padding-left: 25px; padding-right: 25px;">
    <div class="col m12" >
        <div class="card blue-grey darken-1">
            <div class="brown lighten-5 caja">
                <div class="row">
                    <div class="col m12 col s12 tituloC">
                        <b>CATÁLOGO</b><br>
                        <span class="subtitulo">ACTUALIZACION DE ARTICULO</span>
                    </div>
                    <div class="row" style="padding-left:10px;">
                        <div class="col m12 coleccion">
                            <div class="collection" style="border: 1px solid #b9dcbb;">
                                <form action="<?php echo base_url()?>index.php/catalogo/actualizarproduct/<?php echo $id?>" method="post" id="FrmPremio" enctype="multipart/form-data">
                                <div class="col m3 coleccion">
                                    <div class="collection" style="border: 2px solid #b9dcbb; text-align:center;">                                        
                                        <div id="image-holder">
                                            <img src="<?php echo base_url().'./uploads/'. $img.'';?>" width="320" height="320">
                                        </div>                                         
                                    </div>                                    
                                    <div class="col m10 col s12 btns">                                                                             
                                        <div class="file-field input-field">
                                          <div class="btn green darken-3 waves-effect waves-light">
                                            <span>Cargar</span>                                                
                                             <input id="fileUpload" name="userfile" type="file" value="" />
                                          </div>
                                          <div class="file-path-wrapper">
                                            <input class="file-path validate" name="ImgUpdate" type="text" value="<?php echo  $img?>">
                                          </div>
                                        </div>                    
                                    </div>
                                </div>
                                <div class="col m8">                                    
                                    <div class="col m12 col s12 tituloC" >
                                        <b>INGRESO DE ARTICULO</b><br>
                                        <span class="subtitulo">INGRESO Y ACTUZALIZA LOS ARTICULOS</span>
                                    </div>

                                    <div class="row" >
                                        <div class="input-field col m12" style="top:10px">
                                            <input name="txtcod" type="text" class="validate" value="<?php echo $Frmcod?>">
                                            <label for="pass">COD. ARTICULO <span class="ast">*</span></label>
                                            <span class="form-help"><span class="ast"></span>Ingrese el Codigo del Producto.</span>                                            
                                        </div>
                                        <div class="input-field col m12" style="top:10px">
                                            <input name="txtName" type="text" class="validate" value="<?php echo $FrmName?>">
                                            <label for="pass">NOMBRE DEL ARTICULO <span class="ast">*</span></label>
                                           <span class="form-help"><span class="ast"></span>Ingrese el nombre, Código del articulo</span>
                                        </div>
                                        <div class="input-field col m12" style="top:10px">
                                            <input name="txtPts" id="idtxtPts" type="text" class="validate" value="<?php echo $FrmPts?>">
                                            <label for="pass">PUNTOS <span class="ast">*</span></label>
                                            <span class="form-help"><span class="ast"></span>La cantidad de puntos.</span>
                                        </div><br>
                                        <div class="col m12 tituloC" align="right"  >
                                            <input type="submit" class="btn green darken-3" value="Actualizar" />
                                            <a href="<?php echo base_url('index.php/catalogo')?>" class="btn  red accent-4 waves-effect waves-light">CANCELAR</a>
                                        </div>
                                    </div>
                                    </form>   
                                </div>                                    
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


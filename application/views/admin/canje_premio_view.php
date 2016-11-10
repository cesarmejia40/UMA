<div class="row" style="padding-left: 25px; padding-right: 25px;">
    <div class="col m12" >
        <div class="card blue-grey darken-1">
            <div class="brown lighten-5 caja">
                <div class="row">
                    <div class="">
                        <div class="col m10 tituloC">
                            <b>CANJE DE PREMIO</b><br>
                            <span class="subtitulo">ESTOS CAMPOS SON PARA EL CANJE DEL ARTÍCULO O PREMIO</span>
                        </div>
                        <div class="col m2 tituloC" style=" text-align: right;">
                            <a href="canje" class="waves-effect waves-light btn" style="background-color: #144229; color: #FFFFFF; border-radius: 5px; margin-top: -6px;">REGRESAR</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="">
                            <?php
                            $attributes = array('class' => 'form form-validate floating-label', 'id' => 'formPremios' );
                            echo form_open('', $attributes)
                            ?>
                        <div class="col m12">
                            <div class="input-field col m6">
                               <input id="frp" name="frp" type="text" class="validate" maxlength="5" required>
                               <label for="frp"># FRP</label>
                               <span class="form-help"><span class="ast">*</span> Escriba y seleccione el cliente participante de la promoción.</span>
                            </div>
                            <div class="input-field col m6">
                                <input id="vendedor" name="vendedor" type="text" class="validate" required>
                                <label for="vendedor">VENDEDOR</label>
                                <span class="form-help"><span class="ast">*</span> Escriba el nombre del vendedor.</span>
                            </div>
                        </div>
                        <div class="col m12">
                            <div class="input-field col m6"  style="margin-top: 25px;">
                                <select id="articulosSelect" data-placeholder="..." class="browser-default chosen-select"  name="name" style="width:350px;" >
                                    <option value="" disabled selected></option>
                                    <?php foreach($articulos as $key): ?>
                                        <option value="<?php echo $key['tctCodigo'] ?>"><?php echo $key['tctCodigo'] ?>  |  <?php echo $key['tctNombreProd'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <span class="form-help" style="margin-top: 10px;"><span class="ast">*</span>Seleccione según puntos acumulados.</span>
                             </div>
                            <div class="input-field col m5" id="justlabel">
                                <input id="cant" name="cant" type="text" class="validate" required>
                                <label for="cant">CANTIDAD</label>
                                <span class="form-help"><span class="ast">*</span> Indique la cantidad de artículos o premios a canjear</span>
                            </div>

                            <div class="col m1" id="add">
                                <a href="#!" id="addRow" class="btn green darken-3 add waves-effect waves-light"><i class="material-icons">add</i></a>
                             </div>
                         </div>
                          <?= form_close(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <table id="tableCanjePremio" class="tableDatos table hover cell-border display" cellspacing="1" cellpadding="2">
                            <thead>
                            <tr>
                                <td>ARTÍCULO O PREMIO</td>
                                <td>CÓDIGO</td>
                                <td>PUNTOS</td>
                                <td>CANTIDAD</td>
                                <td>PUNTOS TOTAL</td>
                                <td>OPCIÓN</td>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" id="lineaPuntos">
                    <div class="col m12">
                        <div class="col m4">
                            <div class="cuadroCanje">
                                PUNTOS &emsp; &emsp;&emsp;  <br>REQUERIDOS
                                &emsp; <span class="texto2" id="requeridos">  0</span>
                            </div>
                        </div>
                        <div class="col m4">
                            <div class="cuadroCanje">
                                PUNTOS &emsp;&emsp;&emsp; <br> FALTANTES
                                &emsp;<span class="texto2" id="faltantes"> 0</span>
                            </div>
                        </div>
                        <div class="col m4">
                            <div class="cuadroCanje">
                                PUNTOS&emsp;&emsp;&emsp;<br> APLICADOS
                                &emsp;<span class="texto2" id="aplicados"> 0</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col m12 tituloC">
                        <b>CLIENTES</b>
                    </div>
                        <div class="input-field col m6" id="selectCliente">
                            <select data-placeholder="..." class="browser-default chosen-select" id="clienteSelect" style="width:350px;" tabindex="2">
                                <option value=""></option>
                        </select>
                        <span class="form-help" style="margin-top: 10px;"><span class="ast">*</span> Seleccione el cliente.</span>
                    </div>
                </div>
            <div class="row">
                <div class="col s12">
                        <table id="tableBoucher" class="tableDatos table hover cell-border display" cellspacing="1" cellpadding="2">
                            <thead>
                            <tr>
                                <td>FECHA</td>
                                <td>N° BOCUHER</td>
                                <td>PUNTOS</td>
                                <td>PUNTOS APLICADOS</td>
                                <td>PUNTOS DISPONIBLES</td>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col m12">
                        <div class="col m4">
                            <div class="cuadroCanje">
                             PUNTOS &emsp; &emsp; &emsp;   <br>DISPONIBLES
                                &emsp; <span class="texto2" id="disponibles"> 0</span>
                            </div>
                        </div>
                        <div class="col m8 col s12 btns">
                            <a href="#!" class="btn green darken-3 waves-effect waves-light" id="savefrp">ACEPTAR</a>
                            <a href="#!" class="btn  red accent-4 waves-effect waves-light" id="calcelfrp">CANCELAR</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

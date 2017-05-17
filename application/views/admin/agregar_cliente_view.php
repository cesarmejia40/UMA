<div class="row" style="padding-left: 25px; padding-right: 25px;">
    <div class="col m12" >
        <div class="card blue-grey darken-1">
            <div class="brown lighten-5 caja">
                <div class="row">
                    <div class="">
                        <div class="col m10 tituloC">
                            <b>AGREGAR CLIENTE</b><br>
                            <span class="subtitulo">ESTOS CAMPOS SON PARA SELECCIONAR Y PARTICIPAR EN EL SISTEMA DE PUNTOS</span>
                        </div>
                        <div class="col m2 tituloC" style=" text-align: right;">
                            <a href="<?php echo base_url();?>index.php/usuarios" class="waves-effect waves-light btn" style="background-color: #144229; color: #FFFFFF; border-radius: 5px;">REGRESAR</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <?php
                        $attributes = array('class' => 'form form-validate floating-label', 'id' => 'formClientes' );
                        echo form_open('save_cliente', $attributes)
                        ?>
                        <div class="row">
                            <div class="input-field col m6">
                                <div class="error">
                                    <?php echo form_error('user'); ?>
                                </div>
                                <input id="user" name="user" type="text" class="validate" value="<?php echo set_value('user'); ?>">
                                <label for="user">USUARIO</label>
                                <span class="form-help"><span class="ast">*</span> Usuario que se identificará al accesar al sistema de puntos.</span>
                            </div>
                            <div class="input-field col m6">
                                <div class="error">
                                    <?php echo form_error('pass'); ?>
                                </div>
                                <input id="pass" name="pass" type="text" class="validate" value="<?php echo set_value('pass'); ?>">
                                <label for="pass">CONTRASEÑA</label>
                                <span class="form-help"><span class="ast">*</span> Contraseña para accesar al sistema.</span>
                            </div>
                            <div class="input-field col m6">
                                <div class="error">
                                    <?php echo form_error('privilegio'); ?>
                                </div>
                                    <select id="privilegio" name="privilegio" class="validate">
                                        <option value="" disabled selected></option>
                                        <option value="0">Cliente</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Visor</option>
                                        <option value="4" id="vendedor">Vendedor</option>
                                    </select>
                                <label for="privilegio">ROL</label>
                                <span class="form-help"><span class="ast">*</span>Seleccione el privelegio del usuario.</span>
                            </div>

                            <!-- Drop Down vendedores -->
                            <div class="input-field col s6 pull left" style="display: none;" id="Vendedor">
                                <div class="error">
                                </div>
                                    <select id="Vend" name="vendedor" class="validate">
                                        <option value="" disabled selected></option>
                                        <?php 
                                        $i = 0;
                                            foreach($query as $key)
                                            {
                                                echo '<option value="'.$query[$i]['ID'].'" >'.$query[$i]['NOMBRE'].'</option>';
                                                $i++;
                                            }

                                         ?>
                                    </select>
                                <label for="Vend">VENDEDORES</label>
                                <span class="form-help"><span class="ast">*</span>Seleccione un vendedor.</span>
                            </div>
                         <!-- Drop Down vendedores -->
                            <input type="hidden" name="nomvendedor" id="nomb">
                            <div class="input-field col m6">
                                <p class="cbActivo">
                                    <input type="checkbox" id="activo" name="activo"  />
                                    <label for="activo">Activo</label>
                                </p>
                            </div>
                        </div>
                        <div class="col m12 btns">
                          <!--  <a href="save_cliente" class="btn green darken-3 add waves-effect waves-light">GUARDAR</a>-->
                            <input type="submit" class="btn green darken-3 add waves-effect waves-light" name="submit" value="GUARDAR" />
                            <a href="#" id="btnUsuerCancel" class="btn  red accent-4 add waves-effect waves-light">CANCELAR</a>
                        </div>
                        <?= form_close(); ?>
                </div>
                <div class="row" style="margin-top: 20px;">
                    <img src="<?php echo base_url();?>assets/img/Untitled-1-02.png" class="background" />
                </div>
            </div>
        </div>
    </div>
</div>
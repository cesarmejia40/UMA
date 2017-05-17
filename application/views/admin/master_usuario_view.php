<div class="row">
    <div class="col s12">
        <div class="card blue-grey darken-1">
            <div class="brown lighten-5 caja">
                <div class="row">
                    <div class="col m10 tituloC">
                        <b>USUARIOS</b>
                    </div>
                    <div class="col m2 tituloC" style=" text-align: right;">
                        <a href="<?php echo base_url();?>index.php/agregar_cliente" class="waves-effect waves-light btn" style="background-color: #144229; color: #FFFFFF; border-radius: 5px; margin-top: -6px;">AGREGAR CLIENTE</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <table id="tableUsuarios" class="tableDatos table hover cell-border display" cellspacing="1" cellpadding="2">
                            <thead>
                            <tr>
                                <td>N°</td>
                                <td>USUARIO</td>
                                <td>NOMBRE USUARIO</td>
                                <td>FECHA DE CREACIÓN</td>
                                   <?php if ($this->session->userdata("Acceso") == 1 || $this->session->userdata("Acceso") == 2){ ?>
                                <td>OPCIÓN</td>
                                    <?php }?>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($clientes as $key): ?>
                                 <tr>
                                     <td>000<?php echo $key['SlpCode'];?></td>
                                     <td><?php echo $key['SlpName'];?></td>
                                     <td><?php echo $key['SlpCodCliente'];?></td>
                                     <td><?php echo $key['Fecha_Creacion'];?></td>
                                     <?php if ($this->session->userdata("Acceso") == 1 || $this->session->userdata("Acceso") == 2){ ?>
                                     <td><a href="<?php echo base_url();?>index.php/eliminar_cliente/<?php echo $key['SlpCode'];?>" class="opc red accent-4">ELIMNAR</a></td>
                                    <?php }?>
                                 </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
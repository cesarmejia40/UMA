<div class="row">
    <div class="container">
        <?php  foreach($frp as $key): ?>
            <div class="col m10">
                <h4>Formato de remisión de Puntos # <?php echo $key['frpCode']?></h4>
            </div>
            <div class="col m2 tituloC oculto" style=" text-align: right;">
                <a href="<?php echo base_url();?>index.php/canje" class="waves-effect waves-light btn" style="background-color: #144229; color: #FFFFFF; border-radius: 5px; margin-top: -6px;">REGRESAR</a>
            </div>
            <div class="col m12">
                <h5>Formato creado el <?php echo $key['frpFecha']?></h5>
            </div>
        <?php endforeach ?>
    <div class="col m12">
            <h5>Código Cliente: <?php echo $key['frpCliente']?></h5>
            <h5>Nombre Cliente: <?php echo $key['SlpCodCliente']?></h5>
        </div>
    </div>
</div>

   <div class="row">
        <div class="container">
            <div class="col m12">
                <h5> Descripción de Productos Cambiados</h5><br>
            </div>
            <div class="col m12">
                <table id="showProd" class="tableDatos table hover cell-border display" cellspacing="2" cellpadding="2">
                    <thead>
                    <tr>
                        <td>Descripción</td>
                        <td>Puntos</td>
                        <td>Cantidad</td>
                        <td>Total Puntos</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($frpProd as $key): ?>
                    <tr>
                        <td><?php echo $key['tctNombreProd'] ?></td>
                        <td><?php echo $key['HistPts'] ?></td>
                        <td><?php echo $key['Cant'] ?></td>
                        <td><?php echo ($key['Cant'] * $key['HistPts'] ) ?></td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="col m12">
                <h5> Puntos Aplicadas a este Cambio</h5><br>
            </div>
            <div class="col m12">
                <table id="showPts" class="tableDatos table hover cell-border display" cellspacing="2" cellpadding="2">
                    <thead>
                    <tr>
                        <td>Boucher</td>
                        <td>Puntos Aplicados</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $cont=0; foreach($frpline as $key): ?>
                    <tr>
                        <td><?php echo $key['codBoucher'] ?></td>
                        <td><?php echo $key['total'] ?></td>
                    </tr>
                    <?php $cont= $cont + $key['total']; endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container">
            <div class="col m10">
                <h4>Puntos Aplicados: <span style="color: red;"><?php echo $cont ?></span> </h4>
            </div>
            <div class="col m2 oculto" style="text-align: right; color: #144229;">
                <a onclick="Imprimir()" style="color:#144229; cursor: pointer;"><i class="medium material-icons">print</i></a>
            </div>
        </div>
    </div>
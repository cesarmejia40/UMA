<div class="row">
    <div class="col s12">
        <div class="card blue-grey darken-1">
            <div class="brown lighten-5 caja">
                <div class="row">
                    <div class="col m10 tituloC">
                        <b>CANJE DE PUNTOS</b>
                    </div>
                    <div class="col m2 tituloC" style=" text-align: right;">
                        <a href="canje_premio" class="waves-effect waves-light btn" style="background-color: #144229; color: #FFFFFF; border-radius: 5px; margin-top: -6px;">CANJE PREMIO</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <table id="TableCanje" class="tableDatos table hover cell-border display" cellspacing="1" cellpadding="2">
                            <thead>
                            <tr>
                                <td># FRP</td>
                                <td>FECHA</td>
                                <td>N° CLIENTE</td>
                                <td>CLIENTE</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!($frp)) { }
                            else foreach($frp as $key): ?>
                                 <tr>
                                     <td><a href="viewFrp/<?php echo $key['frpCode'] ?>" >0000<?php echo $key['frpCode'] ?></a></td>
                                     <td><?php echo $key['frpFecha'] ?></td>
                                     <td><?php echo $key['frpCliente'] ?></td>
                                     <td><?php echo $key['SlpCodCliente'] ?></td>
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
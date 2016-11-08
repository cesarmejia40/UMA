<div class="col m9 col s12" id="ContenidoCentral">
    <div class="brown lighten-5 cuenta">
        <div class="row">
            <div class="col m4 col s12">
                <b class="flow-text ">DETALLE DE FACTURA</b>
            </div>
            <div class="col m8 col s12 lineHorizontal">
                <div class="col m3 lineVertical">FACTURA #<span style="color: #3e984c;"> <?php echo $txtFactura?></span> </div>
                <div class="col m3 lineVertical">CÓDIGO <span style="color: #3e984c;"> <?php echo $txtCliente?></span></div>
                <div class="col m6">FECHA EMITIDA <span style="color: #3e984c;"><br><?php echo $txtFecha?></span></div>
            </div>
        </div>
        <div class="row ">
            <div class="col s12" style="margin-top: 10px;">
                <table id="TableCuenta" class="tableDatos table hover cell-border display " cellspacing="1" cellpadding="2">
                    <thead>
                    <tr>
                        <td>CANTIDAD</td>
                        <td>COD. PRODUCTO</td>
                        <td>DESCRIPCIÓN</td>
                        <td>PUNTOS</td>
                    </tr>
                    </thead>
                    <tbody>
                     <?php if ((!$uidetalle)) {
                        $FechaFact='00/00/0000';
                        $total[]=0;
                    ?>
                        
                    <?php } else {
                        foreach($uidetalle as $key): ?>
                        <tr>
                            <td><?php echo $key['itmCnt'];?></td>
                            <td><?php echo $key['itmProduc'];?></td>
                            <td><?php echo $key['itmDscripcion'];?></td>
                            <td><?php echo $key['itmRemainder']; $total[]=$key['itmRemainder'];?></td>
                        </tr>
                    <?php endforeach; 
                        $FechaFact=$key['itmDate'];
                        
                    }?>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" >
            <div class="col m4 col s12">
                    <a href="../bouchers" class="waves-effect waves-light btn">REGRESAR</a>
            </div>
            <div class="col m8 col s12">
                <!-- <div class="col m4 cuadro1">VIÑETA APLICADA <span style="font-size: 20px;">02/11/2015</span> </div>-->
                <div class="col m3 cuadro2">Ptos POR ESTA COMPRA <br><span style="font-size: 20px;"><?php echo array_sum($total)?></span></div>
            </div>
        </div>
    </div>
</div>
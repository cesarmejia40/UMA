<div class="col m9 col s12" id="ContenidoCentral">
    <div class="brown lighten-5 lineas" align="left">        
       <p> MIS FACTURAS QUE CONTIENEN PUNTOS</p>
    </div><br>   
    <div class="brown lighten-5 cuenta">
        <div class="row">
            <div class="col s12" style="margin-top: 10px;">
                <table id="TableCuenta" class="tableDatos table hover cell-border display " cellspacing="1" cellpadding="2">
                    <thead>
                        <tr>
                            <td>FACTURA</td>
                            <td>FECHA</td>
                            <td>PUNTOS</td>
                            <td>ESTADO</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (!($listafacturas)) {
                    } else {
                        foreach ($listafacturas-> result() as $Fact) {
                             echo '
                                 <tr>
                                    <td><a href="factura/'.$Fact->itmFact.'">'.$Fact->itmFact.'</a></td>
                                     <td>'.$Fact->itmDate.'</td>
                                     <td>'.$Fact->itmPts.'</td>
                                     <td>'.$this->estados->FacturasEstados($Fact->ItmStus).'</td>
                                 </tr>
                             ';
                        }
                    }
                    ?>

                    </tbody>
                </table>
            </div>
            </div>
        </div>
</div>
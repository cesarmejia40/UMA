<div class="row" style="padding-left: 25px; padding-right: 25px;">
    <div class="col m12" ><div class="progress" id="LoadDiv" style="margin: 0.5rem 1px -0.5rem 0;display:none"><div class="indeterminate"></div></div>
        <div class="card blue-grey darken-1">

            <div class="brown lighten-5 caja">                 
                <div class="row">
                    <div class="col m12 col s12 tituloC">
                        <b>REPORTES</b><br>
                        <span class="subtitulo"></span>
                    </div>
                    <div class="row" style="padding-left:10px;">
                        <div class="col m3 coleccion">
                            <div class="container">
                                <div class="collection" id="menuReport" style="border: 1px solid #b9dcbb;">
                                    
                                    <a href="#!" id="clientesReport" class="collection-item green " style=" border-bottom: 5px solid #b9dcbb;">ESTADO CUENTA CLIENTES</a>
                                    <a href="#!" id="pxcReport" class="collection-item green " style=" border-bottom: 5px solid #b9dcbb;">MOV. CLIENTES</a>
                                    <a href="#!" id="mdpFactura" class="collection-item green" style=" border-bottom: 5px solid #b9dcbb;">CLIENTES PUNTOS</a>
                                    
                                    <!--<a href="#!" id="frpReport" class="collection-item  green" style=" border-bottom: 5px solid #b9dcbb;">FRP</a>-->
                                    <a href="#!" id="mdpReport" class="collection-item green" style=" border-bottom: 5px solid #b9dcbb;">PUNTOS POR PRODUCTOS</a>
                                    

                                    <!--*************************************** REPORTES JUDITH!! ******************************************************-->
                                    <a href="#!" id="mdpPuntos" class="collection-item green" style=" border-bottom: 5px solid #b9dcbb;">MOV.PRODUCTOS</a>
                                    <!--<a href="#!" id="mdpPuntoCliente" class="collection-item green" style=" border-bottom: 5px solid #b9dcbb;">CLIENTES PUNTOS</a>-->
                                    
                                    <!--
                                    <a href="#!" id="mdpFactAnulada" class="collection-item green" style=" border-bottom: 5px solid #b9dcbb;">FACTURAS ANULADAS </a>-->
                                    <!--***************************************FIN REPORTES JUDITH!! ***************************************************-->
                                    <a href="mdpEdoCta" id="mdpEdoCta" class="collection-item green" style=" border-bottom: 5px solid #b9dcbb;">EDO.CTA.X.CTE</a>
                                </div>
                            </div>
                        </div>
                        <div class="col m8">
                            <div class="container  floating-label">
                                <div class="input-field col m12">
                                    <input type="text" id="date1" class="datepicker1">
                                    <label for="date">DESDE</label>
                                    <span class="form-help"><span class="ast">*</span> Seleccione la fecha de inicio</span>
                                    <span class="form-help red-text text-darken-2" id="CmptxtD1" style="display:none">
                                        <span class="ast"></span>
                                        <p>Requerido.</p>
                                    </span>
                                </div>
                                <div class="input-field col m11">
                                    <input type="text" id="date2" class="datepicker2">
                                    <label for="date2">HASTA</label>
                                    <span class="form-help"><span class="ast">*</span>Seleccione la fecha de corte</span>
                                    <span class="form-help red-text text-darken-2" id="CmptxtD2" style="display:none">
                                        <span class="ast"></span>
                                        <p>Requerido.</p>
                                    </span>
                                </div>
                                <div class="col m1">
                                    <a href="#!" id="genReport"><i class="small material-icons busq">search</i></a>
                                </div>
                            </div>
                        </div>
                    </div>

           <div class="row" id="reporteClientes">
                <div class=" input-field col s6" style="margin-left:35%;" >
                        <select name="cliente" id="cliente" class="browser-default chosen-select">
                          <option value="" disabled selected>CLIENTE</option>
                          <?php
                                if (!isset($clientes)) {
                                       echo "<option>.....</option>";
                                    } 
                                else {
                                       foreach ($clientes as $datos) {                                                      
                                        echo " <option value=".$datos['itmCls'].">". $datos['itmCls']." | ".utf8_encode($datos['SlpCodCliente'])."</option>";
                                         }
                                     }
                            ?>                       
                        </select>
                        
                    </div>
                    
                        <div class="col s12">
                            <table id="tableReporteClientes" class="tableDatos table hover cell-border display" cellspacing="1" cellpadding="2">
                                <thead>
                                <tr>
                                    <td colspan="16">
                                        Reporte del Perido
                                        <span id="T1D1">0000/00/00 </span> al 
                                        <span id="T1D2">0000/00/00</span>                                    
                                    </td>                                    
                                </tr>
                                <tr>
                                    <td>N°</td>
                                    <td>FECHA</td>
                                    <td>FACTURA</td>
                                    <td>PUNTOS ACUMULADOS</td>
                                    <!--<td>ESTADO DE FACTURA</td>-->
                                    <td>PENDIENTE A PAGAR</td>
                                    <td>VENDEDOR</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- tabla Puntos Por Compras -->
                    <div class="row" id="reportePxC" style="display: none;">
                        <div class="col s12">
                            <table id="tableReportePxC" class="tableDatos table hover cell-border display" cellspacing="1" cellpadding="2">
                                <thead>
                                <tr>
                                    <td colspan="16">
                                        Reporte del Perido
                                        <span id="T2D1">0000/00/00 </span> al 
                                        <span id="T2D2">0000/00/00</span>                                    
                                    </td>                                    
                                </tr>
                                <tr>
                                    <td>Cod.</td>
                                    <td>Nombre</td>
                                    <td>Ene</td>
                                    <td>Feb</td>
                                    <td>Mar</td>
                                    <td>Abr</td>
                                    <td>May</td>
                                    <td>Jun</td>
                                    <td>Jul</td>
                                    <td>Ago</td>
                                    <td>Sep</td>
                                    <td>Oct</td>
                                    <td>Nov</td>
                                    <td>Dic</td>
                                    <td>Cod.Vend</td>
                                    <td>Vend</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- tabla FRP -->
                    <div class="row" id="reporteFrp" style="display: none;">
                        <div class="col s12">
                            <table id="tableReporteFrp" class="tableDatos table hover cell-border display" cellspacing="1" cellpadding="2">
                                <thead>

                                <tr>
                                    <td colspan="5">
                                        Reporte del Perido
                                        <span id="T3D1">0000/00/00 </span> al 
                                        <span id="T3D2">0000/00/00</span>                                    
                                    </td>                                    
                                </tr>
                                <tr>
                                    <td>N°</td>
                                    <td>N° CLIENTE FECHA</td>
                                    <td>CLIENTE</td>
                                    <td>PUNTOS ACUMULADOS</td>
                                    <td>VENDEDOR</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- tabla Movimiento de productos -->
                    <div class="row" id="reporteMdP" style="display: none;">
                        <div class="col s12">
                            <table id="tableReporteMdP" class="tableDatos table hover cell-border display" cellspacing="1" cellpadding="2">
                                <thead>
                                <tr>
                                    <td colspan="16">
                                        Reporte del Perido
                                        <span id="T4D1">0000/00/00 </span> al 
                                        <span id="T4D2">0000/00/00</span>                                    
                                    </td>                                    
                                </tr>
                                <tr>
                                    <td>ARTÍCULO</td>
                                    <td>DESCRIPCIÓN</td>
                                    <td>CANTIDADES</td>
                                    <td>PUNTOS</td>
                                    <td>VENDEDOR</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>

                      <!--........  Tablas reportes nuevos ......... -->    


                        <!-- TABLA PUNTOS POR PRODUcTOS-->
                     <div class="row" id="reportePuntos" style="display: none;">
                        <div class="col s12">
                            <table id="tablereportePuntos" class="tableDatos table hover cell-border display" cellspacing="1" cellpadding="2">
                                <thead>
                                <tr>
                                    <td colspan="16">
                                        Reporte del Perido ... 
                                        <span id="T5D1">0000/00/00 </span> al ... 
                                        <span id="T5D2">0000/00/00</span>                                    
                                    </td>                                    
                                </tr>
                                <tr>
                                    <td>Código Producto</td>
                                    <td>Descripción</td>
                                    <td>Ene</td>
                                    <td>Feb</td>
                                    <td>Mar</td>
                                    <td>Abr</td>
                                    <td>May</td>
                                    <td>Jun</td>
                                    <td>Jul</td>
                                    <td>Ago</td>
                                    <td>Sep</td>
                                    <td>Oct</td>
                                    <td>Nov</td>
                                    <td>Dic</td>
                                    
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                     <!--  FIN TABLA PUNTOS POR PRODCUTOS-->

                         <!-- TABLA PUNTOS POR cLIENTES-->
                     <div class="row" id="reportePunto" style="display: none;">
                        <div class="col s12">
                            <table id="tablereportePcliente" class="tableDatos table hover cell-border display" cellspacing="1" cellpadding="2">
                                <thead>
                                <tr>
                                    <td colspan="16">
                                        REPORTE DEL PERIODO
                                        <span id="T6D1">0000/00/00 </span> al 
                                        <span id="T6D2">0000/00/00</span>                                    
                                    </td>                                    
                                </tr>
                                <tr>
                                    <td>Código Exactus</td>
                                    <td>Código Cliente</td>
                                    <td>Nombre</td>
                                    <td>Ene</td>
                                    <td>Feb</td>
                                    <td>Mar</td>
                                    <td>Abr</td>
                                    <td>May</td>
                                    <td>Jun</td>
                                    <td>Jul</td>
                                    <td>Ago</td>
                                    <td>Sep</td>
                                    <td>Oct</td>
                                    <td>Nov</td>
                                    <td>Dic</td>
                                    
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                     <!-- FIN TABLA PUNTOS POR CLIENTES-->

                      <!-- TABLA facturaas anuladas-->
                     <div class="row" id="reportefacta" style="display: none;">
                        <div class="col s12">
                            <table id="tablereportefacta" class="tableDatos table hover cell-border display" cellspacing="1" cellpadding="2">
                                <thead>
                                <tr>
                                    <td colspan="5">
                                        REPORTE DEL PERIODO
                                        <span id="T7D1">0000/00/00 </span> al 
                                        <span id="T7D2">0000/00/00</span>                                    
                                    </td>                                    
                                </tr>
                                <tr>
                                    <td>Fecha</td>
                                    <td> Sistema de Punto UMA</td>
                                    <td> Sistema Exactus</td>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                     <!-- FIN TABLA facturas anuladas-->

                     <!-- TABLA FACTURAS-->
                     <div class="row" id="Factura" style="display: none;">
                        <div class="col s12">
                            <table id="tableFactura" class="tableDatos table hover cell-border display" cellspacing="1" cellpadding="2">
                                <thead>
                                <tr>
                                    <td colspan="18">
                                        REPORTE DEL PERIODO ...
                                        <span id="T8D1">0000/00/00 </span> al ...
                                        <span id="T8D2">0000/00/00</span>                                    
                                    </td>                                    
                                </tr>
                                <tr>
                                    <td>No.</td>
                                    <!--<td>Factura</td>-->
                                    <td>Código Exactus</td>
                                    <td>Cliente</td>
                                    <td>Ptos. Acumulados  </td>
                                    <td>Ptos. Disponibles </td>
                                    <td>Ptos. Canjeados </td>
                                    <td>Cod. Vendedor</td>
                                    <td>Vendedor</td>
                                   
                                </tr>

                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

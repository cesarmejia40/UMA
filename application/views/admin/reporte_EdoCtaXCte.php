<div class="row" style="padding-left: 25px; padding-right: 25px;">
    <div class="col m12" ><div class="progress" id="LoadDiv" style="margin: 0.5rem 1px -0.5rem 0;display:none"><div class="indeterminate"></div></div>
        <div class="card blue-grey darken-1">

            <div class="brown lighten-5 caja">                 
                <div class="row">
                    <div class="col m12 col s12 tituloC">
                        <b>EDO DE CTA POR CLIENTE</b><br>
                        <span class="subtitulo"></span>
                    </div>
                    <div class="row" style="padding-left:10px;">
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
                                    <a href="#" id="genReportEdoCta"><i class="small material-icons busq">search</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
            <div class="row" style="padding-left:10px;">
            	<div>
            		<b>DATOS DEL CLIENTE</b><br>
	                <!--p = "demo">
	                	Cliente<br>	
	                	Direccion<br>	
	                	Telefono
	                </p-->
            	</div>
            </div>
            <div class="row" id="reporteClientes">
                <div class=" input-field col s6" style="margin-left:35%;" >
                        <select name="clientess" id="cliente" class="browser-default chosen-select">
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
                            <!--table id="tableReporteClientes" class="tableDatos table hover cell-border display" cellspacing="1" cellpadding="2"-->
                            <table id="tableEdoCta" class="tableDatos table hover cell-border display" cellspacing="1" cellpadding="2">
                                <thead>
                                <tr>
                                    <td colspan="16">
                                        Reporte del Perido
                                        <span id="T1D1">0000/00/00 </span> al 
                                        <span id="T1D2">0000/00/00</span>                                    
                                    </td>                                    
                                </tr>
                                <tr>
                                    <td>N° FACTURA</td>
                                    <td>FECHA DE FACTURA</td>
                                    <td>PUNTOS POR FACTURA</td>
                                    <td>PUNTOS APLICADOS</td>
                                    <!--<td>ESTADO DE FACTURA</td>-->
                                    <td>PUNTOS DISPONIBLES</td>
                                    <td>ESTADO</td>
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

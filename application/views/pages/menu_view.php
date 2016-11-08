
<div class="row" style="position: relative; margin-top: 70px;">
        <div class="col m3" >
            <div class="hide-on-med-and-down" id="nav-mobile">
                <div class="collection">
                    <!--<a href="<?php echo base_url('index.php/cuenta'); ?>"  id="cuenta" class="collection-item activo ">ESTADO DE CUENTA</a>-->
                    <a href="<?php echo base_url('index.php/bouchers'); ?>" id="bouchers" class=" tooltipped collection-item activo" data-position="top" data-delay="50" data-tooltip="Puntos Acumulados">PUNTOS GANADOS POR FACTURA</a>
                    <a href="<?php echo base_url('index.php/pagospendienes'); ?>"  id="pagos" class=" tooltipped collection-item activo" data-position="bottom" data-delay="50" data-tooltip="Estado de cuenta">ESTADO DE CUENTA POR FACTURA</a>
                </div>
                <div class="collection">
                    <a href="#!" class=" tooltipped collection-item activo" data-position="top" data-delay="50" data-tooltip="Lista de las 5 Facturas con más puntos">TOP 5</a>
                    <table class="bordered border">
                        <thead>
                            <tr class="color1">
                                <td><b>Nº</b></td>
                                <td><b>FACTURA</b></td>
                                <td><b>PTS</b></td>
                                <td><b>APLICABLES</b></td>
                                                              
                            </tr>
                        </thead>
                       <tbody class="border">
                       <?php
                       if (!($listatop)) {
                       } else {
                        $i=0;
                        foreach ($listatop ->result() as $thetop){
                            $i++;

                            if($thetop->Estado=='PENDIENTE' OR $thetop->Estado=='CANCELADA')
                            {
                            echo '
                                <tr>
                                   <td><b>'.$i.'</b></td>
                                   <td>'.$thetop->itmFact.'</td>
                                   <td>'.$thetop->itmPts.'</td>                            
                            ';
                          }
                          if($thetop->Estado=='CANCELADA'){
                          echo '
                           <td>'.$thetop->itmPts.'</td>

                          

                           
                        ';
                          } 

                          else{
                          echo '
                           <td>0</td>

                          

                           </tr>
                        ';
                          }

                              }}
                       ?>


                       </tbody>
                    </table>
                </div>
                <div class="row">
                <table>
                    <?php
                        if (!($listindica)) {
                      // echo "no";
                       $Activo =0;
                    }
                    else{
                        //echo "si";
                         foreach($listindica as $ind){

                            echo'
                            <tr class=" tooltipped tab" data-position="top" data-delay="10" data-tooltip=" Facturas con Puntos" >
                                <td>ACTIVO</td>
                                <td style="text-align: center;">&nbsp;&nbsp;&nbsp;'.$ind['Activo'].'&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                            <tr class=" tooltipped tab" data-position="right" data-delay="10" data-tooltip=" Facturas anuladas" >
                                <td>ANULADO</td>
                                <td style="text-align: center;">&nbsp;&nbsp;&nbsp;'.$ind['Anulado'].'&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                            <tr class=" tooltipped tab" data-position="bottom" data-delay="10" data-tooltip=" Total Puntos ya Gangeados">
                                <td>APLICADO</td>
                                <td style="text-align: center;">&nbsp;&nbsp;&nbsp;'.$ind['Aplicado'].'&nbsp;&nbsp;&nbsp;</td>
                            </tr>
                            ';
                        }
                        $Activo =$ind['Acumulado'];
                    }
                    ?>

                    </table>
                </div>
                <div class="row">
                    <div class="col s6 ">
                         <nav class=" tooltipped total responsive" data-position="top" data-delay="10" data-tooltip="Total Puntos Acumulados compras">
                           <h6 class="tam">TOTAL ACUMULADO</h6>
                            <h5><?php 
                              

                              if (!($Activo)) {
                                # code...
                              } else {
                                echo $Activo;
                              }
                              
                              ?> Ptos.</h5>
                        </nav>
                    </div>

                <div class="col s6">
                     <nav class=" tooltipped total" data-position="top" data-delay="10" data-tooltip="Total de Puntos que puede canjear">
                       <h6 class="tam">PTOS CANJEABLES</h6>
                        
                        <h5>
                          <?php 
                        if (!isset($ind['APL'])) {
                          # code...
                        } else {
                          echo $ind['APL'];
                        }
                        
                        
                        ?> Ptos.</h5>
                    </nav>
                </div>
                   
                </div>
                <div class="col s12 aplica tooltipped" data-position="right" data-delay="10" data-tooltip="Catálogo de premios">
                    <span>PUEDE APLICAR A:</span>
                </div>
            </div>
      </div>




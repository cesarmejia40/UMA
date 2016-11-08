<?php
foreach($ClsInfo ->result() as $Key){
    $NombreCls= $Key->itmClsName;
    $DirCls= $Key->itmClsName;
    $CodCls= $Key->itmCls;

    $Fact = $Key->itmFact;
    $DateFact = $Key->itmDate;

}

?>
<div class="row" style="position: relative; margin-top: 20px;">
    <div class="col m3" >
        <div class="hide-on-med-and-down" id="nav-mobile">
            <div class="collection">
                <a href="#!" class="collection-item" style="background-color: #144229;color: #ffffff; font-size: 20px;"><?php echo $NombreCls;?></a>
                <table class="bordered border">
                    <tbody class="border">                      
                       <tr>
                          <td>COD. CLIENTE: <?php echo $CodCls;?></td>
                       </tr>                      
                    </tbody>
                </table>
            </div>
            <?php
                if($Modulo[0]=="FACTURA"){
                }else{
                echo '
                    <div class="collection marginEight" id="detalleFactura" >
                        <table class="bordered border">
                            <tbody class="border">
                            <tr>
                                <td>FACTURA N°</td>
                                <td>'.$Fact.'</td>
                            </tr>
                            <tr>
                                <td>FECHA EMITIDA</td>
                                <td>'.$DateFact.'</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                ';
                }
            ?>
         </div>
    </div>




<div class="row">
        <center>
            <div id="carrusel">
                <a href="#" class="izquierda_flecha arrowL"></a>
                <a href="#" class="derecha_flecha arrowR"></a>
                <div class="carrusel">
                    <?php if ((!$cat)) {?>
                        <div class="product">
                            <div class="cont">
                                <b>La Cantidad de 000 Pts es insuficiente para aplicar algun premio.</b>
                                
                            </div>
                        </div>
                    <?php } else { $i=0;
                        foreach($cat as $key): ?>
                        <div class="product" id="product_<?php echo $i ?>"><!--id="product_<?php echo $key['tctId'];?>" -->
                            <img class="img_carrusel" src="<?php echo base_url()?>uploads/<?php echo $key['tctUrlimg'];?>" width="100px" height="100px" />
                            <div class="cont">
                                <b><?php echo $key['tctNombreProd'];?></b>
                                <p><?php echo $key['tctPuntos'];?></p>
                            </div>
                        </div>
                    <?php $i++; endforeach; }?>
                </div>
            </div>
        </center>
</div>
<!--a7m1425.-->
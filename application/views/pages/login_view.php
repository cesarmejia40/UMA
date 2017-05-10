
<div id="container">
	<div class="header">
		<div class="row">
			<div class="col s12">
				<center><img src="<?php echo base_url(); ?>assets/img/Untitled-1-01.png" width="40%"></center>
			</div>
		</div>
	</div>
	<div class="container" >
		<div class="row">
			<div class="col s12">				
				<div id="body">					
					<?php
					$attributes = array('class' => 'form form-validate floating-label', 'id' => 'myformLoguin' );
					echo form_open('home', $attributes)
					?>
					<div class="error">
						<?php echo form_error('name'); ?>
					</div>
					<div class="input-field col s12">
						<input id="name" name="name" type="text" value="<?php echo set_value('name'); ?>">
						<label for="name">USUARIO</label>
					</div>
					<div class="error">
						<?php echo form_error('pass'); ?>
					</div>
					<div class="input-field col s12">
						<input id="pass"  name="pass" type="password" value="<?php echo set_value('pass'); ?>">
						<label for="pass">CONTRASEÑA</label>
					</div>
					<div class="centro ">
						<?php

						if ($user==0) {
							echo '
							<span class="form-help red-text text-darken-2" id="Errorpass">
	                    		<span class="ast"></span>
	                    		<p>Nombre o Contraseña equivocada.</p>
	                		</span>';
						}						
						?>
						<tr>
							<td colspan="2">
								<p style="text-align: center;">
				      				<input type="checkbox" id="checkRemember" name="checkRemember" />
				      				<label for="checkRemember">Recordar contrase&ntilde;a</label>
			    				</p>
							</td>

						</tr>						
						<!--<p>
                                <input type="checkbox" id="checkRec" />
                                <label for="checkRec">RECORDAR</label>
                            </p>
                            <a class="waves-effect btn">LOGIN</a>-->
						<p>
							<input type="submit" class="waves-effect waves-light btn header" name="submit" value="LOGIN" />
						</p>
					</div>
					<?= form_close(); ?>

				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<img src="<?php echo base_url(); ?>assets/img/Untitled-1-02.png" width="100%" />
	</div>
</div>

<script src="<?php echo base_url("assets/js/jquery.min.js");?>"></script>
<br>
<br>
<div class="container">
	<div class="row">
		<div class="col-xs-4 col-xs-offset-4 text-center">
			<div class="panel">
				<div class="panel-heading white-text z-depth-1" id="login-heading">
					<div class="panel-title">
						<img src="<?php echo base_url("assets/images/asi_logo.png");?>">
					</div>
				</div>
				<div class="panel-body z-depth-1 text-left">
					<?php echo form_open('Login'); ?>
						<?php
						$error = $this->session->flashdata('Status');
						if(isset($error) and !empty($error)){
							?>
								<div class="row">
									<div class="col-xs-12">
										<div class="alert alert-warning">
											<?php echo $error;?>
										</div>
									</div>
								</div>
							<?php
						}?>
						<div class="row">
							<div class="col-xs-12">
								Username
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<input required type = "text" <?php if(isset($username)) {?>value = "<?php echo $username;?>"<?php }?> placeholder = "Enter User ID" class = "form-control" name = "userId" pattern = "[a-zA-Z0-9_]+" />
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-xs-12">
								Password
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<input required type="password" placeholder = "Enter Password" class = "form-control" name = "password">
							</div>
						</div>
						<br>
						<div class="row" style="margin-bottom:0px;">
							<div class="col-xs-12">
								<input type = "submit" class ="btn btn-danger red" value = "Login"/>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
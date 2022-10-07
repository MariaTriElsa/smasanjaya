<div class="login-box">
	<div>
		<div style="text-align: center;"><h3>SIA SMA SANJAYA</h3></div>
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
	<p class="login-box-msg text-bold">SMA SANJAYA </p>
		<p class="login-box-msg text-bold"> Masuk Dengan Email & Password Anda</p>
		<form method="post" action="<?php echo base_url('auth/login'); ?>" role="login">
			<div class="form-group has-feedback">
				<input type="email" name="email" class="form-control" required minlength="5" placeholder="Email"/>
				<span class="glyphicon  glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" name="password" class="form-control" required minlength="5"
					   placeholder="Password"/>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6" style="padding-bottom: 5px">
					<button type="submit" name="submit" value="login" class="btn btn-primary btn-block btn-flat"><i
								class="fa fa-sign-in" aria-hidden="true"></i> Masuk
					</button>
				</div>
			</div>
		</form>

	</div>
	<div id="myalert">
		<?php echo $this->session->flashdata('alert', true); ?>
	</div>
	<br>
</div>


	<script>
		$(function () {
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' // optional
			});
		});
		$('#myalert').delay('slow').slideDown('slow').delay(4100).slideUp(600);
	</script>

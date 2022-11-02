<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?= base_url('assets/assets_stisla'); ?>../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4> Ganti Password </h4></div>

			<span class="m-2"><?= $this->session->flashdata('pesan') ?></span>
              <div class="card-body">
                <form method="POST" action="<?= base_url('auth/ganti_password_aksi'); ?>">
									<input type="hidden" name="id_customer">
                  <div class="form-group">
                    <label for="pass_baru"> Password Baru </label>
                    <input id="pass_baru" type="password" class="form-control" name="pass_baru">
										<?= form_error('pass_baru', '<div class="text-small text-danger">', '</div>') ?>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="ulang_pass" class="control-label"> Ulang Password </label>
                    </div>
                    <input id="ulang_pass" type="password" class="form-control" name="ulang_pass">
										<?= form_error('ulang_pass', '<div class="text-small text-danger">', '</div>') ?>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Ganti Password
                    </button>
                  </div>

                </form>
             
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="<?= base_url('register'); ?>">Create One</a>
            </div>
						<div class="mt-1 text-muted text-center">
             Forgot Password ? <a href="<?= base_url('auth/ganti_password'); ?>"> Reset Password </a>
            </div>
     
          </div>
        </div>
      </div>
    </section>
  </div>

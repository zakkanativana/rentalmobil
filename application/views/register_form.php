<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?= base_url('assets/assets_stisla'); ?> /assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">

                <form method="POST" action="<?= base_url('register'); ?>">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="nama_customer"> Nama Customer </label>
                      <input id="nama_customer" type="text" class="form-control" name="nama_customer" autofocus>
					  					<?= form_error('nama_customer', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                    <div class="form-group col-6">
                      <label for="username_customer"> Username customer</label>
                      <input id="username_customer" type="text" class="form-control" name="username_customer">
					  					<?= form_error('username_customer', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="alamat_customer"> alamat_customer </label>
                    <input id="alamat_customer" type="text" class="form-control" name="alamat_customer">
										<?= form_error('alamat_customer', '<div class="text-small text-danger">', '</div>') ?>
                  </div>

                  <div class="form-divider">
                    Status
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label> Gender </label>
                      <select class="form-control selectric" name="gender_customer">
													<option value=""> --Pilih Gender </option>
													<option> Laki-Laki </option>
													<option> Perempuan </option>
                      </select>
					  					<?= form_error('gender_customer', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
									<div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password_customer">
					  					<?= form_error('password_customer', '<div class="text-small text-danger">', '</div>') ?>
              		</div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label> No Ktp </label>
                      <input type="text" class="form-control" name="no_ktp_customer">
					  					<?= form_error('no_ktp_customer', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                    <div class="form-group col-6">
                      <label> No Hp </label>
                      <input type="text" class="form-control" name="no_telepon_customer">
					  					<?= form_error('no_telepon_customer', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>

              </div>
            </div>

						<div class="mt-5 text-muted text-center">
              You Have Account? <a href="<?= base_url('auth/login'); ?>"> Login </a>
            </div>

            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
			
          </div>
        </div>
      </div>
    </section>
  </div>

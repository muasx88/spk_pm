<?php $this->load->view('admin/partials/header'); ?>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <!-- <div class="row"> -->
              <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
              <!-- <div class="col-lg-6"> -->
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
                  </div>
                  <?php 
                  if ($this->session->flashdata('errors')) { ?>
                    <div class="alert alert-danger">
                      <?= $this->session->flashdata('errors'); ?>
                    </div>
                  <?php } ?>
                  <form class="user" method="POST" action="<?php echo base_url('admin/auth/login') ?>" autocomplete="off">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" aria-describedby="username" name="username" placeholder="Username...">
                      <div class="text-danger ml-2">
                        <?php echo form_error('username'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password...">
                      <div class="text-danger ml-2">
                        <?php echo form_error('password'); ?>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                      Login
                    </a> -->
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              <!-- </div> -->
            <!-- </div> -->
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
<?php $this->load->view('admin/partials/footer'); ?>

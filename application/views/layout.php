<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_partials/header');
$this->load->view('_partials/layout-3');
$this->load->view('_partials/navbar');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <!-- <h1>Top Navigation</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Top Navigation</div>
            </div> -->
          </div>

          <div class="section-body">
            <?= $contents; ?>
          </div>
        </section>
      </div>
<?php $this->load->view('_partials/footer'); ?>
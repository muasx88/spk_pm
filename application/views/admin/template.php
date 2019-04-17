<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_partials/header');
$this->load->view('_partials/layout');
$this->load->view('_partials/sidebar');
?>
    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
        <div class="section-header">
          <h1><?= $title ?></h1>
        </div>

        <div class="section-body">
          <?= $contents; ?>
        </div>
      </section>
    </div>
<?php $this->load->view('_partials/footer'); ?>
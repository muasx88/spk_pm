<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin/_partials/header');
?>
    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
        <div class="section-header">
          <h1>Blank Page</h1>
        </div>

        <div class="section-body">
          <?= $contents; ?>
        </div>
      </section>
    </div>
<?php $this->load->view('admin/_partials/footer'); ?>
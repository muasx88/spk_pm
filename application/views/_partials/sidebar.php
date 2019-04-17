<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>dist/index">SPK<b>PM</b></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>dist/index">SPK</a>
          </div>
          <ul class="sidebar-menu">
            <!-- <li class="menu-header">Dashboard</li> -->
            <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>">
              <a href="<?= base_url('admin') ?>"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Master Data</li>
            <li class="dropdown <?php echo $this->uri->segment(2) == 'layout_default' || $this->uri->segment(2) == 'layout_transparent' || $this->uri->segment(2) == 'layout_top_navigation' ? 'active' : ''; ?>">
              <a href="#"><i class="fas fa-columns"></i> <span>Layout</span></a>
            </li>
            
          </ul>

          <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Documentation
            </a>
          </div> -->
        </aside>
      </div>

<?php 
$this->load->view('admin/perumahan/perumahan'); 

if (count($data_perumahan) > 0) {
	$this->load->view('admin/perumahan/penilaian');
}

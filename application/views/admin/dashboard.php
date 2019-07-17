<div class="row">
	<div id="jml_kriteria" class="col-xl-6 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Kriteria</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-chart-area fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="jml_perumahan" class="col-xl-6 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Perumahan</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_perumahan ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-table fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card shadow">
	<div class="card-header">
		<h5 class="m-0 font-weight-bold text-primary">Selamat datang <?= $this->session->userdata('name'); ?></h5>
	</div>
	<div class="card-body">
		<p>Welcome</p>
		<!-- <div id="myfirstchart" style="height: 250px;"></div> -->
	</div>
  <!-- <div class="card-footer bg-whitesmoke">
    This is card footer
  </div> -->
</div>


<script>
	$(function() {
		$('#jml_kriteria').hover(function() {
			$(this).css('cursor', 'pointer');
		});
		$('#jml_kriteria').click(function(e) {
			window.location.href = '<?php echo base_url('admin/kriteria') ?>'
		});

		$('#jml_perumahan').hover(function() {
			$(this).css('cursor', 'pointer');
		});
		$('#jml_perumahan').click(function(e) {
			window.location.href = '<?php echo base_url('admin/perumahan') ?>'
		});
		
	});

	new Morris.Bar({
	  // ID of the element in which to draw the chart.
	  element: 'myfirstchart',
	  // Chart data records -- each entry in this array corresponds to a point on
	  // the chart.
	  data: [
	  { year: '2008', value: 20 },
	  { year: '2009', value: 10 },
	  { year: '2010', value: 5 },
	  { year: '2011', value: 5 },
	  { year: '2012', value: 20 },
	  { year: '2012', value: 20 },
	  { year: '2012', value: 21 },
	  { year: '2012', value: 20 },
	  { year: '2012', value: 23 },
	  { year: '2012', value: 20 },
	  { year: '2012', value: 30 },
	  { year: '2012', value: 20 },
	  { year: '2012', value: 20 },
	  { year: '2012', value: 20 },
	  { year: '2012', value: 20 },
	  ],
	  // The name of the data record attribute that contains x-values.
	  xkey: 'year',
	  // A list of names of data record attributes that contain y-values.
	  ykeys: ['value'],
	  // Labels for the ykeys -- will be displayed when you hover over the
	  // chart.
	  labels: ['Value']
	});
</script>

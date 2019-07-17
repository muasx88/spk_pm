<div class="container mt-5">
	<div id="myfirstchart" style="height: 250px;"></div>
	<div class="card mt-5">
		<div class="card-body">
			<h3>Kesimpulan</h3>
			<p>Dari hasil perhitungan, dapat disimpulkan bahwa ada 3 perumahan dengan tipe bervariasi terbaik.</p>
		</div>
	</div>
</div>

<script>
	new Morris.Bar({
	  // ID of the element in which to draw the chart.
	  element: 'myfirstchart',
	  // Chart data records -- each entry in this array corresponds to a point on
	  // the chart.
	  data: [<?= $rangking ?>],
	  // The name of the data record attribute that contains x-values.
	  xkey: 'perumahan',
	  // A list of names of data record attributes that contain y-values.
	  ykeys: ['nilai'],
	  // Labels for the ykeys -- will be displayed when you hover over the
	  // chart.
	  labels: ['Nilai']
	});
</script>

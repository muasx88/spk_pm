/*==================================================

	KRITERIA FASILITAS

==================================================*/

// open modal add
$("#addKriteriaFasilitas").click(function(e) {
	reset_data_kf();
	$("#titleKriteriaFasilitas span").text("Tambah");
	$("#modalKriteriaFasilitas").modal("show");
});

// open modal edit
$(".editKriteriaFasilitas").click(function(e) {
	reset_data_kf();
	var id = $(this).data("id");
	$.get(base_url+'admin/kriteria/getKriteriaFasilitasById/'+id, function(data) {
		$("#idKriteriaFasilitas").val(data.id_kriteria)
		$("#pilihanKriteriaFasilitas").val(data.pilihan_kriteria)
		$("#bobotKriteriaFasilitas").val(data.bobot)
	},'json');
	$("#titleKriteriaFasilitas span").text("Edit");
	$("#modalKriteriaFasilitas").modal("show");
});


// save button 
$("#formKriteriaFasilitas").submit(function(e) {
	e.preventDefault();
	var pilihanKriteriaFasilitas = $("#pilihanKriteriaFasilitas").val();
	var bobotKriteriaFasilitas = $("#bobotKriteriaFasilitas").val();

	if (pilihanKriteriaFasilitas == '' && bobotKriteriaFasilitas == '') {
		alert("Isi semua data!");
	}else{
		var data = {
			"idKriteriaFasilitas": $("#idKriteriaFasilitas").val(),
			"pilihanKriteriaFasilitas" : pilihanKriteriaFasilitas,
			"bobotKriteriaFasilitas" : bobotKriteriaFasilitas,
		}

		$.ajax({
			url: base_url+"/admin/kriteria/saveKriteriaFasilitas",
			type: 'POST',
			data: data,
			success: function(res) {
				if (res == "success") {
					window.location.reload();
				}
			}
		});
		
		reset_data_kf();
		$("#modalKriteriaFasilitas").modal("hide");
	}

});

// delete modal show
var idKriteriaFasilitas="";
$(".deleteKriteriaFasilitas").click(function(e) {
	idKriteriaFasilitas = $(this).data("id");
	$("#modalDeleteKriteriaFasilitas").modal("show");
});
// confirm delete button
$("#confirmDeleteKriteriaFasilitas").click(function(e) {
	$.ajax({
		url: base_url+"admin/kriteria/deleteKriteriaFasilitas/"+idKriteriaFasilitas,
		type: 'POST',
		success: function(res) {
			if (res == "success") {
				window.location.reload();
			}
		}
	});
	
});

function reset_data_kf(){
	$("#idKriteriaFasilitas").val("");
	$("#pilihanKriteriaFasilitas").val("");
	$("#bobotKriteriaFasilitas").val("");
}

/*==================================================

	END - KRITERIA FASILITAS

==================================================*/

<script>
$(document).ready(function(){
		$('#form1ds_imunisasiadd').ajaxForm({
			beforeSend: function() {
				achtungShowLoader();	
			},
			uploadProgress: function(event, position, total, percentComplete) {
			},
			complete: function(xhr) {
				achtungHideLoader();
				if(xhr.responseText!=='OK'){
					$.achtung({message: xhr.responseText, timeout:5});
				}else{
					$.achtung({message: 'Proses Tambah Data Berhasil', timeout:5});
					$("#t813","#tabs").empty();
					$("#t813","#tabs").load('t_ds_imunisasi'+'?_=' + (new Date()).getTime());
				}
			}
		});
		
		$("#form1ds_imunisasiadd").validate({
			rules: {
				tanggal_inspeksi: {
					date:true,
					required: true
				}
			},
			messages: {
				tanggal_inspeksi: {
					required:"Silahkan Lengkapi Data"
				}
			}
		});
})

//$("#kabupaten_kotarmh_sehatadd").remoteChained("#provinsirmh_sehatadd", "<?=site_url('t_masters/getKabupatenByProvinceId2')?>");
//$("#kecamatanrmh_sehatadd").remoteChained("#kabupaten_kotarmh_sehatadd", "<?=site_url('t_masters/getKecamatanByKabupatenId2')?>");
//$("#kelurahanrmh_sehatadd").remoteChained("#kecamatanrmh_sehatadd", "<?=site_url('t_masters/getKelurahanByKecamatanId2')?>");
//$("#kec_id_combo_ds_imunisasi").remoteChained("#kab_id_combo_ds_imunisasi", "<?=site_url('t_masters/getKabupatenByProvinceID3')?>");
$("#desa_kel_id_combo_ds_imunisasi").remoteChained("#kec_id_combo_ds_imunisasi", "<?=site_url('t_masters/getKelurahanByKecamatanId3')?>");
$("#puskesmas_id_combo_ds_imunisasi").remoteChained("#kec_id_combo_ds_imunisasi", "<?=site_url('t_masters/getPuskesmasByKecamatanId2')?>");

$(':text,:radio,:checkbox,select,textarea').bind("keydown", function(e) {
   var n = $(":text,:radio,:checkbox,select,textarea").length;
   if (e.which == 13) 
   {
		e.preventDefault();
		var nextIndex = $(':text,:radio,:checkbox,select,textarea').index(this) + 1;
		var thisIndex = $(':text,:radio,:checkbox,select,textarea').index(this);
		$(':text,:radio,:checkbox,select,textarea')[nextIndex].focus();
   }
});
</script>
<script>
	$('#backlistds_imunisasi').click(function(){
		$("#t813","#tabs").empty();
		$("#t813","#tabs").load('t_ds_imunisasi'+'?_=' + (new Date()).getTime());
	})
	$("#tahun_ds_imunisasi").mask("9999");
</script>
<style>
input[type=text] {width: 55px!important;}
label{width:295px!important;}
.menu_jk{width: 100%;}
.menu_l{float: left; padding-left: 335px; font-size: 12px;}
.menu_p{float: left; padding-left: 60px; font-size: 12px;}
</style>
<div class="mycontent">
<div class="formtitle">Tambah Data Imunisasi</div>
<div class="backbutton"><span class="kembali" id="backlistds_imunisasi">kembali ke list</span></div>
</br>

<span id='errormsg'></span>
<form name="frApps" id="form1ds_imunisasiadd" onsubmit="bt1.disabled = true; return true;" method="post" action="<?=site_url('t_ds_imunisasi/addprocess')?>" enctype="multipart/form-data">		
	<fieldset>
		<span>
		<label>Propinsi</label>
		<input type="text" style="width:195px!important" name="" id="textid" value="<?=$this->session->userdata('nama_propinsi')?>" disabled />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>Kabupaten</label>
		<input type="text" style="width:195px!important" name="" id="textid" value="<?=$this->session->userdata('nama_kabupaten')?>" disabled />
		</span>
	</fieldset>
	<?=getComboKecamatanByKab($this->session->userdata('kd_kecamatan'),'KD_KECAMATAN','kec_id_combo_ds_imunisasi','required','')?>
	<?=getComboKelurahanByKec($this->session->userdata('kd_kelurahan'),'KD_KELURAHAN','desa_kel_id_combo_ds_imunisasi','required','')?>
	<?=getComboPuskesmasByKec('','KD_PUSKESMAS','puskesmas_id_combo_ds_imunisasi','required','')?>
	<fieldset>
		<span>
		<label>Bulan*</label>
		<select name="BULAN" required>
			<option value="">- pilih bulan -</option>
			<option value="01">Januari</option>
			<option value="02">Februari</option>
			<option value="03">Maret</option>
			<option value="04">April</option>
			<option value="05">Mei</option>
			<option value="06">Juni</option>
			<option value="07">Juli</option>
			<option value="08">Agustus</option>
			<option value="09">September</option>
			<option value="10">Oktober</option>
			<option value="11">November</option>
			<option value="12">Desember</option>
		</select>
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>Tahun*</label>
		<input type="text" name="TAHUN" id="tahun_ds_imunisasi" value="" required />
		</span>
	</fieldset>
	<div class="menu_jk">
	<div class="menu_l"><b>L</b></div>
	<div class="menu_p"><b>P</b></div>
	</div>
	<br>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI BCG</label>
		<input type="text" placeholder="L" name="JML_IMUN_BCG_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_BCG_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI DPT 1</label>
		<input type="text" placeholder="L" name="JML_IMUN_DPT1_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_DPT1_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI DPT 2</label>
		<input type="text" placeholder="L" name="JML_IMUN_DPT2_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_DPT2_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI DPT 3</label>
		<input type="text" placeholder="L" name="JML_IMUN_DPT3_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_DPT3_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI DPT HB 1</label>
		<input type="text" placeholder="L" name="JML_IMUN_DPT_HB1_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_DPT_HB1_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI DPT HB 2</label>
		<input type="text" placeholder="L" name="JML_IMUN_DPT_HB2_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_DPT_HB2_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI DPT HB 3</label>
		<input type="text" placeholder="L" name="JML_IMUN_DPT_HB3_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_DPT_HB3_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI POLIO 1</label>
		<input type="text" placeholder="L" name="JML_IMUN_POLIO1_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_POLIO1_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI POLIO 2</label>
		<input type="text" placeholder="L" name="JML_IMUN_POLIO2_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_POLIO2_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI POLIO 3</label>
		<input type="text" placeholder="L" name="JML_IMUN_POLIO3_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_POLIO3_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI POLIO 4</label>
		<input type="text" placeholder="L" name="JML_IMUN_POLIO4_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_POLIO4_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI CAMPAK</label>
		<input type="text" placeholder="L" name="JML_IMUN_CAMPAK_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_CAMPAK_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI HEPATITIS B UNIJECT < 7 HARI</label>
		<input type="text" placeholder="L" name="JML_IMUN_HBU_M7_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_HBU_M7_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI HEPATITIS B UNIJECT > 7 HARI</label>
		<input type="text" placeholder="L" name="JML_IMUN_HBU_P7_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_HBU_P7_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI HEPATITIS B UNIJECT 2</label>
		<input type="text" placeholder="L" name="JML_IMUN_HB_UNIJECT2_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_HB_UNIJECT2_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI HEPATITIS B UNIJECT 3</label>
		<input type="text" placeholder="L" name="JML_IMUN_HB_UNIJECT3_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_HB_UNIJECT3_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI HEPATITIS B VIAL 1</label>
		<input type="text" placeholder="L" name="JML_IMUN_HB_VIAL1_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_HB_VIAL1_P" value=""  />
		</span>
	</fieldset><fieldset>
		<span>
		<label>JUMLAH IMUNISASI HEPATITIS B VIAL 2</label>
		<input type="text" placeholder="L" name="JML_IMUN_HB_VIAL2_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_HB_VIAL2_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI HEPATITIS B VIAL 3</label>
		<input type="text" placeholder="L" name="JML_IMUN_HB_VIAL3_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_HB_VIAL3_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 1 IBU HAMIL</label>
		<input style="width: 125px!important;" type="text" placeholder="P" name="JML_IMUN_TT1_HAMIL_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 1 WUS</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT1_WUS_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 2 IBU HAMIL</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT2_HAMIL_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 2 WUS</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT2_WUS_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 3 IBU HAMIL</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT3_HAMIL_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 3 WUS</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT3_WUS_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 4 IBU HAMIL</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT4_HAMIL_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 4 WUS</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT4_WUS_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 5 IBU HAMIL</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT5_HAMIL_P" value=""  />
		</span>
	</fieldset><fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 5 WUS</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT5_WUS_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI BCG LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_BCGL_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_BCGL_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI DPT 1 LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_DPT1L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_DPT1L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI DPT 2 LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_DPT2L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_DPT2L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI DPT 3 LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_DPT3L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_DPT3L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI DPT HB 1 LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_DPT_HB1L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_DPT_HB1L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI DPT HB 2 LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_DPT_HB2L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_DPT_HB2L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI DPT HB 3 LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_DPT_HB3L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_DPT_HB3L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI CAMPAK LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_CL_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_CL_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI POLIO 1 LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_P1L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_P1L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI POLIO 2 LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_P2L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_P2L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI POLIO 3 LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_P3L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_P3L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI POLIO 4 LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_P4L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_P4L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI HEPATITIS B UNIJECT < 7 HARI LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_HBU_M7L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_HBU_M7L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI HEPATITIS B UNIJECT > 7 HARI LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_HBU_P7L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_HBU_P7L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI HEPATITIS B UNIJECT 2 LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_HBU2L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_HBU2L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI HEPATITIS B UNIJECT 3 LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_HBU3L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_HBU3L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI HEPATITIS B VIAL 1 LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_HBV1L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_HBV1L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI HEPATITIS B VIAL 2 LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_HBV2L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_HBV2L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI HEPATITIS B VIAL 3 LUAR WILAYAH/SWASTA</label>
		<input type="text" placeholder="L" name="JML_IMUN_HBV3L_WILAYAH_L" value=""  />
		<input type="text" placeholder="P" name="JML_IMUN_HBV3L_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 1 IBU HAMIL LUAR WILAYAH/SWASTA</label>
		<input style="width: 125px!important;" type="text" placeholder="P" name="JML_IMUN_TT1IHL_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 1 WUS LUAR WILAYAH/SWASTA</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT1WL_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 2 IBU HAMIL LUAR WILAYAH/SWASTA</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT2IHL_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 2 WUS LUAR WILAYAH/SWASTA</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT2WL_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 3 IBU HAMIL LUAR WILAYAH/SWASTA</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT3IHL_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 3 WUS LUAR WILAYAH/SWASTA</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT3WL_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 4 IBU HAMIL LUAR WILAYAH/SWASTA</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT4IHL_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 4 WUS LUAR WILAYAH/SWASTA</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT4WL_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 5 IBU HAMIL LUAR WILAYAH/SWASTA</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT5IHL_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH IMUNISASI TT 5 WUS LUAR WILAYAH/SWASTA</label>
		<input type="text" style="width: 125px!important;" placeholder="P" name="JML_IMUN_TT5WL_WILAYAH_P" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN BCG DITERIMA BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VBCG_TERIMA" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN DPT DITERIMA BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VDPT_TERIMA" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN DPT HB DITERIMA BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VDPTHB_TERIMA" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN POLIO DITERIMA BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VP_TERIMA" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN CAMPAK DITERIMA BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VC_TERIMA" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN HB UNIJECT DITERIMA BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VHBU_TERIMA" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN HB VIAL DITERIMA BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VHBV_TERIMA" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN TT DITERIMA BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VTT_TERIMA" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN DT DITERIMA BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VDT_TERIMA" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN BCG YANG DIPAKAI BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VBCG_DIPAKAI" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN DPT YANG DIPAKAI BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VDPT_DIPAKAI" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN DPT HB YANG DIPAKAI BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VDPTHB_DIPAKAI" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN POLIO YANG DIPAKAI BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VP_DIPAKAI" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN CAMPAK YANG DIPAKAI BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VC_DIPAKAI" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN HB UNIJECT YANG DIPAKAI BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VHBU_DIPAKAI" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN HB VIAL YANG DIPAKAI BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VHBV_DIPAKAI" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN TT YANG DIPAKAI BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VTT_DIPAKAI" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN DT YANG DIPAKAI BULAN INI</label>
		<input type="text" style="width: 125px!important;" name="JML_VDT_DIPAKAI" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN DT1 ANAK SEKOLAH</label>
		<input type="text" style="width: 125px!important;" name="JML_VDT1_ANAKSEKOLAH" value=""  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH VAKSIN DT2 ANAK SEKOLAH</label>
		<input type="text" style="width: 125px!important;" name="JML_VDT2_ANAKSEKOLAH" value=""  />
		</span>
	</fieldset>
	
	<fieldset>
		<span>
		<input type="submit" name="bt1" value="Proses Data"/>
		</span>
	</fieldset>	
</form>
</div >
<script>
$(document).ready(function(){
		$('#form1ds_giziedit').ajaxForm({
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
					$.achtung({message: 'Proses Ubah Data Berhasil', timeout:5});
					$("#t803","#tabs").empty();
					$("#t803","#tabs").load('t_ds_gizi'+'?_=' + (new Date()).getTime());
				}
			}
		});
})

$("#desa_kel_id_combo_ds_gizi").remoteChained("#kec_id_combo_ds_gizi", "<?=site_url('t_masters/getKelurahanByKecamatanId3')?>");
$("#puskesmas_id_combo_ds_gizi").remoteChained("#kec_id_combo_ds_gizi", "<?=site_url('t_masters/getPuskesmasByKecamatanId2')?>");

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
	$('#backlistds_gizi').click(function(){
		$("#t803","#tabs").empty();
		$("#t803","#tabs").load('t_ds_gizi'+'?_=' + (new Date()).getTime());
	})
	$("#tahun_ds_gizi").mask("9999");
</script>
<style>
input[type=text] {width: 55px!important;}
label{width:295px!important;}
</style>
<div class="mycontent">
<div class="formtitle">Edit Data Gizi</div>
<div class="backbutton"><span class="kembali" id="backlistds_gizi">kembali ke list</span></div>
</br>

<span id='errormsg'></span>
<form name="frApps" id="form1ds_giziedit" method="post" action="<?=site_url('t_ds_gizi/editprocess')?>">	
	<fieldset>
		<span>
		<label>Propinsi</label>
		<input type="text" style="width:195px!important" name="" id="textid" value="<?=$data->PROVINSI?>" disabled />
		<input type="hidden" name="ID" value="<?=$data->ID?>" />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>Kabupaten</label>
		<input type="text" style="width:195px!important" name="" id="textid" value="<?=$data->KABUPATEN?>" disabled />
		</span>
	</fieldset>
	<?=getComboKecamatanByKab($data->KD_KECAMATAN,'KD_KECAMATAN','kec_id_combo_ds_gizi','required','')?>
	<?=getComboKelurahanByKec($data->KD_KELURAHAN,'KD_KELURAHAN','desa_kel_id_combo_ds_gizi','required','')?>
	<?=getComboPuskesmasByKec($data->KD_PUSKESMAS,'KD_PUSKESMAS','puskesmas_id_combo_ds_gizi','required','')?>
	<fieldset>
		<span>
		<label>Bulan*</label>
		<select name="BULAN" required>
			<option value="">- pilih bulan -</option>
			<option value="01" <?=$data->BULAN=='01'?'selected':'';?> >Januari</option>
			<option value="02" <?=$data->BULAN=='02'?'selected':'';?> >Februari</option>
			<option value="03" <?=$data->BULAN=='03'?'selected':'';?> >Maret</option>
			<option value="04" <?=$data->BULAN=='04'?'selected':'';?> >April</option>
			<option value="05" <?=$data->BULAN=='05'?'selected':'';?> >Mei</option>
			<option value="06" <?=$data->BULAN=='06'?'selected':'';?> >Juni</option>
			<option value="07" <?=$data->BULAN=='07'?'selected':'';?> >Juli</option>
			<option value="08" <?=$data->BULAN=='08'?'selected':'';?> >Agustus</option>
			<option value="09" <?=$data->BULAN=='09'?'selected':'';?> >September</option>
			<option value="10" <?=$data->BULAN=='10'?'selected':'';?> >Oktober</option>
			<option value="11" <?=$data->BULAN=='11'?'selected':'';?> >November</option>
			<option value="12" <?=$data->BULAN=='12'?'selected':'';?> >Desember</option>
		</select>
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>Tahun*</label>
		<input type="text" name="TAHUN" id="tahun_ds_gizi" value="<?=$data->TAHUN?>" required />
		</span>
	</fieldset>
	</br>
	<div class="subformtitle3">LAKI-LAKI</div>
	<fieldset>
		<span>
		<label>BAYI (0 - <6 BL) (S)</label>
		<input type="text" name="BAYI_L_0_6_S" value="<?=$data->BAYI_L_0_6_S?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (6 - 12 BL) (S)</label>
		<input type="text" name="BAYI_L_6_12_S" value="<?=$data->BAYI_L_6_12_S?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12 - 36 BL) (S)</label>
		<input type="text" name="ANAK_L_12_36_S" value="<?=$data->ANAK_L_12_36_S?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (37 - 60 BL) (S)</label>
		<input type="text" name="ANAK_L_37_60_S" value="<?=$data->ANAK_L_37_60_S?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (0-<12 BL) YG MEMILIKI KMS (K)</label>
		<input type="text" name="BAYI_L_0_12_KMS_K" value="<?=$data->BAYI_L_0_12_KMS_K?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12-36 BL) YG MEMILIKI KMS (K)</label>
		<input type="text" name="ANAK_L_12_36_KMS_K" value="<?=$data->ANAK_L_12_36_KMS_K?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (37-60 BL) YG MEMILIKI KMS (K)</label>
		<input type="text" name="ANAK_L_37_60_KMS_K" value="<?=$data->ANAK_L_37_60_KMS_K?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (0-<12 BL) YG DITIMBANG (D)</label>
		<input type="text" name="BAYI_L_0_12_D" value="<?=$data->BAYI_L_0_12_D?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12-36 BL) YG DITIMBANG (D)</label>
		<input type="text" name="ANAK_L_12_36_D" value="<?=$data->ANAK_L_12_36_D?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (37-60 BL) YG DITIMBANG (D)</label>
		<input type="text" name="ANAK_L_37_60_D" value="<?=$data->ANAK_L_37_60_D?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (0-<12 BL) YG NAIK TIMBANGANNYA (N)</label>
		<input type="text" name="BAYI_L_0_12_N" value="<?=$data->BAYI_L_0_12_N?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12-36 BL) YG NAIK TIMBANGANNYA (N)</label>
		<input type="text" name="ANAK_L_12_36_N" value="<?=$data->ANAK_L_12_36_N?>" />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (37-60 BL) YG NAIK TIMBANGANNYA (N)</label>
		<input type="text" name="ANAK_L_37_60_N" value="<?=$data->ANAK_L_37_60_N?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI PERTAMA KALI MENIMBANG (B1)</label>
		<input type="text" name="BAYI_L_PK_MENIMBANG_B1" value="<?=$data->BAYI_L_PK_MENIMBANG_B1?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI KEENAM KALI MENIMBANG (B6)</label>
		<input type="text" name="BAYI_L_KK_MENIMBANG_B6" value="<?=$data->BAYI_L_KK_MENIMBANG_B6?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (0-<12 BL) DENGAN GIZI BURUK MENURUT WHO NCHS</label>
		<input type="text" name="BAYI_L_0_12_G_BURUK_WHO_NCS" value="<?=$data->BAYI_L_0_12_G_BURUK_WHO_NCS?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (0-<12 BL) DENGAN GIZI KURANG</label>
		<input type="text" name="BAYI_L_0_12_G_KURANG" value="<?=$data->BAYI_L_0_12_G_KURANG?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (0-<12 BL) DENGAN GIZI BAIK</label>
		<input type="text" name="BAYI_L_0_12_G_BAIK" value="<?=$data->BAYI_L_0_12_G_BAIK?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (0-<12 BL) DENGAN GIZI LEBIH</label>
		<input type="text" name="BAYI_L_0_12_G_LEBIH" value="<?=$data->BAYI_L_0_12_G_LEBIH?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12-36 BL) DENGAN GIZI BURUK</label>
		<input type="text" name="ANAK_L_12_36_G_BURUK" value="<?=$data->ANAK_L_12_36_G_BURUK?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12-36 BL) DENGAN GIZI KURANG</label>
		<input type="text" name="ANAK_L_12_36_G_KURANG" value="<?=$data->ANAK_L_12_36_G_KURANG?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12-36 BL) DENGAN GIZI BAIK</label>
		<input type="text" name="ANAK_L_12_36_G_BAIK" value="<?=$data->ANAK_L_12_36_G_BAIK?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12-36 BL) DENGAN GIZI LEBIH</label>
		<input type="text" name="ANAK_L_12_36_G_LEBIH" value="<?=$data->ANAK_L_12_36_G_LEBIH?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (36-60 BL) DENGAN GIZI BURUK</label>
		<input type="text" name="ANAK_L_36_60_G_BURUK" value="<?=$data->ANAK_L_36_60_G_BURUK?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (36-60 BL) DENGAN GIZI KURANG</label>
		<input type="text" name="ANAK_L_36_60_G_KURANG" value="<?=$data->ANAK_L_36_60_G_KURANG?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (36-60 BL) DENGAN GIZI BAIK</label>
		<input type="text" name="ANAK_L_36_60_G_BAIK" value="<?=$data->ANAK_L_36_60_G_BAIK?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (36-60 BL) DENGAN GIZI LEBIH</label>
		<input type="text" name="ANAK_L_36_60_G_LEBIH" value="<?=$data->ANAK_L_36_60_G_LEBIH?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (6 -<12 BL) YANG MENDAPAT KAPSUL VIT.A</label>
		<input type="text" name="BAYI_L_6_12_K_VIT_A" value="<?=$data->BAYI_L_6_12_K_VIT_A?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12-60 BL) YANG MENDAPAT KAPSUL VIT.A</label>
		<input type="text" name="ANAK_L_12_60_K_VIT_A" value="<?=$data->ANAK_L_12_60_K_VIT_A?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI UMUR 6 BULAN YANG MENDAPAT ASI EKSKLUSIF</label>
		<input type="text" name="BAYI_L_6_ASI_EKSKLUSIF" value="<?=$data->BAYI_L_6_ASI_EKSKLUSIF?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI BGM MENDAPAT MP ASI :</label>
		<input type="text" name="BAYI_L_BGM_MP_ASI" value="<?=$data->BAYI_L_BGM_MP_ASI?>"  />
		</span>
	</fieldset>
	</br>
	<div class="subformtitle3">PEREMPUAN</div>
	<fieldset>
		<span>
		<label>BAYI (0 - <6 BL) (S)</label>
		<input type="text" name="BAYI_P_0_6_S" value="<?=$data->BAYI_P_0_6_S?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (6 - 12 BL) (S)</label>
		<input type="text" name="BAYI_P_6_12_S" value="<?=$data->BAYI_P_6_12_S?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12 - 36 BL) (S)</label>
		<input type="text" name="ANAK_P_12_36_S" value="<?=$data->ANAK_P_12_36_S?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (37 - 60 BL) (S)</label>
		<input type="text" name="ANAK_P_37_60_S" value="<?=$data->ANAK_P_37_60_S?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (0-<12 BL) YG MEMILIKI KMS (K)</label>
		<input type="text" name="BAYI_P_0_12_KMS_K" value="<?=$data->BAYI_P_0_12_KMS_K?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12-36 BL) YG MEMILIKI KMS (K)</label>
		<input type="text" name="ANAK_P_12_36_KMS_K" value="<?=$data->ANAK_P_12_36_KMS_K?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (37-60 BL) YG MEMILIKI KMS (K)</label>
		<input type="text" name="ANAK_P_37_60_KMS_K" value="<?=$data->ANAK_P_37_60_KMS_K?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (0-<12 BL) YG DITIMBANG (D)</label>
		<input type="text" name="BAYI_P_0_12_D" value="<?=$data->BAYI_P_0_12_D?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12-36 BL) YG DITIMBANG (D)</label>
		<input type="text" name="ANAK_P_12_36_D" value="<?=$data->ANAK_P_12_36_D?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (37-60 BL) YG DITIMBANG (D)</label>
		<input type="text" name="ANAK_P_37_60_D" value="<?=$data->ANAK_P_37_60_D?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (0-<12 BL) YG NAIK TIMBANGANNYA (N)</label>
		<input type="text" name="BAYI_P_0_12_N" value="<?=$data->BAYI_P_0_12_N?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12-36 BL) YG NAIK TIMBANGANNYA (N)</label>
		<input type="text" name="ANAK_P_12_36_N" value="<?=$data->ANAK_P_12_36_N?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (37-60 BL) YG NAIK TIMBANGANNYA (N)</label>
		<input type="text" name="ANAK_P_37_60_N" value="<?=$data->ANAK_P_37_60_N?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI PERTAMA KALI MENIMBANG (B1)</label>
		<input type="text" name="BAYI_P_PK_MENIMBANG_B1" value="<?=$data->BAYI_P_PK_MENIMBANG_B1?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI KEENAM KALI MENIMBANG (B6)</label>
		<input type="text" name="BAYI_P_KK_MENIMBANG_B6" value="<?=$data->BAYI_P_KK_MENIMBANG_B6?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (0-<12 BL) DENGAN GIZI BURUK MENURUT WHO NCHS</label>
		<input type="text" name="BAYI_P_0_12_G_BURUK_WHO_NCS" value="<?=$data->BAYI_P_0_12_G_BURUK_WHO_NCS?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (0-<12 BL) DENGAN GIZI KURANG</label>
		<input type="text" name="BAYI_P_0_12_G_KURANG" value="<?=$data->BAYI_P_0_12_G_KURANG?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (0-<12 BL) DENGAN GIZI BAIK</label>
		<input type="text" name="BAYI_P_0_12_G_BAIK" value="<?=$data->BAYI_P_0_12_G_BAIK?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (0-<12 BL) DENGAN GIZI LEBIH</label>
		<input type="text" name="BAYI_P_0_12_G_LEBIH" value="<?=$data->BAYI_P_0_12_G_LEBIH?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12-36 BL) DENGAN GIZI BURUK</label>
		<input type="text" name="ANAK_P_12_36_G_BURUK" value="<?=$data->ANAK_P_12_36_G_BURUK?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12-36 BL) DENGAN GIZI KURANG</label>
		<input type="text" name="ANAK_P_12_36_G_KURANG" value="<?=$data->ANAK_P_12_36_G_KURANG?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12-36 BL) DENGAN GIZI BAIK</label>
		<input type="text" name="ANAK_P_12_36_G_BAIK" value="<?=$data->ANAK_P_12_36_G_BAIK?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12-36 BL) DENGAN GIZI LEBIH</label>
		<input type="text" name="ANAK_P_12_36_G_LEBIH" value="<?=$data->ANAK_P_12_36_G_LEBIH?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (36-60 BL) DENGAN GIZI BURUK</label>
		<input type="text" name="ANAK_P_36_60_G_BURUK" value="<?=$data->ANAK_P_36_60_G_BURUK?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (36-60 BL) DENGAN GIZI KURANG</label>
		<input type="text" name="ANAK_P_36_60_G_KURANG" value="<?=$data->ANAK_P_36_60_G_KURANG?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (36-60 BL) DENGAN GIZI BAIK</label>
		<input type="text" name="ANAK_P_36_60_G_BAIK" value="<?=$data->ANAK_P_36_60_G_BAIK?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (36-60 BL) DENGAN GIZI LEBIH</label>
		<input type="text" name="ANAK_P_36_60_G_LEBIH" value="<?=$data->ANAK_P_36_60_G_LEBIH?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI (6 -<12 BL) YANG MENDAPAT KAPSUL VIT.A</label>
		<input type="text" name="BAYI_P_6_12_K_VIT_A" value="<?=$data->BAYI_P_6_12_K_VIT_A?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>ANAK (12-60 BL) YANG MENDAPAT KAPSUL VIT.A</label>
		<input type="text" name="ANAK_P_12_60_K_VIT_A" value="<?=$data->ANAK_P_12_60_K_VIT_A?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI UMUR 6 BULAN YANG MENDAPAT ASI EKSKLUSIF</label>
		<input type="text" name="BAYI_P_6_ASI_EKSKLUSIF" value="<?=$data->BAYI_P_6_ASI_EKSKLUSIF?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BAYI BGM MENDAPAT MP ASI :</label>
		<input type="text" name="BAYI_P_BGM_MP_ASI" value="<?=$data->BAYI_P_BGM_MP_ASI?>"  />
		</span>
	</fieldset>
	<br/>
	<fieldset>
		<span>
		<label>IBU HAMIL YG MENDAPAT TTD/Fe 30</label>
		<input type="text" name="IBU_HAMIL_TTD_FE_30" value="<?=$data->IBU_HAMIL_TTD_FE_30?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>IBU HAMIL YG MENDAPAT TTD/Fe 60</label>
		<input type="text" name="IBU_HAMIL_TTD_FE_60" value="<?=$data->IBU_HAMIL_TTD_FE_60?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>IBU HAMIL YG MENDAPAT TTD/Fe 90</label>
		<input type="text" name="IBU_HAMIL_TTD_FE_90" value="<?=$data->IBU_HAMIL_TTD_FE_90?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BUMIL KEK BARU</label>
		<input type="text" name="BUMIL_KEK_BARU" value="<?=$data->BUMIL_KEK_BARU?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>BUMIL KEK LAMA</label>
		<input type="text" name="BUMIL_KEK_LAMA" value="<?=$data->BUMIL_KEK_LAMA?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>VITAMIN A YANG ADA / SISA (100.000 IU) :</label>
		<input type="text" name="VIT_A_100RB_IU" value="<?=$data->VIT_A_100RB_IU?>"  />
		</span>
	</fieldset><fieldset>
		<span>
		<label>VITAMIN A YANG ADA / SISA (200.000 IU) :</label>
		<input type="text" name="VIT_A_200RB_IU" value="<?=$data->VIT_A_200RB_IU?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>PENDERITA GONDOK PEREMPUAN GRADE 0 PD WUS BARU :</label>
		<input type="text" name="P_GONDOK_P_G_0_WUS_BARU" value="<?=$data->P_GONDOK_P_G_0_WUS_BARU?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>PENDERITA GONDOK PEREMPUAN GRADE I PD WUS BARU :</label>
		<input type="text" name="P_GONDOK_P_G_1_WUS_BARU" value="<?=$data->P_GONDOK_P_G_1_WUS_BARU?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>PENDERITA GONDOK PEREMPUAN GRADE II PD WUS BARU :</label>
		<input type="text" name="P_GONDOK_P_G_2_WUS_BARU" value="<?=$data->P_GONDOK_P_G_2_WUS_BARU?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>PENDERITA GONDOK PEREMPUAN GRADE 0 PD WUS LAMA :</label>
		<input type="text" name="P_GONDOK_P_G_0_WUS_LAMA" value="<?=$data->P_GONDOK_P_G_0_WUS_LAMA?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>PENDERITA GONDOK PEREMPUAN GRADE I PD WUS LAMA :</label>
		<input type="text" name="P_GONDOK_P_G_1_WUS_LAMA" value="<?=$data->P_GONDOK_P_G_1_WUS_LAMA?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>PENDERITA GONDOK PEREMPUAN GRADE II PD WUS LAMA :</label>
		<input type="text" name="P_GONDOK_P_G_2_WUS_LAMA" value="<?=$data->P_GONDOK_P_G_2_WUS_LAMA?>"  />
		</span>
	</fieldset>
	<br/>
	<div class="subformtitle3">PENDERITA BIBIR SUMBING :</div>
	<fieldset>
		<span>
		<label>LAKI-LAKI</label>
		<input type="text" name="BIBIR_SUMBING_L" value="<?=$data->BIBIR_SUMBING_L?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>PEREMPUAN</label>
		<input type="text" name="BIBIR_SUMBING_P" value="<?=$data->BIBIR_SUMBING_P?>"  />
		</span>
	</fieldset>
	<div class="subformtitle3">GIZI BURUK MENDAPAT PERAWATAN :</div>
	<fieldset>
		<span>
		<label>LAKI-LAKI</label>
		<input type="text" name="GIZI_BURUK_PERAWATAN_L" value="<?=$data->GIZI_BURUK_PERAWATAN_L?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>PEREMPUAN</label>
		<input type="text" name="GIZI_BURUK_PERAWATAN_P" value="<?=$data->GIZI_BURUK_PERAWATAN_P?>"  />
		</span>
	</fieldset>
	<br/>
	<fieldset>
		<span>
		<label>JML DESA/KEL DISURVEY :</label>
		<input type="text" name="JML_KEL_SURVEY" value="<?=$data->JML_KEL_SURVEY?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JUMLAH DESA/KEL DG GARAM BERYODIUM YG BAIK :</label>
		<input type="text" name="JML_KEL_GARAM_Y_BAIK" value="<?=$data->JML_KEL_GARAM_Y_BAIK?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JML DESA/KEL ENDEMIS SEDANG & BERAT :</label>
		<input type="text" name="JML_KEL_ENDEMIS_SB" value="<?=$data->JML_KEL_ENDEMIS_SB?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<label>JML WUS DI DESA/KEL ENDEMIS SEDANG & BERAT YG DIBERI KAPSUL YODIUM</label>
		<input type="text" name="JML_WUS_KEL_ENDEMIS_SB_YODIUM" value="<?=$data->JML_WUS_KEL_ENDEMIS_SB_YODIUM?>"  />
		</span>
	</fieldset>
	<fieldset>
		<span>
		<input type="submit" name="bt1" value="Proses Data"/>
		</span>
	</fieldset>
</form>
</div >
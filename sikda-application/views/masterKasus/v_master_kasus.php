<script type="text/javascript" src="<?=base_url()?>assets/customjs/master_kasus.js"></script>

<div class="mycontent">
<div id="dialogmasterKasus_new" style="color:red;font-size:.75em;display:none" title="Confirmation Required">
  Hapus Data?
</div>
<div class="formtitle">Master Kasus</div>
	<form id="formmasterKasus">
		<div class="gridtitle">Daftar Kasus<span class="tambahdata" id="masterKasusadd">Input Kasus</span></div>
		
		<fieldset style="margin:0 13px 0 13px ">
						<span>
						<label>Tanggal Input (dd-mm-yyyy)</label>
						<input type="text" name="dari" class="dari" id="darimasterKasus"/>
						sampai
						<input type="text" name="sampai" class="sampai" id="sampaimasterKasus"/>
						</span>
						<span>
						<label>Cari Berdasarkan</label>
						<select name="keyword" id="keywordmasterKasus">
						<option value="VARIABEL_ID">VARIABEL ID</option>
						<option value="KD_JENIS_KASUS">KODE JENIS KASUS</option>
						<option value="PARENT_ID">PARENT ID</option>
						<option value="VARIABEL_DATA">VAR. DATA</option>
						<option value="VARIABEL_DEFINISI">VAR. DEFINISI</option>
						<option value="PILIHAN_VALUE">PILIHAN VALUE</option>
						<option value="IROW">I ROW</option>
						<option value="KETERANGAN">KETERANGAN</option>
						</select>
						<input type="text" name="carinama" id="carinamamasterKasus"/>
						<input type="submit" class="cari" value="&nbsp;Cari&nbsp;" id="carimasterKasus"/>
						<input type="submit" class="reset" value="&nbsp;Reset&nbsp;" id="resetmasterKasus"/>
						</span>
		</fieldset>
		
		<div class="paddinggrid">
		<table id="listmasterKasus"></table>
		<div id="pagermasterKasus"></div>
		</div >
	</form>
</div>

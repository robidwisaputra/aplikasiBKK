<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="modal fade bs-modal-sm dataConfirmModal1" tableindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
				
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>
					<h4 class="modal-title" id="dataConfrimLabel"><b>Data Pembuat</b></h4>
					</div>
					
					<div class="modal-body">
					<table border="0" style="text-align:left;font-weight:bold;">
					<tr><td colspan="2"><center><img src="<?php echo base_url().'assets/images/author.jpg'?>" style="width:240px;height:240px;padding-left:30px;padding-top:20px;"></center></td></tr>
					<tr><td calspan="2">&nbsp;</td></tr>
					<tr><td>Nama</td> 	    <td>: Andri Irawan </td></tr>
					<tr><td>NIM &nbsp;&nbsp;&nbsp;</td>	<td>: 3215249</td></tr>
					<tr><td>HP/WA </td>      <td>: 085720196182</td></tr>
					</table>
					</div>
					
					<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i> Keluar</button>
					</div>
				</div></div></div>

	    
<script type="text/javascript">	
	$(document).ready(function () {
		// konfirmasi keluar
		$('a[pembuat]').click(function(ev) {
			$('.dataConfirmModal1').modal({show:true});
			return false;
		});
		
		// konfirmasi keluar
		$('a[data-confirm-keluar]').click(function(ev) {
			var href = $(this).attr('href');
			if( ! $('.dataConfirmModal2').length ) {
				$('body').append('<div class="modal fade bs-modal-sm dataConfirmModal2" tableindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">'
				+'<div class="modal-dialog modal-sm">'
				+'<div class="modal-content">'
				
					+'<div class="modal-header">'
					+'<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>'
					+'<h4 class="modal-title" id="dataConfrimLabel"><b>Konfirmasi Keluar</b></h4>'
					+'</div>'
					
					+'<div class="modal-body">Anda yakin akan keluar dari halaman ini?</div>'
					
					+'<div class="modal-footer">'
					+'<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" aria-hiden=""true"><i class="glyphicon glyphicon-ban-circle"></i> Batal</button>'
					+'<a class="btn btn-danger btn-sm" aria-hiden="true" id="dataConfirmOK"><i class="glyphicon glyphicon-remove"></i> Keluar</a>'
					+'</div>'
				+'</div></div></div>');
			}
			
			$('.dataConfirmModal2').find('.modal-body').text($(this).attr('data-confirm-keluar'));
			$('#dataConfirmOK').attr('href',href);
			$('.dataConfirmModal2').modal({show:true});
			return false;
		});
		
		// konfirmasi hapus
		$('a[data-confirm-hapus]').click(function(ev) {
			var href = $(this).attr('href');
			if( ! $('.dataConfirmModal3').length ) {
				$('body').append('<div class="modal fade bs-modal-sm dataConfirmModal3" tableindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">'
				+'<div class="modal-dialog modal-sm">'
				+'<div class="modal-content">'
				
					+'<div class="modal-header">'
					+'<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></button>'
					+'<h4 class="modal-title" id="dataConfrimLabel"><b>Konfirmasi Hapus</b></h4>'
					+'</div>'
					
					+'<div class="modal-body">Anda yakin akan hapus data ini?</div>'
					
					+'<div class="modal-footer">'
					+'<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" aria-hiden=""true"><i class="glyphicon glyphicon-ban-circle"></i> Batal</button>'
					+'<a class="btn btn-danger btn-sm" aria-hiden="true" id="dataConfirmOK"><i class="glyphicon glyphicon-remove"></i> Hapus</a>'
					+'</div>'
				+'</div></div></div>');
			}
			
			$('.dataConfirmModal3').find('.modal-body').text($(this).attr('data-confirm-hapus'));
			$('#dataConfirmOK').attr('href',href);
			$('.dataConfirmModal3').modal({show:true});
			return false;
		});
		
		// iCheck checkbox and radio
		$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
			checkboxClass: 'icheckbox_minimal-blue',
			radioClass   : 'iradio_minimal-blue'
		})
		$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
			checkboxClass: 'icheckbox_minimal-red',
			radioClass   : 'iradio_minimal-red'
		});
		
		// datatables
		$('.fdatatables').DataTable({"lengthMenu":[[10,25,50,-1],[10,25,50,"All"]],});
		$('.fdatatables-custome').DataTable({
		  'paging'      : true,
		  'lengthChange': false,
		  'searching'   : false,
		  'ordering'    : true,
		  'info'        : true,
		  'autoWidth'   : false
		});
		
		// tooltip
		$(".ftooltip").tooltip();

		// kalender
		$(".fkalender").datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true,
			todayHighlight: true
		});
		
		// editor tinymce
		tinymce.init({
			selector: '.ftinymce-small',
			theme: 'modern',
			plugins : 'link image code textcolor colorpicker emoticons table',
			menubar: false, 
			toolbar1: 'bullist numlist | forecolor | strikethrough',
		});
		tinymce.init({
			selector: '.ftinymce-mini',
			theme: 'modern',
			//plugins : 'link image code fullpage textcolor colorpicker emoticons table',
			plugins : 'link image code textcolor colorpicker emoticons table',
			menubar: false, 
			toolbar1: 'fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | table | forecolor backcolor link | strikethrough subscript superscript',
		});
		tinymce.init({
			selector: '.ftinymce-standar',
			theme: 'modern',
			//plugins : 'link image code fullpage textcolor colorpicker emoticons table',
			plugins : 'link image code textcolor colorpicker emoticons table',
			menubar: false, 
			toolbar1: 'undo redo cut copy paste | styleselect | fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify',
			toolbar2: 'bullist numlist outdent indent | table | forecolor backcolor emoticons link | strikethrough subscript superscript removeformat | code',
		});
		
/********** FORM **********/
		// json kecamatan
		$('#kecamatan_id').change(function(){
			var data = this.value;
			$.get("<?php echo site_url(); ?>sistem/json/combo_desa/"+data, function(obj){
				$('#desa_id').html(obj);
			});
		});
			
		// validasi angka
		$(".validasi-angka").on("keyup", function(){
			var valid = /^\d{0,15}(\.\d{0,2})?$/.test(this.value),
				val = this.value;
			
			if(!valid){
				console.log("Invalid input!");
				this.value = val.substring(0, val.length - 1);
			}
		});
		
		// preview upload gambar
		function uploadPreview(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
		 
				reader.onload = function (e) {
					$('#gambar_upload_preview').attr('src', e.target.result);
				}
		 
				reader.readAsDataURL(input.files[0]);
			}
			
			$("#remove_upload_preview").show().css("margin-right","10px");
		}
		$("#browse_upload_preview").change(function(){
			uploadPreview(this);
		});
		
		// preview upload gambar2
		function uploadPreview2(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
		 
				reader.onload = function (e) {
					$('#gambar_upload_preview2').attr('src', e.target.result);
				}
		 
				reader.readAsDataURL(input.files[0]);
			}
			
			$("#remove_upload_preview2").show().css("margin-right","10px");
		}
		$("#browse_upload_preview2").change(function(){
			uploadPreview2(this);
		});
		
		// preview upload lampiran
		$("#browse_upload_lampiran").change(function(){
			$("#batal_lampiran").show().css("margin-right","10px");
		});
		
		// tautan judul tulisan
		$('#judul_tulisan').keyup(function() {
			var str = $('#judul_tulisan').val();	
			var str2 = str.replace(/[^a-z0-9]+/gi, '-').replace(/^-*|-*$/g, '').toLowerCase();
									
			$("#ftautan").html(str2);
		});
		
		// pengaturan
		$(".browse_logo").click(function () {
			$("#browse_logo_input").click();
		});
		function logoPreview(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
		 
				reader.onload = function (e) {
					$('#browse_logo_preview').attr('src', e.target.result);
				}
		 
				reader.readAsDataURL(input.files[0]);
			}
			
			$("#remove_logo_preview").show().css("margin-right","10px");
		}
		$("#browse_logo_input").change(function(){
			logoPreview(this);
		});
		
		$(".browse_logo_kecil").click(function () {
			$("#browse_logo_kecil_input").click();
		});
		function logoKecilPreview(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
		 
				reader.onload = function (e) {
					$('#browse_logo_kecil_preview').attr('src', e.target.result);
				}
		 
				reader.readAsDataURL(input.files[0]);
			}
			
			$("#remove_logo_kecil_preview").show().css("margin-right","10px");
		}
		$("#browse_logo_kecil_input").change(function(){
			logoKecilPreview(this);
		});
		
		$(".browse_icon").click(function () {
			$("#browse_icon_input").click();
		});
		function iconPreview(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
		 
				reader.onload = function (e) {
					$('#browse_icon_preview').attr('src', e.target.result);
				}
		 
				reader.readAsDataURL(input.files[0]);
			}
			
			$("#remove_icon_preview").show().css("margin-right","10px");
		}
		$("#browse_icon_input").change(function(){
			iconPreview(this);
		});
	
		/*** VALIDASI FORM ***/
		$('#fform-instansi').bootstrapValidator({
			excluded: [':disabled'],
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				nama_singkatan: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
					},
				},
				kode: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
					},
				},
				bidang: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
					},
				},
				nss: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
					},
				},
				npsn: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
					},
				},
				alamat: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
					},
				},
				desa: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
						regexp: {
							regexp: /^[a-zA-Z\s\.,-]+$/i,
							message: 'Karakter yang anda masukan tidak diijinkan',
						},
					},
				},
				kecamatan: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
						regexp: {
							regexp: /^[a-zA-Z\s\.,-]+$/i,
							message: 'Karakter yang anda masukan tidak diijinkan',
						},
					},
				},
				kabupaten: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
						regexp: {
							regexp: /^[a-zA-Z\s\.,-]+$/i,
							message: 'Karakter yang anda masukan tidak diijinkan',
						},
					},
				},
				provinsi: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
						regexp: {
							regexp: /^[a-zA-Z\s\.,-]+$/i,
							message: 'Karakter yang anda masukan tidak diijinkan',
						},
					},
				},
				kode_pos: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
					},
				},
				telp: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
					},
				},
				/*fax: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
					},
				},*/
				web: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
						uri: {
							message: 'Website tidak benar',
						}
					},
				},
				email: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
						emailAddress: {
							message: 'E-mail tidak benar',
						},
					},
				},
				moto: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
					},
				},
				kepala: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
					},
				},
				kepala_nip: {
					validators: {
						notEmpty: {
							message: 'Tidak boleh kosong',
						},
					},
				},
				icon: {
					validators: {
						file: {
							extension: 'jpeg,jpg,png,gif,ico',
							type: 'image/jpeg,image/png,image/gif,image/x-icon',
							maxSize: 2048 * 1024,
							message: '<div class="alert alert-danger">File yang dipilih tidak diijinkan</div>',
						},
					},
				},
				logo: {
					validators: {
						file: {
							extension: 'jpeg,jpg,png',
							type: 'image/jpeg,image/png',
							maxSize: 2048 * 1024,
							message: '<div class="alert alert-danger">File yang dipilih tidak diijinkan</div>',
						},
					},
				},
			},
		});
		$('#fform-identitas-akun').bootstrapValidator({
			fields: {
				nama: {
					validators: {
						notEmpty: {
							message: 'Nama pengguna harus diisi',
						},
					},
				},
				nik: {
					validators: {
						notEmpty: {
							message: 'NIK harus diisi',
						},
					},
				},
				email: {
					validators: {
						notEmpty: {
							message: 'E-mail harus diisi',
						},
						emailAddress: {
							message: 'E-mail tidak benar',
						},
					},
				},
				telepon: {
					validators: {
						notEmpty: {
							message: 'Telepon harus diisi',
						},
					},
				},
			},
		});
		$('#fform-password').bootstrapValidator({
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh',
			},
			fields: {
				password: {
					validators: {
						notEmpty: {
							message: 'Kata sandi lama tidak boleh kosong',
						},
						remote: {
							url: '<?php echo site_url(); ?>cek-password',
							message: '<img src=<?php base_url();?>"/images/floading.gif" /> <span style="color:#B94A48;">Kata sandi lama salah</span>',
						},
					},
				}, 
				txtPasswordBaru: {
					validators: {
						callback: {
							callback: function(value, validator) {
								if (value.length < 8) {
									return {
										valid: false,
										message: 'Kata sandi tidak boleh kosong, minimal 8 karakter'
									}
								}

								if (value === value.toLowerCase()) {
									return {
										valid: false,
										message: 'Kata sandi harus ada karakter huruf besar, minimal 1 huruf'
									}
								}
								if (value === value.toUpperCase()) {
									return {
										valid: false,
										message: 'Kata sandi harus ada karakter huruf kecil, minimal 1 huruf'
									}
								}
								if (value.search(/[0-9]/) < 0) {
									return {
										valid: false,
										message: 'Kata sandi harus ada karakter angka, minimal 1 angka'
									}
								}
								if (value.search(/[$@!%*?&]/) < 0) {
									return {
										valid: false,
										message: 'Kata sandi harus ada simbol, minimal 1 simbol'
									}
								}

								return true;
							}
						},
					},
				},
				txtRetypePasswordBaru: {
					validators: {
						notEmpty: {
							message: 'Ulangi kata sandi baru tidak boleh kosong',
						},
						identical: {
							field: 'txtPasswordBaru',
							message: 'Ulangi kata sandi Baru tidak sama dengan kata sandi Baru',
						},
					},
				},
			},
		});
		$('#fform-pengguna').bootstrapValidator({
			fields: {
				nama: {
					validators: {
						notEmpty: {
							message: 'Nama pengguna harus diisi',
						},
					},
				},
				nik: {
					validators: {
						notEmpty: {
							message: 'NIK harus diisi',
						},
					},
				},
				kelamin: {
					validators: {
						notEmpty: {
							message: 'Jenis kelamin harus dipilih',
						},
					},
				},
				email: {
					validators: {
						notEmpty: {
							message: 'E-mail harus diisi',
						},
						emailAddress: {
							message: 'E-mail tidak benar',
						},
					},
				},
				telepon: {
					validators: {
						notEmpty: {
							message: 'Telepon harus diisi',
						},
					},
				},
				grup_id: {
					validators: {
						notEmpty: {
							message: 'Grup harus dipilih',
						},
					},
				},
				username: {
					validators: {
						notEmpty: {
							message: 'Nama pengguna harus diisi',
						},
						stringLength: {
							min: 6,
							max: 30,
							message: 'Nama pengguna minimal 6 karakter, maksimal 30 karakter',
						},
						regexp: {
							regexp: /^[a-zA-Z0-9_\.]+$/,
							message: 'Username hanya boleh berisi huruf, nomor, titik dan underscore',
						},
						remote: {
							url: "<?php echo site_url(); ?>unik-username",
							data: function(validator){
								return {
									username:$('[name="username"]').val(),
									id:$('[name="id"]').val(),
								};
							},
							message: '<img src="<?php echo base_url(); ?>/images/floading.gif" /> <span style="color:#B94A48;">Username Nama sudah ada...</span>',
						}, 
					},
				},
				password: {
					validators: {
						callback: {
							callback: function(value, validator) {
								if (value.length < 8) {
									return {
										valid: false,
										message: 'Kata sandi tidak boleh kosong, minimal 8 karakter'
									}
								}

								if (value === value.toLowerCase()) {
									return {
										valid: false,
										message: 'Kata sandi harus ada karakter huruf besar, minimal 1 huruf'
									}
								}
								if (value === value.toUpperCase()) {
									return {
										valid: false,
										message: 'Kata sandi harus ada karakter huruf kecil, minimal 1 huruf'
									}
								}
								if (value.search(/[0-9]/) < 0) {
									return {
										valid: false,
										message: 'Kata sandi harus ada karakter angka, minimal 1 angka'
									}
								}
								if (value.search(/[$@!%*?&]/) < 0) {
									return {
										valid: false,
										message: 'Kata sandi harus ada simbol, minimal 1 simbol'
									}
								}

								return true;
							}
						},
					},
				},
				password_ulangi: {
					validators: {
						notEmpty: {
							message: 'Ulangi kata sandi tidak boleh kosong',
						},
						identical: {
							field: 'password',
							message: 'Ulangi kata sandi tidak sama dengan kata sandi',
						},
					},
				},
			},
		});
		
		$('#fform-cluster').bootstrapValidator({
			fields: {
				nama: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
						remote: {
							url: "<?php echo site_url(); ?>unik-nama",
							data: function(validator){
								return {
									nama:$('[name="nama"]').val(),
									id:$('[name="id"]').val(),
									alias:'cluster_wisata',
								};
							},
							message: '<img src="<?php base_url();?>/images/floading.gif" /> <span style="color:#B94A48;">Nama sudah ada...</span>',
						},
						stringLength: {
							message: 'Data maksimal 50 karakter',
							max: function (value, validator, $field) {
								return 50 - (value.match(/\r/g) || []).length;
							}
						},
					},
				},
			},
		});
		$('#fform-cluster-wilayah').bootstrapValidator({
			fields: {
				kecamatan_id: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
			},
		});
		$('#fform-kawasan').bootstrapValidator({
			fields: {
				nama: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
						remote: {
							url: "<?php echo site_url(); ?>unik-nama",
							data: function(validator){
								return {
									nama:$('[name="nama"]').val(),
									id:$('[name="id"]').val(),
									alias:'kawasan_wisata',
								};
							},
							message: '<img src="<?php base_url();?>/images/floading.gif" /> <span style="color:#B94A48;">Nama sudah ada...</span>',
						},
						stringLength: {
							message: 'Data maksimal 50 karakter',
							max: function (value, validator, $field) {
								return 50 - (value.match(/\r/g) || []).length;
							}
						},
					},
				},
			},
		});
		$('#fform-kawasan-wilayah').bootstrapValidator({
			fields: {
				kecamatan_id: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
			},
		});
		$('#fform-destinasi').bootstrapValidator({
			fields: {
				nama: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
						remote: {
							url: "<?php echo site_url(); ?>unik-nama",
							data: function(validator){
								return {
									nama:$('[name="nama"]').val(),
									id:$('[name="id"]').val(),
									alias:'destinasi_wisata',
								};
							},
							message: '<img src="<?php base_url();?>/images/floading.gif" /> <span style="color:#B94A48;">Nama sudah ada...</span>',
						},
						stringLength: {
							message: 'Data maksimal 50 karakter',
							max: function (value, validator, $field) {
								return 50 - (value.match(/\r/g) || []).length;
							}
						},
					},
				},
			},
		});
		$('#fform-jenis').bootstrapValidator({
			fields: {
				nama: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
						remote: {
							url: "<?php echo site_url(); ?>unik-nama",
							data: function(validator){
								return {
									nama:$('[name="nama"]').val(),
									id:$('[name="id"]').val(),
									alias:'jenis_wisata',
								};
							},
							message: '<img src="<?php base_url();?>/images/floading.gif" /> <span style="color:#B94A48;">Nama sudah ada...</span>',
						},
						stringLength: {
							message: 'Data maksimal 50 karakter',
							max: function (value, validator, $field) {
								return 50 - (value.match(/\r/g) || []).length;
							}
						},
					},
				},
			},
		});
		$('#fform-obyek').bootstrapValidator({
			fields: {
				nama: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
						remote: {
							url: "<?php echo site_url(); ?>unik-nama",
							data: function(validator){
								return {
									nama:$('[name="nama"]').val(),
									id:$('[name="id"]').val(),
									alias:'wisata',
								};
							},
							message: '<img src="<?php base_url();?>/images/floading.gif" /> <span style="color:#B94A48;">Nama sudah ada...</span>',
						},
						stringLength: {
							message: 'Data maksimal 100 karakter',
							max: function (value, validator, $field) {
								return 100 - (value.match(/\r/g) || []).length;
							}
						},
					},
				},
				jenis_id: {
					validators: {
						notEmpty: {
							message: 'Data harus dipilih',
						},
					},
				},
				keterangan: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				lampiran_nama: {
					validators: {
						/* notEmpty: {
							message: 'Gambar harus dipilih',
						}, */
						file: {
							extension: 'jpeg,jpg,png,gif',
							type: 'image/jpeg,image/png,image/gif',
							maxSize: 4096 * 1024, // 4 MB
							message: '<div class="alert alert-danger">'
										+'<b>Foto yang dipilih tidak diijinkan :</b>'
										+'<br> 1. Format foto jpeg,jpg,png atau gif'
										+'<br> 2. Ukuran max 4MB</div>',
						},
					},
				},
				tahun: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				alamat: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				kecamatan_id: {
					validators: {
						notEmpty: {
							message: 'Data harus dipilih',
						},
					},
				},
				desa_id: {
					validators: {
						notEmpty: {
							message: 'Data harus dipilih',
						},
					},
				},
				longitude: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				latitude: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				peta: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
			},
		});
		$('#fform-obyek-foto').bootstrapValidator({
			excluded: [':disabled'],
			fields: {
				judul: {
					validators: {
						notEmpty: {
							message: 'Judul harus diisi',
						},
						stringLength: {
							message: 'Judul maksimal 30 karakter',
							max: function (value, validator, $field) {
								return 30 - (value.match(/\r/g) || []).length;
							}
						},
					},
				},
				foto: {
					validators: {
						notEmpty: {
							message: 'Foto harus dipilih',
						},
						file: {
							extension: 'jpeg,jpg,png,gif',
							type: 'image/jpeg,image/png,image/gif',
							maxSize: 4096 * 1024, // 4 MB
							message: '<div class="alert alert-danger">'
										+'<b>Foto yang dipilih tidak diijinkan :</b>'
										+'<br> 1. Format foto jpeg,jpg,png atau gif'
										+'<br> 2. Ukuran max 4MB</div>',
						},
					},
				},
			},
		});
		$('#fform-obyek-video').bootstrapValidator({
			excluded: [':disabled'],
			fields: {
				video: {
					validators: {
						notEmpty: {
							message: 'Video harus dipilih',
						},
						file: {
							extension: 'mp4,mpeg,3gp',
							type: 'audio/mp3,video/mp4,video/mpeg,video/3gpp',
							maxSize: 10240 * 1024, // 10 MB
							message: '<div class="alert alert-danger">'
										+'<b>Album yang dipilih tidak benar :</b>'
										+'<br> 1. Format foto mp4, mpeg atau 3gp'
										+'<br> 2. Ukuran max 10Mb</div>',
						},
					},
				},
			},
		});
		$('#fform-obyek-akomodasi').bootstrapValidator({});
		$('#fform-obyek-transportasi').bootstrapValidator({});
		$('#fform-obyek-kegiatan').bootstrapValidator({});
		$('#fform-obyek-pelengkap').bootstrapValidator({});
		$('#fform-obyek-penunjang').bootstrapValidator({});
		
		$('#fform-hotel').bootstrapValidator({
			fields: {
				nama: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
						remote: {
							url: "<?php echo site_url(); ?>unik-nama",
							data: function(validator){
								return {
									nama:$('[name="nama"]').val(),
									id:$('[name="id"]').val(),
									alias:'hotel',
								};
							},
							message: '<img src="<?php base_url();?>/images/floading.gif" /> <span style="color:#B94A48;">Nama sudah ada...</span>',
						},
						stringLength: {
							message: 'Data maksimal 100 karakter',
							max: function (value, validator, $field) {
								return 100 - (value.match(/\r/g) || []).length;
							}
						},
					},
				},
				lampiran_nama: {
					validators: {
						file: {
							extension: 'jpeg,jpg,png,gif',
							type: 'image/jpeg,image/png,image/gif',
							maxSize: 4096 * 1024, // 4 MB
							message: '<div class="alert alert-danger">'
										+'<b>Foto yang dipilih tidak diijinkan :</b>'
										+'<br> 1. Format foto jpeg,jpg,png atau gif'
										+'<br> 2. Ukuran max 4MB</div>',
						},
					},
				},
				tahun: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				klasifikasi_id: {
					validators: {
						notEmpty: {
							message: 'Data harus dipilih',
						},
					},
				},
				alamat: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				kecamatan_id: {
					validators: {
						notEmpty: {
							message: 'Data harus dipilih',
						},
					},
				},
				desa_id: {
					validators: {
						notEmpty: {
							message: 'Data harus dipilih',
						},
					},
				},
				longitude: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				latitude: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				peta: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
			},
		});
		$('#fform-hotel-foto').bootstrapValidator({});
		$('#fform-hotel-video').bootstrapValidator({});
		$('#fform-hotel-kamar').bootstrapValidator({});
		
		$('#fform-transportasi').bootstrapValidator({
			fields: {
				nama: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
						remote: {
							url: "<?php echo site_url(); ?>unik-nama",
							data: function(validator){
								return {
									nama:$('[name="nama"]').val(),
									id:$('[name="id"]').val(),
									alias:'transportasi',
								};
							},
							message: '<img src="<?php base_url();?>/images/floading.gif" /> <span style="color:#B94A48;">Nama sudah ada...</span>',
						},
						stringLength: {
							message: 'Data maksimal 100 karakter',
							max: function (value, validator, $field) {
								return 100 - (value.match(/\r/g) || []).length;
							}
						},
					},
				},
				lampiran_nama: {
					validators: {
						file: {
							extension: 'jpeg,jpg,png,gif',
							type: 'image/jpeg,image/png,image/gif',
							maxSize: 4096 * 1024, // 4 MB
							message: '<div class="alert alert-danger">'
										+'<b>Foto yang dipilih tidak diijinkan :</b>'
										+'<br> 1. Format foto jpeg,jpg,png atau gif'
										+'<br> 2. Ukuran max 4MB</div>',
						},
					},
				},
				tahun: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
			},
		});

		$('#fform-kuliner').bootstrapValidator({
			fields: {
				nama: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
						remote: {
							url: "<?php echo site_url(); ?>unik-nama",
							data: function(validator){
								return {
									nama:$('[name="nama"]').val(),
									id:$('[name="id"]').val(),
									alias:'kuliner',
								};
							},
							message: '<img src="<?php base_url();?>/images/floading.gif" /> <span style="color:#B94A48;">Nama sudah ada...</span>',
						},
						stringLength: {
							message: 'Data maksimal 100 karakter',
							max: function (value, validator, $field) {
								return 100 - (value.match(/\r/g) || []).length;
							}
						},
					},
				},
				lampiran_nama: {
					validators: {
						file: {
							extension: 'jpeg,jpg,png,gif',
							type: 'image/jpeg,image/png,image/gif',
							maxSize: 4096 * 1024, // 4 MB
							message: '<div class="alert alert-danger">'
										+'<b>Foto yang dipilih tidak diijinkan :</b>'
										+'<br> 1. Format foto jpeg,jpg,png atau gif'
										+'<br> 2. Ukuran max 4MB</div>',
						},
					},
				},
				tahun: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				alamat: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				kecamatan_id: {
					validators: {
						notEmpty: {
							message: 'Data harus dipilih',
						},
					},
				},
				desa_id: {
					validators: {
						notEmpty: {
							message: 'Data harus dipilih',
						},
					},
				},
				longitude: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				latitude: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				peta: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
			},
		});
		$('#fform-kuliner-foto').bootstrapValidator({});
		$('#fform-kuliner-menu').bootstrapValidator({});
		
		$('#fform-bingkisan').bootstrapValidator({
			fields: {
				nama: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
						remote: {
							url: "<?php echo site_url(); ?>unik-nama",
							data: function(validator){
								return {
									nama:$('[name="nama"]').val(),
									id:$('[name="id"]').val(),
									alias:'bingkisan',
								};
							},
							message: '<img src="<?php base_url();?>/images/floading.gif" /> <span style="color:#B94A48;">Nama sudah ada...</span>',
						},
						stringLength: {
							message: 'Data maksimal 100 karakter',
							max: function (value, validator, $field) {
								return 100 - (value.match(/\r/g) || []).length;
							}
						},
					},
				},
				lampiran_nama: {
					validators: {
						file: {
							extension: 'jpeg,jpg,png,gif',
							type: 'image/jpeg,image/png,image/gif',
							maxSize: 4096 * 1024, // 4 MB
							message: '<div class="alert alert-danger">'
										+'<b>Foto yang dipilih tidak diijinkan :</b>'
										+'<br> 1. Format foto jpeg,jpg,png atau gif'
										+'<br> 2. Ukuran max 4MB</div>',
						},
					},
				},
				tahun: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				alamat: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				kecamatan_id: {
					validators: {
						notEmpty: {
							message: 'Data harus dipilih',
						},
					},
				},
				desa_id: {
					validators: {
						notEmpty: {
							message: 'Data harus dipilih',
						},
					},
				},
				longitude: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				latitude: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				peta: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
			},
		});

		$('#fform-travel').bootstrapValidator({
			fields: {
				nama: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
						remote: {
							url: "<?php echo site_url(); ?>unik-nama",
							data: function(validator){
								return {
									nama:$('[name="nama"]').val(),
									id:$('[name="id"]').val(),
									alias:'hotel',
								};
							},
							message: '<img src="<?php base_url();?>/images/floading.gif" /> <span style="color:#B94A48;">Nama sudah ada...</span>',
						},
						stringLength: {
							message: 'Data maksimal 100 karakter',
							max: function (value, validator, $field) {
								return 100 - (value.match(/\r/g) || []).length;
							}
						},
					},
				},
				lampiran_nama: {
					validators: {
						file: {
							extension: 'jpeg,jpg,png,gif',
							type: 'image/jpeg,image/png,image/gif',
							maxSize: 4096 * 1024, // 4 MB
							message: '<div class="alert alert-danger">'
										+'<b>Foto yang dipilih tidak diijinkan :</b>'
										+'<br> 1. Format foto jpeg,jpg,png atau gif'
										+'<br> 2. Ukuran max 4MB</div>',
						},
					},
				},
				tahun: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				alamat: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				kecamatan_id: {
					validators: {
						notEmpty: {
							message: 'Data harus dipilih',
						},
					},
				},
				desa_id: {
					validators: {
						notEmpty: {
							message: 'Data harus dipilih',
						},
					},
				},
				longitude: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				latitude: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				peta: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
			},
		});
		$('#fform-travel-foto').bootstrapValidator({});
		$('#fform-travel-paket').bootstrapValidator({});

		$('#fform-kategori').bootstrapValidator({
			fields: {
				judul: {
					validators: {
						notEmpty: {
							message: 'Judul harus diisi',
						},
					},
				},
			},
		});
		$('#fform-tulisan').bootstrapValidator({
			fields: {
				judul: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
						remote: {
							url: "<?php echo site_url(); ?>unik-judul",
							data: function(validator){
								return {
									judul:$('[name="judul"]').val(),
									id:$('[name="id"]').val(),
									alias:'tulisan',
								};
							},
							message: '<img src="<?php base_url();?>/images/floading.gif" /> <span style="color:#B94A48;">Nama sudah ada...</span>',
						},
						stringLength: {
							message: 'Data maksimal 100 karakter',
							max: function (value, validator, $field) {
								return 100 - (value.match(/\r/g) || []).length;
							}
						},
					},
				},
				lampiran_nama: {
					validators: {
						file: {
							extension: 'jpeg,jpg,png,gif',
							type: 'image/jpeg,image/png,image/gif',
							maxSize: 4096 * 1024, // 4 MB
							message: '<div class="alert alert-danger">'
										+'<b>Foto yang dipilih tidak diijinkan :</b>'
										+'<br> 1. Format foto jpeg,jpg,png atau gif'
										+'<br> 2. Ukuran max 4MB</div>',
						},
					},
				},
				kategori_id: {
					validators: {
						notEmpty: {
							message: 'Data harus dipilih',
						},
					},
				},
			},
		});
		$('#fform-tulisan-agenda').bootstrapValidator({
			fields: {
				judul: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
						remote: {
							url: "<?php echo site_url(); ?>unik-judul",
							data: function(validator){
								return {
									judul:$('[name="judul"]').val(),
									id:$('[name="id"]').val(),
									alias:'tulisan',
								};
							},
							message: '<img src="<?php base_url();?>/images/floading.gif" /> <span style="color:#B94A48;">Nama sudah ada...</span>',
						},
						stringLength: {
							message: 'Data maksimal 100 karakter',
							max: function (value, validator, $field) {
								return 100 - (value.match(/\r/g) || []).length;
							}
						},
					},
				},
				lampiran_nama: {
					validators: {
						file: {
							extension: 'jpeg,jpg,png,gif',
							type: 'image/jpeg,image/png,image/gif',
							maxSize: 4096 * 1024, // 4 MB
							message: '<div class="alert alert-danger">'
										+'<b>Foto yang dipilih tidak diijinkan :</b>'
										+'<br> 1. Format foto jpeg,jpg,png atau gif'
										+'<br> 2. Ukuran max 4MB</div>',
						},
					},
				},
				tanggal_awal: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
				tanggal_akhir: {
					validators: {
						notEmpty: {
							message: 'Data harus diisi',
						},
					},
				},
			},
		});
	});
</script>
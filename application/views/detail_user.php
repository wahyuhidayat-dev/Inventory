
<?= validation_errors('<p style ="color:red">','</p> '); ?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading"><?php echo $header; ?></div>
			<form  action="<?php echo base_url(); ?>User/update" method="post">
				<div class="panel-body">
					<div class="col-md-6">
						<?php $user = $data->row(); ?>
						<div class="form-group">
							<label>NIK KARYAWAN</label>
							<input name="nik" class="form-control" value="<?= $user->nik; ?>" readonly="">
						</div>
						<div class="form-group">
							<label>NAMA KARYAWAN</label>
							<input name="nama_karyawan" value="<?= $user->nama;  ?>" class="form-control" readonly="">
						</div>
						<!-- <div class="form-group">
							<label>PASSWORD</label>
							<input name="password" type="password" class="form-control" autofocus="">
						</div> -->
						<div class="form-group">
							<label>JABATAN</label>
							<input type="text" name="jabatan" class="form-control" value="<?= $user->jabatan; ?>" readonly="">
							<input name="status" type="hidden" value="aktif" class="form-control">
						</div>
						<div class="footer">	
							<button type="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
							<button type="reset" onclick="window.history.go(-1)" class="btn btn-primary"> Back</button>
						</div>
					</form>
				</div>
			</div>
		</div>


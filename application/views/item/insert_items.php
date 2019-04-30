			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading"><?php echo $header; ?></div>
						
						<div class="panel-body">
							<div class="col-md-6">
								<form role="form">
									<div class="form-group">
										<label>BARCODE</label>
										<input name="barcode" value="<?= $BARCODE;  ?>" class="form-control" readonly="">
									</div>
									<div class="form-group">
										<label>PROD_CD</label>
										<input name="prod_cd" value="<?= $PROD_CD; ?>" class="form-control" readonly="">
									</div>
									<div class="form-group">
										<label>PROD_NM</label>
										<input name="prod_nm" value="<?= $PROD_NM;  ?>" class="form-control" readonly="">
									</div>
									<div class="form-group">
										<label>STATUS</label>
										<input name="status" value="<?= $STATUS;  ?>" class="form-control" readonly="">
									</div>
									<div class="form-group">
										<label>QTY</label>
										<input name="qty" value="" class="form-control" placeholder="Input qty" autofocus="">
									</div>
									<button type="submit" class="btn btn-primary">Submit</button>
									<button type="reset" onclick="window.history.go(-1)" class="btn btn-default">Back</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<script>
					Swal({
  					type: 'error',
  					title: 'Oops...',
  					text: 'Something went wrong!',
  					footer: '<a href>Why do I have this issue?</a>'
					})
				</script>

<div class="row">
	<div class="col-lg-12">
		<?php if ($this->session->flashdata('alert')){ ?>
			<div class="alert bg-success" role="alert"><svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> 
				<?php  echo $this->session->flashdata('alert'); ?>
				<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
			<?php }elseif($this->session->flashdata('alert-danger')){ ?>
			<div class="alert bg-danger" role="alert"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> 
				<?php  echo $this->session->flashdata('alert-danger'); ?>
				<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>	
		<?php }else{ ?>
			
		<?php  }?>
		</div>
	</div>
	<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading"><?= $header; ?></span></div>
				<div class="panel-body">
					<div style="float:left">	
						<a type="button" data-toggle="modal" data-target="#modal-tambah"  class="btn btn-primary">Input Sector</a>
					</div>
					<table data-toggle="table" data-show-refresh="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc" data-row-style="rowStyle">
						<thead>
							<tr>
								<th data-field ="id1" data-checkbox="true">NO.</th>
								<th data-field ="id2" data-sortable="true">PROD_ID</th>
								<th data-field ="id3" data-sortable="true">BARCODE</th>
								<th data-field ="id4" data-sortable="true">PROD_NAME</th>
								<th data-field ="id5" data-sortable="true">STATUS</th>
								<th data-field ="id6" data-sortable="true">QTY</th>
								<th data-field ="id7" data-sortable="true">NO.SECTOR </th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no=1; 
							foreach ($items->result() as $key) :
								
								?>
								<tr>
									<td data-field ="id1" ><?= $no++; ?></td>
									<td data-field ="id2" ><?= $key->PROD_ID; ?></td>
									<td data-field ="id3" ><?= $key->BARCODE; ?></td>
									<td data-field ="id4" ><?= $key->PROD_NM; ?></td>
									<td data-field ="id5" ><?= $key->STATUS; ?></td>
									<td data-field ="id6" ><?= $key->QTY; ?></td>
									<td data-field ="id7" ><?= $key->SEKTOR; ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div><!--/.row-->

	<!-- Modal Input Barang -->
	<div class="modal fade" id="modal-tambah" role="dialog">
		<div class="modal-dialog">
			<form action="<?php echo site_url('Sector/sector'); ?>" method="post">
				<div class="modal-content">
					<div class="modal-header panel-blue">
						<h4 class="modal-title" style="color:white;">Input Item</h4>
					</div>
					<div class="modal-body">
						<div class="form-horizontal">
							<div class="box-body">
								<?php echo validation_errors('<p style="color:red">','</p>'); ?>
								<div class="form-group">
									<label for="" class="col-md-4 control-label">Barcode</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" name="barcode" autofocus="">
									</div>
								</div>
							</div>
						</di>
					</div>
					<div class="modal-footer">
						<button type="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
						<button type="" data-dismiss="modal" class="btn btn-primary">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- Close Modal input Barang -->





	<script>
		$(function () {
			$('#hover, #striped, #condensed').click(function () {
				var classes = 'table';

				if ($('#hover').prop('checked')) {
					classes += ' table-hover';
				}
				if ($('#condensed').prop('checked')) {
					classes += ' table-condensed';
				}
				$('#table-style').bootstrapTable('destroy')
				.bootstrapTable({
					classes: classes,
					striped: $('#striped').prop('checked')
				});
			});
		});

		function rowStyle(row, index) {
			var classes = ['active', 'success', 'info', 'warning', 'danger'];

			if (index % 2 === 0 && index / 2 < classes.length) {
				return {
					classes: classes[index / 2]
				};
			}
			return {};
		}
	</script>
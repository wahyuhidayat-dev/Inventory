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
					<a type="button" href="<?php echo base_url(); ?>Vendor/vendor" class="btn btn-primary">Input Vendor</a>
				</div>
				<table data-toggle="table" data-show-refresh="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc" data-row-style="rowStyle">
					<thead>
						<tr>
							<th data-field ="id1" data-checkbox="true">NO</th>
							<th data-field ="id2" data-sortable="true">VENDOR CODE</th>
							<th data-field ="id3" data-sortable="true">VENDOR NAME</th>
							<th data-field ="id4" data-sortable="true">ALAMAT</th>
							<th data-field ="id5" data-sortable="true">EMAIL</th>
							<th data-field ="id6" data-sortable="true">NO TELPHONE</th>
							<th data-field ="id7" data-sortable="true">OPTION</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no=1; 
						foreach ($vendor->result() as $key) :

							?>
							<tr>
								<td data-field ="id1" ><?= $no++; ?></td>
								<td data-field ="id2" ><?= $key->VEN_CD; ?></td>
								<td data-field ="id3" ><?= $key->VEN_NM; ?></td>
								<td data-field ="id4" ><?= $key->ALAMAT; ?></td>
								<td data-field ="id5" ><?= $key->EMAIL; ?></td>
								<td data-field ="id6" ><?= $key->TELPON; ?></td>
								<td data-field ="id7" >
									<a class="ubah btn btn-primary btn-xs" href="<?php echo base_url();?>Vendor/detail/<?php echo $key->VEN_CD;?>"><span class="glyphicon glyphicon-edit" ></span></a>
									<a class="hapus btn btn-danger btn-xs" href="<?php echo base_url();?>Vendor/delete/<?php echo $key->VEN_CD;?>"><span class="glyphicon glyphicon-trash"></span></a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div><!--/.row-->



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
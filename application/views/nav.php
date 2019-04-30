<ul class="nav menu">
	<li class="active"><a href="<?php echo base_url(); ?>home"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
	
	<li class="parent ">
		<a href="#">
			<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></span> Items 
		</a>
		<ul class="children collapse" id="sub-item-1">
			<li>
				<a class="" href="<?php echo base_url(); ?>Items">
					<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Input Items
				</a>
			</li>
			<li>
				<a class="" href="<?php echo base_url(); ?>Items/Out">
					<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Output Items
				</a>
			</li>
			<li>
				<a class="" href="<?php echo site_url(); ?>Sector">
					<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Input Sector Items
				</a>
			</li>
			<li>
				<a class="" href="<?php echo site_url(); ?>Exp">
					<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Exp Item
				</a>
			</li>
		</ul>
	</li>
	<?php
	$jabatan = ($this->session->userdata['login_user']['jabatan']);
	if ($jabatan=='admin') { ?>
		
		<li role="presentation" class="divider"></li>
		<li><a href="<?php echo base_url(); ?>Sum_stock"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Summary Stock</a></li>
		<li><a href="<?php echo base_url(); ?>Vendor"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg> Vendor</a></li>
		<li><a href="<?php echo base_url(); ?>Category"><svg class="glyph stroked paperclip"><use xlink:href="#stroked-paperclip"></use></svg> Category</a></li>
		<li><a href="<?php echo base_url(); ?>User"><svg class="glyph stroked male user"><use xlink:href="#stroked-male-user"></use></svg> Users</a></li>
		<li><a href="<?php echo base_url(); ?>Returnn"><svg class="glyph stroked arrow left"><use xlink:href="#stroked-arrow-left"></use></svg> Return</a></li>
		<li role="presentation" class="divider"></li>
		<li><a href="<?php echo base_url(); ?>login/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
	<?php }else{ ?>
		<li><a href="<?php echo base_url(); ?>Sum_stock"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Summary Stock</a></li>
		<li><a href="<?php echo base_url(); ?>Returnn"><svg class="glyph stroked arrow left"><use xlink:href="#stroked-arrow-left"></use></svg> Return</a></li>
		<li role="presentation" class="divider"></li>
		<li><a href="<?php echo base_url(); ?>login/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
	<?php } ?>
</ul>
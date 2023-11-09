	<?php
	if($this->session->flashdata('success_message'))
	{
	?>
		<div class="alert alert-success" role="alert">  
		  <strong>Success!</strong><?php echo $this->session->flashdata('success_message');?> 
		</div> 
	<?php
	}
	?>

	
	<div class="clear_space" style="height:10px;"></div>
	<h2>Manpower List</h2>
	<div class="clear_space" style="height:10px;"></div>

	<div class="col-sm-12" id="container_area">
	  <div class="table-responsive">
		<table id="mytable" class="table table-striped table-hover"> 
			<thead class="header">
				<tr>					
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>Age</th>
					<th>Nationality</th>
					<th>Ratting</th>
					<th>Is Publish</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($man_powers)
					{	
						$i = 0;
						foreach($man_powers as $row)
						{
							$i++;
						?>
						<tr>								
							<td><?php echo $row->id; ?></td>					
							<td><?php echo $row->name; ?></td>							
							<td><?php echo $row->email; ?></td>
							<td><?php echo $row->age; ?></td>
							<td><?php echo $row->nationality; ?></td>
							<td><?php echo $row->ratting; ?></td>
							<td>
								<input 
									type="checkbox"
									class="is_published"
									name="is_published"
									data-id ="<?php echo $row->id;?>"
									<?php if($row->is_published == 1) echo "checked"; ?>
								>								
							</td>
							
							<td>
								<a href="<?php echo site_url(); ?>admin/manpowers/preview/<?php echo $row->id;?>">Preview</a> |
								<a 
									onclick="javascript: return confirm('Are you sure to delete this?')"
									href="<?php echo site_url(); ?>admin/manpowers/delete/<?php echo $row->id;?>"
								>
									Delete
								</a>
							</td>						
						</tr>	
						<?php	
						}	
					}	
				?>	
			</tbody>
		</table>
	</div>
	
</div>


<script type="text/javascript">
	$(document).on('click','.is_published',function() {
			
			var id = $(this).attr('data-id');			
			url = "<?php echo site_url(); ?>admin/manpowers/approved";
			
			var overlay = $('<div id="overlay"><div id="indicator"><img src="<?php echo base_url();?>assets/img/ajax-loader.gif" /></div> </div>');
			overlay.appendTo(document.body);

			if(this.checked)
			{
				$.post(url,{id:id,option:1},function(data) {
					//alert(data);
					$('#overlay').remove();
					$('#container_area').html(data);
				});
			}
			else
			{
				$.post(url,{id:id,option:2},function(data) {
					//alert(data);
					$('#overlay').remove();
					$('#container_area').html(data);
				});
			}
		});
</script>
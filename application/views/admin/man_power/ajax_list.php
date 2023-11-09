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
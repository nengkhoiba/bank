	<option class="form-control" value="">- Select -</option>
	<option class="form-control" value="Pri">Primary</option>
<?php  foreach ($result as $list)   { ?>
  	<option class="form-control" value="<?php echo $list['ID'];?>"><?php echo $list['Group_name'];?></option>
<?php  } ?> 
  

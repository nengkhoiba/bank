	<option class="form-control" value="">- Select -</option>
<?php  foreach ($result as $list)   { ?>
  	<option class="form-control" value="<?php echo $list['ID'];?>"><?php echo $list['name'];?></option>
<?php  } ?> 
  

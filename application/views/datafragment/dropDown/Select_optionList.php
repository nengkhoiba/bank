	<option class="form-control" value="">- Select -</option>
<?php  foreach ($result as $list)   { ?>
  	<option class="form-control" <?php if($selectedVal == $list['ID']) echo 'selected';?> value="<?php echo $list['ID'];?>"><?php echo $list['Name'];?></option>
<?php  } ?> 
  

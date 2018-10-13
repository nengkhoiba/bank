	<option class="form-control" value="">- Select -</option>
<?php  foreach ($loantype as $list)   { ?>
  	<option class="form-control" value="<?php echo $list['ID'];?>"><?php echo $list['Loan_name'];?></option>
<?php  } ?> 
  

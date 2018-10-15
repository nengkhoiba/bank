<div class="" style="border-radius: 0px; margin:15px">
<div class="row" style="margin-top: 0px">
<div class="col-4">
	<b>Group ID : </b><span id="grp_id"> <?php echo $group_details[0]['ID'];?> </span><br>
	<b>Group Loan Account No : </b><span id="grp_loan_acc_no"> <?php echo $group_details[0]['Group_Loan_acc_no'];?> </span><br>
	<b>Group Name : </b><span id="grp_name"> <?php echo $group_details[0]['Group_name'];?> </span><br>
</div>
<div class="col-4">
	<b>Group Code : </b><span id="grp_code"> <?php echo $group_details[0]['Group_code'];?> </span><br>
    <b>Group Address : </b><span id="grp_address"> <?php echo $group_details[0]['Address'];?> </span><br>
    <b>Group Area : </b><span id="grp_area"> <?php echo $group_details[0]['Area'];?> </span><br>	
</div>
<div class="col-4">
    <b>Max. Member Allow : </b><span id="grp_max_member"> <?php echo $group_details[0]['max_member_count'];?> </span><br>
    <b>Total Added : </b><span id="grp_member_count"> <?php echo $group_details[0]['customer_count'];?> </span><br>
</div>

<div class="col-12">
<br>
<div class="tile-title-w-btn">
<h3 class="title">List of assigned RO</h3>
<p class="bs-component">	
  <a onclick="addnewRO_Grp()" style="color:#fff" class="btn btn-sm btn-success">New</a>
  <button class="btn btn-sm btn-danger" type="button" onclick="hardDeleteItem('ro_assign','searchLoanApplicationGrp()')">Delete</button>
        </p>
</div>

<table id="roTableGrp" class="table table-hover dataTable no-footer">
        <thead>
            <tr>
                <th>Sl. No.</th>
                <th>RO Name</th>
				<th>Address</th>
				<th>Assigned on</th>
				<th>Assigned by</th>
				<th>
                <div class="animated-checkbox">
              	<label>
                <input onclick="checkAllCheckbox($(this));" type="checkbox" ><span class="label-text">Select All</span>
              	</label>
            	</div>
            	</th>
            </tr>
        </thead>
        <tbody>
        <?php $count = 1; foreach ($assignRO as $row) { ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $row['Name'];?></td>
				<td><?php echo $row['address'];?></td>
				<td><?php echo $row['Added_on'];?></td>
				<td><?php echo $row['Added_by'];?></td>
				<td>
				<div  class="animated-checkbox" style="display: inline-block;">
              	<label>
                <input class="checkboxRO" type="checkbox" value="<?php echo $row['ID'];?>"><span class="label-text"></span>
              	</label>
            	</div>
            	</td>
			</tr>
        <?php $count ++; } ?>
        </tbody>
       
    </table>
</div>
</div>

</div>

<div class="row invoice-info" style="margin: 0px; padding-top: 10px; padding-bottom:20px;">
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
    <b>Assigned RO : </b><span id="grp_member_count"> <?php foreach ($assignRO as $row){echo $row['Name'].", ";}?> </span><br>
</div>
</div>

<div class="row invoice-info" id="memberInfo" style="border: 2px solid #ced4da; margin: 0px; padding-top: 10px;">
    <div class="col-4">
    	<b>Customer ID : <span id="customer_ID"><?php echo $member_details[0]['ID'];?></span><br><br></b>
        <b>Name : </b><span id="customer_name"><?php echo $member_details[0]['name'];?></span><br>
        <b>Date of Birth : </b><span id="customer_dob"><?php echo $member_details[0]['dob'];?></span><br>
        <b>Gender : </b><span id="customer_gender"><?php echo $member_details[0]['sex'];?></span><br>
        <b>Aadhaar No. : </b><span id="customer_aadhaar"><?php echo $member_details[0]['aadhaar_no'];?></span><br>
        <b>Husband/Father Name : </b><span id="customer_husband"><?php echo $member_details[0]['husband_name'];?></span><br>
        <b> Permanent Address : </b><span id="customer_address"><?php echo $member_details[0]['parmanent_address'];?></span><br>
        <b>Rural : </b><input id="customer_rural" <?php if($member_details[0]['rural'] == 1) echo 'checked';?> disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <b>Urban : </b><input id="customer_urban" <?php if($member_details[0]['urban'] == 1) echo 'checked';?> disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <b>District :</b><span id="customer_district"><?php echo $member_details[0]['district'];?></span><br>
       <b> Contact No. : </b><span id="customer_contact"><?php echo $member_details[0]['contact_no'];?></span><br>
       <b> Work/Business/Profession : </b><span id="customer_work"><?php echo $member_details[0]['work'];?></span>
    </div>
    <div class="col-4">
      <b>Bank Information </b><br><br>
      <b>Account No. : </b><span id="customer_bank_ac_no"><?php echo $member_details[0]['bank_ac_no'];?></span><br>
      <b>Branch : </b><span id="customer_bank_branch"><?php echo $member_details[0]['bank_branch'];?></span>
    </div>
    <div class="col-4">
    <img id="photo" width="90" class="img-responsive pull-right" style="padding: 5px" src="<?php echo $member_details[0]['photo'];?>">
      <b>Nominee Information </b><br><br>
      <b>Name : </b><span id="customer_nominee_name"><?php echo $member_details[0]['nominee_name'];?></span><br>
      <b>Aadhaar No. : </b><span id="customer_nominee_aadhaar_no"><?php echo $member_details[0]['nominee_aadhaar_no'];?></span><br>
      <b> Permanent Address : </b><span id="customer_nominee_address"><?php echo $member_details[0]['nominee_permanent_address'];?></span><br>
      <b>Rural : </b><input id="customer_nominee_rural" <?php if($member_details[0]['nominee_rural'] == 1) echo 'checked';?> disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <b>Urban : </b><input id="customer_nominee_urban" <?php if($member_details[0]['nominee_urban'] == 1) echo 'checked';?> disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <b>District :</b><span id="customer_nominee_district"><?php echo $member_details[0]['nominee_district'];?></span><br>
      <b> Contact No. : </b><span id="customer_nominee_contact"><?php echo $member_details[0]['nominee_contact_no'];?></span><br><br>
      <b> Account Number : </b><span id="customer_account_no"><?php echo $member_details[0]['accNo'];?></span><br>
      <b> Loan Account Number : </b><span id="loan_acc_no"><?php echo $member_details[0]['Loan_acc_no'];?></span><br>                  
      <b> Account Status : </b><span id="customer_account_status"><?php echo $member_details[0]['ID'];?></span> <br><br>
    </div>
 </div>
 <br>
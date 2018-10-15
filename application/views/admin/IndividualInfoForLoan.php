<div class="invoice-info" style="background: #fff; margin: 0px; color: #000; border: 2px solid #ced4da; padding-top: 10px">
				<div class="row" id="passbook" style="padding : 10px" >
                <div class="col-4">
                	<b>Customer ID : <span id="customer_ID"> <?php echo $result[0]['ID'];?> </span><br><br></b>
                    <b><address>Name : </b><span id="customer_name"> <?php echo $result[0]['name'];?> </span><br>
                    <b>Date of Birth : </b><span id="customer_dob"> <?php echo $result[0]['dob'];?> </span><br>
                    <b>Gender : </b><span id="customer_gender"> <?php echo $result[0]['sex'];?> </span><br>
                    <b>Aadhaar No. : </b><span id="customer_aadhaar"> <?php echo $result[0]['aadhaar_no'];?> </span><br>
                    <b>Husband/Father Name : </b><span id="customer_husband"> <?php echo $result[0]['husband_name'];?> </span><br>
                    <b> Permanent Address : </b><span id="customer_address"> <?php echo $result[0]['parmanent_address'];?> </span><br>
                    <b>Rural : </b><input <?php if($result[0]['rural'] == 1) echo 'checked';?> id="customer_rural" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Urban : </b><input <?php if($result[0]['urban'] == 1) echo 'checked';?> id="customer_urban" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>District :</b><span id="customer_district"> <?php echo $result[0]['district'];?>  </span><br>
                   <b> Contact No. : </b><span id="customer_contact"><?php echo $result[0]['contact_no'];?> </span><br>
                   <b> Work/Business/Profession : </b><span id="customer_work"> <?php echo $result[0]['work'];?> </span><br><br>
					</address>
                </div>
                <div class="col-4">
                <b>Bank Information </b><br><br>
                  <b>Account No. : </b><span id="customer_bank_ac_no"> <?php echo $result[0]['bank_ac_no'];?> </span><br>
                  <b>Branch : </b><span id="customer_bank_branch"> <?php echo $result[0]['bank_branch'];?> </span>
                </div>
                <div class="col-4">
                <img id="photo" width="90" class="img-responsive pull-right" style="padding: 5px" src="<?php echo $result[0]['photo'];?>">
                <b>Nominee Information </b><br><br>
                  <b>Name : </b><span id="customer_nominee_name"> <?php echo $result[0]['nominee_name'];?> </span><br>
                  <b>Aadhaar No. : </b><span id="customer_nominee_aadhaar_no"> <?php echo $result[0]['nominee_aadhaar_no'];?> </span><br>
                  <b> Permanent Address : </b><span id="customer_nominee_address"> <?php echo $result[0]['nominee_permanent_address'];?> </span><br>
                  <b>Rural : </b><input <?php if($result[0]['nominee_rural'] == 1) echo 'checked';?> id="customer_nominee_rural" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>Urban : </b><input <?php if($result[0]['nominee_urban'] == 1) echo 'checked';?> id="customer_nominee_urban" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>District :</b><span id="customer_nominee_district"> <?php echo $result[0]['nominee_district'];?> </span><br>
                  <b> Contact No. : </b><span id="customer_nominee_contact"> <?php echo $result[0]['nominee_contact_no'];?> </span><br><br>
                  <b> Account Number : </b><span id="customer_account_no"> <?php echo $result[0]['accNo'];?> </span><br>
                  <b> Account Status : </b><span id="customer_account_status"> <?php echo $result[0]['accStatus'];?> </span><br>
                </div>
                </div>
							
							
							
							<div class="row" style="padding:15px;">
								<div class="col-md-4">
									<label class="control-label">Select Loan type</label>
									<select class="form-control" onchange="searchLoanTypeDetails(this.value);" style="margin-top: 10px;" id="individual_Loan_Type" name="LoanType">
									 <!-- Loan Type will add here -->
									</select>
								</div>
							</div>	
							
							<div class="col-md-12">
								<br>
								<div id="loan_details" class="">								 
								</div>
							</div>
							
			  
			  
			  </div>
			  
			  	<script >
		
		$( document ).ready(function() {
		
		$(function() {
    // Remove button click
    $(document).on(
        'click',
        '[data-role="dynamic-fields"] > .form-inline [data-role="remove"]',
        function(e) {
            e.preventDefault();
            $(this).closest('.form-inline').remove();
        }
    );
    // Add button click
    $(document).on(
        'click',
        '[data-role="dynamic-fields"] > .form-inline [data-role="add"]',
        function(e) {
            e.preventDefault();
            var container = $(this).closest('[data-role="dynamic-fields"]');
            new_field_group = container.children().filter('.form-inline:first-child').clone();
            new_field_group.find('input').each(function(){
                $(this).val('');
            });
            container.append(new_field_group);
        }
    );
});
		});

		</script>
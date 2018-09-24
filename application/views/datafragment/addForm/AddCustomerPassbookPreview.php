<div class="tile-title-w-btn">
<h3 class="title">Passbook Preview</h3>
<button class="close"  href="" onclick="removeMasterform('#customer_form')" type="button" aria-label="Close" style="height: 28px;
width: 36px;"><span aria-hidden="true">×</span></button>
</div>
<div class="row invoice-info" style="background: #fff; margin: 0px; color: #000">
				<div class="row" id="passbook" style="padding : 10px" >
                <div class="col-7">
                	<address>
                	<b> Account Number : </b><span id="passbook_customer_account_no" style="text-transform: uppercase"><?php echo $result[0]['accNo'];?></span><br><br>
                    <b>Member : </b><span id="passbook_customer_name" style="text-transform: uppercase"><?php echo $result[0]['name'];?></span><br>
                    <b>Husband/Father : </b><span id="passbook_customer_husband" style="text-transform: uppercase"><?php echo $result[0]['husband_name'];?></span><br>
                    <b>Address : </b><span id="passbook_customer_address" style="text-transform: uppercase"><?php echo $result[0]['parmanent_address'];?></span><br>
                    <b>District : </b><span id="passbook_customer_district" style="text-transform: uppercase"><?php echo $result[0]['District_name'];?></span><br>
                   <b> Contact No. : </b><span id="passbook_customer_contact"><?php echo $result[0]['contact_no'];?></span>
                   </address>
                </div>
                <div class="col-5">
                <address>
                <b> Branch : </b><span id="passbook_branch_name" style="text-transform: uppercase"><?php echo $result[0]['branchName'];?></span><br>
                <b> Code : </b><span id="passbook_branch_code"><?php echo $result[0]['Branch_code'];?></span><br>
                <b> Address : </b><span id="passbook_branch_code" style="text-transform: uppercase"><?php echo $result[0]['Branch_address'];?></span><br><br>
                <b> Date of Registration : </b><span id="passbook_customer_date_of_reg"><?php echo date("d-m-Y", strtotime($result[0]['Added_on']));?></span><br> 
                <b> Date of Issue : </b><span id="passbook_date_of_issue"><?php echo date('d-m-Y');?></span><br>
                <b> Office Email : </b><span id="passbook_office_email"><?php echo 'affordinservices@gmail.com';?></span>
                </address>
                </div>
                
                <div class="col-12">
                <address>
                <b> Sponsored By : </b><span id="passbook_sposored_by"><?php echo 'PUNSHIUKAL CONSULTANCY PRIVATE LIMITED';?></span><br> 
                <b> CIN NO : </b><span id="passbook_office_cin_no"><?php echo 'U74999MN2018PTC13662';?></span><br>
                <b> Address : </b><span id="passbook_office_address"><?php echo 'Uripok Kangchup Road, Near Over Bridge, Imphal - 795001';?></span>
                </address>
                </div>
                </div>
                <div class="form-group col-md-12 align-self-end" style="padding-top: 0px">
                  <button onclick="printDiv('passbook')" class="btn btn-xm btn-danger" type="button"><i class="fa fa-fw fa-lg fa-print"></i>Print</button>
                  </div>
              </div>
              
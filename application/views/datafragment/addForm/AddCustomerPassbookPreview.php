<div class="tile-title-w-btn">
<h3 class="title">Passbook Preview</h3>
<button class="close"  href="" onclick="removeMasterform('#customer_form')" type="button" aria-label="Close" style="height: 28px;
width: 36px;"><span aria-hidden="true">×</span></button>
</div>
<div class="row invoice-info" style="background: #fff; margin: 0px; padding-top: 10px; color: #000">
<<<<<<< HEAD
                <div class="col-4">
                <b>Customer ID : <span id="customer_ID"></span><br><br></b>
                    <b><address>Name : </b><span id="customer_name"></span><br>
                    <b>Date of Birth : </b><span id="customer_dob"></span><br>
                    <b>Gender : </b><span id="customer_gender"></span><br>
                    <b>Aadhaar No. : </b><span id="customer_aadhaar"></span><br>
                    <b>Husband/Father Name : </b><span id="customer_husband"></span><br>
                    <b> Permanent Address : </b><span id="customer_address"></span><br>
                    <b>Rural : </b><input id="customer_rural" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Urban : </b><input id="customer_urban" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>District :</b><span id="customer_district"></span><br>
                   <b> Contact No. : </b><span id="customer_contact"></span><br>
                   <b> Work/Business/Profession : </b><span id="customer_work"></span></address>
                </div>
                <div class="col-4">
                <b>Bank Information </b><br><br>
                  <b>Account No. : </b><span id="customer_bank_ac_no"></span><br>
                  <b>Branch : </b><span id="customer_bank_branch"></span>
                </div>
                <div class="col-4">
                <b>Nominee Information </b><br><br>
                  <b>Name : </b><span id="customer_nominee_name"></span><br>
                  <b>Aadhaar No. : </b><span id="customer_nominee_aadhaar_no"></span><br>
                  <b> Permanent Address : </b><span id="customer_nominee_address"></span><br>
                  <b>Rural : </b><input id="customer_nominee_rural" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>Urban : </b><input id="customer_nominee_urban" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>District :</b><span id="customer_nominee_district"></span><br>
                  <b> Contact No. : </b><span id="customer_nominee_contact"></span><br><br><br>
                  <b> Account Number : </b><span id="customer_account_no"></span><br>
                  <b> Account Status : </b><span id="customer_account_status"></span> 
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="updateBranch()" class="btn btn-xm btn-danger" type="button"><i class="fa fa-fw fa-lg fa-print"></i>Print</button>
                  &nbsp;&nbsp;&nbsp;
                  <button class="btn btn-xm btn-danger" href="#" onclick="resetAllFormValue('#MasBranchForms')"><i class="fa fa-fw fa-lg fa-file"></i>PDF</button>
=======
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
                <div class="form-group col-md-12 align-self-end" style="padding-top: 0px">
                  <button onclick="" class="btn btn-xm btn-danger" type="button"><i class="fa fa-fw fa-lg fa-print"></i>Print</button>
                  &nbsp;&nbsp;&nbsp;
                  <button class="btn btn-xm btn-danger" href="#" onclick=""><i class="fa fa-fw fa-lg fa-file"></i>PDF</button>
>>>>>>> 3a10af897792b9d5a609ee3ca2e6f4140e7e6937
                
                </div>
              </div>
              
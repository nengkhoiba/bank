<div class="tile-title-w-btn">
<h3 class="title">Passbook Preview</h3>
<button class="close"  href="" onclick="removeMasterform('#customer_form')" type="button" aria-label="Close" style="height: 28px;
width: 36px;"><span aria-hidden="true">×</span></button>
</div>
<div class="row invoice-info" style="background: #fff; margin: 0px; padding-top: 10px; color: #000">
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
                
                </div>
              </div>
              
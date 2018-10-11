	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">RO Assigner</li>
        </ul>
		</div>
      </div>
      
      <div class="row" id="formContainer" style="">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
          
            <div class="tile-body">
			
				<div class="col-md-12">
					<ul class="nav nav-tabs">
						<li><a data-toggle="tab" href="#group" class="active show">Group</a></li>
						<li><a data-toggle="tab" href="#individuals">Individuals</a></li>
					</ul>
					</div>
					<div class="col-md-12">

					<div class="tab-content">
						<div id="group" class="tab-pane fade active show">
						 <br>
						 <h5>Search Group</h5>
						 <br>
							 <?php echo form_open_multipart('',array('id'=>'MasROAssignerGrpForms','class'=>'row'))?>
								
								<div class="form-group col-md-4 align-self-end" >
								<label class="control-label">Select RO</label>
									<select id="ro" name="ro" class="form-control" style="margin-top: 10px;">
									  <!-- list of  gender -->
									</select>
								</div>
								
								<div class="form-group col-md-4 align-self-end">
									<label class="control-label">Select Type</label>
									<select onchange="GroupSearchType()" class="form-control" name="GrpSearchType" style="margin-top: 10px;" id="GrpSearchType">
									  <option  value="">-  Select -</option>
									  <option  value="1">SHG Group Code</option>
									  <option  value="2">Loan Account Number</option>
									</select>
								</div>
								<div class="form-group col-md-4 align-self-end" id="groupCode" style="display: none">
									<label class="control-label">SHG Group Code</label>
									<input id="grp_code_Grp" name="grp_code_Grp" style="margin-top: 10px;"
									class="form-control text_number" type="text"
									placeholder="SHG Group Code"></input>
								</div>
								<div class="form-group col-md-4 align-self-end" id="groupLoanAccNo" style="display: none">
									<label class="control-label">Loan Account Number</label>
									<input id="loan_acc_no_Grp" name="loan_acc_no_Grp" style="margin-top: 10px;"
									class="form-control text_number" type="text"
									placeholder="Loan Account Number"></input>
								</div>
								
								<div class="form-group col-md-4 align-self-end">
								  <button onclick="loadLoadApplication()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Search</button>
								  &nbsp;&nbsp;&nbsp;
								 <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasROAssignerGrpForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
								</div>
								
																
								<div class="form-group col-md-12 align-self-end" id="LoadApplicationForm" style="display: block">
								 <div class="row" style="border: 2px solid #ced4da; margin: 0px; padding-top: 10px;">
								 
								 <div id="group_details">
                                
                                </div>
                                
                                <div class="col-12" id="memList">
                                
                                </div>
                                
								
								<div class="form-group col-md-4 align-self-end">
								  <button onclick="UpdateShgmaster()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Assign</button>
								</div>
                                </div>	
								</div>
								<?php echo form_close() ?>
						  
						</div>
						<div id="individuals" class="tab-pane fade">
						 <br>
						 <h5>Search Individuals</h5>
						 <br>
							 <?php echo form_open_multipart('',array('id'=>'MasROAssignerIndividualsForms','class'=>'row'))?>
								
								<div class="form-group col-md-4 align-self-end">
									<label class="control-label">Select Type</label>
									<select onchange="InidividualsSearchType()" class="form-control" style="margin-top: 10px;" id="IndividualsSearchType">
									  <option  value="">-  Select -</option>
									  <option  value="1">Member Account Number</option>
									  <option  value="2">Loan Account Number</option>
									</select>
								</div>
								<div class="form-group col-md-4 align-self-end" id="memberAccNo" style="display: none">
									<label class="control-label">Member Account Number</label>
									<input id="shg_name" name="shg_name" style="margin-top: 10px;"
									class="form-control text_number" rows="1" type="text" id="shg_name"
									placeholder="Member Account Number"></input>
								</div>
								<div class="form-group col-md-4 align-self-end" id="memLoanAccNo" style="display: none">
									<label class="control-label">Loan Account Number</label>
									<input id="shg_name" name="shg_name" style="margin-top: 10px;"
									class="form-control text_number" rows="1" type="text" id="shg_name"
									placeholder="Loan Account Number"></input>
								</div>
								
								<div class="form-group col-md-4 align-self-end">
								  <button onclick="UpdateShgmaster()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Search</button>
								  &nbsp;&nbsp;&nbsp;
								 <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasROAssignerIndividualsForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
								</div>
								
																
								<div class="form-group col-md-12 align-self-end">
								 <div class="row invoice-info" style="border: 2px solid #ced4da; margin: 0px; padding-top: 10px;">
                <div class="col-4">
                	<b>Customer ID : <span id="customer_ID"> _ _ _ _ _ _ _ _ _ _ _ </span><br><br></b>
                    <b><address>Name : </b><span id="customer_name"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                    <b>Date of Birth : </b><span id="customer_dob"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                    <b>Gender : </b><span id="customer_gender"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                    <b>Aadhaar No. : </b><span id="customer_aadhaar"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                    <b>Husband/Father Name : </b><span id="customer_husband"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                    <b> Permanent Address : </b><span id="customer_address">_ _ _ _ _ _ _ _ _ _ _</span><br>
                    <b>Rural : </b><input id="customer_rural" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Urban : </b><input id="customer_urban" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>District :</b><span id="customer_district"> _ _ _ _ _  </span><br>
                   <b> Contact No. : </b><span id="customer_contact"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                   <b> Work/Business/Profession : </b><span id="customer_work"> _ _ _ _ _ _ _ _ _ _ _ </span></address>
                </div>
                <div class="col-4">
                <b>Bank Information </b><br><br>
                  <b>Account No. : </b><span id="customer_bank_ac_no"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                  <b>Branch : </b><span id="customer_bank_branch"> _ _ _ _ _ _ _ _ _ _ _ </span>
                </div>
                <div class="col-4">
                <img id="photo" width="90" class="img-responsive pull-right" style="padding: 5px" src="<?php echo base_url();?>assets/img/profile.png">
                <b>Nominee Information </b><br><br>
                  <b>Name : </b><span id="customer_nominee_name"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                  <b>Aadhaar No. : </b><span id="customer_nominee_aadhaar_no"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                  <b> Permanent Address : </b><span id="customer_nominee_address"> _ _ _ _ _ _ _ _ _ _ </span><br>
                  <b>Rural : </b><input id="customer_nominee_rural" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>Urban : </b><input id="customer_nominee_urban" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>District :</b><span id="customer_nominee_district"> _ _ _ _ _  </span><br>
                  <b> Contact No. : </b><span id="customer_nominee_contact"> _ _ _ _ _ _ _ _ _ _ _ </span><br><br>
                  <b> Account Number : </b><span id="customer_account_no"> _ _ _ _ _ _ _ _ _ _ _ </span><br>
                  <b> Account Status : </b><span id="customer_account_status"> _ _ _ _ _ _ _ _ _ _ _ </span> 
                </div>
                
                <div class="form-group col-md-4 align-self-end" >
									<select onchange="GroupSearchType()" class="form-control" style="margin-top: 10px;" id="GrpSearchType">
									  <option  value="">-  Select RO -</option>
									  <option  value="1">H. Ranjan Singh</option>
									  <option  value="2">Th. Thomba Singh</option>
									  <option  value="3">Kh. Gopendro Singh</option>
									  <option  value="4">S. Johnson Singh</option>
									  <option  value="5">L. Dineshwor Singh</option>
									</select>
								</div>
								
								<div class="form-group col-md-4 align-self-end">
								  <button onclick="UpdateShgmaster()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Assign</button>
								</div>
                
              </div>	
								</div>
								<?php echo form_close() ?>
						  
						</div>
					</div>
					</div>
				
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?> 
    <script type="text/javascript">
   


    function GroupSearchType() {
    	var flag=document.getElementById("GrpSearchType").value;
    	if(flag=="1")
        {
    		$("#groupCode").show();
    	    $("#groupLoanAccNo").hide();
    	}
    	if(flag=="2")
    	{
    		$("#groupCode").hide();
    	    $("#groupLoanAccNo").show();
    	}
    	if(flag=="")
    	{
    		$("#groupCode").hide();
    	    $("#groupLoanAccNo").hide();
    	}
    }

    function InidividualsSearchType() {
    	var flag=document.getElementById("IndividualsSearchType").value;
    	if(flag=="1")
        {
    		$("#memberAccNo").show();
    	    $("#memLoanAccNo").hide();
    	}
    	if(flag=="2")
    	{
    		$("#memberAccNo").hide();
    	    $("#memLoanAccNo").show();
    	}
    	if(flag=="")
    	{
    		$("#memberAccNo").hide();
    	    $("#memLoanAccNo").hide();
    	}
    }

    function loadROList()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadROList'); ?>"; 
      StartInsideLoading();
      $.ajax({
        type: "post",
        url: url,
        cache: false,   
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
             { 
            $('#ro').html(response.html);              
             } else
             { 
                 SetWarningMessageBox('warning', response.msg);                
             }
         StopInsideLoading();
         
         }catch(e) {  
            SetWarningMessageBox('warning', e);
            StopInsideLoading();
          } 
        },
        error: function(){      
          SetWarningMessageBox('warning', 'Error while request..');
          StopInsideLoading();
        }
       });
    } 
    loadROList();

    function loadLoadApplication()
    { 

    	if ($('#ro').val().trim() == '') { 
            SetWarningMessageBox('warning', 'RO is mandatory !');
            $('#ro').focus();
            return;
        }

    	if ($('#GrpSearchType').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Search type is mandatory !');
            $('#GrpSearchType').focus();
            return;
        }

    	if ($('#GrpSearchType').val().trim() == '1')
    	{
        	if ($('#grp_code_Grp').val().trim() == '') { 
                SetWarningMessageBox('warning', 'Group code is mandatory !');
                $('#grp_code_Grp').focus();
                return;
            }
    	}

    	if ($('#GrpSearchType').val().trim() == '2')
    	{
        	if ($('#loan_acc_no_Grp').val().trim() == '') { 
                SetWarningMessageBox('warning', 'Loan account no. is mandatory !');
                $('#loan_acc_no_Grp').focus();
                return;
            }
    	}

    	var formData = $('form#MasROAssignerGrpForms').serializeObject();
        var dataString = JSON.stringify(formData);
        
      var url = '<?php echo base_url();?>index.php/data_controller/searchLoanApplication';
      StartInsideLoading();
      $.ajax({
        type: "post",
        url: url,
        cache: false, 
        data: dataString,  
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
            {			
            $('#memList').html(response.html);
            $('#memTable').DataTable();
      		$('#LoadApplicationForm').show(); 
            $('#group_details').html(response.Group_details); 
            } else
             { 
                 SetWarningMessageBox('warning', response.msg);
                
             }
         StopInsideLoading();
         
         }catch(e) {  
            SetWarningMessageBox('warning', e);
            StopInsideLoading();
          } 
        },
        error: function(){      
          SetWarningMessageBox('warning', 'Error while request..');
          StopInsideLoading();
        }
       });
    }
    

</script>
    
       </body>
</html>
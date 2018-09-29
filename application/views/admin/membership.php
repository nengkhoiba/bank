	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Membership Registration</li>
        </ul>
		</div>
		<p class="bs-component">	
              <a onclick="addMemberform($(this))" style="color:#fff" class="btn btn-sm btn-success">New</a>
              <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('customer','loadMem()')">Delete</button>
          </p>
        
      </div>
      
      <div class="row" id="formContainer" style="display: none">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add/Update Membership</h3>
             <button onclick="removeMasterform('#formContainer')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
            <?php echo form_open_multipart('',array('id'=>'MasMemForms','class'=>'row'))?>
            <input id="postType" name="postType" type="hidden">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name of Applicant</label>
                  <input name="member_name" style="margin-top: 10px;"
    				class="form-control name" type="text" id="member_name"
    				placeholder="Name"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Date of Bith</label>
                  <input name="member_dob" style="margin-top: 10px;"
					class="form-control" type="text" id="member_dob"
					placeholder="Date of Birth"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Sex</label>
                  <select id="member_gender" name="member_gender" style="margin-top:10px;" class="form-control" >
                        <!-- list of  gender -->
                  </select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Aadhaar No.</label>
                  <input name="member_aadhaar" maxlength="12" onfocusout="checkAadhaar($(this))" style="margin-top: 10px;"
    				class="form-control number" type="text" id="member_aadhaar"
    				placeholder="Aadhaar Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Husband Name/Father Name</label>
                  	<input name="member_husband" style="margin-top: 10px;"
    				class="form-control name" type="text" id="member_husband"
    				placeholder="Husband Name"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Permanent Address</label>
                  	<input name="member_address" style="margin-top: 10px;"
    				class="form-control address" type="text" id="member_address"
    				placeholder="Permanent Address"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Rural</label>
    			  <input onclick="ruralurban($(this))" checked class="pull-right animated-radio-button" type="radio" value="1" name="rural_urban">
    			  <input name="member_rural" value="1" style="margin-top: 10px;"
    				class="form-control" type="hidden" id="member_rural"
    				placeholder="Rural"></input>
    			  <br>
    			  <label class="control-label">Urban</label>
                  <input onclick="ruralurban($(this))" class="pull-right" type="radio" value="2" name="rural_urban">
                  <input name="member_urban" value="0" style="margin-top: 10px;"
    				class="form-control" type="hidden" id="member_urban"
    				placeholder="Rural"></input>
                </div>
                
                 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">District</label>
                  <select id="member_district" name="member_district" style="margin-top:10px;" class="form-control" >
                        <!-- List of district -->
                  </select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Contact Number</label>
                  <input name="member_contact" style="margin-top: 10px;"
					class="form-control number" type="text" id="member_contact"
					placeholder="Contact Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Bank Account (if any)</label>
                  <span style="margin-left: 2rem">Yes <input onclick="bank($(this))" id="isbank" type="radio" checked value="1" name="isbank"></span>
                  <span class="pull-right">No <input onclick="bank($(this))" type="radio" value="2" name="isbank"></span>
                </div>
                <div id="bankAccountNo" class="form-group col-md-4 align-self-end">
                  <label class="control-label">Bank A/C Number (if any)</label>
                  <input name="member_bankaccount" style="margin-top: 10px;"
					class="form-control number" type="text" id="member_bankaccount"
					placeholder="Bank Account Number"></input>
                </div>
                <div id="bankBranchName" class="form-group col-md-4 align-self-end">
                  <label class="control-label">Bank Branch</label>
                  <input name="member_bankbranch" style="margin-top: 10px;"
					class="form-control name" type="text" id="member_bankbranch"
					placeholder="Bank Branch"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name of the Work/Business/Profession</label>
                  <input name="member_work" style="margin-top: 10px;"
					class="form-control name" type="text" id="member_work"
					placeholder="Work/Business/Profession"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name of the Nominee</label>
                  <input name="member_nominee" style="margin-top: 10px;"
					class="form-control" type="text" id="member_nominee"
					placeholder="Nominee"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Aadhaar No.</label>
                  <input name="member_nomineeaadhaar" style="margin-top: 10px;"
    				class="form-control number" type="text" id="member_nomineeaadhaar"
    				placeholder="Aadhaar Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Permanent Address</label>
                  	<input name="member_nomineeaddress" style="margin-top: 10px;"
    				class="form-control address" type="text" id="member_nomineeaddress"
    				placeholder="Permanent Address"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Rural</label>
    			  <input onclick="nomineeruralurban($(this))" checked class="pull-right" type="radio" value="1" name="nominee_rural_urban">
    			  <input name="member_nomineerural" value="1" style="margin-top: 10px;"
    				class="form-control" type="hidden" id="member_nomineerural"
    				placeholder="Rural"></input>
    			  <br>
    			  <label class="control-label">Urban</label>
                  <input onclick="nomineeruralurban($(this))" class="pull-right" type="radio" value="2" name="nominee_rural_urban">
                  <input name="member_nomineeurban" value="0" style="margin-top: 10px;"
    				class="form-control" type="hidden" id="member_nomineeurban"
    				placeholder="Rural"></input>
                </div>
                
                 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">District</label>
                  <select id="member_nomineedistrict" name="member_nomineedistrict" style="margin-top:10px;" class="form-control" >
                        <!-- List of district -->
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Contact Number</label>
                  <input name="member_nomineecontact" style="margin-top: 10px;"
					class="form-control number" type="text" id="member_nomineecontact"
					placeholder="Contact Number"></input>
                </div>
              
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="updateMem()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasMemForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#formContainer')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
               <?php echo form_close() ?>
            </div>
          </div>
        </div>
      </div>
     
      
      <div class="row">
        <div class="col-md-12">
        	
          <div class="tile">
           
          <div class="row"> 
              	<div class="col-md-12">
                	<div id="member_table" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?>

    <script type="text/javascript">
    
    function loadMem()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadMem'); ?>"; 
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
            $('#member_table').html(response.html);
            $('#Mem').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});
              
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
    loadMem();  
      
    
      
    function addMemberform($btn){ 
        
    	$reqestId =  $btn.val(); 
    	if($reqestId == 0)
    	{
    		$('#postType').val(0);
    		$('#member_name').val('');
    		$('#member_dob').val('');
    		loadDropDown('','gender_master','#member_gender');
			$('#member_aadhaar').val('');
    		$('#member_husband').val('');
    		$('#member_address').val('');
    		$('#member_rural').val('');
    		$('#member_urban').val('');
    		loadDropDown('','district','#member_district');
    		$('#member_contact').val('');
    		$('#member_bankaccount').val('');
    		$('#member_bankbranch').val('');
    		$('#member_work').val('');
    		$('#member_nominee').val('');
    		$('#member_nomineeaadhaar').val('');
    		$('#member_nomineeaddress').val('');
    		$('#member_nomineerural').val('');
    		$('#member_nomineeurban').val('');
    		loadDropDown('','district','#member_nomineedistrict');
    		$('#member_nomineecontact').val('');
        	$('#formContainer').show();
        	$(window).scrollTop(0);
        }
    	else
    	{ 
    	var url = '<?php echo base_url();?>index.php/data_controller/EditMemForm';
    	StartInsideLoading();
    	$.ajax({
    		  type: "post",
    		  url: url,
    		  cache: false,    
    		  data: {reqId:$reqestId},
    		  dataType: 'json',
    		  success: function(response){   
    		  try{  	 
    			   if (response.success)
    	           {
    				   $('#postType').val(response.json[0].ID);
    		    		$('#member_name').val(response.json[0].name);
    		    		$('#member_dob').val(response.json[0].dob);
    		    		loadDropDown(response.json[0].sex,'gender_master','#member_gender');
    					$('#member_aadhaar').val(response.json[0].aadhaar_no);
    		    		$('#member_husband').val(response.json[0].husband_name);
    		    		$('#member_address').val(response.json[0].parmanent_address);
    		    		$('#member_rural').val(response.json[0].rural);
    		    		$('#member_urban').val(response.json[0].urban);
    		    		loadDropDown(response.json[0].district,'district','#member_district');
    		    		$('#member_contact').val(response.json[0].contact_no);
    		    		$('#member_bankaccount').val(response.json[0].bank_ac_no);
    		    		$('#member_bankbranch').val(response.json[0].bank_branch);
    		    		$('#member_work').val(response.json[0].work);
    		    		$('#member_nominee').val(response.json[0].nominee_name);
    		    		$('#member_nomineeaadhaar').val(response.json[0].nominee_aadhaar_no);
    		    		$('#member_nomineeaddress').val(response.json[0].nominee_permanent_address);
    		    		$('#member_nomineerural').val(response.json[0].nominee_rural);
    		    		$('#member_nomineeurban').val(response.json[0].nominee_urban);
    		    		loadDropDown(response.json[0].nominee_district,'district','#member_nomineedistrict');
    		    		$('#member_nomineecontact').val(response.json[0].nominee_contact_no );
    		    		$('#formContainer').show();
                     	$(window).scrollTop(0);
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
    } 
    
    function updateMem(){  
    	if ($('#member_name').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Name is mandatory !');
            $('#member_name').focus();
            return;
        }
        if ($('#member_dob').val().trim() == '') {
            SetWarningMessageBox('warning', 'Date of Birth is mandatory!');
            $('#member_dob').focus();
            return;
        }
        if ($('#member_gender').val().trim() == '') {
            SetWarningMessageBox('warning', 'Sex is mandatory!');
            $('#member_gender').focus();
            return;
        }
        if ($('#member_aadhaar').val().trim() == '') {
            SetWarningMessageBox('warning', 'Aadhaar No. is mandatory!');
            $('#member_aadhaar').focus();
            return;
        }
        if ($('#member_husband').val().trim() == '') {
            SetWarningMessageBox('warning', 'Husband Name is mandatory!');
            $('#member_husband').focus();
            return;
        }
        if ($('#member_address').val().trim() == '') {
            SetWarningMessageBox('warning', 'Address is mandatory!');
            $('#member_address').focus();
            return;
        }
        
        if ($('#member_district').val().trim() == '') {
            SetWarningMessageBox('warning', 'District is mandatory!');
            $('#member_district').focus();
            return;
        }
        if ($('#member_dob').val().trim() == '') {
            SetWarningMessageBox('warning', 'Date of Birth is mandatory!');
            $('#member_dob').focus();
            return;
        }
        if ($('#member_contact').val().trim() == '') {
            SetWarningMessageBox('warning', 'Contact No. is mandatory!');
            $('#member_contact').focus();
            return;
        }        
        if ($('#member_bankaccount').val().trim() == '') {
            SetWarningMessageBox('warning', 'Account No. is mandatory!');
            $('#member_bankaccount').focus();
            return;
        }
        if ($('#member_bankbranch').val().trim() == '') {
            SetWarningMessageBox('warning', 'Branch Name is mandatory!');
            $('#member_bankbranch').focus();
            return;
        }
        if ($('#member_work').val().trim() == '') {
            SetWarningMessageBox('warning', 'Work Name is mandatory!');
            $('#member_work').focus();
            return;
        }
        if ($('#member_nominee').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee Name is mandatory!');
            $('#member_nominee').focus();
            return;
        }
        if ($('#member_nomineeaadhaar').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee Aadhaar No. is mandatory!');
            $('#member_nomineeaadhaar').focus();
            return;
        }
        if ($('#member_nomineeaddress').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee Address is mandatory!');
            $('#member_nomineeaddress').focus();
            return;
        }
        
        if ($('#member_nomineedistrict').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee District is mandatory!');
            $('#member_nomineedistrict').focus();
            return;
        }
        if ($('#member_nomineecontact').val().trim() == '') {
            SetWarningMessageBox('warning', 'Nominee Contact No. is mandatory!');
            $('#member_nomineecontact').focus();
            return;
        }
        

        var formData = $('form#MasMemForms').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/updateMem';
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
				   SetSucessMessageBox('Success', response.msg);
				   $('#formContainer').hide(); 
				   loadMem();
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




    function ruralurban($radio){
    	$value =  $radio.val();
    if ($value == 1)
    	{
    	$("#member_rural").val(1);
    	$("#member_urban").val(0)
    	}
    else
    	{
    	$("#member_rural").val(0);
    	$("#member_urban").val(1)
    	}
    }

    function nomineeruralurban($radio){
    	$value =  $radio.val();
    if ($value == 1)
    	{
    	$("#member_nomineerural").val(1);
    	$("#member_nomineeurban").val(0)
    	}
    else
    	{
    	$("#member_nomineerural").val(0);
    	$("#member_nomineeurban").val(1)
    	}
    }

    function bank($radio){
    	$value =  $radio.val();
    if ($value == 1)
    	{
    	$('#bankAccountNo').show();
    	$('#bankBranchName').show();
    	}
    else
    	{
    	$('#bankAccountNo').hide();
    	$('#bankBranchName').hide();
    	}
    }


    function checkAadhaar($btn){  
    	$reqestId =  $btn.val(); 
    	if ($reqestId == '')
        {
    	SetWarningMessageBox('warning', 'Aadhaar No. is mandatory!');		           
        }
    	else
    	{ 
    	var url = '<?php echo base_url();?>index.php/data_controller/checkAadhaar';
    	StartInsideLoading();
    	$.ajax({
    		  type: "post",
    		  url: url,
    		  cache: false,    
    		  data: {reqId:$reqestId},
    		  dataType: 'json',
    		  success: function(response){   
    		  try{  	 
    			   if (response.success)
    	           {
    			   SetWarningMessageBox('warning', response.msg);
    	           $('#member_aadhaar').val('');
    	           $('#member_aadhaar').focus();		           
    	           } else
    	           { 
    	               SetSucessMessageBox('success', response.msg);
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
    }

    $(document).ready(function (){
    var date = new Date();
    date.setDate(date.getDate()-1);            

    // allow to pick future date
        // $('#employee_dob').datepicker({
        // format: "dd/mm/yyyy"
        // });
    // allow to pick future date

    var FromEndDate = new Date();
    $(function(){
    $('#member_dob').datepicker({
    format: 'mm-dd-yyyy',
    endDate: FromEndDate, 
    autoclose: true
    });
    });
    });

     
    
</script>
    
       </body>
</html>
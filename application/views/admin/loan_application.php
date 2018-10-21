	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Loan Application</li>
        </ul>
		</div>
      </div>
      
      <div class="modal fade" id="loanStatementModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
			  <div class="tile-title-w-btn">
              <h3 class="title">Loan Statement</h3>
            </div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			  </div>

			  <div id="loan-statement_container" class="modal-body" style="min-height:430px;">
  
 			 </div>
 			 </div>
 		 </div>
	  </div>
			  
			  
      
      <div class="row" style="">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
          
            <div class="tile-body">
			
				<div class="col-md-12">
					<ul class="nav nav-tabs">
						<li><a data-toggle="tab" href="#group" >Group</a></li>
						<li><a data-toggle="tab" class="active show" href="#individuals">Individuals</a></li>
					</ul>
					</div>
					<div class="col-md-12">

					<div class="tab-content">
						<div id="group" class="tab-pane fade ">
						<div id="model_display"></div>
						
						 <br>
						 <h5>Group Loan Application</h5>
						 <br>
							 <?php echo form_open_multipart('',array('id'=>'MasLoanApplicationGropuForms','class'=>'row'))?>
								<div class="form-group col-md-4 align-self-end">
									<label class="control-label">Search SHG Group</label>
									<input onkeyup="runAutoCompleteGroupSearch(this.value)"  style="margin-top: 10px;" class="form-control text_number" autocomplete="off" name="groupsearchfield" id="groupsearchfield" type="text" placeholder="Type Group Name/Number" >
								</div>
								<div class="form-group col-md-4 align-self-end">
									<button onclick="LoanGroupSearch()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Search</button>
									&nbsp;&nbsp;&nbsp;
									<a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasLoanApplicationGropuForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
								</div>
								<?php echo form_close() ?>
								
								 <?php echo form_open_multipart('',array('id'=>'Group_Loan_Details_uploadForm','class'=>'row'))?>
								<div class="form-group col-md-12 align-self-end" id="LoadGroupApplicationForm">
								</div>
								<?php echo form_close() ?>
							  
							
							 <div class="row" id="showSelectedmember" style="display:none;">
								  <div class="clearix"></div>
									<div class="col-md-12">		
									  <div class="tile">
										<div class="tile-title-w-btn">
										  <h3 class="title"><span id="group_title">Selected group member list.</span></h3>
										 <button onclick="removeMasterform('#showSelectedmember')" class="close" type="button" aria-label="Close" style="height: 28px;
										  width: 36px;"><span aria-hidden="true">×</span></button>
										</div>
										<div class="tile-body">
										
										<div class="" id="group_details"></div>
										<div class="" id="selected_member_data"></div>
										</div>
									  </div>
									</div>
								  </div>
							
						</div>
						<div id="individuals" class="tab-pane fade active show">
						 <br>
						 <h5>Individual Loan Application</h5>
						 <br>
							 <?php echo form_open_multipart('',array('id'=>'MasLoanApplicationIndividualForms','class'=>'row'))?>
								<div class="form-group col-md-4 align-self-end">
									<label class="control-label">Search</label>
									<input onkeyup="runAutoComplete(this.value)" onfocus="resetValue()" style="margin-top: 10px;" class="form-control text_number" autocomplete="off" name="searchkeyword" id="searchfield" type="text" placeholder="Type Account Name/Number" >
								</div>
								<div class="form-group col-md-4 align-self-end">
									<label class="control-label">Account Number</label>
									<input id="individual_account_no" name="individual_account_no" style="margin-top: 10px;" class="form-control number" type="text" placeholder="Account Number"></input>
								</div>
								<div class="form-group col-md-4 align-self-end">
									<button onclick="LoanIndividualSearch()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Search</button>
									&nbsp;&nbsp;&nbsp;
									<a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasLoanApplicationIndividualForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
								</div>
								<?php echo form_close() ?>
								
								 <?php echo form_open_multipart('',array('id'=>'Loan_Details_uploadForm','class'=>'row'))?>
								<div class="form-group col-md-12 align-self-end" id="LoadIndividualApplicationForm">
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
   

	
    function LoanIndividualSearch()
    { 
    	if ($('#individual_account_no').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Account No. is mandatory !');
            $('#individual_account_no').focus();
            return;
        }
    	
    	var formData = $('form#MasLoanApplicationIndividualForms').serializeObject();
        var dataString = JSON.stringify(formData);
        
      var url = '<?php echo base_url();?>index.php/data_controller/searchIndividualAccountForLoan';
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
        	$('#LoadIndividualApplicationForm').html(response.html); 
			$('#individual_Loan_Type_Id').html(response.loantype_html); 
        	$('#LoadIndividualApplicationForm').show();             
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
	
	function searchLoanTypeDetails(value)
    { 
      var loan_type_id = value;
        
      var url = '<?php echo base_url();?>index.php/data_controller/searchLoanTypeDetails';
      StartInsideLoading();
      $.ajax({
        type: "post",
        url: url,
        cache: false, 
        data: {loan_type_id:loan_type_id},  
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
            {
        	$('#loan_details').html(response.html); 
			loadDropDown('','tenure_type_master','#loanmaster_tenure_type');            
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
	
	

   function Save_Loan_Application()
    { 
    	if ($('#loan_amount').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan amount is mandatory !');
            $('#loan_amount').focus();
            return;
        }
		if ($('#loanmaster_tenure_type').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Please select Loan Interval type !');
            $('#loanmaster_tenure_type').focus();
            return;
        }
		if ($('#loan_tenure_interval_value').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan Interval value is mendatory !');
            $('#loan_tenure_interval_value').focus();
            return;
        }
		if ($('#tenure_length').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Select Tenure length!');
            $('#tenure_length').focus();
            return;
        }
		if ($('#loan_purpose').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan purpose is mandatory !');
            $('#loan_purpose').focus();
            return;
        }

		
    	
    	var formData = $('form#Loan_Details_uploadForm').serializeObject();
        var dataString = JSON.stringify(formData);
        
      var url = '<?php echo base_url();?>index.php/data_controller/Loan_Details_upload';
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
        	// $('#LoadIndividualApplicationForm').html(response.html); 
			// $('#individual_Loan_Type_Id').html(response.loantype_html); 
        	// $('#LoadIndividualApplicationForm').show();  
          //	alert("hello"); 
			SetSucessMessageBox('Success', response.msg);          
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

   function calculate_loan()
   { 
   	if ($('#loan_amount').val().trim() == '') { 
           SetWarningMessageBox('warning', 'Loan amount is mandatory !');
           $('#loan_amount').focus();
           return;
       }
		if ($('#loanmaster_tenure_type').val().trim() == '') { 
           SetWarningMessageBox('warning', 'Please select Loan Interval type !');
           $('#loanmaster_tenure_type').focus();
           return;
       }
		if ($('#loan_tenure_interval_value').val().trim() == '') { 
           SetWarningMessageBox('warning', 'Loan Interval value is mendatory !');
           $('#loan_tenure_interval_value').focus();
           return;
       }
		if ($('#tenure_length').val().trim() == '') { 
           SetWarningMessageBox('warning', 'Select Tenure length!');
           $('#tenure_length').focus();
           return;
       }
		

		
   	
   	var formData = $('form#Loan_Details_uploadForm').serializeObject();
       var dataString = JSON.stringify(formData);
       
     var url = '<?php echo base_url();?>index.php/data_controller/Loan_calculate';
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

        	 $("#loanStatementModel").modal("show");
        	 $("#loan-statement_container").html(response.html);
         
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

   function runAutoComplete(query){
  	 $('#searchfield').typeahead({
  		 items: 10,
  		    source: function(request, response) {
  		        $.ajax({
  		            url: "<?php echo site_url('index.php/data_controller/searchByKeyword?q='); ?>"+query,
  		            method:"GET",
  		            dataType: "json",
  		            success: function (data) {
  		            response(data);
  		            }
  		        });
   		    },
//   		   autoselect:true,
  		  afterSelect:function(item){  $('#individual_account_no').val(item.id);},
  		  displayText: function(item){ return item.value+ " <"+item.id+">";}
  	 });
  	 
      }
	  

	   function runAutoCompleteGroupSearch(query){
  	 $('#groupsearchfield').typeahead({
  		 items: 10,
  		    source: function(request, response) {
  		        $.ajax({
  		            url: "<?php echo site_url('index.php/data_controller/GroupSearchByKeyword?q='); ?>"+query,
  		            method:"GET",
  		            dataType: "json",
  		            success: function (data) {
  		            response(data);
  		            }
  		        });
   		    },
//   		   autoselect:true,
		  
			afterSelect:function(item){ LoanGroupSearch(item.group_id)},
			displayText: function(item){ return item.group_code+ " < "+item.group_name+" >";}
  	 });
  	 
      }
	
	
	 function LoanGroupSearch(id)
    { 
      var url = "<?php echo site_url('index.php/data_controller/LoadGroupSelected_memberlistForLoan?id='); ?>"+id;
      StartInsideLoading();
      $.ajax({
        type: "get",
        url: url,
        cache: false,   
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
             { 
			
            $('#selected_member_data').html(response.html);
			$('#group_Loan_Type_Id').html(response.loantype_html);
      		$('#showSelectedmember').show(); 
		    $('#group_details').html(response.Group_details);
            

      			$('#gr_id').val(id);

            $('#delete_onclick_set').attr('onclick','deleteSelectedMember('+id+')'); 
      			
			  	
              
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
   // loadMember_list_group();
 
    
   
  
</script>
    
       </body>
</html>
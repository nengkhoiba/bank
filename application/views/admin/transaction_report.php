	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
		<div class="app-title">
			<div>
			<ul class="app-breadcrumb breadcrumb">
			  <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			  <li class="breadcrumb-item">Transaction Report</li>
			</ul>
			</div>
		</div>
      
		
			<div class="clearix"></div>
				<div class="tile">
					<div class="tile-body">
						<br>
							<h5>Transaction Report</h5>
						<br>	
						<div class="row">
							<div class="form-group col-md-3 align-self-end">
								<label class="control-label">Branch</label>
								<select class="form-control" style="margin-top: 10px;" id="branch_list">
								<!-- Branch list will be loaded here -->
								</select>
							</div>
							<div class="form-group col-md-3 align-self-end">
								<label class="control-label">Ledger</label>
								<select class="form-control" style="margin-top: 10px;" id="account_ledger">
								<!-- Ledger list will be loaded here -->
								</select>
							</div>
							<div class="form-group col-md-3 align-self-end">
								<label class="control-label">Voucher Type</label>
								<select class="form-control" style="margin-top: 10px;" id="account_ledger">
								<!-- Ledger list will be loaded here -->
								</select>
							</div>
							<div class="form-group col-md-3 align-self-end">
								<label class="control-label">User</label>
								<select class="form-control" style="margin-top: 10px;" id="account_ledger">
								<!-- Ledger list will be loaded here -->
								</select>
							</div>
							<div class="form-group col-md-3 align-self-end">
								<label class="control-label">Account Status</label>
								<select class="form-control" style="margin-top: 10px;" id="account_ledger">
								<!-- Ledger list will be loaded here -->
								</select>
							</div>
							
							<div class="form-group col-md-3 align-self-end">
								<label class="control-label">Date from</label>
								<input name="to_date" style="margin-top: 10px;" class="form-control" type="text" id="from_date" placeholder="Select to date">
							</div>
							
							<div class="form-group col-md-3 align-self-end">
								<label class="control-label">Date to</label>
								<input name="to_date" style="margin-top: 10px;" class="form-control" type="text" id="to_date" placeholder="Select to date">
							</div>
							
						</div>
					</div>
				</div>
			
		
    </main>
	  <?php $this->load->view('global/footer');?> 
    <script type="text/javascript">
   
	loadDropDown('','branch','#branch_list');  
	loadDropDown('','account_ledger','#account_ledger');  
	
	
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
   
     $(document).ready(function (){
    var date = new Date();
    date.setDate(date.getDate()-1);            

    // allow to pick future date
        $('#from_date').datepicker({
        format: "dd/mm/yyyy"
        });
    // allow to pick future date

    var FromEndDate = new Date();
    $(function(){
    $('#to_date').datepicker({
    format: 'mm-dd-yyyy',
    //endDate: FromEndDate, 
	endStart: FromEndDate, 
    
	autoclose: true
    });
    });
    });
   
  
</script>
    
       </body>
</html>
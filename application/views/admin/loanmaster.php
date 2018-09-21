	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Loan Master</li>
        </ul>
		</div>
		<p class="bs-component">	
            <a onclick="addLoanmasterform($(this))" style="color:#fff" class="btn btn-sm btn-success">New</a>
            <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('loan_master','loadLoanmaster()')">Delete</button>
        </p>
      </div>
      
      <div class="row" id="formContainer" style="display: none">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add/Update Loan Details</h3>
             <button onclick="removeMasterform('#formContainer')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
            <?php echo form_open_multipart('',array('id'=>'MasLoanmasterForms','class'=>'row'))?>
            <input id="postType" name="postType" type="hidden">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan Name</label>
                  <input name="loanmaster_loan_name" style="margin-top: 10px;"
    				class="form-control name" type="text" id="loanmaster_loan_name"
    				placeholder="Loan Name"></input>
                </div>
          
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan PC</label>
                  <input name="loanmaster_loan_pc" style="margin-top: 10px;"
					class="form-control" type="text" id="loanmaster_loan_pc"
					placeholder="Loan PC"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan PC Type</label>
                  <select id="loanmaster_loan_pc_type" name="loanmaster_loan_pc_type" style="margin-top:10px;" class="form-control" >
                  	<!-- List of loan pc type -->
                  </select>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan Tenure Type</label>
                  <select id="loanmaster_tenure_type" name="loanmaster_tenure_type" style="margin-top:10px;" class="form-control" >
                  	<!-- List of loan tenure type -->
                  </select>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan Tenure Min</label>
                  <input name="loanmaster_tenure_min" style="margin-top: 10px;"
					class="form-control" type="text" id="loanmaster_tenure_min"
					placeholder="Loan Tunure Min"></input>
                </div>
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Loan Tenure Max</label>
                  <input name="loanmaster_tenure_max" style="margin-top: 10px;"
					class="form-control" type="text" id="loanmaster_tenure_max"
					placeholder="Loan Tunure Max"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Min Amount</label>
                  <input name="loanmaster_min_amount" style="margin-top: 10px;"
					class="form-control" type="text" id="loanmaster_min_amount"
					placeholder="Loan Min Amount"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Max Amount</label>
                  <input name="loanmaster_max_amount" style="margin-top: 10px;"
					class="form-control" type="text" id="loanmaster_max_amount"
					placeholder="Loan Max Amount"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Income Ledger</label>
                  <input name="loanmaster_income_ledger" style="margin-top: 10px;"
					class="form-control" type="text" id="loanmaster_income_ledger"
					placeholder="Income Ledger"></input>
                </div>
				
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Expense Ledger</label>
                  <input name="loanmaster_expense_ledger" style="margin-top: 10px;"
					class="form-control" type="text" id="loanmaster_expense_ledger"
					placeholder="Expense Ledger"></input>
                </div>
				
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="updateLoanmaster()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasLoanmasterForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
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
                	<div id="loanmaster_table" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?>

    <script type="text/javascript">
   
    	
   
    function loadLoanmaster()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadLoanmaster'); ?>"; 
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
            $('#loanmaster_table').html(response.html);
              $('#loanmaster').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});
              
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
    
      loadLoanmaster();
    
      
    function addLoanmasterform($btn){  
    	$reqestId =  $btn.val();
    	if($reqestId == 0)
    	{
    		$('#postType').val(0);
    		$('#loanmaster_loan_name').val('');
    		$('#loanmaster_loan_pc').val('');
    		loadDropDown('','pc_type_master','#loanmaster_loan_pc_type');
			loadDropDown('','tenure_type_master','#loanmaster_tenure_type');
			$('#loanmaster_tenure_min').val('');
			$('#loanmaster_tenure_max').val('');
			$('#loanmaster_min_amount').val('');
			$('#loanmaster_max_amount').val('');
			$('#loanmaster_income_ledger').val('');
			$('#loanmaster_expense_ledger').val('');
        	$('#formContainer').show();
        	$(window).scrollTop(0);
        }
    	else
    	{ 
    	var url = '<?php echo base_url();?>index.php/data_controller/EditLoanmaster';
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
    				$('#loanmaster_loan_name').val(response.json[0].Loan_name);
    	    		$('#loanmaster_loan_pc').val(response.json[0].Loan_pc);
    	    		loadDropDown(response.json[0].Loan_pc_type,'pc_type_master','#loanmaster_loan_pc_type');
    				loadDropDown(response.json[0].Tenure_type,'tenure_type_master','#loanmaster_tenure_type');
    				$('#loanmaster_tenure_min').val(response.json[0].Tenure_min);
    				$('#loanmaster_tenure_max').val(response.json[0].Tenure_max);
    				$('#loanmaster_min_amount').val(response.json[0].Min_amount);
    				$('#loanmaster_max_amount').val(response.json[0].Max_amount);
    				$('#loanmaster_income_ledger').val(response.json[0].Income_ledger);
    				$('#loanmaster_expense_ledger').val(response.json[0].Expense_ledger);
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
   
    function updateLoanmaster(){  
    	if ($('#loanmaster_loan_name').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan name is mandatory !');
            $('#loanmaster_loan_name').focus();
            return;
        }
			if ($('#loanmaster_loan_pc').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan PC is mandatory !');
            $('#loanmaster_loan_pc').focus();
            return;
        }
			if ($('#loanmaster_loan_pc_type').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan PC type is mandatory !');
            $('#loanmaster_loan_pc_type').focus();
            return;
        }
		
			if ($('#loanmaster_tenure_type').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan tenure type is mandatory !');
            $('#loanmaster_tenure_type').focus();
            return;
        }
		
			if ($('#loanmaster_tenure_min').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Tenure min is mandatory !');
            $('#loanmaster_tenure_min').focus();
            return;
        }
		
			if ($('#loanmaster_tenure_max').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Tenure max is mandatory !');
            $('#loanmaster_tenure_max').focus();
            return;
        }
			if ($('#loanmaster_min_amount').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Min amount is mandatory !');
            $('#loanmaster_min_amount').focus();
            return;
        }
			if ($('#loanmaster_max_amount').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Max amount is mandatory !');
            $('#loanmaster_max_amount').focus();
            return;
        }
			if ($('#loanmaster_income_ledger').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Income ledger is mandatory !');
            $('#loanmaster_income_ledger').focus();
            return;
        }
			if ($('#loanmaster_expense_ledger').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Expences ledger is mandatory !');
            $('#loanmaster_expense_ledger').focus();
            return;
        }
				
       

        var formData = $('form#MasLoanmasterForms').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/updateLoanmaster';
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
				   loadLoanmaster();
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
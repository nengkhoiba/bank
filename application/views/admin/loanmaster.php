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
            <a onclick="addLoanmasterform()" style="color:#fff" class="btn btn-sm btn-success">New</a>
            <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('RemoveLoanmaster','loadLoanmaster()')">Delete</button>
        </p>
      </div>
      
      <div class="row" id="MasLoanmasterformColap">
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
              $('#loanmaster').DataTable();
              
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
    function addLoanmaster(){  
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
            SetWarningMessageBox('warning', 'Loan Tenure type is mandatory !');
            $('#loanmaster_tenure_type').focus();
            return;
        }
			if ($('#loanmaster_tenure_min').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan tenure Min amount is mandatory !');
            $('#loanmaster_tenure_min').focus();
            return;
        }
			if ($('#loanmaster_tenure_max').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan tenure Max amount is mandatory !');
            $('#loanmaster_tenure_max').focus();
            return;
        }
			if ($('#loanmaster_min_amount').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan Min amount is mandatory !');
            $('#loanmaster_min_amount').focus();
            return;
        }
			if ($('#loanmaster_max_amount').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan Max amount is mandatory !');
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
        var url = '<?php echo base_url();?>index.php/data_controller/addLoanmaster';
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
           $('#MasLoanmasterformColap').empty(); 
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


    function addLoanmasterform(){ 
    	var url = '<?php echo base_url();?>index.php/data_controller/AddLoanmasterform';
    	StartInsideLoading();
    	$.ajax({
    		  type: "post",
    		  url: url,
    		  cache: false,
    		  dataType: 'json',
    		  success: function(response){   
    		  try{  	 
    			 //  var result = jQuery.parseJSON(data);
    			   if (response.success)
    	           { 	
    				 $('#MasLoanmasterformColap').html(response.html);
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

      
    function editLoanmaster($btn){  
    	$reqestId =  $btn.val(); 
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
    				 $('#MasLoanmasterformColap').html(response.html);
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
				
       

        var formData = $('form#LoanmasterFormUpdate').serializeObject();
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
				   $('#MasLoanmasterformColap').empty(); 
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
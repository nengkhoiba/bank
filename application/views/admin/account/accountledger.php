	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Account Ledger</li>
        </ul>
		</div>
		<p class="bs-component">	
            <a onclick="addAccountLedgerform()" style="color:#fff" class="btn btn-sm btn-success">New</a>
            <button class="btn btn-sm btn-danger" type="button" onclick="deleteAccountLedger()">Delete</button>
        </p>
      </div>
      
      <div class="row" id="MasAccountLedgerformColap">
      </div>
     
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="row"> 
              	<div class="col-md-12">
                	<div id="accountledger_table" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php $this->load->view('global/footer');?>

<script type="text/javascript">
function loadAccountLedger()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadAccountLedger'); ?>"; 
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
            $('#accountledger_table').html(response.html);
              $('#accountledger').DataTable();
              
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
	loadAccountLedger();
	
    function addAccountLedger(){  
    	if ($('#accountLedger_name').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Ledger name is mandatory !');
            $('#accountLedger_name').focus();
            return;
        }
		if ($('#accountLedger_grpUnder').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Account group under is mandatory !');
            $('#accountLedger_grpUnder').focus();
            return;
        }
		if ($('#accountLedger_open').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Opening balance is mandatory !');
            $('#accountLedger_open').focus();
            return;
        }
       
        
        var formData = $('form#MasAccountLedgerForms').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/addAccountLedger';
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
           $('#MasAccountLedgerformColap').empty(); 
           loadAccountLedger();
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


    function addAccountLedgerform(){ 
    	var url = '<?php echo base_url();?>index.php/data_controller/AddAccountLedgerform';
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
    				 $('#MasAccountLedgerformColap').html(response.html);
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

      
    function editAccountLedger($btn){  
    	$reqestId =  $btn.val(); 
    	var url = '<?php echo base_url();?>index.php/data_controller/EditAccountLedger';
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
    				 $('#MasAccountLedgerformColap').html(response.html);
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
   
    function updateAccountLedger(){  
    	if ($('#accountLedger_name').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Ledger name is mandatory !');
            $('#accountLedger_name').focus();
            return;
        }
		if ($('#accountLedger_grpUnder').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Account group under is mandatory !');
            $('#accountLedger_grpUnder').focus();
            return;
        }
		if ($('#accountLedger_open').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Opening balance is mandatory !');
            $('#accountLedger_open').focus();
            return;
        }
       
        

        var formData = $('form#AccountLedgerFormUpdate').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/updateAccountLedger';
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
				   $('#MasAccountLedgerformColap').empty(); 
				   loadAccountLedger();
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
    function deleteAccountLedger(){  

       // Checking all category data are deleted
    	if (!$( ".checkbox" ).length) {
    		SetWarningMessageBox('warning', 'No Item left  to Delete !!!'); 
    		return;
    	}
    	
    	var selected_value = []; // initialize empty array 
    	if ($('.checkbox:checked').length == 0 )
        {
    		SetWarningMessageBox('warning', 'Please select Item to Delete !!!');
    		return;
	    } else {
	    	$(".checkbox:checked").each(function(){
	              selected_value.push($(this).val());
	          });
	    }	
    	var url = '<?php echo base_url();?>index.php/data_controller/RemoveAccountLedger';
    	var dataString = JSON.stringify(selected_value);
    swal({
      title: "Are you sure?",
      //text: "You will not be able to recover this imaginary file!",
      //type: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, Delete it!",
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: true,
      closeOnCancel: true
      }, function(isConfirm) {
      if (isConfirm) {
      StartInsideLoading();  
        	$.ajax({
      		  type: "post",
      		  url: url,
      		  cache: false,    
      		  data: {dataArr:dataString},
      		  dataType: 'json',
      		  success: function(response){   
      		  try{  	
      			   if (response.success)
      	           { 
      				   SetSucessMessageBox('Success', response.msg);
      				   loadAccountLedger();
      	           } else
      	           { 
      	               SetWarningMessageBox('warning', response.msg);
      	               //StopInsideLoading();
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
      }); 
    } 
</script>
    
       </body>
</html>
	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Account Transaction</li>
        </ul>
		</div>
		<p class="bs-component">	
            <a onclick="addAccTranform($(this))" style="color:#fff" class="btn btn-sm btn-success">New</a>
          
        </p>
      </div>
      
      <div class="row" id="formContainer" style="display: none">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add/Update Account Transaction</h3>
             <button onclick="removeMasterform('#formContainer')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
            <?php echo form_open_multipart('',array('id'=>'MasAccTranForms','class'=>'row'))?>
            <input id="postType" name="postType" type="hidden">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Voucher Type</label>
                  <select id="acc_tran_type" name="acc_tran_type" style="margin-top:10px;" class="form-control" >
                  	<option class="form-control" value="">- Select -</option>
                  	<option class="form-control" value="P">Payment</option>
                  	<option class="form-control" value="R">Received</option>
                  	<option class="form-control" value="C">Contra</option>
                  	<option class="form-control" value="J">Journal</option>
                  	</select>
                </div>
         
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">By</label>
                  <select id="acc_tran_by" name="acc_tran_by" style="margin-top:10px;" class="form-control" >
                        <!-- list of ledger account -->
                  	</select>
                </div>
			
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">To</label>
                  <select id="acc_tran_to" name="acc_tran_to" style="margin-top:10px;" class="form-control" >
                        <!-- list of ledger account -->
                  	</select>
                </div>
                
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Narration</label>
                  <textarea name="acc_tran_narration" style="margin-top: 10px;"
    				class="form-control text_number" rows="1" type="text" id="acc_tran_narration"
    				placeholder="Narration"></textarea>
                </div>
                
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Amount</label>
                  <input name="acc_tran_amount" style="margin-top: 10px;"
    				class="form-control percentage" type="text" id="acc_tran_amount"
    				placeholder="Amount"></input>
                </div>
				
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="customeconfirmationbox('updateAccTran()', 'Are you sure?', 'Yes, proceed', 'No, Cancel')" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasAccTranForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
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
                	<div id="branch_table" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?>

    <script type="text/javascript">
   
    	
   
    function loadAccTran()
    { 
      var url = "<?php echo site_url('index.php/account_controller/loadAccTran'); ?>"; 
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
            $('#branch_table').html(response.html);
              $('#accTranTable').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});
              
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
    
    loadAccTran();

    function loadLedger()
    { 
      var url = "<?php echo site_url('index.php/account_controller/loadAccountLedgerDropDown'); ?>"; 
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
            $('#acc_tran_by').html(response.html);  
            $('#acc_tran_to').html(response.html);             
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
    loadLedger(); 



    

    function addAccTranform($btn){  
    	$reqestId =  $btn.val();
    	if($reqestId == 0)
    	{
    		$('#postType').val(0);
    		$('#acc_tran_type').val('');
    		$('#acc_tran_by').val('');
    		$('#acc_tran_to').val('');
    		$('#acc_tran_narration').val('');
    		$('#acc_tran_amount').val('');
    		
        	$('#formContainer').show();
        	$(window).scrollTop(0);
        }
    } 

   
    function updateAccTran(){  
    	if ($('#acc_tran_type').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Select Voucher Type !');
            $('#acc_tran_type').focus();
            return;
        }
			if ($('#acc_tran_by').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Select By ledger !');
            $('#acc_tran_by').focus();
            return;
        }
			if ($('#acc_tran_to').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Select To Ledger !');
            $('#acc_tran_to').focus();
            return;
			}
            if ($('#acc_tran_narration').val().trim() == '') { 
                SetWarningMessageBox('warning', 'Naration is mandatory !');
                $('#acc_tran_narration').focus();
            return;
            }
            if ($('#acc_tran_amount').val().trim() == '') { 
                SetWarningMessageBox('warning', 'Enter Amount !');
                $('#acc_tran_amount').focus();
            return;
        }
       

        var formData = $('form#MasAccTranForms').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/Account_controller/UpdateAccounttransaction';
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
				   loadAccTran();
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

	function deleteVoucher(voucher){
		var url = '<?php echo base_url();?>Account_controller/deleteVoucher?q='+voucher;
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
				   SetSucessMessageBox('Success', response.msg);
				   $('#formContainer').hide(); 
				   loadAccTran();
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
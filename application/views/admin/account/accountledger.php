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
            <a onclick="addAccountLedgerform($(this))" style="color:#fff" class="btn btn-sm btn-success">New</a>
            <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('account_ledger','loadAccountLedger()')">Delete</button>
        </p>
      </div>
      
      <div class="row" id="formContainer" style="display: none">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add/Update Account Ledger</h3>
             <button onclick="removeMasterform('#formContainer')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
            <?php echo form_open_multipart('',array('id'=>'MasAccountLedgerForms','class'=>'row'))?>
            <input id="postType" name="postType" type="hidden">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Ledger Name</label>
                  <input name="accountLedger_name" style="margin-top: 10px;"
    				class="form-control name" type="text" id="accountLedger_name"
    				placeholder="Ledger Name"></input>
                </div>
				 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Under Account Group</label>
                  <select id="accountLedger_grpUnder" name="accountLedger_grpUnder" style="margin-top:10px;" class="form-control" >
                        <!-- List of account group -->
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Opening Balance</label>
                  <input name="accountLedger_open" style="margin-top: 10px;"
    				class="form-control number" type="text" id="accountLedger_open"
    				placeholder="Opening Balance"></input>
                </div>
               
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="updateAccountLedger()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasAccountLedgerForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
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
      var url = "<?php echo site_url('index.php/account_controller/loadAccountLedger'); ?>"; 
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
	  
    function addAccountLedgerform($btn){  
    	$reqestId =  $btn.val();
    	if($reqestId == 0)
    	{
    		$('#postType').val(0);
    		$('#accountLedger_name').val('');
    		$('#accountLedger_grpUnder').val('');
    		$('#accountLedger_open').val('');
        	$('#formContainer').show();
        	$(window).scrollTop(0);
        }
    	else
    	{ 
    	var url = '<?php echo base_url();?>index.php/account_controller/EditAccountLedger';
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
        				$('#accountLedger_name').val(response.json[0].Ledger);
        	    		$('#accountLedger_grpUnder').val(response.json[0].Group_ID);
        	    		$('#accountLedger_open').val(response.json[0].Open_balance);
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
       
        

        var formData = $('form#MasAccountLedgerForms').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/account_controller/updateAccountLedger';
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

    function loadAccountGrpUnder()
    { 
      var url = "<?php echo site_url('index.php/account_controller/loadAccountGrpUnder'); ?>"; 
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
            $('#accountLedger_grpUnder').html(response.html);              
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
    loadAccountGrpUnder();
    
</script>
    
       </body>
</html>
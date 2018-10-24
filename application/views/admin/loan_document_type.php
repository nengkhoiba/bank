	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Loan Document Type</li>
        </ul>
		</div>
      </div>
      
			  
      
      <div class="row" style="">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
          
            <div class="tile-body">
			
					<div class="col-md-12">
						<br>
							<h5>Loan Document Type</h5>
						<br>
                
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Select Loan Type</label>
                  	<select onchange="searchLoanMasterDocType(this.value)" id="loan_type" name="loan_type" style="margin-top:10px;" class="form-control" >
                        <!-- List of loan -->
                  	</select>
                </div>
              
              <div class="row" id="formContainer" style="display:none;">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
          <div class="tile-body" id="docTypeForm" style="display:none;">
            <div class="tile-title-w-btn">
              <h3 class="title">Add/Update Document  Type</h3>
             <button onclick="removeMasterform('#docTypeForm')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            
            <?php echo form_open_multipart('',array('id'=>'LoanMasterDocTypeForm','class'=>'row'))?>
            <input id="loanType" name="loanType" type="hidden">
            	<input id="postType" name="postType" type="hidden">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Document Type</label>
                  <input name="document_type" style="margin-top: 10px;"
    				class="form-control name" type="text" id="document_type"
    				placeholder="Document Type"></input>
                </div>               
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="UpdateLoanMasterDocType()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#LoanMasterDocTypeForm')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#docTypeForm')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              <?php echo form_close() ?>
            </div>
        
            <div class="tile-body" id="loanMasterDocType">
                  
            </div>
       
       </div>
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
	
function loadLoanType(){ 
	var url = '<?php echo base_url();?>index.php/data_controller/loadLoanType';
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
				 $('#loan_type').html(response.html);
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
loadLoanType();


function searchLoanMasterDocType($reqestId){  
	var url = '<?php echo base_url();?>index.php/data_controller/searchLoanMasterDocType';
	StartInsideLoading();
	$.ajax({
		  type: "post",
		  url: url,
		  cache: false,    
		  data: {loan_type:$reqestId},
		  dataType: 'json',
		  success: function(response){   
		  try{  	 
			   if (response.success)
	           {
				$('#docTypeForm').hide(); 
				$('#formContainer').show();
				$('#loanType').val(response.loanType);
   				$('#loanMasterDocType').html(response.html);
   				$('#loanMasterDocTypeTable').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});
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

function addLoanMasterDocTypeform($btn){  
	$reqestId =  $btn.val();
	if($reqestId == 0)
	{
		$('#postType').val(0);
		$('#document_type').val('');
    	$('#docTypeForm').show();
    	$(window).scrollTop(0);
    }
	else
	{
	var url = '<?php echo base_url();?>index.php/data_controller/EditLoanDocType';
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
					$('#document_type').val(response.json[0].Name);
				    $('#docTypeForm').show();
				    $(window).scrollTop(0);
	           } 
	           else
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


function UpdateLoanMasterDocType(){ 
	if ($('#document_type').val().trim() == '') { 
        SetWarningMessageBox('warning', 'Document type is mandatory !');
        $('#document_type').focus();
        return;
    }
	   
    var formData = $('form#LoanMasterDocTypeForm').serializeObject();
    var dataString = JSON.stringify(formData);
    var url = '<?php echo base_url();?>index.php/data_controller/UpdateLoanDocType';
    
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
       searchLoanMasterDocType(response.loan_type);
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
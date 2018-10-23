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
						 <?php echo form_open_multipart('',array('id'=>'MasLoanTypeForms','class'=>'row'))?>
                
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Select Loan Type</label>
                  	<select id="loan_type" name="loan_type" style="margin-top:10px;" class="form-control" >
                        <!-- List of loan -->
                  	</select>
                </div>
                
               
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="updateEmp()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasEmpForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#formContainer')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              <?php echo form_close() ?>
							 
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
  
</script>
    
       </body>
</html>
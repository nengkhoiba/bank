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
      
      <div class="row" style="">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
          
            <div class="tile-body">
			
				<div class="col-md-12">
					<ul class="nav nav-tabs">
						<li><a data-toggle="tab" href="#group" class="active show">Group</a></li>
						<li><a data-toggle="tab" href="#individuals">Individuals</a></li>
					</ul>
					</div>
					<div class="col-md-12">

					<div class="tab-content">
						<div id="group" class="tab-pane fade active show">
						 <br>
						 <h5>Group Loan Application</h5>
						 <br>
							 <?php echo form_open_multipart('',array('id'=>'MasShgmasterForms','class'=>'row'))?>
								
								<div class="form-group col-md-4 align-self-end">
									<label class="control-label">SHG Group Code</label>
									<input id="shg_name" name="shg_name" style="margin-top: 10px;"
									class="form-control text_number" rows="1" type="text" id="shg_name"
									placeholder="Group Code"></input>
								</div>
								<div class="form-group col-md-4 align-self-end">
									<label class="control-label">Select Loan type</label>
									<select class="form-control" style="margin-top: 10px;" id="exampleSelect1">
									  <option>1</option>
									  <option>2</option>
									  <option>3</option>
									  <option>4</option>
									  <option>5</option>
									</select>
								</div>
								
								<div class="col-md-12 ">
									<table class="table">
										<thead>
										<tr>
											<th>Loan Name</th>
											<th>Loan PC</th>
											<th>Loan PC type</th>
											<th>Tenure type</th>
											<th>Tenure Min.</th>				
											<th>Tenure Max.</th>
											<th>Min. amount</th>
											<th>Max. amount</th>
										</tr>
										</thead>
										<tbody>
											<tr>
											  <td>Education</td>
											  <td>15%</td>
											  <td>PA</td>
											  <td>Day</td>
											  <td>30</td>
											  <td>60</td>
											  <td>100000</td>
											  <td>200000</td>
											</tr>
										</tbody>
									</table>
								</div>
								
								<div class="form-group col-md-4 align-self-end">
								  <label class="control-label">Loan Amount</label>
								  	<div class="input-group" style="margin-top:10px;">
										<div class="input-group-prepend"><span class="input-group-text">$</span></div>
										<input class="form-control number" id="exampleInputAmount" type="text" placeholder="Loan Amount">
										<div class="input-group-append"><span class="input-group-text">.00</span></div>
									</div>
									<label class="control-label custome_label">(Rs.100000 to Rs.200000)</label>
									

									
								</div>
								<div class="form-group col-md-4 align-self-end">
								  <label class="control-label">Tenure length</label>
								  <input  name="shg_member_count" style="margin-top: 10px;"
									class="form-control number"  type="text" id="shg_member_count"
									placeholder="Tenure length"></input>
									<label class="control-label custome_label">(30 to 60)</label>
								</div>
								<div class="form-group align-self-center">
								 <label class="control-label custome_label">( Days )</label>
								</div>
								
								<div class="form-group col-md-12 align-self-end">
								  <button onclick="UpdateShgmaster()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Calculate</button>
								  &nbsp;&nbsp;&nbsp;
								   <button onclick="UpdateShgmaster()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
								  &nbsp;&nbsp;&nbsp;
										  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#formContainer')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
								</div>
							  <?php echo form_close() ?>
						  
						</div>
						<div id="individuals" class="tab-pane fade ">
						 <br>
						 <h5>Individual Loan Application</h5>
						 <br>
							 <?php echo form_open_multipart('',array('id'=>'MasLoanApplicationIndividualForms','class'=>'row'))?>
								<div class="form-group col-md-4 align-self-end">
									<label class="control-label">Account Number</label>
									<input id="individual_account_no" name="individual_account_no" style="margin-top: 10px;"
									class="form-control number" type="text" 
									placeholder="Account Number"></input>
								</div>
								<div class="form-group col-md-8 align-self-end">
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
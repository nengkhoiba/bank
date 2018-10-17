	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Loan Sanction</li>
        </ul>
		</div>
      </div>
      
	  <div class="" id="loan_sanction_form"></div>
	  
      <div class="row" style="">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
          
            <div class="tile-body">
			
				<div class="col-md-12">
					<ul class="nav nav-tabs">
						<li><a data-toggle="tab" href="#group_sanction" >Group</a></li>
						<li><a data-toggle="tab" href="#individual_sanction" class="active show">Individuals</a></li>
					</ul>
					</div>
					<div class="col-md-12">

					<div class="tab-content">
						<div id="group_sanction" class="tab-pane fade ">
						 <br>
						 <h5>Group Loan Sanction</h5>
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
								  <button onclick="" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Calculate</button>
								  &nbsp;&nbsp;&nbsp;
								   <button onclick="" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
								  &nbsp;&nbsp;&nbsp;
										  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#formContainer')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
								</div>
							  <?php echo form_close() ?>
						  
						</div>
						<div id="individual_sanction" class="tab-pane fade active show">
						 <br>
						 <h5>Individual Loan Sanction</h5>
						 <br>
							<div class="" id="individual_sanction_data_table"></div>
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
   

	 function individual_sanction_table()
    { 
      var url = "<?php echo site_url('index.php/data_controller/Individual_sanction_table'); ?>"; 
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
            $('#individual_sanction_data_table').html(response.html);
              $('#individual_sanction_table').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});
              
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
    
    individual_sanction_table();
	
	   function addLoansanctionform(app_id){  
    	var app_id =  app_id; 
    	var url = '<?php echo base_url();?>index.php/data_controller/add_loan_sanction_form';
    	StartInsideLoading();
    	$.ajax({
    		  type: "post",
    		  url: url,
    		  cache: false,    
    		  data: {loan_app_id:app_id},
    		  dataType: 'json',
    		  success: function(response){   
    		  try{  	 
    			   if (response.success)
    	           { 	
    				$('#loan_sanction_form').html(response.html);
					loadDropDown('','payment_type_master','#payment_mode'); 
					
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
	
	  function addSanctionDetails()
	  {
	  
	  if ($('#payment_mode').val()== '') { 
            SetWarningMessageBox('warning', 'Please select payment mode !');
            $('#payment_mode').focus();
            return;
        }
		else
		{
			if ($('#payment_mode').val()== '2') {
				if ($('#cheque_no').val().trim() == '') { 
				SetWarningMessageBox('warning', 'Cheque No. is mandatory !');
				$('#cheque_no').focus();
				return;
			}
        }
		}
		
		if ($('#loan_app_id').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan purpose is mandatory !');
            $('#loan_app_id').focus();
            return;
        }
		
		
			var formData = $('form#MasIndiLoansanctionForms').serializeObject();
        var dataString = JSON.stringify(formData);
		
    	var url = '<?php echo base_url();?>index.php/data_controller/addSanctionDetails';
    	StartInsideLoading();
    	$.ajax({
    		  type: "post",
    		  url: url,
    		  cache: false, 
				data:dataString,
    		  dataType: 'json',
    		  success: function(response){   
    		  try{  	 
    			   if (response.success)
    	           {
					SetSucessMessageBox('Success', response.msg);      
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

	function check_value(value)
    { 
      var select_value = value;
	if(value==1)
		  {
			document.getElementById("cheque_box").style.visibility=" hidden";
		  }
	  if(value==2)
		{
			document.getElementById("cheque_box").style.visibility="visible";
		}
	}
   
  
</script>
    
       </body>
</html>
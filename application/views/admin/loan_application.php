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
      
      <div class="row" id="formContainer" style="">
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
							 <?php echo form_open_multipart('',array('id'=>'MasShgmasterForms','class'=>'row'))?>
								
								<div class="form-group col-md-4 align-self-end">
									<label class="control-label">Account Number</label>
									<input id="shg_name" name="shg_name" style="margin-top: 10px;"
									class="form-control number" rows="1" type="text" id="shg_name"
									placeholder="Account Number"></input>
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
					</div>
					</div>
				
            </div>
          </div>
        </div>
      </div>
     
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="row"> 
              	<div class="col-md-12">
					
					
					
                	<div id="shgmaster_table" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?> 
    <script type="text/javascript">
   
    	
   
    function loadShgmaster()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadShgmaster'); ?>"; 
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
            $('#shgmaster_table').html(response.html);
              $('#shgmaster').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});
              
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
    loadShgmaster();


	
	
    function addShgmasterform($btn)
	{ 
		
    	$reqestId =  $btn.val();
    	if($reqestId == 0)
    	{
    		$('#postType').val(0);
    		$('#shg_code').val('');
    		$('#shg_name').val('');
			$('#shg_address').val('');
			$('#shg_area').val('');
			$('#shg_member_count').val('');
			$('#shg_extra').val('');
        	$('#formContainer').show();
        	$(window).scrollTop(0);
        }
    	else
    	{
    	var url = '<?php echo base_url();?>index.php/data_controller/EditShgmaster';
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
						$('#shg_code').val(response.json[0].Group_code);
						$('#shg_name').val(response.json[0].Group_name);
						$('#shg_address').val(response.json[0].Address);
						$('#shg_area').val(response.json[0].Area);
						$('#shg_member_count').val(response.json[0].Member_count);
						$('#shg_extra').val(response.json[0].Extra);
						$('#formContainer').show();
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
	
	
   

    function UpdateShgmaster(){ 
    	if ($('#shg_code').val().trim() == '') { 
            SetWarningMessageBox('warning', 'SHG Code is mandatory !');
            $('#shg_code').focus();
            return;
        }
		if ($('#shg_name').val().trim() == '') { 
            SetWarningMessageBox('warning', 'SHG Name is mandatory !');
            $('#shg_name').focus();
            return;
        }
		if ($('#shg_address').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Address is mandatory !');
            $('#shg_address').focus();
            return;
        }
		if ($('#shg_area').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Area is mandatory !');
            $('#shg_area').focus();
            return;
        }
		if ($('#shg_member_count').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Max Member is mandatory !');
            $('#shg_member_count').focus();
            return;
        }
		
       
        var formData = $('form#MasShgmasterForms').serializeObject();
        var dataString = JSON.stringify(formData);
        var url = '<?php echo base_url();?>index.php/data_controller/UpdateShgmaster';
        
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
           loadShgmaster();
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
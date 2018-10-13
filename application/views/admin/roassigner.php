	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">RO Assigner</li>
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
						 <h5>Search Group</h5>
						 <br>
							 <?php echo form_open_multipart('',array('id'=>'MasROAssignerGrpForms','class'=>'row'))?>
								
								<div class="form-group col-md-4 align-self-end" >
								<label class="control-label">Select RO</label>
									<select id="roGrp" name="ro" class="form-control" style="margin-top: 10px;">
									  <!-- list of  RO -->
									</select>
								</div>
								
								<div class="form-group col-md-4 align-self-end" id="groupLoanAccNo">
									<label class="control-label">Group Loan Account Number</label>
									<input id="loan_acc_no_Grp" name="loan_acc_no_Grp" style="margin-top: 10px;"
									class="form-control text_number" type="text"
									placeholder="Group Loan Account Number"></input>
								</div>
								
								<div class="form-group col-md-4 align-self-end">
								  <button onclick="searchLoanApplicationGrp()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Search</button>
								  &nbsp;&nbsp;&nbsp;
								 <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasROAssignerGrpForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
								</div>
								
																
								<div class="form-group col-md-12 align-self-end" id="LoadApplicationFormGrp" style="display: none">
								 <div style="border: 2px solid #ced4da; margin: 0px; padding-top: 10px;">
								 
								 <div id="group_details">
                                
                                </div>
                                
                                <div class="col-12" id="memList">
                                
                                </div>
                                </div>	
								</div>
								<?php echo form_close() ?>
						  
						</div>
						<div id="individuals" class="tab-pane fade">
						 <br>
						 <h5>Search Individuals</h5>
						 <br>
							 <?php echo form_open_multipart('',array('id'=>'MasROAssignerIndividualsForms','class'=>'row'))?>
								
								<div class="form-group col-md-4 align-self-end" >
								<label class="control-label">Select RO</label>
									<select id="roIndi" name="ro" class="form-control" style="margin-top: 10px;">
									  <!-- list of  RO -->
									</select>
								</div>
								
								<div class="form-group col-md-4 align-self-end" id="memLoanAccNo">
									<label class="control-label">Loan Account Number</label>
									<input id="loan_acc_no_Indi" name="loan_acc_no_Indi" style="margin-top: 10px;"
									class="form-control text_number" type="text"
									placeholder="Loan Account Number"></input>
								</div>
								
								<div class="form-group col-md-4 align-self-end">
								  <button onclick="searchLoanApplicationIndi()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Search</button>
								  &nbsp;&nbsp;&nbsp;
								 <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasROAssignerIndividualsForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
								</div>
								
																
								<div class="form-group col-md-12 align-self-end" id="LoadApplicationFormIndi">
								 	
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
   
    function loadROList()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadROList'); ?>"; 
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
            $('#roGrp').html(response.html); 
            $('#roIndi').html(response.html);             
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
    loadROList();

    function searchLoanApplicationGrp()
    { 

    	if ($('#roGrp').val().trim() == '') { 
            SetWarningMessageBox('warning', 'RO is mandatory !');
            $('#roGrp').focus();
            return;
        }

    	if ($('#loan_acc_no_Grp').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan account no. is mandatory !');
            $('#loan_acc_no_Grp').focus();
            return;
        }
    	

    	var formData = $('form#MasROAssignerGrpForms').serializeObject();
        var dataString = JSON.stringify(formData);
        
      var url = '<?php echo base_url();?>index.php/data_controller/searchLoanApplicationGrp';
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
          	  $('#group_details').html(response.Group_details); 			
              $('#memList').html(response.html);
              $('#memTable').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});
              if(response.check == '')
              {
             	 $('#assignROBtn').attr('disabled',true);
             	 SetWarningMessageBox('warning', 'No record found !!');
              }
              $('#LoadApplicationFormGrp').show();
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


    function assignROGrp()
    {

    	if ($('#roGrp').val().trim() == '') { 
            SetWarningMessageBox('warning', 'RO is mandatory !');
            $('#roGrp').focus();
            return;
        }
        
   	var selected_value = []; 
    $(".checkbox:checked").each(function(){
        selected_value.push($(this).val());
    });
    var  roGrp = $('#roGrp').val();
    var  grp_id = $('#grp_id').html();
    var  grp_loan_acc_no = $('#grp_loan_acc_no').html();
    var  dataString_loan_acc_no = JSON.stringify(selected_value);

    var url = '<?php echo base_url();?>index.php/data_controller/assignROGrp';
    StartInsideLoading();
    $.ajax({
      type: "post",
      url: url,
      cache: false, 
      data: {dataArr:dataString_loan_acc_no,roID:roGrp,grpID:grp_id,grpLoanAcc:grp_loan_acc_no}, 
      dataType: 'json', 
      success: function(response){ 
      try{  
        if (response.success)
          {
            SetSucessMessageBox('Success', response.msg);
            searchLoanApplicationGrp()            
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




    

    function searchLoanApplicationIndi()
    { 

    	if ($('#roIndi').val().trim() == '') { 
            SetWarningMessageBox('warning', 'RO is mandatory !');
            $('#roIndi').focus();
            return;
        }

    	if ($('#loan_acc_no_Indi').val().trim() == '') { 
            SetWarningMessageBox('warning', 'Loan account no. is mandatory !');
            $('#loan_acc_no_Indi').focus();
            return;
        }
    	

    	var formData = $('form#MasROAssignerIndividualsForms').serializeObject();
        var dataString = JSON.stringify(formData);
        
      var url = '<?php echo base_url();?>index.php/data_controller/searchLoanApplicationIndi';
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
        	$('#LoadApplicationFormIndi').html(response.html); 
        	$('#LoadApplicationFormIndi').show();             
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

    function assignROIndi()
    {

    	if ($('#roIndi').val().trim() == '') { 
            SetWarningMessageBox('warning', 'RO is mandatory !');
            $('#roIndi').focus();
            return;
        }
        
    var  roIndi = $('#roIndi').val();
    var  customer_loan_acc_no = $('#customer_loan_acc_no').html();

    var url = '<?php echo base_url();?>index.php/data_controller/assignROIndi';
    StartInsideLoading();
    $.ajax({
      type: "post",
      url: url,
      cache: false, 
      data: {roID:roIndi,loan_acc_no:customer_loan_acc_no}, 
      dataType: 'json', 
      success: function(response){ 
      try{  
        if (response.success)
          {
            SetSucessMessageBox('Success', response.msg);
            searchLoanApplicationIndi()            
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
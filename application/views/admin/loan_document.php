	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Loan Document</li>
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
						<li><a data-toggle="tab" class="active show" href="#group" >Group</a></li>
						<li><a data-toggle="tab"  href="#individuals">Individuals</a></li>
					</ul>
					</div>
					
					
					<div class="col-md-12">

					<div class="tab-content">
						<div id="group" class="tab-pane fade active show">
						<br>
                		<div id="verifiedLoanTable" class="table-responsive">
                              
                	  </div>
								
								 <?php echo form_open_multipart('',array('id'=>'Group_Loan_Details_uploadForm','class'=>'row'))?>
								<div class="form-group col-md-12 align-self-end" id="LoadGroupApplicationForm">
								</div>
								<?php echo form_close() ?>
							  
							
							 <div class="row" id="showSelectedmember" style="display:none;">
								  <div class="clearix"></div>
									<div class="col-md-12">		
									  <div class="tile">
									  
									  <div id="formContainer" style="display: none" >
            <div class="tile-title-w-btn">
              <h3 class="title">Add Document</h3>
             <button class="close"  onclick="removeMasterform('#formContainer')" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
            <div class="row invoice-info" style="border: 2px solid #ced4da; margin: 0px; padding-top: 10px;">
                <div class="col-4">
                <b>Customer ID : <span id="customer_ID"></span><br><br></b>
                    <b><address>Name : </b><span id="customer_name"></span><br>
                    <b>Date of Birth : </b><span id="customer_dob"></span><br>
                    <b>Gender : </b><span id="customer_gender"></span><br>
                    <b>Aadhaar No. : </b><span id="customer_aadhaar"></span><br>
                    <b>Husband/Father Name : </b><span id="customer_husband"></span><br>
                    <b> Permanent Address : </b><span id="customer_address"></span><br>
                    <b>Rural : </b><input id="customer_rural" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>Urban : </b><input id="customer_urban" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>District :</b><span id="customer_district"></span><br>
                   <b> Contact No. : </b><span id="customer_contact"></span><br>
                   <b> Work/Business/Profession : </b><span id="customer_work"></span></address>
                </div>
                <div class="col-4">
                <b>Bank Information </b><br><br>
                  <b>Account No. : </b><span id="customer_bank_ac_no"></span><br>
                  <b>Branch : </b><span id="customer_bank_branch"></span>
                </div>
                <div class="col-4">
                <img id="photo" width="90" class="img-responsive pull-right" style="padding: 5px" src="<?php echo base_url();?>assets/img/profile.png">
                <b>Nominee Information </b><br><br>
                  <b>Name : </b><span id="customer_nominee_name"></span><br>
                  <b>Aadhaar No. : </b><span id="customer_nominee_aadhaar_no"></span><br>
                  <b> Permanent Address : </b><span id="customer_nominee_address"></span><br>
                  <b>Rural : </b><input id="customer_nominee_rural" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>Urban : </b><input id="customer_nominee_urban" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>District :</b><span id="customer_nominee_district"></span><br>
                  <b> Contact No. : </b><span id="customer_nominee_contact"></span><br><br>
                  <b> Account Number : </b><span id="customer_account_no"></span><br>
                  <b> Loan Account Number : </b><span id="loan_acc_no"></span><br>                  
                  <b> Account Status : </b><span id="customer_account_status"></span> <br><br>
                </div>
              </div>
              <br>
            <?php echo form_open_multipart('',array('id'=>'CustomerLoanDocUploadForm','class'=>'row'))?>
              <input id="postType" name="postType" type="hidden">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Select Document Type</label>
                  <select id="customer_loan_doc_type" name="customer_loan_doc_type" style="margin-top:10px;" class="form-control" >
                        <!-- List of document type -->
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Select File</label>
                  <input class="form-control" onchange="imagetoBase64(this)" id="file"
					style="margin-top: 10px;" type="file"></input> <input
					type="hidden" name="fileUpload" id="fileUpload">
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label"></label>
                  <img id="imgThumb" height="80" class="img-responsive" style="" src="<?php echo base_url();?>assets/img/NoImage.png">
                </div>
                	
                	<div class="form-group col-md-4 align-self-end">
		                  <button onclick="updateCustomerLoanDoc()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Summit</button>
		                   &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#CustomerLoanDocUploadForm')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
		                	&nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#formContainer')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
		                </div>            
		              <?php echo form_close() ?>
		           </div>
		           
		           <div class="table-responsive">
                  <table class="table table-hover dataTable no-footer">
                    <thead>
                      <tr>
                        <th>Sl No.</th>
                        <th>Document Type</th>
                        <th>File Type</th>
                        <th>Uploaded By</th>
                        <th>Uploaded On</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="cusDocument">
                    
                      
                      
                    </tbody>
                  </table>
                </div>
                <br>
              </div>
              
									  
										<div class="tile-title-w-btn">
										  <h3 class="title"><span id="group_title">Group Information</span></h3>
										 <button onclick="removeMasterform('#showSelectedmember')" class="close" type="button" aria-label="Close" style="height: 28px;
										  width: 36px;"><span aria-hidden="true">×</span></button>
										</div>
										<div class="tile-body">
										
										<div class="" id="group_details"></div>
										<div class="" id="selected_member_data"></div>
										</div>
									</div>
								  </div>
							
						</div>
						</div>
						<div id="individuals" class="tab-pane fade">
						 <br>
							 
						  
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


    function loadVerifiedLoan()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadVerifiedLoan'); ?>"; 
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
            $('#verifiedLoanTable').html(response.html);
              $('#verifiedLoan').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});
              
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
    
    loadVerifiedLoan();
   

	
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
	
	 function LoanGroupSearch(id)
    { 
      var url = "<?php echo site_url('index.php/data_controller/LoadGroupSelected_memberlistForUploadLoanDoc?id='); ?>"+id;
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
			
            $('#selected_member_data').html(response.Selected_group_memberlist);
            $('#selected_member_data_table').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});
      		$('#showSelectedmember').show(); 
		    $('#group_details').html(response.Group_details);
            

      			$('#gr_id').val(id);

            $('#delete_onclick_set').attr('onclick','deleteSelectedMember('+id+')'); 
      			
			  	
              
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
   // loadMember_list_group();
   
   function addDocForm($loan_acc_no, $loan_master_id){   
    	var url = '<?php echo base_url();?>index.php/data_controller/AddLoanDocUploadForm';
    	StartInsideLoading();
    	$.ajax({
    		  type: "post",
    		  url: url,
    		  cache: false,    
    		  data: {reqId:$loan_acc_no},
    		  dataType: 'json',
    		  success: function(response){   
    		  try{  	 
    			   if (response.success)
    	           {
    				 $('#photo').attr('src',response.json[0].photo); 	
    				 $('#postType').val(response.json[0].Loan_acc_no);
    				 $('#customer_ID').html(response.json[0].ID);
    				 $('#customer_account_status').html(response.json[0].accStatus);
    				 $('#customer_account_no').html(response.json[0].accNo);
    				 $('#customer_name').html(response.json[0].name);
    				 $('#customer_dob').html(response.json[0].dob);
    				 $('#customer_gender').html(response.json[0].sex);
    				 $('#customer_aadhaar').html(response.json[0].aadhaar_no);
    				 $('#customer_husband').html(response.json[0].husband_name);
    				 $('#customer_address').html(response.json[0].parmanent_address);

    				 $('#customer_rural').attr('checked', false);
    				 $('#customer_urban').attr('checked', false);
    				 if(response.json[0].rural == 1)
        			 {$('#customer_rural').attr('checked', true);}
    				 if(response.json[0].urban == 1)
        			 {$('#customer_urban').attr('checked', true);}
        			 
    				 $('#customer_district').html(response.json[0].district);
    				 $('#customer_contact').html(response.json[0].contact_no);
    				 $('#customer_work').html(response.json[0].work);
    				 $('#customer_bank_ac_no').html(response.json[0].bank_ac_no);
    				 $('#customer_bank_branch').html(response.json[0].bank_branch);

    				 $('#customer_nominee_name').html(response.json[0].nominee_name);
    				 $('#customer_nominee_aadhaar_no').html(response.json[0].nominee_aadhaar_no);
    				 $('#customer_nominee_address').html(response.json[0].nominee_permanent_address);

    				 $('#customer_nominee_rural').attr('checked', false);
    				 $('#customer_nominee_urban').attr('checked', false);
    				 if(response.json[0].nominee_rural == 1)
        			 {$('#customer_nominee_rural').attr('checked', true);}
    				 if(response.json[0].nominee_urban == 1)
        			 {$('#customer_nominee_urban').attr('checked', true);}
    				 $('#customer_nominee_district').html(response.json[0].nominee_district);
    				 $('#customer_nominee_contact').html(response.json[0].nominee_contact_no);
    				 $('#loan_acc_no').html(response.json[0].Loan_acc_no);
    				 
    				 loadLoanDocType($loan_master_id);
    				 
    				 $('#loan_doc_type').attr('onchange','checkDocumentType($(this),'+response.json[0].ID+')');
    				 $('#cusDocument').empty();
    				 $.each(response.json1, function (index, value) {
    					 $('#cusDocument').append('<tr><td>'+(index+1)+'</td><td>'+value.doc_type+'</td><td>'+value.file_type+'</td><td>'+value.Added_by+'</td><td>'+value.Added_on+'</td><td><a href="'+value.files+'" target="_blank" class="btn btn-sm btn-success">View Document</a><button onclick="updateDocument($(this))" value="'+value.ID+'"class="btn btn-primary w2wbutton" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-remove"></i></button></td></tr>');
    				    });
                     $(window).scrollTop(0);
                     $('#formContainer').show();
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


   function loadLoanDocType($loan_master_id){  
   	$reqestId =  $loan_master_id; 
   	var url = '<?php echo base_url();?>index.php/data_controller/loadLoanDocType';
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
   				 $('#customer_loan_doc_type').html(response.html);
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



   function updateCustomerLoanDoc(){  
   	if ($('#customer_loan_doc_type').val().trim() == '') { 
           SetWarningMessageBox('warning', 'Document type is mandatory !');
           $('#customer_loan_doc_type').focus();
           return;
       }
       if ($('#file').val().trim() == '') {
           SetWarningMessageBox('warning', 'File is mandatory!');
           $('#file').focus();
           return;
       }
              

       var formData = $('form#CustomerLoanDocUploadForm').serializeObject();
       var dataString = JSON.stringify(formData);
       var url = '<?php echo base_url();?>index.php/data_controller/updateCustomerDoc';
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
				   $('#customer_loan_doc_type').val('');
				   $('#file').val('');
				   $("#imgThumb").attr("src",base_url+"assets/img/NoImage.png");
				   $('#formContainer').hide(); 
				   loadCustomer();
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
   


   function checkDocumentType($btn,$CustomerId){ 

   	$reqestId =  $btn.val(); 
   	var url = '<?php echo base_url();?>index.php/data_controller/checkDocumentType';
   	StartInsideLoading();
   	$.ajax({
   		  type: "post",
   		  url: url,
   		  cache: false,    
   		  data: {reqId:$reqestId,cusId:$CustomerId},
   		  dataType: 'json',
   		  success: function(response){   
   		  try{  	 
   			   if (response.success)
   	           {
   			   SetWarningMessageBox('warning', response.msg);
   			   $('#customer_loan_doc_type').children('option[value = '+$reqestId+']').attr('disabled',true);
   			   $('#customer_loan_doc_type').val('');	           
   	           } else
   	           { 
   	               SetSucessMessageBox('success', response.msg);
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


   function updateCustomerLoanDoc(){  
   	if ($('#customer_loan_doc_type').val().trim() == '') { 
           SetWarningMessageBox('warning', 'Document type is mandatory !');
           $('#customer_loan_doc_type').focus();
           return;
       }
       if ($('#file').val().trim() == '') {
           SetWarningMessageBox('warning', 'File is mandatory!');
           $('#file').focus();
           return;
       }
              

       var formData = $('form#CustomerLoanDocUploadForm').serializeObject();
       var dataString = JSON.stringify(formData);
       var url = '<?php echo base_url();?>index.php/data_controller/updateCustomerLoanDoc';
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
				   $('#customer_loan_doc_type').val('');
				   $('#file').val('');
				   $("#imgThumb").attr("src",base_url+"assets/img/NoImage.png");
				   $('#formContainer').hide();
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
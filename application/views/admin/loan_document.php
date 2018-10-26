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
            		<div id="verifiedGrpLoanTable" class="table-responsive"> </div>
					
					 <?php echo form_open_multipart('',array('id'=>'Group_Loan_Details_uploadForm','class'=>'row'))?>
					 <div class="form-group col-md-12 align-self-end" id="LoadGroupApplicationForm"> </div>
					 <?php echo form_close() ?>
				  
				
				 		<div class="row" id="showSelectedmember" style="display:none;">
					  	<div class="clearix"></div>
						<div class="col-md-12">									
						 <div class="tile-title-w-btn">
						  <h3 class="title"><span id="group_title">Group Information</span></h3>
						 <button onclick="removeMasterform('#showSelectedmember')" class="close" type="button" aria-label="Close" style="height: 28px;
						  width: 36px;"><span aria-hidden="true">×</span></button>
						</div>
							
						<div class="" id="group_details"></div>						
						
						<div class="" id="selected_member_data"></div>
						  
						<div id="formContainer" style="display: none" >
                        <div class="tile-title-w-btn">
                          <h3 class="title">Member Information</h3>
                         <button class="close"  onclick="removeMasterform('#formContainer')" type="button" aria-label="Close" style="height: 28px;
                          width: 36px;"><span aria-hidden="true">×</span></button>
                        </div>            

                        <div id="Member_info_grp"> </div>
                        
                        <div id="Member_loan_doc_grp"> </div>
            			
            			<div id="Member_loan_doc_upload_form_grp"> </div>
                
                </div>
				</div>
				</div>
				</div>
						
						<div id="individuals" class="tab-pane fade">
						<br>
                		<div id="verifiedIndiLoanTable" class="table-responsive"> </div>
                		
                		<div id="Member_info_indi"> </div>
                        
                        <div id="Member_loan_doc_indi"> </div>
                        
                        <div id="Member_loan_doc_upload_form_indi"> </div>
            
						  
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


    function loadVerifiedGrpLoan()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadVerifiedGrpLoan'); ?>"; 
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
            $('#verifiedGrpLoanTable').html(response.html);
              $('#verifiedGrpLoan').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});
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
    
    loadVerifiedGrpLoan();
   
	
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
          		$('#formContainer').hide(); 
    		    $('#group_details').html(response.Group_details); 		  	
              
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
    		  data: {loan_acc_no:$loan_acc_no},
    		  dataType: 'json',
    		  success: function(response){   
    		  try{  	 
    			   if (response.success)
    	           {

    				 $('#Member_info_indi').empty();
	   				 $('#Member_loan_doc_upload_form_indi').empty();
	   			     $('#Member_loan_doc_indi').empty();

        	         $('#Member_info_grp').html(response.member_info_grp_loan);
        	         $('#Member_loan_doc_upload_form_grp').html(response.member_doc_upload_form);
        	         $('#Member_loan_doc_grp').html(response.member_doc_loan);
        	         
        	         $('#loanDocTable').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});                     
        	         $('#customer_loan_doc_type').attr('onchange', 'checkLoanDocumentType($(this),"'+response.loanAccNo+'")');
        	         $('#loanAccNo').val(response.loanAccNo);
        	         $('#loanMasterId').val(response.loanMasterId);
    				 loadLoanDocType($loan_master_id);
    				
                     //$(window).scrollTop(0);
                     var scrollPos =  $("#memberInfo").offset().top;
 				     $(window).scrollTop(scrollPos);
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



   

   function checkLoanDocumentType($this,$loan_acc_no){ 
	$doc_type =  $this.val();
   	var url = '<?php echo base_url();?>index.php/data_controller/checkLoanDocumentType';
   	StartInsideLoading();
   	$.ajax({
   		  type: "post",
   		  url: url,
   		  cache: false,    
   		  data: {doc_type:$doc_type,loan_acc_no:$loan_acc_no},
   		  dataType: 'json',
   		  success: function(response){   
   		  try{  	 
   			   if (response.success)
   	           {
   			   SetWarningMessageBox('warning', response.msg);
   			   $('#customer_loan_doc_type').children('option[value = '+$doc_type+']').attr('disabled',true);
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

       	if ($('#customer_loan_doc_remark').val().trim() == '') {
            SetWarningMessageBox('warning', 'Remark is mandatory!');
            $('#customer_loan_doc_remark').focus();
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
				   $('#customer_loan_doc_remark').val('');				   
				   $('#file').val('');
				   $('#fileUpload').val('');				   
				   $("#imgThumb").attr("src",base_url+"assets/img/NoImage.png");
				   addDocForm(response.loanAccNo,response.loanMasterId)
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

   function deleteLoanDocument($btn){ 

	   swal({
		   title: "Are you sure?",
		   text: "You will not be able to recover this imaginary file!",
		   type: "warning",
		   showCancelButton: true,
		   confirmButtonText: "Yes, Delete it!",
		   cancelButtonText: "No, cancel plz!",
		   closeOnConfirm: true,
		   closeOnCancel: true
		   }, function(isConfirm) {
		   if (isConfirm)  {

			   $loan_cus_doc_type_id =  $btn.val();
			   	var formData = $('form#CustomerLoanDocUploadForm').serializeObject();
			    var dataString = JSON.stringify(formData);   	   	 
			   	var url = '<?php echo base_url();?>index.php/data_controller/deleteLoanDocument';
			   	StartInsideLoading();
			   	$.ajax({
			   		  type: "post",
			   		  url: url,
			   		  cache: false,    
			   		  data: {loan_acc_no_master_id:dataString,loan_cus_doc_type_id:$loan_cus_doc_type_id},
			   		  dataType: 'json',
			   		  success: function(response){   
			   		  try{  	 
			   			   if (response.success)
			   	           { 	
			   				   SetSucessMessageBox('Success', response.msg);
							   $('#customer_loan_doc_type').val('');
							   $('#customer_loan_doc_remark').val('');				   
							   $('#file').val('');
							   $('#fileUpload').val('');
							   $("#imgThumb").attr("src",base_url+"assets/img/NoImage.png");
							   addDocForm(response.loanAccNo,response.loanMasterId)
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
		   }); 
	    
   } 

   function showDivisionById($divId){  
	   $('#'+$divId).show();
   	}











   function loadVerifiedIndiLoan()
   { 
     var url = "<?php echo site_url('index.php/data_controller/loadVerifiedIndiLoan'); ?>"; 
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
           $('#verifiedIndiLoanTable').html(response.html);
             $('#verifiedIndiLoan').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});
             
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
   
   loadVerifiedIndiLoan();


   function addIndividualMemberDocForm($loan_acc_no, $loan_master_id){   
   	var url = '<?php echo base_url();?>index.php/data_controller/AddLoanDocUploadForm';
   	StartInsideLoading();
   	$.ajax({
   		  type: "post",
   		  url: url,
   		  cache: false,    
   		  data: {loan_acc_no:$loan_acc_no},
   		  dataType: 'json',
   		  success: function(response){   
   		  try{  	 
   			   if (response.success)
   	           {

   				 $('#group_details').empty();
  				 $('#selected_member_data').empty();
   				 $('#Member_info_grp').empty();
   				 $('#Member_loan_doc_upload_form_grp').empty();
   			     $('#Member_loan_doc_grp').empty();  			
   				 
       	         $('#Member_info_indi').html(response.member_info_grp_loan);
       	         $('#Member_loan_doc_upload_form_indi').html(response.member_doc_upload_form);
       	         $('#Member_loan_doc_indi').html(response.member_doc_loan);
       	         
       	         $('#loanDocTable').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});                     
       	         $('#customer_loan_doc_type').attr('onchange', 'checkLoanDocumentType($(this),"'+response.loanAccNo+'")');
       	         $('#loanAccNo').val(response.loanAccNo);
       	         $('#loanMasterId').val(response.loanMasterId);
   				 loadLoanDocType($loan_master_id);
   				
                    //$(window).scrollTop(0);
                    var scrollPos =  $("#memberInfo").offset().top;
				     $(window).scrollTop(scrollPos);
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

   
    
   
  
</script>
    
       </body>
</html>
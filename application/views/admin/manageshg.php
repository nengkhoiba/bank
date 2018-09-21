	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">SHG Master</li>
        </ul>
		</div>
      </div>
	  
	  <!-- Button trigger modal -->
	
	

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			  </div>
			  <div class="modal-body">
			  
			   <?php echo form_open_multipart('',array('id'=>'MasDesignForms','class'=>'row'))?>
				
					<div class="col-md-12">
						<div class="app-search" align="right">
							<input class="app-search__input search_input" type="search" placeholder="Search" >
							<button class="app-search__button search_input_btn"><i class="fa fa-search"></i></button>
						</div>
					</div>
					
              <?php echo form_close() ?>
			  
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
                <b>Nominee Information </b><br><br>
                  <b>Name : </b><span id="customer_nominee_name"></span><br>
                  <b>Aadhaar No. : </b><span id="customer_nominee_aadhaar_no"></span><br>
                  <b> Permanent Address : </b><span id="customer_nominee_address"></span><br>
                  <b>Rural : </b><input id="customer_nominee_rural" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>Urban : </b><input id="customer_nominee_urban" disabled type="checkbox">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <b>District :</b><span id="customer_nominee_district"></span><br>
                  <b> Contact No. : </b><span id="customer_nominee_contact"></span><br><br><br>
                  <b> Account Number : </b><span id="customer_account_no"></span><br>
                  <b> Account Status : </b><span id="customer_account_status"></span> 
                </div>
				
					<div class="form-group col-md-4 align-self-end">
					<br>
		                  <button onclick="updateCustomerDoc()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Summit</button>
		                   &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#CustomerDocUploadForm')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
		                	&nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#formContainer')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
		                </div>
              </div>
					<div id="memberlist_shg_group"></div>
					
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>
	  
      <div class="row" id="showSelectedmember" style="display:none;">
      <div class="clearix"></div>
        <div class="col-md-12">		
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Selected group member</h3>
             <button onclick="removeMasterform('#showSelectedmember')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
			
				
			
				<div align="right">
					<p class="bs-component" >	
						<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal" type="button" onclick="looadMemberlist_for_shg_group()">Add member</button>					
						<button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('branch','loadBranch()')">Delete</button>
					</p>
				</div>
				<div class="" id="selected_member_data"></div>
            </div>
          </div>
        </div>
      </div>
     
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="row"> 
              	<div class="col-md-12">
                	<div id="shg_group_list" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?> 
    <script type="text/javascript">
   
    	
   
    function loadShggrouplist()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadShggrouplist'); ?>"; 
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
            $('#shg_group_list').html(response.html);
              $('#shg_group_table').DataTable({dom: 'lBfrtip', buttons: [ 'excel', 'pdf', 'print']});
              
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
    loadShggrouplist();
	
	
	function loadMemberlist_for_shg_group()
	 { 
      var url = "<?php echo site_url('index.php/data_controller/loadMemberlist_for_shg_group'); ?>"; 
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
            $('#memberlist_shg_group').html(response.html);
              $('#memberlist_for_shg_group').DataTable();
			  
              
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
	
	
	function LoadSelected_memberlist()
    { 
      var url = "<?php echo site_url('index.php/data_controller/LoadSelected_memberlist'); ?>"; 
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
			
            $('#selected_member_data').html(response.html);
            $('#selected_member_data_table').DataTable();
			$('#showSelectedmember').show();  
			  	
              
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
	
	
	
	
   /*

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
	
	*/
      
    
   
  
</script>
    
       </body>
</html>
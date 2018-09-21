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
					
							

			<div class="col-md-12">
				<div class="app-search" align="right">
					<input class="app-search__input search_input" type="search" placeholder="Search" >
					<button class="app-search__button search_input_btn"><i class="fa fa-search"></i></button>
				</div>
			</div>

			<h4>Search "234342324"</h4>
			
			<div class="alert alert-info" align="center">No data found</div>
			
			<div class="row invoice-info" style="margin:15px;padding: 15px; display:none;">
				<table class="table table-hover">
					<tbody>
						<tr>
							<th class="table_head">Customer ID : </th>
							<td><span id="customer_ID">1234567789</span></td>
							<th class="table_head">Permanent Address :</th>
							<td><span id="customer_address">Nongpok Sekmai Shikhong bazar</span></td>
							<th class="table_head">Account No.</th>
							<td><span id="customer_bank_ac_no">0123456789</span></td>
							<th style="text-align:center;">Profile photo</th>
						</tr>
						<tr>
							<th class="table_head">Name : </th>
							<td><span id="customer_name">Thangjam niranjit singh</span></td>
							<th class="table_head">District :</th>
							<td><span id="customer_district">Thoubal</span></td>
							<th class="table_head">Branch : </th>
							<td><span id="customer_bank_branch">Imphal</span></td>
							<td rowspan="7"><img src="<?php echo base_url()?>assets/img/NoImage.png" style="width:160px; height:auto;"/></td>
						</tr>
						<tr>
							<th class="table_head">Date of Birth : </th>
							<td><span id="customer_dob">12/12/2018</span></td>
							<th class="table_head">State :</th>
							<td><span id="customer_state">Manipur</span></td>
							<th class="table_head">A/C opening date :</th>
							<td><span id="customer_bank_open_date">12/12/1898</span></td>
						</tr>
						<tr>
							<th class="table_head">Gender : </th>
							<td><span id="customer_gender">Male</span></td>
							<th class="table_head">Contact No. :</th>
							<td><span id="customer_contact">9876543210</span></td>
							<th class="table_head">A/C status :</th>
							<td><span id="customer_bank_open_date">Active</span></td>
						</tr>
						<tr>
							<th class="table_head">Aadhaar No. :</th>
							<td><span id="customer_aadhaar">1234-1234-1234</span></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th class="table_head">Husband/Father Name :</th>
							<td><span id="customer_husband">Thangjam Jiten singh</span></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th class="table_head">Work/Business/Profession :</th>
							<td><span id="customer_work">Self Employed</span></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th ></th>
							<td>
							Rural :<input id="customer_rural" disabled type="checkbox">
							Urban :<input id="customer_urban" disabled type="checkbox">
							</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>



				
			</div>
			

					<div id="memberlist_shg_group"></div>
					
				
			  </div>
			  <div class="modal-footer">
				<div class=" col-md-12 align-self-end" align="right">
					<button onclick="updateCustomerDoc()" style="display:none;" class="btn btn-sm btn-info" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>
					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
				</div>
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
	
	
	function LoadSelected_memberlist($data)
    { 

      var url = "<?php echo site_url('index.php/data_controller/LoadSelected_memberlist'); ?>"; 
      StartInsideLoading();
      $.ajax({
        type: "post",
        url: url,
        cache: false,   
        data:{group_id:$data},
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
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
			  <div class="tile-title-w-btn">
              <h3 class="title">Customer Information</h3>
            </div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			  </div>
<<<<<<< HEAD
			  <div class="modal-body" style="min-height:430px;">
				<div class="row">
					<div class="col-md-3">
						<div class="app-search" style="padding: 0px; margin-right: 0px">
							<input onkeyup="runAutoComplete(this.value)" class="app-search__input search_input input-lg" autocomplete="off" name="searchkeyword" id="searchfield" type="text" placeholder="Type Account Name/Number" >
						</div>
					</div>
					<div class="col-md-1" style="padding-left:0px;">
						<button onclick="inputReset()" class="btn btn-sm btn-info" type="button" style="padding: 6px; ">Reset</button>
						
					</div>
					<div class="col-md-4">
						<h4 style="color:#9e9e9e;">Search " <span id="data_show" style="color:#607d8b;"></span> "</h4>
					</div>
				</div>
		
			
			<div class="row invoice-info" id="formContainer" style="margin:15px;padding: 15px; display:none;">
			<input id="hd_cs_id" type="text" value="">
			<input id="groupId" type="text" value="">
					
				<table class="table custome_table table-hover">
=======
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
>>>>>>> 3a10af897792b9d5a609ee3ca2e6f4140e7e6937
					<tbody>
						<tr>
							<th class="table_head">Customer ID : </th>
							<td><span id="customer_ID"></span></td>
							<th class="table_head">Permanent Address :</th>
							<td><span id="customer_address"></span></td>
							<th class="table_head">Account No.</th>
							<td><span id="customer_bank_ac_no"></span></td>
							<th style="text-align:center;">Profile photo</th>
						</tr>
						<tr>
							<th class="table_head">Name : </th>
							<td><span id="customer_name"></span></td>
							<th class="table_head">District :</th>
							<td><span id="customer_district"></span></td>
							<th class="table_head">Branch : </th>
							<td><span id="customer_bank_branch"></span></td>
							<td rowspan="7">
								<img id="photo" src="<?php echo base_url();?>assets/img/profile.png" style="width:160px; height:auto;"/>
							</td>
						</tr>
						<tr>
							<th class="table_head">Date of Birth : </th>
							<td><span id="customer_dob"></span></td>
							<th class="table_head">State :</th>
							<td><span id="customer_state"></span></td>
							<th class="table_head">A/C opening date :</th>
							<td><span id="customer_account_open_date"></span></td>
						</tr>
						<tr>
							<th class="table_head">Gender : </th>
							<td><span id="customer_gender"></span></td>
							<th class="table_head">Contact No. :</th>
							<td><span id="customer_contact"></span></td>
							<th class="table_head">A/C status :</th>
							<td><span id="customer_account_status"></span></td>
						</tr>
						<tr>
							<th class="table_head">Aadhaar No. :</th>
							<td><span id="customer_aadhaar"></span></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th class="table_head">Husband/Father Name :</th>
							<td><span id="customer_husband"></span></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th class="table_head">Work/Business/Profession :</th>
							<td><span id="customer_work"></span></td>
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
					
				
			  </div>
			  <div class="modal-footer">
				<div class=" col-md-12 align-self-end" align="right">
<<<<<<< HEAD
					<button onclick="addCustomer_to_group()" id="" class="btn btn-sm btn-info" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>
=======
					<button onclick="updateCustomerDoc()" style="display:none;" class="btn btn-sm btn-info" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>
>>>>>>> 3a10af897792b9d5a609ee3ca2e6f4140e7e6937
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
						<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal" type="button" >Add member</button>					
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
	
	
	function LoadSelected_memberlist(id)
    { 
      var url = "<?php echo site_url('index.php/data_controller/LoadSelected_memberlist?id='); ?>"+id;
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
			
            $('#selected_member_data').html(response.html);
            $('#selected_member_data_table').DataTable();
			$('#showSelectedmember').show(); 
			$('#groupId').val(id); 
			
			  	
              
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
	
<<<<<<< HEAD
	function addCustomer_to_group()
    { 
	
	var ac_id=$('#branch_code').val();
	var gr_id=$('#branch_code').val();	
		
      var url = "<?php echo site_url('index.php/data_controller/addCustomer_to_group'); ?>;
=======
	
	function LoadSelected_memberlist($data)
    { 

      var url = "<?php echo site_url('index.php/data_controller/LoadSelected_memberlist'); ?>"; 
>>>>>>> 3a10af897792b9d5a609ee3ca2e6f4140e7e6937
      StartInsideLoading();
      $.ajax({
        type: "post",
        url: url,
<<<<<<< HEAD
        cache: false, 
		data:{ac_id:ac_id,gr_id:gr_id},		
=======
        cache: false,   
        data:{group_id:$data},
>>>>>>> 3a10af897792b9d5a609ee3ca2e6f4140e7e6937
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
             { 
				SetSucessMessageBox('Success', response.msg);
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
	
	
    function runAutoComplete(query){
	$query=query;
	$('#data_show').html($query);
       $('#searchfield').typeahead({
         items: 10,
            source: function(request, response) {
                $.ajax({
                    url: "<?php echo site_url('index.php/data_controller/searchByKeyword?q='); ?>"+query,
                    method:"GET",
                    dataType: "json",
                    success: function (data) {
                        response(data);
                    }
                });
            },
//           autoselect:true,
          afterSelect:function(item){ loadSearchData(item.id)},
          displayText: function(item){ return item.value+ "<"+item.id+">";}
       });
       
        }

        function loadSearchData(accNo){
  $reqestId =  accNo;  
	$('#data_show').html($reqestId);
  var url = '<?php echo base_url();?>index.php/data_controller/loadSearchData';
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
         $('#photo').attr('src',response.json[0].photo);
         $('#customer_ID').html(response.json[0].Cus_id);
         $('#customer_account_status').html(response.json[0].accStatus);
         $('#customer_account_no').html(response.json[0].accNo);
         $('#hd_cs_id').val(response.json[0].accNo);
        // $('#customer_name').html(response.json[0].name);		 
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
		 $('#customer_account_open_date').html(response.json[0].Added_on);

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

         $('#DepositeBtn').val(response.json[0].ID).attr('disabled',false);
         $('#WithdrawalsBtn').val(response.json[0].ID).attr('disabled',false);
         $('#PassbookBtn').val(response.json[0].ID).attr('disabled',false);
         $('#BalanceBtn').val(response.json[0].ID).attr('disabled',false);
         
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
    
	
	function inputReset()
	{
	$('#data_show').html('');
	$('#searchfield').val('');
	$('#formContainer').hide();
	
	}
   
  
</script>
    
       </body>
</html>
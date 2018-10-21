	
	
		<div class="modal fade" id="loan_info_upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
			  <div class="tile-title-w-btn">
              <h3 class="title">Upload Loan Information</h3>
            </div>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			  </div>

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
			<input id="ac_id" type="" value="">
			<input id="gr_id" type="text" value="">
					
				<table class="table custome_table table-hover">

			  <div class="modal-body">
					<div class="col-md-12">
								<br><br>
									<h5>Assets</h5>
									<hr>
								</div>
									
									
									  <div class="">
					<div data-role="dynamic-fields">
						<div class="form-inline">
							<div class="form-group col-md-3 align-self-end">
									  <label class="control-label">Asset Name</label>
									  <input  name="asset_name[]" id="asset_name" style="margin-top: 10px;"
										class="form-control name"  type="text" placeholder="Asset Name"></input>
									</div>
									<div class="form-group col-md-6 align-self-end">
									  <label class="control-label">Particulars of the properties</label>
									  <input  name="particular_properties[]" id="particular_properties" style="margin-top: 10px;"
										class="form-control text_number"  type="text" placeholder="Particular of the properties"></input>
									</div>
									<div class="form-group col-md-2 align-self-end">
									  <label class="control-label">Approx. values (in Rs.)</label>
									  <input  name="approx_value[]" style="margin-top: 10px;"
										class="form-control number"  type="text" id="approx_value"
										placeholder="Tenure length"></input>
									</div>
									
								<div class="form-group col-md-1" style="padding-top: 25px;">
									<button class="btn btn-danger" data-role="remove">
										<span class="fa fa-close"></span>
									</button>
									<button class="btn btn-primary" data-role="add">
										<span class="fa fa-plus"></span>
									</button>
								</div>
						</div>  <!-- /div.form-inline -->
					</div>  <!-- /div[data-role="dynamic-fields"] -->
				</div>  <!-- /div.col-md-12 -->
																	
																	
									<div class="col-md-12">
									<br><br>
										<h5>Guarantor</h5>
										<hr>
									</div>
									<div class="form-group col-md-3 align-self-end">
									  <label class="control-label">Guarantor Name</label>
									  <input  name="guarantor_name" style="margin-top: 10px;"
										class="form-control number"  type="text" id="guarantor_name"
										placeholder="Guranter Name"></input>
									</div>
									<div class="form-group col-md-3 align-self-end">
									  <label class="control-label">Guranter Aadhaar No.</label>
									  <input  name="guarantor_aadhaar" style="margin-top: 10px;"
										class="form-control number"  type="text" id="guarantor_aadhaar"
										placeholder="Aadhaar No."></input>
									</div>
									<div class="form-group col-md-3 align-self-end">
									  <label class="control-label">Guranter Photo</label>
									  <input  name="guarantor_photo" style="margin-top: 10px;"
										class="form-control number"  type="file" id="guarantor_photo"></input>
									</div>
									<div class="form-group col-md-3 align-self-end">
									  <label class="control-label">Guranter ID Proof</label>
									  <input  name="guarantor_id_proof" style="margin-top: 10px;"
										class="form-control number"  type="file" id="guarantor_id_proof"></input>
									</div>
					
				
			  </div>
			  <div class="modal-footer">
				<div class=" col-md-12 align-self-end" align="right">

					<button onclick="addCustomer_to_group()" id="" class="btn btn-sm btn-info" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>


					<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	</div>
	</div>
	
	
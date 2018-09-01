<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add New Branch</h3>
             <button onclick="removeMasterform('#MasBranchformColap')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
              <form class="row" id="MasBranchForms">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Branch Name</label>
                  <input name="branch_name" style="margin-top: 10px;"
    				class="form-control" type="text" id="branch_name"
    				placeholder="Branch Name"></input>
                </div>
         
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Branch Code</label>
                  <input name="branch_code" style="margin-top: 10px;"
					class="form-control" type="text" id="branch_code"
					placeholder="Branch Code"></input>
                </div>
			
				<div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Branch Address</label>
                  <input name="branch_address" style="margin-top: 10px;"
					class="form-control" type="text" id="branch_address"
					placeholder="Branch Address"></input>
                </div>
				
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="addBranch()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#MasBranchForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="removeMasterform('#MasBranchformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>


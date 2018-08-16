<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add New Role</h3>
             <button onclick="removeMasterRoleform()" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
              <form class="row" id="MasRoleForms">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Role Title</label>
                  <input name="role_title" style="margin-top: 10px;"
    				class="form-control" type="text" id="role_title"
    				placeholder="Title"></input>
                </div>
               
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="addRole()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#MasRoleForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="removeMasterRoleform()"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>


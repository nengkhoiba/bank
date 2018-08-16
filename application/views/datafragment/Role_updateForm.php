<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Role Update</h3>
             <button class="close"  href="" onclick="removeMasterRoleform()" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
		<form class="row" id="RoleFormUpdate">
		<?php  foreach ($result as $role_data)   { ?>
		<input type="hidden" name="role_id" id="role_id_upt" value="<?php echo $role_data['ID'];?>">
		
		                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Role Title</label>
                  <input value="<?php echo $role_data['role'];?>" name="role_title" style="margin-top: 10px;"
    				class="form-control" type="text" id="role_title"
    				placeholder="Role Title"></input>
                </div>
               
         
		                <div class="form-group col-md-4 align-self-end">
		                  <button onclick="updateRole()" class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
		                   &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="resetAllFormValue('#RoleFormUpdate')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
		                	&nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-secondary" href="#" onclick="removeMasterRoleform()"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
		                </div>
		    <?php  } ?>             
		              </form>
		           </div>
          </div>
        </div>   

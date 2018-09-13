<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Role Update</h3>
             <button class="close"  href="" onclick="removeMasterform('#MasRoleformColap')" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
            <?php echo form_open_multipart('',array('id'=>'RoleFormUpdate','class'=>'row'))?>
		<?php  foreach ($result as $row)   { ?>
		<input type="hidden" name="role_id" id="role_id_upt" value="<?php echo $row['ID'];?>">
		
		                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Role Title</label>
                  <input value="<?php echo $row['role'];?>" name="role_title" style="margin-top: 10px;"
    				class="form-control name" type="text" id="role_title"
    				placeholder="Role Title"></input>
                </div>
               
         
		                <div class="form-group col-md-4 align-self-end">
		                  <button onclick="updateRole()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
		                   &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#RoleFormUpdate')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
		                	&nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#MasRoleformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
		                </div>
		    <?php  } ?>             
		              <?php echo form_close() ?>
		           </div>
          </div>
        </div>   
<script src="<?php echo base_url();?>assets/js/validation.js"></script> 
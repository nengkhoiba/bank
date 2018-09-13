<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add New Role</h3>
             <button onclick="removeMasterform('#MasRoleformColap')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
            <?php echo form_open_multipart('',array('id'=>'MasRoleForms','class'=>'row'))?>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Role Title</label>
                  <input name="role_title" style="margin-top: 10px;"
    				class="form-control name" type="text" id="role_title"
    				placeholder="Title"></input>
                </div>
               
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="addRole()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasRoleForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#MasRoleformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              <?php echo form_close() ?>
            </div>
          </div>
        </div>
<script src="<?php echo base_url();?>assets/js/validation.js"></script> 

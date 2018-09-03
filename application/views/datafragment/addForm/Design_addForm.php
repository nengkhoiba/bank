		<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add New Designation</h3>
             <button onclick="removeMasterform('#MasDesignformColap')" class="close" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
              <form class="row" id="MasDesignForms">
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Designation Title</label>
                  <input name="design_title" style="margin-top: 10px;"
    				class="form-control name" type="text" id="design_title"
    				placeholder="Designation Title"></input>
                </div>
				 <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Designation Description</label>
                  <textarea name="design_description" style="margin-top: 10px;"
    				class="form-control name" rows="1" type="text" id="design_description"
    				placeholder="Description"></textarea>
                </div>
               
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="addDesign()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                  &nbsp;&nbsp;&nbsp;
                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#MasDesignForms')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
                &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#MasDesignformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              </form>
            </div>
          </div>
        </div>
<script src="<?php echo base_url();?>assets/js/validation.js"></script> 

<div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Add Document</h3>
             <button class="close"  href="" onclick="removeMasterform('#MasCustumerDocUploadformColap')" type="button" aria-label="Close" style="height: 28px;
              width: 36px;"><span aria-hidden="true">×</span></button>
            </div>
            <div class="tile-body">
		<form class="row" id="CustomerDocUploadForm">
		<?php  foreach ($result as $row)   { ?>
                  <input name="customer_id" value="<?php echo $row['ID'];?>" type="hidden"></input>
		        <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Name of Applicant</label>
                  <input name="customer_name" disabled value="<?php echo $row['name'];?>" style="margin-top: 10px;"
    				class="form-control name" type="text" id="customer_name"
    				placeholder="Name"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Address</label>
                  	<input name="customer_address" disabled value="<?php echo $row['parmanent_address'];?>" style="margin-top: 10px;"
    				class="form-control address" type="text" id="customer_address"
    				placeholder="Address"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Contact Number</label>
                  <input name="customer_contact" disabled value="<?php echo $row['contact_no'];?>" style="margin-top: 10px;"
					class="form-control number" type="text" id="customer_contact"
					placeholder="Contact Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Sex</label>
                  <input name="customer_sex" disabled value="<?php echo $row['sex'];?>" style="margin-top: 10px;"
    				class="form-control name" type="text" id="customer_sex"
    				placeholder="Sex"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Aadhaar No.</label>
                  <input name="customer_aadhaar" disabled value="<?php echo $row['aadhaar_no'];?>" style="margin-top: 10px;"
    				class="form-control number" type="text" id="customer_aadhaar"
    				placeholder="Aadhaar Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">District</label>
                  <input name="customer_district" disabled value="<?php echo $row['district'];?>" style="margin-top: 10px;"
    				class="form-control number" type="text" id="customer_district"
    				placeholder="Aadhaar Number"></input>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Select Document Type</label>
                  <select id="customer_doc_type" name="customer_doc_type" style="margin-top:10px;" class="form-control" >
                        <!-- List of document -->
                  	</select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Select File Type</label>
                  <select id="customer_doc_filetype" name="customer_doc_filetype" style="margin-top:10px;" class="form-control" >
                  	<option class="form-control" value="">- Select -</option>
                  	<option class="form-control" value="1">JPG/JPEG</option>
                  	<option class="form-control" value="2">PDF</option>
                  </select>
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Select File</label>
                  <input class="form-control" onchange="imagetoBase64(this)" id="file"
					style="margin-top: 10px;" type="file"></input> <input
					type="hidden" name="fileUpload" id="fileUpload">
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label"></label>
                  <img id="imgThumb" height="80" class="img-responsive" style="" src="<?php echo base_url();?>assets/img/NoImage.png">
                </div>
                
                
                          
		                 
		                <div class="form-group col-md-4 align-self-end">
		                  <button onclick="addDoc()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
		                   &nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="resetAllFormValue('#CustomerDocUploadForm')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Reset</a>
		                	&nbsp;&nbsp;&nbsp;
		                  <a class="btn btn-sm btn-secondary" href="#" onclick="removeMasterform('#MasCustumerDocUploadformColap')"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
		                </div>
		    <?php  } ?>             
		              </form>
		           </div>
          </div>
        </div>  
<script> 
function loadDocType()
{ 
  var url = "<?php echo site_url('index.php/data_controller/loadDocType'); ?>"; 
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
        $('#customer_doc_type').html(response.html);             
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
loadDocType();

</script> 
        
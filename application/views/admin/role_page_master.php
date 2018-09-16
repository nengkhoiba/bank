	<?php $this->load->view('global/header');?>
    <?php $this->load->view('global/side_nav');?>
    <main class="app-content">
      <div class="app-title">
        <div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Page Manager</li>
        </ul>
		</div>
      </div>
      
      <div class="row" id="formContainer">
      <div class="clearix"></div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
              <h3 class="title">Page Manager</h3>
            
            </div>
            <div class="tile-body">
            <?php echo form_open_multipart('',array('id'=>'PagemangerForm','class'=>'row'))?>
            
                <div class="form-group col-md-4 align-self-end">
                  <label class="control-label">Role</label>
                  <select id="Role" name="Role" style="margin-top:10px;" class="form-control" >
                        <!-- List of district -->
                  	</select>
                </div>
               
                
                <div class="form-group col-md-4 align-self-end">
                  <button onclick="GetPage()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Search</button>
                 
                    </div>
              <?php echo form_close() ?>
            </div>
          </div>
        </div>
      </div>
     
      
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="row"> 
              	<div class="col-md-12">
                	<div id="role_table" class="tile-body"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?>
<script type="text/javascript">
function loadRole()
    { 
      var url = "<?php echo site_url('index.php/data_controller/loadRole'); ?>"; 
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
            $('#role_table').html(response.html);
              $('#role').DataTable();
              
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
    
  loadDropDown('','role','#Role');


 
   
    
</script>
    
       </body>
</html>
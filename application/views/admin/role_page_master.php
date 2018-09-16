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
                        <!-- List of role -->
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
              	<h3 class="title">Pages</h3>
              		<?php echo form_open_multipart('',array('id'=>'PageUpdateForm','class'=>'row'))?>
                	<ul id="role_tree">
                
            		</ul>
            		<?php echo form_close() ?>
            		<button onclick="UpdatePage()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
	  <?php $this->load->view('global/footer');?>
<script type="text/javascript">
$.fn.extend({
    treed: function (o) {
      
      var openedClass = 'glyphicon-minus-sign';
      var closedClass = 'glyphicon-plus-sign';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        //fire event from the dynamically added icon
      tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click();
        });
      });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});

function GetPage()
    { 
	 var formData = $('form#PagemangerForm').serializeObject();
     var dataString = JSON.stringify(formData);
      var url = "<?php echo site_url('index.php/data_controller/loadPageByRole'); ?>"; 
      StartInsideLoading();
      $.ajax({
        type: "post",
        url: url,
        cache: false,  
        data: dataString, 
        dataType: 'json', 
        success: function(response){ 
        try{  
          if (response.success)
             { 
            $('#role_tree').html(response.html);

            $('#role_tree').treed();
              
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

function UpdatePage()
{ 
 var formData = $('form#PageUpdateForm').serializeObject();
 var dataString = JSON.stringify(formData);
  var url = "<?php echo site_url('index.php/data_controller/UpdatePageSitemap'); ?>"; 
  StartInsideLoading();
  $.ajax({
    type: "post",
    url: url,
    cache: false,  
    data: dataString, 
    dataType: 'json', 
    success: function(response){ 
    try{  
      
        $('#role_tree').html(response.html);

        $('#role_tree').treed();
          
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
<!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <ul class="app-menu">
        <li><a class="app-menu__item" href="<?php echo base_url();?>dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        <li><a class="app-menu__item active" href="<?php echo base_url();?>employee"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Employee Registration</span></a></li>

		<li><a class="app-menu__item " href="<?php echo base_url();?>"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Customer Registration</span></a></li>

		<li><a class="app-menu__item" href="<?php echo base_url();?>"><i class="app-menu__icon fa fa-gears"></i><span class="app-menu__label">Group Account</span></a></li>

		

    <li><a class="app-menu__item" href="<?php echo base_url();?>"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Loan  Section</span></a></li>
        
    <li><a class="app-menu__item" href="<?php echo base_url();?>"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Loan Recovery</span></a></li>
        
      </ul>
    </aside>
    
    
<!-- for displaying loading image -->
    <div id="loading-dimpage" class="loading-dimpage"></div>
    <div class="loading-loadergif"></div>
    <!-- displaying loader image ends here    -->

    <script type="text/javascript">

    function StartInsideLoading(){ 
	    $('.loading-dimpage').show();
	    $('.loading-loadergif').show();
	}
	function StopInsideLoading(){
	    $('.loading-dimpage').hide();
	    $('.loading-loadergif').hide();
	}	

  function MainMenuNavigation(url,menuId){ 
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
         	$('#body_container').empty().append(response.html);
		$('.app-menu__item').removeClass('active');
            $(menuId).addClass('active'); 
            StopInsideLoading();

         } else
         { 
             SetWarningMessageBox('warning', response.msg);
             StopInsideLoading();
         }
      
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

    
      </script>
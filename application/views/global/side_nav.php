<!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <ul class="app-menu">
      
      <?php $sitemap=$sitemap=$this->session->userdata('SiteMap');
      foreach ($sitemap as $row){
      	?>
      	<li><a class="app-menu__item " href="<?php echo base_url();?>navigation?q=<?php echo $row->PageSlug;?>"><i class="app-menu__icon <?php echo $row->PageIcon;?>"></i><span class="app-menu__label"><?php echo $row->PageTitle;?></span></a></li>	
      	<?php
      }
      ?>
      
        
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
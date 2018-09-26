<!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <ul class="app-menu">
      
      <?php $sitemap=$sitemap=$this->session->userdata('SiteMap');
         foreach ($sitemap as $row){
      	?>
      	<?php if($row->IsDropDown==0 && $row->PageCategory==0){?>
      	<li>
      		<a class="app-menu__item " href="<?php echo base_url();?>navigation?q=<?php echo $row->PageSlug;?>"><i class="app-menu__icon <?php echo $row->PageIcon;?>"></i><span class="app-menu__label"><?php echo $row->PageTitle;?></span></a>
      	</li>
      	<?php }else if($row->IsDropDown==1 && $row->PageCategory==0){?>
      	<li class="treeview " >
	      	<a class="app-menu__item" href="#" data-toggle="treeview" >
		      	<i class="app-menu__icon <?php echo $row->PageIcon;?>" ></i>
		      	<span class="app-menu__label"><?php echo $row->PageTitle;?></span>
		      	<i class="treeview-indicator fa fa-angle-right"></i>
		      	</a>
		      	<ul class="treeview-menu">	
		      	<?php foreach ($sitemap as $rows){
		      		
						if($row->ID==$rows->PageCategory){
							?><li>
								<a class="treeview-item" href="<?php echo base_url();?>navigation?q=<?php echo $rows->PageSlug;?>"><i class="icon <?php echo $rows->PageIcon;?>"></i><?php echo $rows->PageTitle;?></a>
		    				</li>
							<?php
						}
						
					}?>
					</ul>
				</li>	
		   <?php }?>
		     
    
      	<?php
      }
      ?>
      
        
      </ul>
    </aside>

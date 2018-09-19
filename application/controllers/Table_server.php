<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Table_server extends CI_Controller {  
      //functions  
      function index(){  
           $this->load->view('login'); 
      }  
      function fetch_item(){      
             
           $this->load->model("Table_model");  
           $fetch_data = $this->Table_model->make_datatables_item();  
           $data = array();
           foreach($fetch_data as $row)  
           {  
               $sub_array = array(); 
               $sub_array[] = '';
               $sub_array[] = $row->Name;
                $sub_array[] = '<div  class="animated-checkbox" style="display: inline-block;">
                <label><input class="checkbox" type="checkbox" value="'.$row->ID.'"><span class="label-text"></span></label>
                </div>
                <button onclick="addRoleform($(this))" value="'.$row->ID.'" class="btn btn-primary w2wbutton" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i></button>';
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Table_model->get_all_data_item(),  
                "recordsFiltered"     =>     $this->Table_model->get_filtered_data_item(),  
                "data"                    =>     $data  
           );

           echo json_encode($output);  
      }  
 }  
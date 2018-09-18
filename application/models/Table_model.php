<?php  
 class Table_model extends CI_Model  
 {  
      var  $order_column_item = array(null, "Name", null);  
      function make_query_item()  
      {  
        //  $table = "item";  
        //  $select_column = array("ID", "Code", "Title", "isPublish", "isActive");  
        

       //    $this->db->select($this->select_column)->from($this->table);
            
          $this->db->select("*");
          $this->db->from('role');
          $this->db->where('isActive', 1); 
          
//           $this->db->select('item.ID as ID,item.Code Code,item.Title as Title,item.isPublish as isPublish,category_master.Name as catMasName,category.Code catCode,vendor.Name as vendorName');
//           $this->db->from('item');
//           $this->db->join('category_master', 'item.Category_master_id = category_master.ID');
//           $this->db->join('category', 'item.Category_id = category.ID');
//           $this->db->join('vendor', 'item.Vendor_id = vendor.ID');  
//           $this->db->where('item.isActive', 1);
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->group_start();
                $this->db->like("Name", $_POST["search"]["value"]);  
//                 $this->db->or_like("item.Title", $_POST["search"]["value"]);  
//                 $this->db->or_like("category_master.Name", $_POST["search"]["value"]);  
//                 $this->db->or_like("category.Code", $_POST["search"]["value"]);  
//                 $this->db->or_like("vendor.Name", $_POST["search"]["value"]);  
                $this->db->group_end();
           }  
           
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column_item[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('ID', 'DESC');  
           }  
            
      }  
      function make_datatables_item(){   
           $this->make_query_item();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data_item(){  
           $this->make_query_item();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_item()  
      {  
           $this->db->select("*");  
           $this->db->from('role');  
           $this->db->where('isActive', 1); 
           return $this->db->count_all_results();  
      }  
 } 
<table id="Mem" class="table table-hover">
        <thead>
            <tr>
            	<th>Sl No</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact No</th>
                <th>Sex</th>               
                <th>Aadhaar No</th>
                <th>District</th>
                <th>
                <div class="animated-checkbox">
              	<label>
                <input onclick="checkAllCheckbox($(this));" type="checkbox" ><span class="label-text">Select All</span>
              	</label>
            	</div>
            	</th>
            </tr>
        </thead>
        <tbody>
        <?php $count = 1; foreach ( $result as $mem_data) { ?>
            <tr>
            	<td><?php echo $count?></td>
                <td><a href="<?php echo site_url('index.php/data_controller/customerInformation?cusId=');echo $mem_data['ID']; ?>" target="_blank"><?php echo $mem_data['name']?></a></td>
                <td><?php echo $mem_data['parmanent_address']?></td>
                <td><?php echo $mem_data['contact_no']?></td>
                <td><?php echo $mem_data['sex']?></td>
                <td><?php echo $mem_data['aadhaar_no']?></td>
                <td><?php echo $mem_data['district']?></td>
                <td>
				<div  class="animated-checkbox" style="display: inline-block;">
              	<label>
                <input class="checkbox" type="checkbox" value="<?php echo $mem_data['ID']?>"><span class="label-text"></span>
              	</label>
            	</div>
            	<button onclick="addMemberform($(this))" value="<?php echo $mem_data['ID']?>"class="btn btn-primary w2wbutton" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i></button>
				</td>
				</tr>
        <?php $count ++;  } ?>
        </tbody>
       
    </table>
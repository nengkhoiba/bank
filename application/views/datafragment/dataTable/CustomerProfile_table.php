<table id="customer" class="table table-hover" style="font-size:13px">
        <thead style="background: #009688; color: #ffffff">
            <tr>
            	<th>Sl No</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contact No</th>
                <th>Sex</th>               
                <th>Aadhaar No</th>
                <th>District</th>
                <th>View Profile</th>
            </tr>
        </thead>
        <tbody>
        <?php $count = 1; foreach ( $result as $mem_data) { ?>
            <tr>
            	<td><?php echo $count?></td>
                <td><?php echo $mem_data['name']?></td>
                <td><?php echo $mem_data['parmanent_address']?></td>
                <td><?php echo $mem_data['contact_no']?></td>
                <td><?php echo $mem_data['sex']?></td>
                <td><?php echo $mem_data['aadhaar_no']?></td>
                <td><?php echo $mem_data['district']?></td>
                <td>
            	<button onclick="viewCustomerProfile($(this))" value="<?php echo $mem_data['ID']?>" class="btn btn-sm btn-danger" style="" type="button">View profile</button>
            	
				</td>
				</tr>
        <?php $count ++;  } ?>
        </tbody>
       
    </table>
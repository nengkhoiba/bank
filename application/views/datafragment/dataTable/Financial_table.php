<table id="financial" class="table table-hover">
        <thead>
            <tr>
                <th>Sl. No.</th>
                <th>Year Title</th>
				<th>Start date</th>
				<th>End date</th>
				<th>Created on</th>				
                <th>
                <div class="animated-checkbox">
              	<label>
                <input onclick="checkAllCheckbox($(this));" type="checkbox" ><span class="label-text">Delete All</span>
              	</label>
            	</div>
            	</th>
            </tr>
        </thead>
        <tbody>
        <?php $count = 1; foreach ( $result as $financial_data) { ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $financial_data['Financial_year'];?></td>
				<td><?php echo date("d-m-Y", strtotime($financial_data['Start_date'])) ;?></td>
				<td><?php echo date("d-m-Y", strtotime($financial_data['End_date'])) ;?></td>
				<td><?php echo date("d-m-Y h:i:s A", strtotime($financial_data['Added_on']));?></td>
                <td>
				<div  class="animated-checkbox" style="display: inline-block;">
              	<label>
                <input class="checkbox" type="checkbox" value="<?php echo $financial_data['ID'];?>"><span class="label-text"></span>
              	</label>
            	</div>
            	<button onclick="addFinancialform($(this))" value="<?php echo $financial_data['ID'];?>"class="btn btn-primary w2wbutton" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i></button>
				</td>
				</tr>
        <?php $count ++; } ?>
        </tbody>
       
    </table>
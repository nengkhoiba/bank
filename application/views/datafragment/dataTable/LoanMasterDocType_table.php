<div class="tile-title-w-btn">
		<h3 class="title">Existing Document Type</h3>
		<p class="bs-component">	
            <a onclick="addLoanMasterDocTypeform($(this))" value="0" style="color:#fff" class="btn btn-sm btn-success">New</a>
            <button class="btn btn-sm btn-danger" type="button" onclick="deleteItem('loan_document_type','loadDesignnation()')">Delete</button>
        </p>
		</div>
		
<table id="loanMasterDocTypeTable" class="table table-hover">
        <thead>
            <tr>
                <th>Sl. No.</th>
                <th>Document Type</th>
				<th>Added By</th>
				<th>Adden On</th>				
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
        <?php $count = 1; foreach ( $result as $row) { ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $row['Name'];?></td>
				<td><?php echo $row['Added_by'];?></td>				
				<td><?php echo date("d-m-Y h:i:s A", strtotime($row['Added_on']));?></td>
                <td>
				<div  class="animated-checkbox" style="display: inline-block;">
              	<label>
                <input class="checkbox" type="checkbox" value="<?php echo $row['ID'];?>"><span class="label-text"></span>
              	</label>
            	</div>
            	<button onclick="addLoanMasterDocTypeform($(this))" value="<?php echo $row['ID'];?>"class="btn btn-primary w2wbutton" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-pencil"></i></button>
				</td>
				</tr>
        <?php $count ++; } ?>
        </tbody>
       
    </table>
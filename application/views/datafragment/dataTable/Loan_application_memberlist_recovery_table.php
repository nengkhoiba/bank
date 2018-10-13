<table id="memTable" class="table table-hover">
        <thead>
            <tr>
            	<th>Sl.</th>
                <th>Name</th>
				<th>Add.</th>
				<th>Dist.</th>
				<th>Contact</th>
				<th>A/c No</th>
				<th>Loan A/c No</th>
				<th>Date</th>
				<th>Amnt.</th>
            </tr>
        </thead>
        <tbody>
        <?php $count = 1; foreach ( $result as $mem_data) { ?>
            <tr>
            	<td><?php echo $count?>
            	<input disabled id="loan_acc_no_<?php echo $mem_data['ID']?>" class="loanAccNo" type="checkbox" value="<?php echo $mem_data['Loan_acc'];?>">
                <input disabled id="collected_amount_<?php echo $mem_data['ID']?>" class="amount" type="checkbox" value="">
                <input disabled id="collected_date_checkbox_<?php echo $mem_data['ID']?>" class="date" type="checkbox" value="">
            	</td>
                <td><?php echo $mem_data['name']?></td>
				<td><?php echo $mem_data['parmanent_address']?></td>
                <td><?php echo $mem_data['district']?></td>                               
				<td><?php echo $mem_data['contact_no']?></td>
				<td><?php echo $mem_data['Acc_no']?></td>
                <td><?php echo $mem_data['Loan_acc']?></td>
                <td>
                <input name="collect_date" class="form-control form-control-sm" type="text" id="collected_date_<?php echo $mem_data['ID']?>" placeholder="Date"></input>
                </td>
                <td>
                <input id="ammount_<?php echo $mem_data['ID']?>" class="form-control form-control-sm" onkeyup="checkedCheckbox($(this))" type="number" placeholder="Enter Amount"></input>
                </td>
				</tr>
				
<script type="text/javascript">

$(document).ready(function (){
    var date = new Date();
    date.setDate(date.getDate()-1);            
    
    // allow to pick future date
        $('#collected_date_<?php echo $mem_data['ID']?>').datepicker({
        format: "dd/mm/yyyy"
        });
    // allow to pick future date

    var FromEndDate = new Date();
    $(function(){
    $('#collected_date_<?php echo $mem_data['ID']?>').datepicker({
    format: 'mm-dd-yyyy',
    endDate: FromEndDate, 
    autoclose: true
    });
    });
    
    });

</script>
				
        <?php $count ++;  } ?>
        </tbody>
       
    </table>
<div class="form-group align-self-end" >
<input id="user_password" style="width: 30%" name="user_password" class="form-control" type="password" placeholder="Enter Password"></input>
<br>
<button onclick="UpdateShgmaster()" class="btn btn-sm btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
</div>




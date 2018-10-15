<?php //echo $result[0]['Loan_name']; echo $result[0]['Loan_pc']; echo $result[0]['pc_type_id']; echo $result[0]['loan_tenure_type_id']; echo $result[0]['Tenure_min']; echo $result[0]['Tenure_max']; echo $result[0]['Min_amount']; echo $result[0]['Max_amount']; echo $result[0]['pc_type_name']; echo $result[0]['tenure_type_name'];
?>
<table  class="table table-hover" style="font-size:13px">
        <thead style="background: #009688; color: #ffffff">
            <tr>
                <th>Loan Name</th>				
				<th>Loan Calculation</th>
				<th>Loan PC</th>
                <th>Tenure Type</th>
                <th>Tenure Min.</th>
                <th>Tenure Max.</th>
                <th>Min. Amount</th>
                <th>Max. Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $result[0]['Loan_name'];?></td>
				<td><?php echo $result[0]['pc_type_name'];?></td>
                <td><?php echo $result[0]['Loan_pc'];?></td>
				<td><?php echo $result[0]['tenure_type_name'];?></td>
                <td><?php echo $result[0]['Tenure_min'];?></td>
				<td><?php echo $result[0]['Tenure_max'];?></td>
                <td><?php echo $result[0]['Min_amount'];?></td>
				<td><?php echo $result[0]['Max_amount'];?></td>				
            </tr>
        </tbody>
       
    </table>
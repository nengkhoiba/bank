<div class="tile-title-w-btn">
              <h3 class="title">Existing Loan Related Document</h3>
              <a onclick="showDivisionById('CustomerLoanDocUploadForm_Grp')" style="color:#fff" class="btn btn-sm btn-success">New</a>
</div>
<div class="table-responsive">
  <table id="loanDocTableGrp" class="table table-hover dataTable no-footer">
    <thead>
      <tr>
        <th>Sl No.</th>
        <th>Document Type</th>
        <th>File Type</th>
        <th>Uploaded By</th>
        <th>Remark</th>
        <th>Uploaded On</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $count = 1; foreach ( $member_loan_doc as $loan_doc) { ?>
    <tr>
    <td><?php echo $count;?></td>
    <td><?php echo $loan_doc['doc_type'];?></td>
    <td><?php echo $loan_doc['file_type'];?></td>
    <td><?php echo $loan_doc['Added_by'];?></td>
    <td><?php echo $loan_doc['Remark'];?></td>
    <td><?php echo $loan_doc['Added_on'];?></td>
    <td><a href="<?php echo $loan_doc['files'];?>" target="_blank" class="btn btn-sm btn-success">View Document</a><button onclick="deleteLoanDocument_Grp($(this))" value="<?php echo $loan_doc['ID'];?>"class="btn btn-primary w2wbutton" style="" type="button"><i style ="font-size: 12px; margin-right: 0px;" class="fa fa-lg fa-fw fa-remove"></i></button></td>
    </tr>
    <?php $count ++; } ?>
    </tbody>
  </table>
</div>
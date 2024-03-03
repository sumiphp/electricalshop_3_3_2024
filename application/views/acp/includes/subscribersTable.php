<table id="dealersList" class="text-center listingPage">
    <thead class="text-capitalize">
        <tr>
            <th>Sl.No:</th>
            <th>Name</th>
            <th>Primary Email</th>
            <th>Primary Phone</th>
            <th>Added date</th>
            <th class="no-sorting">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $slno = 0;
        foreach ($subscribers as $k => $subscriberVal) {
            $slno++; ?>
            <tr>
                <td><?=$slno?></td>
                <td><?=trim($subscriberVal['cust_firstname'].' '.$subscriberVal['cust_lastname'])?> <span class="badge <?=(($subscriberVal['cust_is_dealer'] == 1)? 'badge-secondary' : 'badge-primary')?>"><?=(($subscriberVal['cust_is_dealer'] == 1)? 'Dealer' : 'Customer')?></td>
                <td><?=$subscriberVal['cust_email']?></td>
                <td><?=$subscriberVal['cust_phone1']?></td>
                <td><?php echo converttoUserTZ($subscriberVal['cust_created_date']); ?></td>
                <td>
                    <ul class="d-flex justify-content-center">
                        <li title="Unsubscribe" class="unsubscribe" data-action="2" data-toggle="modal" data-target="#confirm" data-custid="<?=$subscriberVal['cust_id']?>"><a href="#" class="text-danger deleteCust"><i class="ti-trash"></i></a></li>
                    </ul>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="confirm">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to unsubscribe this customer/dealer from our mail?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Unsubscribe</button>
            </div>
        </div>
    </div>
</div>
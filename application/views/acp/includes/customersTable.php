<table id="customersList" class="text-center listingPage">
    <thead class="text-capitalize">
        <tr>
            <th>Sl.No:</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Registration date</th>
            <th class="no-sorting">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $slno = 0;
        //print_r($customers);
        //die;
        foreach ($customers as $k => $customerVal) {
            $slno++; ?>
            <tr>
                <td><?=$slno?></td>
                <td><?=trim($customerVal['name'])?></td>
                <td><?=$customerVal['email']?></td>
                <td><?=$customerVal['phone']?></td>
                <td><?=$customerVal['regdate']?></td>
                <td>
                    <ul class="d-flex justify-content-center">
                        <!--li class="mr-3" data-customerid="<?=$customerVal['userid']?>"><a href="<?=site_url()?>acp/Client/view/<?//=$customerVal['userid']?>" class="text-secondary"><i class="fa fa-eye"></i></a></li>
                        <li class="mr-3" data-customerid="<?=$customerVal['userid']?>"><a href="<?=site_url()?>acp/Client/edit/<?//=$customerVal['userid']?>" class="text-secondary"><i class="fa fa-pencil"></i></a></li-->
                        <?php //if ($customerVal['cust_status'] == 1) { ?>
                            <!--li title="Make unavailable" class="mr-3 lock" data-action="0" data-custid="<?//=$customerVal['userid']?>"><a href="#"><i class="fa fa-unlock text-success"></i></a></li>
                        <?php //} else { ?>
                            <li title="Make available" class="mr-3 unlock" data-action="1" data-custid="<?//=$customerVal['userid']?>"><a href="#"><i class="fa fa-lock text-danger"></i></a></li-->
                        <?php //} ?>
                        <!--li title="Remove" class="delete" data-action="2" data-toggle="modal" data-target="#confirm" data-custid="<?//=$customerVal['userid']?>"><a href="#" class="text-danger deleteCust"><i class="ti-trash"></i></a></li-->

                        <li data-custid="<?=$customerVal['userid']?>" data-action="delete" data-toggle="modal" data-target="#confirm" class="delete"><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
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
                <p>Are you sure you want to Delete this Customer?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Confirm</button>
            </div>
        </div>
    </div>
</div>
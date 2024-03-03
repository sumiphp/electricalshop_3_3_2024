<table id="productsList" class="text-center listingPage">
    <thead class="text-capitalize">
        <tr>
            <th>Sl.No:</th>
            <th>Name</th>
            <th>Added By</th>
            <th>Updated Date</th>
            <th class="no-sorting">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $slno = 0;
        foreach ($products as $k => $productVal) {
            $slno++; ?>
            <tr>
                <td><?=$slno?></td>
                <td><?=trim($productVal['prod_name'])?></td>
                <td><?=$productVal['user_name']?></td>
                <td><?=date(SITE_DATE_FORMAT.' '.SITE_TIME_FORMAT, $productVal['unix_prod_updated_date'])?></td>
                <td>
                    <ul class="d-flex justify-content-center">
                        <li title="View" class="mr-3"><a href="<?=site_url()?>acp/Product/view/<?=$productVal['prod_id']?>" class="text-secondary"><i class="fa fa-eye"></i></a></li>
                        <li title="Edit" class="mr-3"><a href="<?=site_url()?>acp/Product/edit/<?=$productVal['prod_id']?>" class="text-secondary"><i class="fa fa-pencil"></i></a></li>
                        <?php if ($productVal['prod_status'] == 1) { ?>
                            <li title="Make unavailable" class="mr-3 lock" data-action="lock" data-prodid="<?=$productVal['prod_id']?>"><a href="#"><i class="fa fa-unlock text-success"></i></a></li>
                        <?php } else { ?>
                            <li title="Make available" class="mr-3 unlock" data-action="unlock" data-prodid="<?=$productVal['prod_id']?>"><a href="#"><i class="fa fa-lock text-danger"></i></a></li>
                        <?php } ?>
                        <li title="Remove" class="delete" data-action="delete" data-toggle="modal" data-target="#confirm" data-prodid="<?=$productVal['prod_id']?>"><a href="#" class="text-danger deleteProd"><i class="ti-trash"></i></a></li>
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
                <p>Are you sure you want to Delete this Product?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Confirm</button>
            </div>
        </div>
    </div>
</div>
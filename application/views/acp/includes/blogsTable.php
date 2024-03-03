<table id="customersList" class="text-center listingPage">
    <thead class="text-capitalize">
        <tr>
            <th>Sl.No:</th>
            <th>Name</th>
            <th>Status</th>
            <th>Added date</th>
            <th class="no-sorting">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $slno = 0;
        foreach ($blogs as $k => $blogVal) {
            $slno++; ?>
            <tr>
                <td><?=$slno?></td>
                <td><?=truncateString(trim($blogVal['blog_name']))?></td>
                <td><span class="badge <?=(($blogVal['blog_status'] == 1)? 'badge-secondary' : 'badge-primary')?>"><?=(($blogVal['blog_status'] == 1)? 'Draft' : 'Published')?></span></td>
                <td><?php echo converttoUserTZ($blogVal['blog_added_date']); ?></td>
                <td>
                    <ul class="d-flex justify-content-center">
                        <li class="mr-3" data-bid="<?=$blogVal['blog_id']?>"><a href="<?=site_url()?>acp/Blog/view/<?=$blogVal['blog_id']?>" class="text-secondary"><i class="fa fa-eye"></i></a></li>
                        <li class="mr-3" data-bid="<?=$blogVal['blog_id']?>"><a href="<?=site_url()?>acp/Blog/edit/<?=$blogVal['blog_id']?>" class="text-secondary"><i class="fa fa-pencil"></i></a></li>
                        <?php if ($blogVal['blog_status'] == 2) { ?>
                            <li title="Make draft" class="mr-3 draft" data-action="1" data-bid="<?=$blogVal['blog_id']?>"><a href="#"><i class="ti-control-stop text-error"></i></a></li>
                        <?php } else { ?>
                            <li title="Publish Blog" class="mr-3 publish" data-action="2" data-bid="<?=$blogVal['blog_id']?>"><a href="#"><i class="ti-control-play text-success"></i></a></li>
                        <?php } ?>
                        <li title="Remove" class="delete" data-action="0" data-toggle="modal" data-target="#confirm" data-bid="<?=$blogVal['blog_id']?>"><a href="#" class="text-danger deleteCust"><i class="ti-trash"></i></a></li>
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
                <p>Are you sure you want to Delete this Blog?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Confirm</button>
            </div>
        </div>
    </div>
</div>
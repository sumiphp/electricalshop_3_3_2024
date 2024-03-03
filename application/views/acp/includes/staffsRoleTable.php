<table id="rolesList" class="text-center listingPage">
    <thead class="text-capitalize">
        <tr>
            <th>Sl.No:</th>
            <th>Role</th>
            <th class="no-sorting">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $slno = 0;
        foreach ($roles as $k => $roleVal) {
            $slno++; ?>
            <tr>
                <td><?=$slno?></td>
                <td><?=$roleVal['role_name']?></td>
                <td>
                    <ul class="d-flex justify-content-center">
                        <li class="mr-3" data-role="<?=$roleVal['role_id']?>"><a href="<?=site_url()?>acp/Role/view/<?=$roleVal['role_id']?>" class="text-secondary"><i class="fa fa-eye"></i></a></li>
                        <li class="mr-3" data-role="<?=$roleVal['role_id']?>"><a href="<?=site_url()?>acp/Role/edit/<?=$roleVal['role_id']?>" class="text-secondary"><i class="fa fa-pencil"></i></a></li>
                        <?php if ($roleVal['role_status'] == 1) { ?>
                            <li title="Make unavailable" class="mr-3 lock" data-action="0" data-role="<?=$roleVal['role_id']?>"><a href="#"><i class="fa fa-unlock text-success"></i></a></li>
                        <?php } else { ?>
                            <li title="Make available" class="mr-3 unlock" data-action="1" data-role="<?=$roleVal['role_id']?>"><a href="#"><i class="fa fa-lock text-danger"></i></a></li>
                        <?php } ?>
                        <li title="Remove" class="delete" data-action="2" data-toggle="modal" data-target="#confirm" data-role="<?=$roleVal['role_id']?>"><a href="#" class="text-danger deleteStaffRole"><i class="ti-trash"></i></a></li>
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
                <p>Are you sure you want to Delete this staff role?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Confirm</button>
            </div>
        </div>
    </div>
</div>
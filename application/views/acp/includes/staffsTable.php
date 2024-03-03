<table id="staffsList" class="text-center listingPage">
    <thead class="text-capitalize">
        <tr>
            <th>Sl.No:</th>
            <th>Name</th>
            <th>Primary Email</th>
            <th>Primary Phone</th>
            <th>Role</th>
            <th class="no-sorting">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $slno = 0;
        $loggedInUser = loggedInUser();
        foreach ($staffs as $k => $userVal) {
            $slno++; ?>
            <tr>
                <td><?=$slno?></td>
                <td><?=trim($userVal['user_firstname'].' '.$userVal['user_lastname'])?></td>
                <td><?=$userVal['user_primary_email']?></td>
                <td><?=$userVal['user_primary_phone']?></td>
                <td>
                    <span class="status-p bg-primary"><?=$userVal['role_name']?></span>
                </td>
                <td>
                    <ul class="d-flex justify-content-center">
                        <li class="mr-3" data-userid="<?=$userVal['user_id']?>"><a href="<?=site_url()?>acp/Staff/view/<?=$userVal['user_id']?>" class="text-secondary"><i class="fa fa-eye"></i></a></li>
                        <?php if (
                            ($loggedInUser['user_role'] != 2 && $userVal['user_role'] != 2)
                            || $loggedInUser['user_role'] == 2
                        ) { ?>
                            <li class="mr-3" data-userid="<?=$userVal['user_id']?>"><a href="<?=site_url()?>acp/Staff/edit/<?=$userVal['user_id']?>" class="text-secondary"><i class="fa fa-pencil"></i></a></li>
                            <li class="mr-3" data-userid="<?=$userVal['user_id']?>"><a href="<?=site_url()?>acp/Staff/cp/<?=urlencode(base64_encode(base64_encode($userVal['user_id'])))?>" class="text-secondary"><i class="ti-settings"></i></a></li>
                            <?php if ($userVal['user_status'] == 1) { ?>
                                <li title="Make unavailable" class="mr-3 lock" data-action="0" data-userid="<?=$userVal['user_id']?>"><a href="#"><i class="fa fa-unlock text-success"></i></a></li>
                            <?php } else { ?>
                                <li title="Make available" class="mr-3 unlock" data-action="1" data-userid="<?=$userVal['user_id']?>"><a href="#"><i class="fa fa-lock text-danger"></i></a></li>
                            <?php } ?>
                            <li title="Remove" class="delete" data-action="2" data-toggle="modal" data-target="#confirm" data-userid="<?=$userVal['user_id']?>"><a href="#" class="text-danger deleteStaff"><i class="ti-trash"></i></a></li>
                        <?php } ?>
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
                <p>Are you sure you want to Delete this Staff?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Confirm</button>
            </div>
        </div>
    </div>
</div>
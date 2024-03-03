<table id="productTypesList" class="text-center listingPage">
    <thead class="text-capitalize">
        <tr>
            <th>Sl.No:</th>
            <th>Name</th>
            <th>Description</th>
            <th>Updated Date</th>
            <th class="no-sorting">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $slno = 0;
        foreach ($producttypes as $k => $typeVal) {
            $slno++; ?>
            <tr>
                <td><?=$slno?></td>
                <td><?=trim($typeVal['pd_type_name'])?></td>
                <td><?=$typeVal['pd_type_description']?></td>
                <td><?=date(SITE_DATE_FORMAT.' '.SITE_TIME_FORMAT, $typeVal['unix_updated_time'])?></td>
                <td>
                    <ul class="d-flex justify-content-center">
                        <li title="View" class="mr-3"><a href="<?=site_url()?>acp/Productype/view/<?=$typeVal['pd_type_id']?>" class="text-secondary"><i class="fa fa-eye"></i></a></li>
                        <?php if ($typeVal['pd_type_system'] == 0) { ?>
                            <li title="Edit" class="mr-3"><a href="<?=site_url()?>acp/Productype/edit/<?=$typeVal['pd_type_id']?>" class="text-secondary"><i class="fa fa-pencil"></i></a></li>
                            <li title="Remove" data-action="delete" data-toggle="modal" data-target="#confirm" class="deleteProdType" data-prodtypeid="<?=$typeVal['pd_type_id']?>"><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
                        <?php } else { ?>
                            <li class="mr-3"><a href="#" class="text-secondary" style="color:#ccc !important;pointer-events: none !important;"><i class="fa fa-pencil"></i></a></li>
                            <li data-action="delete"><a href="#" class="text-secondary" style="color:#ccc !important;pointer-events: none !important;"><i class="ti-trash"></i></a></li>
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
                <p>Are you sure you want to Delete this Type?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Confirm</button>
            </div>
        </div>
    </div>
</div>
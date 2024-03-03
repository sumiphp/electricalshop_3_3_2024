<table id="productBrandsList" class="text-center listingPage">
    <thead class="text-capitalize">
        <!--tr>
            <th>Sl.No1:</th>
            <th>Name</th>
            <th>Description</th>
            <th>Updated Date</th>
            <th class="no-sorting">Actions</th>
        </tr-->
        <tr role="row">
                                                      <th class="sorting_asc" tabindex="0" aria-controls="data-source-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 116px;">Title1</th>
                                                      <th class="sorting" tabindex="0" aria-controls="data-source-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 142px;">Title2</th>
                                                      <th class="sorting" tabindex="0" aria-controls="data-source-1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 220px;">Title3</th>
                                                      <th class="sorting" tabindex="0" aria-controls="data-source-1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 220px;">Title4</th>
                                                       <th class="sorting" tabindex="0" aria-controls="data-source-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 142px;">Picture</th>
                                                       <th class="sorting" tabindex="0" aria-controls="data-source-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 142px;">Status</th>
                                                           <th class="sorting taC" tabindex="0" aria-controls="data-source-1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 151px;">Action</th></tr>




    </thead>
    <tbody>
        <?php 
        $slno = 0;
        print_r($carousal1);
        die;
        foreach ($carousal1 as $k => $res) {
            $slno++; ?>
            <!--tr>
                <td><?=$slno?></td>
                <td><?=trim($brandVal['brand_name'])?></td>
                <td><?=truncateString($brandVal['brand_desc'])?></td>
                <td><?=date(SITE_DATE_FORMAT.' '.SITE_TIME_FORMAT, $brandVal['unix_brand_updated_date'])?></td>
                <td>
                    <ul class="d-flex justify-content-center">
                        <li title="View" class="mr-3"><a href="<?=site_url()?>acp/Productbrand/view/<?=$brandVal['brand_id']?>" class="text-secondary"><i class="fa fa-eye"></i></a></li>
                        <li title="Edit" class="mr-3"><a href="<?=site_url()?>acp/Productbrand/edit/<?=$brandVal['brand_id']?>" class="text-secondary"><i class="fa fa-pencil"></i></a></li>
                        <?php if ($brandVal['brand_status'] == 1) { ?>
                            <li title="Make unavailable" class="mr-3 lock" data-action="lock" data-brandid="<?=$brandVal['brand_id']?>"><a href="#"><i class="fa fa-unlock text-success"></i></a></li>
                        <?php } else { ?>
                            <li title="Make available" class="mr-3 unlock" data-action="unlock" data-brandid="<?=$brandVal['brand_id']?>"><a href="#"><i class="fa fa-lock text-danger"></i></a></li>
                        <?php } ?>
                        <li data-brandid="<?=$brandVal['brand_id']?>" data-action="delete" data-toggle="modal" data-target="#confirm" class="delete"><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
                    </ul>
                </td>
            </tr-->

            <tr role="row" class="odd" id="<?php echo $res['carouselid'];?>" >
                                                   
                                                   <td class="sorting_1"><?php echo $res['title'];?></td>
                                                   <td><?php echo $res['title2'];?></td>
                                                  
                                                   <td><?php echo $res['title3'];?></td>
                                                   <td><?php echo $res['title4'];?></td>
                                                   <td><img src=<?php echo base_url().'assets/uploads/carousel/'.$res['picture']?> width="80" height="80" /></td>
                                                   <td> <?php if ($res['active']==1){ echo "Active"; } else { echo "Inactive";}?>
                                                 </td>
                                                   <td> 
                                                   <ul class="d-flex justify-content-center">
                        <!--li title="View" class="mr-3"><a href="<?//=site_url()?>acp/Productbrand/view/<?php //echo $res['carouselid'];?>" class="text-secondary"><i class="fa fa-eye"></i></a></li-->
                        <li title="Edit" class="mr-3"><a href="<?=site_url()?>acp/Settings/editcarousel/<?php echo $res['carouselid'];?>" class="text-secondary"><i class="fa fa-pencil"></i></a></li>
                        <?php// if ($brandVal['brand_status'] == 1) { ?>
                            <!--li title="Make unavailable" class="mr-3 lock" data-action="lock" data-brandid="<?php echo $res['carouselid'];?>"><a href="#"><i class="fa fa-unlock text-success"></i></a></li-->
                        <?php //} else { ?>
                            <!--li title="Make available" class="mr-3 unlock" data-action="unlock" data-brandid="<?php //echo $res['carouselid'];?>"><a href="#"><i class="fa fa-lock text-danger"></i></a></li-->
                        <?php //} ?>
                        <li data-carouselid="<?php echo $res['carouselid'];?>" data-action="delete" data-toggle="modal" data-target="#confirm" class="delete"><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
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
                <p>Are you sure you want to Delete this Carousel?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger">Confirm</button>
            </div>
        </div>
    </div>
</div>
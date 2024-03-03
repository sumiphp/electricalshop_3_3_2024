<div class="page-title-area">
    <?php $acp_login_user = loggedInUser(); ?>
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left"><?=$page_title?></h4>
                <ul class="breadcrumbs pull-left">
                    <?php 
                    
                    //print_r($page_breadcrumb);
                    
                    foreach ($page_breadcrumb as $breadcrumb => $detail) { ?>
                        <li><?=((!empty($detail['link']))? '<a href="'.$detail['link'].'"><span>'.ucwords($breadcrumb).'</span></a>' : '<span>'.ucwords($breadcrumb).'</span>')?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <?php
                $avatarImg = site_url().'assets/images/avatar.png';
                if (($acp_login_user['user_avatar'] != '') && file_exists(FCPATH.'assets/uploads/users/'.trim($acp_login_user['user_avatar']))) {
                    $avatarImg = site_url().'assets/uploads/users/'.trim($acp_login_user['user_avatar']);
                } ?>
                <img class="avatar user-thumb" src="<?=$avatarImg?>" alt="<?=trim($acp_login_user['user_firstname'].' '.$acp_login_user['user_lastname'])?>">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?=trim($acp_login_user['user_firstname'].' '.$acp_login_user['user_lastname'])?><i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <!-- <a class="dropdown-item" href="#">Message</a> -->
                    <a class="dropdown-item" href="<?=site_url()?>acp/Settings" style="<?=((!hasUserAccess(6))? 'display:none;' : '')?>">Site Settings</a>
                    <a class="dropdown-item" href="<?=site_url()?>acp/Staffs/cp">User Settings</a>
                    <a class="dropdown-item" href="<?=site_url()?>acp/Login/logout">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>
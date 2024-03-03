<?php $sitedetails = sitedetails(); ?>
<div class="card_box subscribe_panel wrapp_block">
    <form action="">
        <h4> Never Miss A Post!</h4>
        <p>
        Sign up for free and be the first
        to get notified about updates
        </p>
        <div class="searchFormaria email">
            <input type="email" placeholder="Your Email Address" name="postSearch">
        </div>
        <button> Subscribe</button>
    </form>

    <?php if ((trim($sitedetails['facebook_url']) != '') || (trim($sitedetails['twitter_url']) != '') || (trim($sitedetails['instagram_url']) != '') || (trim($sitedetails['youtube_url']) != '')) { ?>
        <div class="socialMedia_cover">
            <h5>Stay In Touch</h5>
            <ul>
                <?php if (trim($sitedetails['instagram_url']) != '') { ?>
                    <li> <a href="<?=$sitedetails['instagram_url']?>" target="blank"> <i class="fa fa-instagram" aria-hidden="true"></i> </a></li>
                <?php } ?>
                <?php if (trim($sitedetails['facebook_url']) != '') { ?>
                    <li> <a href="<?=$sitedetails['facebook_url']?>" target="blank"> <i class="fa fa-facebook" aria-hidden="true"></i> </a></li>
                <?php } ?>
                <?php if (trim($sitedetails['twitter_url']) != '') { ?>
                    <li> <a href="<?=$sitedetails['twitter_url']?>" target="blank"> <i class="fa fa-twitter" aria-hidden="true"></i> </a></li>
                <?php } ?>
                <?php if (trim($sitedetails['whatsapp']) != '') { ?>
                    <li> <a href="<?=$sitedetails['whatsapp']?>" target="blank"> <i class="fa fa-whatsapp" aria-hidden="true"></i> </a></li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
</div>
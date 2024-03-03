<?php if (count($blogs) > 0) { 
    foreach ($blogs as $key => $blog) { ?>
        <div class="col-lg-4 col-md-6 col-12">
            <div class="blog__box blogContent" data-maxlength="60">
                <span>  <img src="<?=site_url()?>assets/uploads/blogs/<?=$blog['blog_featured_image']?>" alt="<?=$blog['blog_name']?>"> </span>
                <aside class="title" >  
                    <h4> <b> <?=$blog['blog_name']?> </b> </h4>
                </aside>
                <aside data-maxlength="200">
                    <p><?=$blog['blog_subject']?></p>
                    <samp> Post On<b> <?=converttoUserTZ($blog['blog_added_date'], true)?></b> </samp>
                    <a href="<?=site_url().'blog/'.$blog['blog_canonial_name']?>" class="hvr-sweep-to-right"> Read More</a>
                </aside>
            </div>
        </div>
    <?php }
} else { ?>
    <div class="text-center col-12"> No blogs to added yet. </div>
<?php } ?>
<div class="card_box">
    <ul>
        <?php foreach ($blogs as $blog) { ?>
            <li>
                <a href="<?=site_url()?>blog/<?=$blog['blog_canonial_name']?>" style="text-decoration:none;">
                    <div class="row p-2">
                        <aside> <img src="<?=site_url()?>assets/uploads/blogs/<?=$blog['blog_featured_image']?>" alt="<?=$blog['blog_name']?>"> </aside>
                        <span>
                            <h6><?=$blog['blog_name']?></h6>
                            <p><?=$blog['blog_subject']?></p>
                        </span>
                    </div>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>
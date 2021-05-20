
<div class="service-block service-<?= get_the_ID(); ?>">
    <div class="contain" style="background-image:url('<?= get_the_post_thumbnail_url(); ?>');">
        <a href="<?= get_the_permalink(); ?>">
            <div class="icon">
                <?php $icon = get_field('icon'); ?>
                <img src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>">
            </div>
            <div class="title">
                <h4><?= get_the_title(); ?></h4>
            </div>
        </a>
    </div>
</div>



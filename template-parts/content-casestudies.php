
<div class="cs-block cs-<?= get_the_ID(); ?>">
    <div class="cs-container">
        <div class="contain" style="background-image:url('<?= get_the_post_thumbnail_url(); ?>');">
            <a href="<?= get_the_permalink(); ?>">
        
            </a>
        </div>
    </div>
    <div class="more">
        <div class="title">
            <h4><a href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a></h4>
            <p><a href="<?= get_the_permalink(); ?>" class="button-third">View More</a>
        </div>
    </div>
</div>



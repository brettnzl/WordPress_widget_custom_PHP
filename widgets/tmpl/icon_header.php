<?php $data = get_query_var('data'); ?>


<div class="tester">
    <?php echo get_the_title(); ?><br/>
    <?php echo get_the_permalink(); ?><br/>
    <?php echo get_field('icon')['url']; ?>

    
    <pre><?php print_r($data); ?></pre>
</div>
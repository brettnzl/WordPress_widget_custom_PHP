<?php

// Creating the widget 
class custom_php extends WP_Widget {
    
    function __construct() {
        parent::__construct(
            // Base ID of your widget
            'custom_php', 
            
            // Widget name will appear in UI
            __('Custom PHP Code', 'custom_php_domain'), 
            
            // Widget description
            array( 
                'description' => __( 'Loads a PHP file from widgets/tmpl directory in your theme file', 'custom_php_domain' ),
            ) 
        );
    }
    
    // Creating widget front-end
    public function widget( $args, $instance ) {
       
        echo "<div class='php-widget-container text-white' style='position: relative;z-index:999;'>";
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($instance['tmpl'])) {
            set_query_var('data', $instance);
            include 'tmpl/'.$instance['tmpl'];
        } else {
            echo "Error: No PHP file Selected";
        }

        // This is where you run the code and display the output
        echo $args['after_widget'];
        echo "</div>";
    }
            
    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = __( 'Widget Title', 'custom_php_domain' );
        }

        // Get the Php files inside the tmpl dir
        $mydir = get_theme_file_path() . '/widgets/tmpl/'; 
        $myfiles = array_diff(scandir($mydir), array('.', '..')); 
        
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <label for="<?php echo $this->get_field_id( 'tmpl' ); ?>">Custom Field <small>Does nothing, but can be used in code</small></label><br/>
        <input class="widefat" placeholder="Custom field" id="<?php echo $this->get_field_id( 'custom_field' ); ?>" name="<?php echo $this->get_field_name( 'custom_field' ); ?>" type="text" value="<?php echo esc_attr( $instance['custom_field'] ); ?>" >
        <p>
            <label for="<?php echo $this->get_field_id( 'tmpl' ); ?>">Custom PHP Template</label><br/>            
            <select class="widefat" id="<?php echo $this->get_field_id( 'tmpl' ); ?>" name="<?php echo $this->get_field_name( 'tmpl' ); ?>" type="text">
                <option value="">None</option>
                <?php foreach($myfiles as $key => $tmpl) { ?>
                    <option value="<?= $tmpl; ?>" <?= ($instance['tmpl'] == $tmpl ? 'selected' : '') ?>><?= $tmpl; ?></option>
                <?php } ?>
            </select>
        </p>

        <?php 
    }
        
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['tmpl'] = $new_instance['tmpl'];
        $instance['custom_field'] = $new_instance['custom_field'];

        return $instance;
    }
    
} 
 
 
// Register and load the widget
function wpb_load_widget() {
    register_widget( 'custom_php' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
<?php
/*
Plugin Name: my app button
Plugin URI: http://www.ziogianni.com
Description:  a simple multipurpose plugin written to add mobile download buttons... 
Author: g.vieri
Version: 1
Author URI: http://www.ziogianni.com
*/

class MyAppButtonWidget extends WP_Widget
{
  function MyAppButtonWidget()
  {
    $widget_ops = array('classname' => 'MyAppButtonWidget', 'description' => 'a simple multipurpose plugin written to add mobile download buttons...' );
    $this->WP_Widget('MyAppButtonWidget', 'My App Button Widget', $widget_ops);
  }
  
function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' , 'message' => 'my message', 'bcode' => 'button code' ) );
    $title = $instance['title'];
    $message = $instance['message'];
    $bcode = $instance['bcode'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('message'); ?>">message: <input class="widefat" id="<?php echo $this->get_field_id('message'); ?>" name="<?php echo $this->get_field_name('message'); ?>" type="text" value="<?php echo attribute_escape($message); ?>" /></label></p>
  <p><label for="<?php echo $this->get_field_id('bcode'); ?>">Button Code: <input class="widefat" id="<?php echo $this->get_field_id('bcode'); ?>" name="<?php echo $this->get_field_name('bcode'); ?>" type="text" value="<?php echo attribute_escape($bcode); ?>" /></label></p>

<?php
  }
  
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['message'] = $new_instance['message'];
    $instance['bcode'] = $new_instance['bcode'] ;
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
  
    echo $before_widget;
    $title = $instance['title'];
    $message =  $instance['message'];
    $bcode   =  $instance['bcode'];
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
  
    // WIDGET CODE GOES HERE
    echo "<div><span>$message<span><br>$bcode</div>";
  
    echo $after_widget;
  }
  
}

add_action( 'widgets_init', create_function('', 'return register_widget("MyAppButtonWidget");') );?>

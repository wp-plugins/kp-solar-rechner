<?php
/*
Plugin Name: KP Solar-Rechner
Plugin URI: http://www.geekyweekly.com/mypageorder
Description: Der Käuferportal Solarrechner errechnet den Ertrag einer Solaranlage und kann als Widget in den Blog eingebunden werden.
Version: 1.0.1
Author: Käuferportal
Author URI: http://www.kaeuferportal.de
Author Email: wordpress.solarrechner@kaeuferportal.de
License: GPL2
*/

/*
Copyright 2013  Käuferportal  (email : wordpress.solarrechner@kaeuferportal.de)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class KP_Solar_Rechner_Widget extends WP_Widget{
  public function __construct(){
    $name = 'Käuferportal Solar-Rechner Widget';
    $class = 'KP_Solar_Rechner_Widget';
    $idBase = 'kp-solar-rechner';
    $description = 'Der Käuferportal Solarrechner errechnet den Ertrag einer Solaranlage';

    $widget_ops = array(
        'classname'   => $class,
        'description' => $description);

    $control_ops = array(
        'width' => 322,
        'height' => 490,
        'id_base' => $idBase);

    $this->WP_Widget( $idBase, $name, $widget_ops, $control_ops );

    if ( is_active_widget( false, false, $this->id_base, true ) 
    && !is_admin()) {
      wp_enqueue_script('kp-solar-rechner', self::get_asset_path('js/kp-solar-rechner.js'), array('jquery'));
      wp_enqueue_script('kp-solar-rechner-calc', self::get_asset_path('js/solarcalc.js'));
      wp_enqueue_style( 'kp-solar-rechner', self::get_asset_path('css/kp-solar-rechner.css'));
      wp_enqueue_script('jquery.validate', 'http://www.kaeuferportal.de/javascripts/jquery.validate.js', array('jquery') );
    }
  }

  public function widget($args, $instance){
    include plugin_dir_path(__FILE__).'template.php';
  }

  public function img_path($relativePath){
    return self::get_asset_path('img/'.$relativePath);
  }

  public function img($relativePath, $class='', $alt=''){
    if(!empty($alt))
      $alt = ' alt="'.$alt.'"';

    if(!empty($class))
      $class = ' class="'.$class.'"';

    echo '<img src="'.$this->img_path($relativePath).'"'.$alt.$class.'/>';
  }
  
  public static function get_asset_path($relativePath){
    return plugin_dir_url(__FILE__).'assets/'.$relativePath;
  }
  
  public static function register(){
    register_widget('KP_Solar_Rechner_Widget');
  }
  
  function shortcode($atts){
    $widget = new self();
    
    ob_start();
    $widget->widget(array(), array());
    return ob_get_clean();
  }
}

add_action('widgets_init', 'KP_Solar_Rechner_Widget::register');

add_shortcode( 'kp_solar_rechner', 'KP_Solar_Rechner_Widget::shortcode' );
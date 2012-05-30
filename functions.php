<?php


add_theme_support( 'post-thumbnails' );


class Walker_Portfolio extends Walker {
     var $tree_type = 'page';
     var $db_fields = array ('parent' => 'post_parent', 'id' => 'ID');

     function start_lvl(&$output, $depth) {
          $indent = str_repeat("\t", $depth);
          $output .= "\n$indent<ul>\n";
     }

     function end_lvl(&$output, $depth) {
          $indent = str_repeat("\t", $depth);
          $output .= "$indent</ul>\n";
     }

     function start_el(&$output, $page, $depth, $args, $current_page) {
          if ( $depth )
               $indent = str_repeat("\t", $depth);
          else
               $indent = '';
          
          $act = '';
               
          extract($args, EXTR_SKIP);
          $css_class = array('page_item', 'page-item-'.$page->ID);
          if ( !empty($current_page) ) {
               $_current_page = get_page( $current_page );
               if ( isset($_current_page->ancestors) && in_array($page->ID, (array) $_current_page->ancestors) )
                    {$css_class[] = 'current_page_ancestor active'; $act = '1';}
               if ( $page->ID == $current_page )
                    {$css_class[] = 'current_page_item active'; $act = '1';}
               elseif ( $_current_page && $page->ID == $_current_page->post_parent )
                    {$css_class[] = 'current_page_parent active'; $act = '1';}
          } elseif ( $page->ID == get_option('page_for_posts') ) {
               {$css_class[] = 'current_page_parent active'; $act = '1';}
          }

          $css_class = implode(' ', apply_filters('page_css_class', $css_class, $page));

		$thumbnail = '';
		if ( has_post_thumbnail($page->ID)) {
			$thumbnail = get_the_post_thumbnail( $page->ID, array(310,212) );
		} else {
			$thumbnail = '<img src="wp-content/themes/gedankenwerkcom/images/img-blank.jpg" alt="' . $page->post_title . '" width="310" height="210" />';
		}


			$_type = get_post_meta($page->ID,'type',true);
			$_client = get_post_meta($page->ID,'client',true);


          //$output .= $indent . '<div class="block"><a href="' . get_permalink($page->ID) . '"><div class="image">'.$thumbnail.'</div></a><a href="' . get_permalink($page->ID) . '"><h2>'.$page->post_title.'</h2></a><div class="link-holder"><a href="#">'.$_client.'</a></div></div>' . $link_before;
          $output .= $indent . '<div class="block"><a href="' . get_permalink($page->ID) . '"><div class="image">'.$thumbnail.'</div></a><div class="link-holder"><a href="' . get_permalink($page->ID) . '"><h2>'.$page->post_title.'</h2></a></div></div>' . $link_before;
          
          
          if($act) $_image = substr_replace($_img, '1.gif', -4, strlen($_img));
          $output .= '';
          
          $output .= $link_after . '</a>';

          if ( !empty($show_date) ) {
               if ( 'modified' == $show_date )
                    $time = $page->post_modified;
               else
                    $time = $page->post_date;

               $output .= " " . mysql2date($date_format, $time);
          }
     }

     function end_el(&$output, $page, $depth) {
          $output .= "</li>\n";
     }
}
function get_ancestors ($p) {
    $parent = $p->post_parent;
     $ancestors = array ();
     if($parent==0) $ancestors[0] = $p->ID;
    while ($parent != '0') {
          if ($parent) {
               $ancestors[] = $parent;
          }
        $p = get_post ($parent);
        $parent = $p->post_parent;
    }
    return $ancestors;
} 


add_action('init', 'register_custom_menu');
 
function register_custom_menu() {
	register_nav_menu('custom_menu', __('Custom Menu'));
}




?>

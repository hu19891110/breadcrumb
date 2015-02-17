<?php



if ( ! defined('ABSPATH')) exit;  // if direct access 

class breadcrumb
	{
		
		public function breadcrumb_get_option($option_name)
			{
				return get_option($option_name);
			}	
		
		
		public function breadcrumb_html()
			{

				$breadcrumb_text = $this->breadcrumb_get_option('breadcrumb_text');
				$breadcrumb_separator = $this->breadcrumb_get_option('breadcrumb_separator');				
	
				
				
				$html  = '';
				$html .= '
				<div class="breadcrumb-container">';
		
				$html .= '<ul>';		
				$html .= '<li><span>'.$breadcrumb_text.'</span></li>';
					
				if(is_home())
					{
						
						$html .= '<li><a title="Home" href="#">Home</a><span>'.$breadcrumb_separator.'</span></li>';
						
					}
					
				else if(is_attachment())
					{
						$current_attachment_id = get_query_var('attachment_id');
						$current_attachment_link = get_attachment_link($current_attachment_id);				
						
						
						$html .= '<li><a title="Home" href="'.get_bloginfo('home').'">Home</a></li>';
						$html .= '<li><span>'.$breadcrumb_separator.'</span><a href="'.$current_attachment_link.'">'.get_the_title().'</a><span>'.$breadcrumb_separator.'</span></li>';
					}

				else if(is_singular())
					{
						$html .= '<li><a title="Home" href="'.get_bloginfo('home').'">Home</a></li>';
						$html .= '<li><span>'.$breadcrumb_separator.'</span><a title="'.get_the_title().'" href="#">'.get_the_title().'</a><span>'.$breadcrumb_separator.'</span></li>';
					}
					
				else if( is_tax())
					{
						$queried_object = get_queried_object();
						$term_name = $queried_object->name;				
						
						$html .= '<li><a title="Home" href="'.get_bloginfo('home').'">Home</a></li>';
						$html .= '<li><span>'.$breadcrumb_separator.'</span><a href="#">'.$term_name.'</a><span>'.$breadcrumb_separator.'</span></li>';
					}
					
				else if(is_category())
					{
						
						$current_cat_id = get_query_var('cat');
						$parent_cat_links = get_category_parents( $current_cat_id, true, $breadcrumb_separator );
		
						$html .= '<li><a title="Home" href="'.get_bloginfo('home').'">Home</a></li>';
						$html .= '<li><span>'.$breadcrumb_separator.'</span>'.$parent_cat_links.'</li>';
					}
					
				else if(is_tag())
					{
						
						$current_tag_id = get_query_var('tag_id');
						$current_tag = get_tag($current_tag_id);	
						$current_tag_name = $current_tag->name;				
									
						$current_tag_link = get_tag_link($current_tag_id);;				
						//$parent_cat_links = get_category_parents( $current_cat_id, true, $breadcrumb_separator );
		
						$html .= '<li><a title="Home" href="'.get_bloginfo('home').'">Home</a><span>'.$breadcrumb_separator.'</span></li>';			
						$html .= '<li><a title="Home" href="'.$current_tag_link.'">'.$current_tag_name.'</a><span>'.$breadcrumb_separator.'</span></li>';
	
					}			
					
				else if(is_author())
					{
		
						$html .= '<li><a title="Home" href="'.get_bloginfo('home').'">Home</a></li>';
						$html .= '<li><span>'.$breadcrumb_separator.'</span><a href="'.esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ).'">'.get_the_author().'</a></li>';
					}
					
				else if(is_search())
					{
		
						$current_query = sanitize_text_field(get_query_var('s'));
		
						$html .= '<li><a title="Home" href="'.get_bloginfo('home').'">Home</a></li>';
						$html .= '<li><span>'.$breadcrumb_separator.'</span><a href="#">'.$current_query.'</a><span>'.$breadcrumb_separator.'</span></li>';
					}			

				else if(is_404())
					{
		
						$html .= '<li><a title="Home" href="'.get_bloginfo('home').'">Home</a></li>';
						$html .= '<li><span>'.$breadcrumb_separator.'</span><a href="#">404</a></li>';
					}
					
				else
					{
						$html .= '';
					}								
					
									
					
					
				$html .= '</ul>';
		
				$html .= '</div>';

				return $html;

	
			}
	
			
	}
<?php	


if ( ! defined('ABSPATH')) exit; // if direct access 



	if(empty($_POST['breadcrumb_hidden']))
		{
	
			$breadcrumb_text = get_option( 'breadcrumb_text' );	
			$breadcrumb_separator = get_option( 'breadcrumb_separator' );				
			
		}
	else
		{	
			if($_POST['breadcrumb_hidden'] == 'Y') {
				//Form data sent
				
				$breadcrumb_text = sanitize_text_field($_POST['breadcrumb_text']);
				update_option('breadcrumb_text', $breadcrumb_text);		

				$breadcrumb_separator = sanitize_text_field($_POST['breadcrumb_separator']);
				update_option('breadcrumb_separator', $breadcrumb_separator);			
		
		
		
				?>
				<div class="updated"><p><strong><?php _e('Changes Saved.' ); ?></strong></p></div>
		
				<?php
				} 
		}
?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".__(breadcrumb_plugin_name.' Settings')."</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="breadcrumb_hidden" value="Y">
        <?php settings_fields( 'breadcrumb_plugin_options' );
				do_settings_sections( 'breadcrumb_plugin_options' );
			
		?>

    <div class="para-settings up-paratheme-settings">
    
        <ul class="tab-nav">
            <li nav="1" class="nav1 active">Options</li>
            <li nav="2" class="nav2">Short-Codes</li>
            <li nav="3" class="nav3">Help & Upgrade</li>
        </ul> <!-- tab-nav end -->   
    
		<ul class="box">
            <li style="display: block;" class="box1 tab-box active">
            
				<div class="option-box">
                    <p class="option-title">Breadcrumb Text</p>
                    <p class="option-info"></p>
                    <input type="text" name="breadcrumb_text" value="<?php if(!empty($breadcrumb_text)) echo $breadcrumb_text; ?>" />
                </div>  
				 
                
				<div class="option-box">
                    <p class="option-title">Breadcrumb Separator</p>
                    <p class="option-info">Link Separator, ex: &raquo;</p>
                    <input type="text" name="breadcrumb_separator" value="<?php if(!empty($breadcrumb_separator)) echo $breadcrumb_separator; ?>" />
                </div>                 
				                
                
                
                
                
                
				            
            
				
				      
				 
				        
                
                
                    
            
            </li>
        
            <li style="display: none;" class="box2 tab-box">
				
				<div class="option-box">
                    <p class="option-title">Short-code for php file</p>
                    <p class="option-info">Short-code inside .php files for themes.</p>
                    
                    <pre>&#60;?php<br />echo do_shortcode( '&#91;breadcrumb&#93;' ); <br />?&#62;</pre>
                    <pre></pre>

                </div>
				
				<div class="option-box">
                    <p class="option-title">Short-code for content</p>
                    <p class="option-info">Short-code inside content anywhere inside content.</p>		
                    <pre>[breadcrumb]</pre>
                    <pre></pre>

                </div>
                
            </li>
            
            
			<li style="display: none;" class="box3 tab-box">
				
				<div class="option-box">
                    <p class="option-title">Need Help ?</p>
                    <p class="option-info">Feel free to Contact with any issue for this plugin, Ask any question via forum <a href="<?php echo breadcrumb_qa_url; ?>"><?php echo breadcrumb_qa_url; ?></a> <strong style="color:#139b50;">(free)</strong><br />
                    
                    

	<?php
    
    $breadcrumb_customer_type = get_option('breadcrumb_customer_type');
    $breadcrumb_version = get_option('breadcrumb_version');
    

    if($breadcrumb_customer_type=="free")
        {
    
            echo 'You are using <strong> '.$breadcrumb_customer_type.' version  '.$breadcrumb_version.'</strong> of <strong>'.breadcrumb_plugin_name.'</strong>, To get more feature you could try our premium version. ';
            
            echo '<a href="'.breadcrumb_pro_url.'">'.breadcrumb_pro_url.'</a>';
            
        }
    elseif($breadcrumb_customer_type=="pro")
        {
    
            echo 'Thanks for using <strong> premium version  '.$breadcrumb_version.'</strong> of <strong>'.breadcrumb_plugin_name.'</strong> ';	
            
            
        }
    
     ?>       

                    
                    </p>
                    

                </div>

           
				<div class="option-box">
                    <p class="option-title">Submit Reviews...</p>
                    <p class="option-info">We are working hard to build some awesome plugins for you and spend thousand hour for plugins. we wish your three(3) minute by submitting five star reviews at wordpress.org. if you have any issue please submit at forum.</p>
                	<img class="breadcrumb-pro-pricing" src="<?php echo breadcrumb_plugin_url."css/five-star.png";?>" /><br />
                    <a target="_blank" href="<?php echo breadcrumb_wp_reviews; ?>">
                		<?php echo breadcrumb_wp_reviews; ?>
               		</a>
                    
                    
                    
                </div>
           
				<div class="option-box">
                    <p class="option-title">Please Share</p>
                    <p class="option-info">If you like this plugin please share with your social share network.</p>
                    <?php
                    
						echo breadcrumb_share_plugin();
					?>
                </div>
           
           
           
           	</li>
            
			

            
            
        </ul>
    
    
		
    </div>






<p class="submit">
                    <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes' ) ?>" />
                </p>
		</form>


</div> <!-- end wrap -->

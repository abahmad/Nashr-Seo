<form action="" method="post" enctype="multipart/form-data">
    <table class="form-table">
    <tr>
       
        <th colspan="2"><h1><?php  echo  __('General Settings','mnbaa-seo'); ?></h1></th>
        </tr>
   
          <tr>
			<th>
			 <?php  echo  __('Upgrade to full version','mnbaa-seo'); ?>
			</th>
			<td>
				 <?php  $version=get_option('mnbaa_seo_private_update'); ?>
				<input type="checkbox"  id="version" name="mnbaa_seo_private_update"  value="<?php echo $version ;?>" <?php echo ($version=='TRUE') ?'checked' : '' ?>/>
			</td>
         </tr>   
         
        <tr>
      
        <th colspan="2"><h1><?php  echo  __('Posts and pages which seo available to them','mnbaa-seo'); ?></h1></th>
        </tr>
        <?php  
        $post_types = get_post_types(array('public'=>'ture'));
		$screens_option = json_decode(get_option('mnbaa_seo_screens'));
		?>
        
      
         
        <tr>
			<th>
			 <?php  echo  __('Select all','mnbaa-seo'); ?>
			</th>
			<td>
				<input type="checkbox" name="sample" class="selectall" <?php if(sizeof($screens_option)== sizeof($post_types)) echo "checked"; ?> />
			</td>
         </tr>   
        
        <?php foreach ( $post_types as $post_type ) {?>
        <tr>
			<th>
			 <?php echo $post_type ; ?>	
			</th>
			<td>
				<input type="checkbox" name="screens[]" value="<?php echo $post_type ; ?>" <?php if (($screens_option) && in_array($post_type, $screens_option)) echo "checked" ;  ?>>
			</td>
         </tr>   
		<?php
		 }  
		 ?>	
	</table><p class="submit">
  

	<input type="submit" name="Submit" id="button" value="<?php echo  __('Save','mnbaa-seo'); ?>" class="button button-primary" /></p>
    </table>
    </form>
 
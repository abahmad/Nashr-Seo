<form action="" method="post" enctype="multipart/form-data">
    <table class="form-table">
	    <tr>
	        <th colspan="2"><h1><?php  echo __('General Settings', 'mnbaa-seo'); ?></h1></th>
	     </tr>
     	<tr>
			<th>
			 <?php  echo __('License Key', 'mnbaa-seo'); ?>
			</th>
			<td>
				<input type="text" value="<?php echo get_option('license_key');?>" name="license_key" />
			</td>
		</tr>
		
	</table>
	<p class="submit">
  

	<input type="submit" name="Submit" id="button" value="<?php echo  __('Save','mnbaa-seo'); ?>" class="button button-primary" /></p>
</form>
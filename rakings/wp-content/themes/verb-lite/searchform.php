<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package themely framework
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="assistive-text"><?php _e( 'Search', 'verb-lite' ); ?></label>
		<div class="input-group">
			<input type="text" class="field form-control" name="s" id="s" value="<?php echo get_search_query() ?>" placeholder="<?php esc_attr_e( 'Search &hellip;', 'verb-lite' ); ?>" />
			<span class="input-group-btn">
				<input type="submit" class="submit btn btn-primary" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'verb-lite' ); ?>" />
			</span>
		</div>
	</form>

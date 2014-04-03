<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" placeholder="内容搜索" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
		<input type="submit" value="搜索">
	</label>
</form>
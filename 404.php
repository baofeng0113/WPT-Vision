<?php get_header(); ?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span9">
            <div class="alert alert-error">
                无法找到该文件，请确认您所输入的网址是否正确！您可以点击<b><a href="<?php echo esc_url( home_url( '/' ) ); ?>">此处</a></b>返回网站首页。
            </div>
            <div class="search">
                <?php get_search_form(); ?>
            </div>
        </div>
        <div class="span3">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
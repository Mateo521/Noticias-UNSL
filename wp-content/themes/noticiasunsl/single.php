<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
 
get_header(); ?>
 
<div>
    <main>
        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();
        ?>
            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->
             
            <div class="entry-content">
                <?php
                    the_content();
                ?>
            </div><!-- .entry-content -->
 
    <?php
            // End of the loop.
        endwhile;
        ?>
 
    </main><!-- .site-main -->
 
</div><!-- .content-area -->
 
<?php get_footer(); ?>
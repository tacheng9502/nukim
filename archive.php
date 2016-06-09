<?php get_header();?>
	<div class="content">
        <div class="choose">
        <ul class="choose_c">
			<?php 
			$categories = get_categories(array('child_of'=>16));
			foreach($categories as $category){?>
				<li>
					<input type="checkbox" id="cat_<?php echo $category->slug?>" name="class">
					<label for="cat_<?php echo $category->slug?>"><?php echo $category->name?></label>
				</li>
			<?php }	?>
        </ul>           
        <ul class="choose_t">
			<?php
			$tags = get_tags();
			foreach($tags as $tag){?>
				<li>
					<input type="checkbox" id="cat_<?php echo $tag->slug?>" name="class">
					<label for="cat_<?php echo $tag->slug?>"><?php echo $tag->name?></label>
				</li>
			<?php }	?>
        </ul> 
        </div>    
		<div class="class_content">
			<ul>
			<?php
			$query = new WP_Query('posts_per_page=-1');
			while ( $query->have_posts() ) : $query->the_post(); ?>
			<?php
				$categories = get_the_category();
				$i = 0;
				$str_category = '';
				foreach($categories as $category){
					$i++;
					$str_category .= $category->name;
					if($i != count($categories)) $str_category .= ',';
				}
				
				$tags = get_the_tags();
				$i = 0;
				$str_tag = '';
				foreach($tags as $tag){
					$i++;
					$str_tags .= $tag->name;
					if($i != count($tags)) $str_tag .= ',';
				}
			?>
				<li data-catgory="<?php echo $str_category?>" data-tag="<?php echo $str_tag?>"><p><?php the_time('y/m/d')?></p><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
			<?php endwhile ?>
			</ul>
		</div>
    </div>
<?php get_footer();?>
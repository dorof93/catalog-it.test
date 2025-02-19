<?php
use \Project\Helper;
?>
<div class="section">
	<div class="section__container">
		<h1 class="title section__title">
			<?php echo $title; ?>
		</h1>
        <ul class="list">
            <?php foreach ($cats as $cat) { ?>
                <li 
                    class="list__item list__item_cat-marker" 
                    style="background-image: url(<?php echo Helper::get_pic_link($cat['icon'], '/project/assets/images/cat_icon_default.png') ?>)"
                >
                    <a href="/category/<?php echo $cat['id']; ?>" class="list__link">
                        <?php echo $cat['name']; ?>
                    </a>
                </li>
            <?php } ?> 
        </ul>
	</div>
</div>
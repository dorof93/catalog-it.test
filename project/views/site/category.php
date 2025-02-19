<?php
use \Project\Helper;
?>
<div class="section">
	<div class="section__container">
		<h1 class="title section__title">
			<?php echo $title; ?>
		</h1>
        <div class="site-list">
            <?php foreach ($sites as $site) { ?>
				<div class="site">
					<p class="site__screen">
						<a href="<?php echo $site['domain'] ?>" class="site__link site__link_img">
                            <img 
                                src="<?php echo Helper::get_pic_link($site['screen'], '/project/assets/images/site_screen_default.gif') ?>" 
                                class="site__img"
                                alt=""
                            >
                        </a>
					</p>
					<p class="site__name">
						<a href="<?php echo $site['domain'] ?>" class="site__link">
                            <?php echo $site['name'] ?>
                        </a>
					</p>
					<p class="site__description">
                        <?php echo $site['description'] ?>
					</p>
					<p class="site__domain">
						<a href="<?php echo $site['domain'] ?>" class="site__link">
                            <?php echo parse_url($site['domain'], PHP_URL_HOST) ?>
                        </a>
					</p>
				</div>
			<? } ?>
		</div>
	</div>
</div>
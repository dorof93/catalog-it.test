<div class="section">
	<div class="section__container">
		<h1 class="title">
			<?php echo $title; ?>
		</h1>
        <form class="form" method="POST" action="/add_form_handler/" enctype="multipart/form-data">
            <div class="form__field">
                <label class="form__label">Название сайта</label>
                <input onchange="checkInput(this)" required minlength="3" class="form__input" name="name" placeholder="Сайт об IT">
                <div class="form__error">
                    <div class="form__error-marker">!</div>
                    <div class="form__error-text">Пожалуйста, введите корректное название</div>
                    <div class="form__error-counter"></div>
                </div>
            </div>
            <div class="form__field">
                <label class="form__label">Домен</label>
                <input onchange="checkInput(this)" required class="form__input" name="domain" data-validate="link" placeholder="https://site.com/">
                <div class="form__error">
                    <div class="form__error-marker">!</div>
                    <div class="form__error-text">Пожалуйста, введите корректный домен</div>
                    <div class="form__error-counter"></div>
                </div>
            </div>
            <div class="form__field form__file">
                <label class="form__label">Скрин главной страницы</label>
                <input class="form__input" name="screenfile[]" type="file">
            </div>
            <div class="form__field form__select">
                <label class="form__label">Категория</label>
                <select name="cat_id">
                    <?php foreach ($cats as $cat) { ?>
                        <option value="<?php echo $cat['id'] ?>">
                            <?php echo $cat['name'] ?>
                        </option>
                    <?php } ?> 
                </select>
            </div>
            <div class="form__field form__field_full">
                <label class="form__label">Описание</label>
                <textarea class="form__textarea" name="description" placeholder="Введите описательный текст"></textarea>
                <div class="form__error">
                    <div class="form__error-marker">!</div>
                    <div class="form__error-text"></div>
                    <div class="form__error-counter"></div>
                </div>
            </div>
            <div class="form__button">
                <button class="button">Добавить</button>
            </div>
        </form>
    </div>
</div>
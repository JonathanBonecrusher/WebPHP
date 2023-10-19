  <main>
    <?=$nav?>
    <section class="lot-item container">
      <h2><?= $lots['name']?></h2>
      <div class="lot-item__content">
        <div class="lot-item__left">
          <div class="lot-item__image">
            <img src="<?=$lots['picture']?>" width="730" height="548" alt="Сноуборд">
          </div>
          <p class="lot-item__category">Категория: <span><?=$lots['name']?></span></p>
          <p class="lot-item__description"><?=$lots['description']?></p>
        </div>
        <div class="lot-item__right">
          <div class="lot-item__state">
          <?php $time_end = get_dt_range($lots['date_end']); ?>
            <div class="lot__timer timer <?php if ($time_end[0] < 24): ?> timer--finishing <?php endif; ?>">
              <?= $time_end[0] ?>:<?= $time_end[1] ?>
            </div>
            <div class="lot-item__cost-state">
              <div class="lot-item__rate">
                <span class="lot-item__amount">Текущая цена</span>
                <span class="lot-item__cost"><?=$lots['start_price']?></span>
              </div>
              <div class="lot-item__min-cost">
                Мин. ставка <span>12 000 р</span>
              </div>
            </div>
            <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post" autocomplete="off">
              <p class="lot-item__form-item form__item form__item--invalid">
                <label for="cost">Ваша ставка</label>
                <input id="cost" type="text" name="cost" placeholder="12 000">
                <span class="form__error">Введите наименование лота</span>
              </p>
              <button type="submit" class="button">Сделать ставку</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
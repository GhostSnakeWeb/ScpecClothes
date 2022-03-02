<form action="<?php echo home_url( '/' ) ?>" role="search" method="get" class="search-form">
    <input name="s" id="s" placeholder="Найти товар" value="<?php echo get_search_query() ?>" type="text" class="search-form__text"/>
    <input type="submit" value="" class="search-form__button"/>
</form>
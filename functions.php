<?php
/**
 * spec-clothes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package spec-clothes
 */

// Подключение стилей и шрифтов
function spec_styles_and_fonts()
{
    // СТИЛИ
    wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('slick', get_template_directory_uri() . '/assets/plugins/slick/slick.css');
    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/assets/plugins/slick/slick-theme.css');

    // ШРИФТЫ
    wp_enqueue_style('spec-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto&display=swap');
}

// Подключение скриптов
function spec_scripts()
{
    // отменяем зарегистрированный jQuery
    wp_deregister_script('jquery-core');
    wp_deregister_script('jquery');
    // регистрируем
    wp_register_script('jquery-core', get_template_directory_uri() . '/assets/plugins/jquery-3.4.1.min.js', false, null, true);
    wp_register_script('jquery', false, array('jquery-core'), null, true);
    // подключаем
    wp_enqueue_script('jquery');

    wp_enqueue_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), false, true);
    wp_enqueue_script('slick', get_template_directory_uri() . "/assets/plugins/slick/slick.min.js", array('jquery'), false, true);
    wp_enqueue_script('mixItUp', get_template_directory_uri() . "/assets/plugins/mixitup/mixitup.min.js", array('jquery'), false, true);
    wp_enqueue_script('main', get_template_directory_uri() . "/assets/js/main.js", array('jquery'), false, true);

    wp_enqueue_script('fontawesome', 'https://use.fontawesome.com/15f7662d5a.js', array(), false, false);
}

add_action('wp_enqueue_scripts', 'spec_styles_and_fonts');
add_action('wp_footer', 'spec_scripts');

// Регистрация нового типа записи
add_action('init', 'register_post_types');
function register_post_types()
{
    register_post_type('slider', array(
        'labels' => array(
            'name' => 'Слайдер', // Основное название типа записи
            'singular_name' => 'Слайдер', // отдельное название записи типа
            'add_new' => 'Добавить слайд',
            'add_new_item' => 'Добавить новый слайд',
            'edit_item' => 'Редактировать слайд',
            'new_item' => 'Новый слайд',
            'view_item' => 'Посмотреть слайд',
            'search_items' => 'Найти слайд',
            'not_found' => 'Слайдов не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Слайдер'
        ),
        'public' => false,
        'publicly_queryable' => false,
        'show_ui' => true,
        'exclude_from_search' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false, // Иерархия. Главный раздел работ, подразделы и т.д.
        'menu_position' => 4,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array('title', 'excerpt'),
    ));
    register_post_type('services', array(
        'labels' => array(
            'name' => 'Услуги', // Основное название типа записи
            'singular_name' => 'Услуги', // отдельное название записи типа
            'add_new' => 'Добавить услугу',
            'add_new_item' => 'Добавить новую услугу',
            'edit_item' => 'Редактировать услугу',
            'new_item' => 'Новая услуга',
            'view_item' => 'Посмотреть услугу',
            'search_items' => 'Найти услугу',
            'not_found' => 'Услуг не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Услуги'
        ),
        'public' => false,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false, // Иерархия. Главный раздел работ, подразделы и т.д.
        'menu_position' => 5,
        'menu_icon' => 'dashicons-thumbs-up',
        'show_in_rest' => true,
        'supports' => array('title', 'excerpt')
    ));
    register_post_type('products', array(
        'labels' => array(
            'name' => 'Товары', // Основное название типа записи
            'singular_name' => 'Товары', // отдельное название записи типа
            'add_new' => 'Добавить товар',
            'add_new_item' => 'Добавить новый товар',
            'edit_item' => 'Редактировать товар',
            'new_item' => 'Новый товар',
            'view_item' => 'Посмотреть товар',
            'search_items' => 'Найти товар',
            'not_found' => 'Товаров не найдено',
            'parent_item_colon' => '',
            'menu_name' => 'Товары'
        ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false, // Иерархия. Главный раздел работ, подразделы и т.д.
        'menu_position' => 5,
        'menu_icon' => 'dashicons-cart',
        'show_in_rest' => true,
        'taxonomies' => array('category'),
        'supports' => array('title', 'custom-fields', 'editor', 'thumbnail')
    ));
}

// Дополнительные возможности
add_action('after_setup_theme', 'theme_register_events');
function theme_register_events()
{
    add_theme_support('post-thumbnails', array('products')); // Превью
    register_nav_menu('top', 'Меню в шапке и подвале');
    add_image_size('slider_img', 1920, 650, true); // Размер изображения для слайдера
    add_image_size('service_icon', 55, 45, true); // Размер изображения для услуг
    add_image_size('preview_product_slider', 217, 184, true); // Размер изображения для превью картинок
}

// Регистрация кастомного лого
add_action('after_setup_theme', 'custom_logo');
function custom_logo()
{
    add_theme_support('custom-logo', array(
        'width' => 'auto',
        'height' => 92,
        'flex-width' => true,
        'flex-height' => true,
        'header-text' => array('СпецОлимп')
    ));
}

/**
 * Возможность загружать изображения для терминов (элементов таксономий: категории, метки).
 *
 * Пример получения ID и URL картинки термина:
 *     $image_id = get_term_meta( $term_id, '_thumbnail_id', 1 );
 *     $image_url = wp_get_attachment_image_url( $image_id, 'thumbnail' );
 *
 * @author: Kama http://wp-kama.ru
 *
 * @version 3.0
 */
if (is_admin() && !class_exists('Term_Meta_Image')) {

    // init
    //add_action('current_screen', 'Term_Meta_Image_init');
    add_action('admin_init', 'Term_Meta_Image_init');
    function Term_Meta_Image_init()
    {
        $GLOBALS['Term_Meta_Image'] = new Term_Meta_Image();
    }

    class Term_Meta_Image
    {

        // для каких таксономий включить код. По умолчанию для всех публичных
        static $taxes = []; // пример: array('category', 'post_tag');

        // название мета ключа
        static $meta_key = '_thumbnail_id';
        static $attach_term_meta_key = 'img_term';

        // URL пустой картинки
        static $add_img_url = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkAQMAAABKLAcXAAAABlBMVEUAAAC7u7s37rVJAAAAAXRSTlMAQObYZgAAACJJREFUOMtjGAV0BvL/G0YMr/4/CDwY0rzBFJ704o0CWgMAvyaRh+c6m54AAAAASUVORK5CYII=';

        public function __construct()
        {
            // once
            if (isset($GLOBALS['Term_Meta_Image']))
                return $GLOBALS['Term_Meta_Image'];

            $taxes = self::$taxes ? self::$taxes : get_taxonomies(['public' => true], 'names');

            foreach ($taxes as $taxname) {
                add_action("{$taxname}_add_form_fields", [$this, 'add_term_image'], 10, 2);
                add_action("{$taxname}_edit_form_fields", [$this, 'update_term_image'], 10, 2);
                add_action("created_{$taxname}", [$this, 'save_term_image'], 10, 2);
                add_action("edited_{$taxname}", [$this, 'updated_term_image'], 10, 2);

                add_filter("manage_edit-{$taxname}_columns", [$this, 'add_image_column']);
                add_filter("manage_{$taxname}_custom_column", [$this, 'fill_image_column'], 10, 3);
            }
        }

        ## поля при создании термина
        public function add_term_image($taxonomy)
        {
            wp_enqueue_media(); // подключим стили медиа, если их нет

            add_action('admin_print_footer_scripts', [$this, 'add_script'], 99);
            $this->css();
            ?>
            <div class="form-field term-group">
                <label><?php _e('Image', 'default'); ?></label>
                <div class="term__image__wrapper">
                    <a class="termeta_img_button" href="#">
                        <img src="<?php echo self::$add_img_url ?>" alt="">
                    </a>
                    <input type="button" class="button button-secondary termeta_img_remove"
                           value="<?php _e('Remove', 'default'); ?>"/>
                </div>

                <input type="hidden" id="term_imgid" name="term_imgid" value="">
            </div>
            <?php
        }

        ## поля при редактировании термина
        public function update_term_image($term, $taxonomy)
        {
            wp_enqueue_media(); // подключим стили медиа, если их нет

            add_action('admin_print_footer_scripts', [$this, 'add_script'], 99);

            $image_id = get_term_meta($term->term_id, self::$meta_key, true);
            $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'thumbnail') : self::$add_img_url;
            $this->css();
            ?>
            <tr class="form-field term-group-wrap">
                <th scope="row"><?php _e('Image', 'default'); ?></th>
                <td>
                    <div class="term__image__wrapper">
                        <a class="termeta_img_button" href="#">
                            <?php echo '<img src="' . $image_url . '" alt="">'; ?>
                        </a>
                        <input type="button" class="button button-secondary termeta_img_remove"
                               value="<?php _e('Remove', 'default'); ?>"/>
                    </div>

                    <input type="hidden" id="term_imgid" name="term_imgid" value="<?php echo $image_id; ?>">
                </td>
            </tr>
            <?php
        }

        public function css()
        {
            ?>
            <style>
                .termeta_img_button {
                    display: inline-block;
                    margin-right: 1em;
                }

                .termeta_img_button img {
                    display: block;
                    float: left;
                    margin: 0;
                    padding: 0;
                    min-width: 100px;
                    max-width: 150px;
                    height: auto;
                    background: rgba(0, 0, 0, .07);
                }

                .termeta_img_button:hover img {
                    opacity: .8;
                }

                .termeta_img_button:after {
                    content: '';
                    display: table;
                    clear: both;
                }
            </style>
            <?php
        }

        ## Add script
        public function add_script()
        {
            // выходим если не на нужной странице таксономии
            //$cs = get_current_screen();
            //if( ! in_array($cs->base, array('edit-tags','term')) || ! in_array($cs->taxonomy, (array) $this->for_taxes) )
            //  return;

            $title = __('Featured Image', 'default');
            $button_txt = __('Set featured image', 'default');
            ?>
            <script>
                jQuery(document).ready(function ($) {
                    var frame,
                        $imgwrap = $('.term__image__wrapper'),
                        $imgid = $('#term_imgid');

                    // добавление
                    $('.termeta_img_button').click(function (ev) {
                        ev.preventDefault();

                        if (frame) {
                            frame.open();
                            return;
                        }

                        // задаем media frame
                        frame = wp.media.frames.questImgAdd = wp.media({
                            states: [
                                new wp.media.controller.Library({
                                    title: '<?php echo $title ?>',
                                    library: wp.media.query({type: 'image'}),
                                    multiple: false,
                                    //date:   false
                                })
                            ],
                            button: {
                                text: '<?php echo $button_txt ?>', // Set the text of the button.
                            }
                        });

                        // выбор
                        frame.on('select', function () {
                            var selected = frame.state().get('selection').first().toJSON();
                            if (selected) {
                                $imgid.val(selected.id);
                                $imgwrap.find('img').attr('src', selected.sizes.thumbnail.url);
                            }
                        });

                        // открываем
                        frame.on('open', function () {
                            if ($imgid.val()) frame.state().get('selection').add(wp.media.attachment($imgid.val()));
                        });

                        frame.open();
                    });

                    // удаление
                    $('.termeta_img_remove').click(function () {
                        $imgid.val('');
                        $imgwrap.find('img').attr('src', '<?php echo self::$add_img_url ?>');
                    });
                });
            </script>

            <?php
        }

        ## Добавляет колонку картинки в таблицу терминов
        public function add_image_column($columns)
        {
            // fix column width
            add_action('admin_notices', function () {
                echo '<style>.column-image{ width:50px; text-align:center; }</style>';
            });

            // column without name
            return array_slice($columns, 0, 1) + ['image' => ''] + $columns;
        }

        public function fill_image_column($string, $column_name, $term_id)
        {

            if ('image' === $column_name && $image_id = get_term_meta($term_id, self::$meta_key, 1)) {
                $string = '<img src="' . wp_get_attachment_image_url($image_id, 'thumbnail') . '" width="50" height="50" alt="" style="border-radius:4px;" />';
            }

            return $string;
        }

        ## Save the form field
        public function save_term_image($term_id, $tt_id)
        {
            if (isset($_POST['term_imgid']) && $attach_id = (int)$_POST['term_imgid']) {
                update_term_meta($term_id, self::$meta_key, $attach_id);
                update_post_meta($attach_id, self::$attach_term_meta_key, $term_id);
            }
        }

        ## Update the form field value
        public function updated_term_image($term_id, $tt_id)
        {
            if (!isset($_POST['term_imgid']))
                return;

            $cur_term_attach_id = (int)get_term_meta($term_id, self::$meta_key, 1);

            if ($attach_id = (int)$_POST['term_imgid']) {
                update_term_meta($term_id, self::$meta_key, $attach_id);
                update_post_meta($attach_id, self::$attach_term_meta_key, $term_id);

                if ($cur_term_attach_id != $attach_id)
                    wp_delete_attachment($cur_term_attach_id);
            } else {
                if ($cur_term_attach_id)
                    wp_delete_attachment($cur_term_attach_id);

                delete_term_meta($term_id, self::$meta_key);
            }
        }

    }
}

// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
function my_navigation_template($template, $class)
{
    return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

// Решение проблемы для пагинации (ошибка 404)
function remove_page_from_query_string($query_string)
{
    if ($query_string['name'] == 'page' && isset($query_string['page'])) {
        unset($query_string['name']);
        list($delim, $page_index) = explode('/', $query_string['page']);
        $query_string['paged'] = $page_index;
    }
    return $query_string;
}
add_filter('request', 'remove_page_from_query_string');

function fix_category_pagination($qs)
{
    if (isset($qs['category_name']) && isset($qs['paged'])) {
        $qs['post_type'] = get_post_types($args = array(
            'public' => true,
            '_builtin' => false
        ));
        array_push($qs['post_type'], 'post');
    }
    return $qs;
}

add_filter('request', 'fix_category_pagination');

function get_breadcrumb() {
    if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<ul class="breadcrumbs"><li class="breadcrumbs__item ">','</li></ul>');
    }
}

add_action( 'template_redirect', function() {
    if( is_category() ){
        $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if (preg_match('/^(https|http|ftp):\/\/([\da-z\.-]+)\.?([a-z\.]{2,6})?\/category\/([\/\w\.-]*)*\/([\/\w\.-]*)*\/?$/', $url)) {
            // Парсим
            $parsed_url = parse_url($url);
            $fragment = isset($parsed_url['path']) ? $parsed_url['path'] : '';
            $host = isset($parsed_url['host']) ? $parsed_url['host'] : '';
            $scheme = isset($parsed_url['scheme']) ? $parsed_url['scheme'] : '';
            $new_fragment = '';
            if (!empty($fragment)) {
                $fragment_parts = explode('/', $fragment);
                // Remove the last item
                $sub_category = array_pop($fragment_parts);
                // Re-assemble the fragment
                $new_fragment = implode('/', $fragment_parts);
            }
            // Re-assemble the url
            $new_url = $scheme . '://' . $host . $new_fragment;
            setcookie("sub_category_after_redirect", $sub_category);
            wp_redirect( $new_url, 301 );
            exit();
        }
    }
} );

// Обрезаем заголовок
// Использование:  trim_title_chars(30, '...');
function trim_title_chars($count, $after) {
    $title = get_the_title();
    if (mb_strlen($title) > $count) $title = mb_substr($title, 0, $count);
    else $after = '';
    echo $title.$after;
}

// Проверка на пустой запрос поиска
add_filter('posts_search', function( $search, \WP_Query $q ) {
    if (!is_admin() && empty($search) && $q->is_search() && $q->is_main_query())
        $search .=" AND 0=1 ";
    return $search;
}, 10, 2);

// Удаляем ненужные пункты меню
add_action('admin_menu', 'remove_menus');
function remove_menus(){
    global $menu;
    $restricted = array(
        __('Posts'),
        __('Links'),
        __('Tools'),
        __('Comments'),
    );
    end ($menu);
    while (prev($menu)){
        $value = explode(' ', $menu[key($menu)][0]);
        if( in_array( ($value[0] != NULL ? $value[0] : "") , $restricted ) ){
            unset($menu[key($menu)]);
        }
    }
}

// Лого на странице логина
add_action('login_head', 'my_custom_login_logo');
function my_custom_login_logo(){
    echo '<style type="text/css">
	h1 a { background-image:url('.get_bloginfo('template_directory').'/assets/img/logo.png) !important; }
	</style>';
}

/* редирект с login на /wp-login.php  и с admin на /wp-admin */
add_action('template_redirect', 'kama_login_redirect');
function kama_login_redirect(){
    if( strpos($_SERVER['REQUEST_URI'], 'login')!==false )
        $loc = '/wp-login.php';
    elseif( strpos($_SERVER['REQUEST_URI'], 'admin')!==false )
        $loc = '/wp-admin/';
    if( $loc ){
        header( 'Location: '.get_option('site_url').$loc, true, 303 );
        exit;
    }
}

// Редактирумые элементы Внешний вид -> Настроить
add_action('customize_register', function($customizer) {
    $customizer->add_section(
        'section_one', array(
            'title' => 'Настройки сайта',
            'description' => 'Кастомизация полей шапки, подвала и прочих данных',
            'priority' => 11,
        )
    );
    $customizer->add_setting('phone',
        array('default' => '8 (922) 863-98-20')
    );
    $customizer->add_setting('address',
        array('default' => 'с. Южный Урал, Пушкина 5')
    );
    $customizer->add_setting('delivery_info',
        array('default' => 'Доставка по Оренбургу')
    );
    $customizer->add_setting('vk_link',
        array('default' => 'https://vk.com/')
    );
    $customizer->add_setting('insta_link',
        array('default' => 'https://www.instagram.com/')
    );
    $customizer->add_setting('map_link',
        array('default' => 'https://2gis.ru/orenburg/firm/70000001035546202')
    );
    $customizer->add_setting('work_time',
        array('default' => '10:00-18:00')
    );

    $customizer->add_control('phone', array(
            'label' => 'Телефон',
            'section' => 'section_one',
            'type' => 'textarea',
        )
    );
    $customizer->add_control('address', array(
            'label' => 'Адрес',
            'section' => 'section_one',
            'type' => 'textarea',
        )
    );
    $customizer->add_control('delivery_info', array(
            'label' => 'Информация по доставке',
            'section' => 'section_one',
            'type' => 'textarea',
        )
    );
    $customizer->add_control('work_time', array(
            'label' => 'Время работы',
            'section' => 'section_one',
            'type' => 'textarea',
        )
    );

    $customizer->add_control('map_link', array(
            'label' => 'Ссылка на карту',
            'section' => 'section_one',
            'type' => 'text',
        )
    );
    $customizer->add_control('vk_link', array(
            'label' => 'Ссылка на группу в VK',
            'section' => 'section_one',
            'type' => 'text',
        )
    );
    $customizer->add_control('insta_link', array(
            'label' => 'Ссылка на Instagram',
            'section' => 'section_one',
            'type' => 'text',
        )
    );
});

// Убираем "Рубрика" из заголовка страницы
add_filter( 'get_the_archive_title', 'artabr_remove_name_cat' );
function artabr_remove_name_cat( $title ){
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	}
	return $title;
}

// Отключаем подсказки при неверном входе
add_filter('login_errors', create_function('$a', "return null;"));

// Убираем мета с версией
function remove_wpversion() {
    return '';
}
add_filter('the_generator', 'remove_wpversion');

// Убираем версию WP в названиях скриптов
function wp_version_js_css($src) {
    if(strpos($src, 'ver=' . get_bloginfo('version')))
        $src = remove_query_arg('ver', $src);
    return $src;
}
add_filter('style_loader_src', 'wp_version_js_css', 9999);
add_filter('script_loader_src', 'wp_version_js_css', 9999);
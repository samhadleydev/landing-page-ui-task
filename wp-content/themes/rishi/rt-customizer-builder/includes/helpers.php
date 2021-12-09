<?php

/**
 * General purpose helpers
 *
 * 
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @package Rishi
 */

add_filter('body_class', function ($classes) {

    $classes[] = 'rt-loading';

    if (function_exists('is_product_category')) {
        if (is_product_category() || is_product_tag()) {
            $classes[] = 'woocommerce-archive';
        }

        if (is_product() || is_woocommerce() || is_cart()) {
            if (get_theme_mod('has_ajax_add_to_cart', 'no') === 'yes') {
                $classes[] = 'rt-ajax-add-to-cart';
            }
        }
    }

    return $classes;
});

add_filter('llms_get_theme_default_sidebar', function ($id) {
    return 'sidebar-1';
});

add_action(
    'dynamic_sidebar_before',
    function () {
        ob_start();
    }
);

add_action(
    'dynamic_sidebar_after',
    function () {
        $text = str_replace(
            'textwidget',
            'textwidget entry-content',
            ob_get_clean()
        );

        echo $text;
    }
);

if (!function_exists('rt_customizer_body_attr')) {
    function rt_customizer_body_attr()
    {
        $attrs = [];

        if (get_theme_mod('has_passepartout', 'no') === 'yes') {
            $attrs['data-frame'] = 'default';
        };

        $attrs['data-forms'] = str_replace(
            '-forms',
            '',
            get_theme_mod('forms_type', 'classic-forms')
        );

        $attrs['data-prefix'] = rt_customizer_manager()->screen->get_prefix();
        $attrs['data-header'] = substr(str_replace(
            'rt-custom-',
            '',
            rt_customizer_manager()->header_builder->get_current_section_id()
        ), 0, 6);

        $attrs['data-footer'] = substr(str_replace(
            'rt-custom-',
            '',
            rt_customizer_manager()->footer_builder->get_current_section_id()
        ), 0, 6);

        $footer_render = new Rishi_Footer_Builder_Render();
        $footer_atts = $footer_render->get_current_section()['settings'];

        $reveal_result = [];

        if (rt_customizer_default_akg(
            'has_reveal_effect/desktop',
            $footer_atts,
            false
        )) {
            $reveal_result[] = 'desktop';
        }

        if (rt_customizer_default_akg(
            'has_reveal_effect/tablet',
            $footer_atts,
            false
        )) {
            $reveal_result[] = 'tablet';
        }

        if (rt_customizer_default_akg(
            'has_reveal_effect/mobile',
            $footer_atts,
            false
        )) {
            $reveal_result[] = 'mobile';
        }

        if (count($reveal_result) > 0) {
            $attrs['data-footer'] .= ':reveal';
        }

        return rt_customizer_attr_to_html(array_merge([
            'data-link' => get_theme_mod('content_link_type', 'type-2'),
        ], $attrs, rt_customizer_schema_org_definitions('single', ['array' => true])));
    }
}

/**
 * Get the requested media query.
 *
 * @param string $name Name of the media query.
 */
function rt_get_media_query($name)
{

    // If the theme function doesn't exist, build our own queries.
    $desktop     = apply_filters('rt_desktop_media_query', '(min-width:1025px)');
    $tablet      = apply_filters('rt_tablet_media_query', '(min-width: 703px) and (max-width: 1024px)');
    $mobile      = apply_filters('rt_mobile_media_query', '(max-width:702px)');

    $queries = apply_filters(
        'rt_media_queries',
        array(
            'desktop'     => $desktop,
            'tablet'      => $tablet,
            'mobile'      => $mobile,
        )
    );

    return $queries[$name];
}

if (!function_exists('rt_customizer_assert_args')) {
    function rt_customizer_assert_args($args, $fields = [])
    {
        foreach ($fields as $single_field) {
            if (
                !isset($args[$single_field])
                ||
                !$args[$single_field]
            ) {
                throw new Error($single_field . ' missing in args!');
            }
        }
    }
}

add_filter('widget_nav_menu_args', function ($nav_menu_args, $nav_menu, $args, $instance) {
    $nav_menu_args['menu_class'] = 'widget-menu';
    return $nav_menu_args;
}, 10, 4);

class Rishi_Walker_Page extends Walker_Page
{
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        if (
            isset($args['item_spacing'])
            &&
            'preserve' === $args['item_spacing']
        ) {
            $t = "\t";
            $n = "\n";
        } else {
            $t = '';
            $n = '';
        }

        $indent  = str_repeat($t, $depth);
        $output .= "{$n}{$indent}<ul class='sub-menu'>{$n}";
    }

    public function start_el(&$output, $page, $depth = 0, $args = array(), $current_page = 0)
    {
        parent::start_el(
            $output,
            $page,
            $depth,
            $args,
            $current_page
        );

        $output = str_replace(
            "</a><ul class='sub-menu'>",
            "~</a><ul class='sub-menu'>",
            $output
        );

        $output = preg_replace('/~~+/', '~', $output);
    }
}

if (!function_exists('rt_customizer_get_with_percentage')) {
    function rt_customizer_get_with_percentage($id, $value)
    {
        $val = get_theme_mod($id, $value);

        if (strpos($value, '%') !== false && is_numeric($val)) {
            $val .= '%';
        }

        return str_replace('%%', '%', $val);
    }
}

if (!function_exists('rt_customizer_main_menu_fallback')) {
    function rt_customizer_main_menu_fallback($args)
    {
        extract($args);

        $list_pages_args = [
            'sort_column'  => 'menu_order, post_title',
            'menu_id'      => 'primary-menu',
            'menu_class'   => 'primary-menu menu',
            'container'    => 'ul',
            'echo'         => false,
            'link_before'  => '',
            'link_after'   => '',
            'before'       => '<ul>',
            'after'        => '</ul>',
            'item_spacing' => 'discard',
            'walker'       => new Rishi_Walker_Page(),
            'title_li'     => '',
            'number'       => 6
        ];

        if (isset($args['rt_customizer_mega_menu'])) {
            $list_pages_args['rt_customizer_mega_menu'] = $args['rt_customizer_mega_menu'];
        }

        $menu = wp_list_pages($list_pages_args);

        $svg = '<span class="child-indicator class"><svg width="8" height="8" viewBox="0 0 15 15"><path d="M2.1,3.2l5.4,5.4l5.4-5.4L15,4.3l-7.5,7.5L0,4.3L2.1,3.2z"/></svg></span>';

        $menu = str_replace(
            '~',
            $svg,
            $menu
        );

        if (empty(trim($menu))) {
            $args['echo'] = false;
            $menu = rt_customizer_link_to_menu_editor($args);
        } else {
            $attrs = '';

            if (!empty($args['menu_id'])) {
                $attrs .= ' id="' . esc_attr($args['menu_id']) . '"';
            }

            if (!empty($args['menu_class'])) {
                $attrs .= ' class="' . esc_attr($args['menu_class']) . '"';
            }

            $menu = "<ul{$attrs}>" . $menu . "</ul>";
        }

        if ($echo) {
            echo $menu;
        }

        return $menu;
    }
}

/**
 * Link to menus editor for every empty menu.
 *
 * @param array  $args Menu args.
 */
if (!function_exists('rt_customizer_link_to_menu_editor')) {
    function rt_customizer_link_to_menu_editor($args)
    {
        if (!current_user_can('manage_options')) {
            return;
        }

        // see wp-includes/nav-menu-template.php for available arguments
        // phpcs:ignore WordPress.PHP.DontExtract.extract_extract
        extract($args);

        $output = '<a class="rt-create-menu" href="' . admin_url('nav-menus.php') . '" target="_blank">' . $before . __('Click here to add a menu &rarr;', 'rishi') . $after . '</a>';

        if (!empty($container)) {
            $output = "<$container class='emptymenu'>$output</$container..>";
        }

        if ($echo) {
            // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            echo wp_kses_post($output);
        }

        return $output;
    }
}

add_filter(
    'rest_post_query',
    function ($args, $request) {
        if (
            isset($request['post_type'])
            &&
            (strpos($request['post_type'], 'ct_forced') !== false)
        ) {
            $post_type = explode(
                ':',
                str_replace('ct_forced_', '', $request['post_type'])
            );

            if ($post_type[0] === 'any') {
                $post_type = get_post_types(['public' => true]);
            }

            $args = [
                'posts_per_page' => $args['posts_per_page'],
                'post_type' => $post_type,
                'paged' => 1,
                's' => $args['s'],
            ];
        }

        if (
            isset($request['post_type'])
            &&
            (strpos($request['post_type'], 'ct_cpt') !== false)
        ) {
            $next_args = [
                'posts_per_page' => $args['posts_per_page'],
                'post_type' => array_diff(
                    get_post_types(['public' => true]),
                    ['post', 'page', 'attachment']
                ),
                'paged' => 1
            ];

            if (isset($args['s'])) {
                $next_args['s'] = $args['s'];
            }

            $args = $next_args;
        }

        return $args;
    },
    10,
    2
);

if (!is_admin()) {
    add_filter('pre_get_posts', function ($query) {
        if ($query->is_search && (is_search()
            ||
            wp_doing_ajax())) {
            if (!empty($_GET['rt_post_type'])) {
                $custom_post_types = rt_customizer_manager()->post_types->get_supported_post_types();

                $allowed_post_types = [];

                $post_types = explode(
                    ':',
                    sanitize_text_field($_GET['rt_post_type'])
                );

                $known_cpts = ['post', 'page'];

                if (get_post_type_object('product')) {
                    $known_cpts[] = 'product';
                }

                foreach ($post_types as $single_post_type) {
                    if (
                        in_array($single_post_type, $custom_post_types)
                        ||
                        in_array($single_post_type, $known_cpts)
                    ) {
                        $allowed_post_types[] = $single_post_type;
                    }
                }

                $query->set('post_type', $allowed_post_types);
            }
        }

        return $query;
    });
}

/**
 * This is a print_r() alternative
 *
 * @param mixed $value Value to debug.
 */
function rt_customizer_print($value)
{
    static $first_time = true;

    if ($first_time) {
        ob_start();
        echo '<style>
		div.ct_print_r {
			max-height: 500px;
			overflow-y: scroll;
			background: #23282d;
			margin: 10px 30px;
			padding: 0;
			border: 1px solid #F5F5F5;
			border-radius: 3px;
			position: relative;
			z-index: 11111;
		}

		div.ct_print_r pre {
			color: #78FF5B;
			background: #23282d;
			text-shadow: 1px 1px 0 #000;
			font-family: Consolas, monospace;
			font-size: 12px;
			margin: 0;
			padding: 5px;
			display: block;
			line-height: 16px;
			text-align: left;
		}

		div.ct_print_r_group {
			background: #f1f1f1;
			margin: 10px 30px;
			padding: 1px;
			border-radius: 5px;
			position: relative;
			z-index: 11110;
		}
		div.ct_print_r_group div.ct_print_r {
			margin: 9px;
			border-width: 0;
		}
		</style>';

        /**
         * Note to code reviewers: This line doesn't need to be escaped.
         * The variable used here has the value escaped properly.
         */
        echo str_replace(array('  ', "\n"), '', ob_get_clean());

        $first_time = false;
    }

    /**
     * Note to code reviewers: This line doesn't need to be escaped.
     * The variable used here has the value escaped properly.
     */
    if (func_num_args() === 1) {
        echo '<div class="ct_print_r"><pre>';
        // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo htmlspecialchars(Rishi_FW_Dumper::dump($value));
        echo '</pre></div>';
    } else {
        echo '<div class="ct_print_r_group">';

        foreach (func_get_args() as $param) {
            rt_customizer_print($param);
        }

        echo '</div>';
    }
}

/**
 * TVar_dumper class.
 * original source: https://code.google.com/p/prado3/source/browse/trunk/framework/Util/TVar_dumper.php
 *
 * TVar_dumper is intended to replace the buggy PHP function var_dump and print_r.
 * It can correctly identify the recursively referenced objects in a complex
 * object structure. It also has a recursive depth control to avoid indefinite
 * recursive display of some peculiar variables.
 *
 * TVar_dumper can be used as follows,
 * <code>
 *   echo TVar_dumper::dump($var);
 * </code>
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id$
 * @package System.Util
 * @since 3.0
 */
class Rishi_FW_Dumper
{
    /**
     * Object
     *
     * @var object objects boj
     */
    private static $_objects;
    /**
     * Output
     *
     * @var string Output output of the dumper.
     */
    private static $_output;
    /**
     * Depth
     *
     * @var int Depth depth
     */
    private static $_depth;

    /**
     * Converts a variable into a string representation.
     * This method achieves the similar functionality as var_dump and print_r
     * but is more robust when handling complex objects such as PRADO controls.
     *
     * @param mixed   $var     Variable to be dumped.
     * @param integer $depth Maximum depth that the dumper should go into the variable. Defaults to 10.
     * @return string the string representation of the variable
     */
    public static function dump($var, $depth = 10)
    {
        self::reset_internals();

        self::$_depth = $depth;
        self::dump_internal($var, 0);

        $output = self::$_output;

        self::reset_internals();

        return $output;
    }

    /**
     * Reset internals.
     */
    private static function reset_internals()
    {
        self::$_output = '';
        self::$_objects = array();
        self::$_depth = 10;
    }

    /**
     * Dump
     *
     * @param object $var var.
     * @param int    $level level.
     */
    private static function dump_internal($var, $level)
    {
        switch (gettype($var)) {
            case 'boolean':
                self::$_output .= $var ? 'true' : 'false';
                break;
            case 'integer':
                self::$_output .= "$var";
                break;
            case 'double':
                self::$_output .= "$var";
                break;
            case 'string':
                self::$_output .= "'$var'";
                break;
            case 'resource':
                self::$_output .= '{resource}';
                break;
            case 'NULL':
                self::$_output .= 'null';
                break;
            case 'unknown type':
                self::$_output .= '{unknown}';
                break;
            case 'array':
                if (self::$_depth <= $level) {
                    self::$_output .= 'array(...)';
                } elseif (empty($var)) {
                    self::$_output .= 'array()';
                } else {
                    $keys = array_keys($var);
                    $spaces = str_repeat(' ', $level * 4);
                    self::$_output .= "array\n" . $spaces . '(';
                    foreach ($keys as $key) {
                        self::$_output .= "\n" . $spaces . "    [$key] => ";
                        self::$_output .= self::dump_internal($var[$key], $level + 1);
                    }
                    self::$_output .= "\n" . $spaces . ')';
                }
                break;
            case 'object':
                $id = array_search($var, self::$_objects, true);

                if (false !== $id) {
                    self::$_output .= get_class($var) . '(...)';
                } elseif (self::$_depth <= $level) {
                    self::$_output .= get_class($var) . '(...)';
                } else {
                    $id = array_push(self::$_objects, $var);
                    $class_name = get_class($var);
                    $members = (array) $var;
                    $keys = array_keys($members);
                    $spaces = str_repeat(' ', $level * 4);
                    self::$_output .= "$class_name\n" . $spaces . '(';
                    foreach ($keys as $key) {
                        $key_display = strtr(
                            trim($key),
                            array("\0" => ':')
                        );
                        self::$_output .= "\n" . $spaces . "    [$key_display] => ";
                        self::$_output .= self::dump_internal(
                            $members[$key],
                            $level + 1
                        );
                    }
                    self::$_output .= "\n" . $spaces . ')';
                }
                break;
        }
    }
}

/**
 * Extract variable from a file.
 *
 * @param string $file_path path to file.
 * @param array  $_extract_variables variables to return.
 * @param array  $_set_variables variables to pass into the file.
 */
if (!function_exists('rt_customizer_get_variables_from_file')) {
    function rt_customizer_get_variables_from_file(
        $file_path,
        array $_extract_variables,
        array $_set_variables = array()
    ) {
        // phpcs:ignore WordPress.PHP.DontExtract.extract_extract
        extract($_set_variables, EXTR_REFS);
        unset($_set_variables);
        require $file_path;

        foreach ($_extract_variables as $variable_name => $default_value) {
            if (isset($$variable_name)) {
                $_extract_variables[$variable_name] = $$variable_name;
            }
        }

        return $_extract_variables;
    }
}

/**
 * Transform ID to title.
 *
 * @param string $id initial ID.
 */
if (!function_exists('rt_customizer_id_to_title')) {
    function rt_customizer_id_to_title($id)
    {
        if (
            function_exists('mb_strtoupper')
            &&
            function_exists('mb_substr')
            &&
            function_exists('mb_strlen')
        ) {
            $id = mb_strtoupper(mb_substr($id, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr(
                $id,
                1,
                mb_strlen($id, 'UTF-8'),
                'UTF-8'
            );
        } else {
            $id = strtoupper(substr($id, 0, 1)) . substr($id, 1, strlen($id));
        }

        return str_replace(['_', '-'], ' ', $id);
    }
}

/**
 * Extract a key from an array with defaults.
 *
 * @param string       $keys 'a/b/c' path.
 * @param array|object $array_or_object array to extract from.
 * @param null|mixed   $default_value defualt value.
 */
if (!function_exists('rt_customizer_default_akg')) {
    function rt_customizer_default_akg($keys, $array_or_object, $default_value = null)
    {
        return rt_get_akv($keys, $array_or_object, $default_value);
    }
}

/**
 * Recursively find a key's value in array
 *
 * @param string       $keys 'a/b/c' path.
 * @param array|object $array_or_object array to extract from.
 * @param null|mixed   $default_value defualt value.
 *
 * @return null|mixed
 */
if (!function_exists('rt_get_akv')) {
    function rt_get_akv($keys, $array_or_object, $default_value = null)
    {
        if (!is_array($keys)) {
            $keys = explode('/', (string) $keys);
        }

        $array_or_object = $array_or_object;
        $key_or_property = array_shift($keys);

        if (is_null($key_or_property)) {
            return $default_value;
        }

        $is_object = is_object($array_or_object);

        if ($is_object) {
            if (!property_exists($array_or_object, $key_or_property)) {
                return $default_value;
            }
        } else {
            if (!is_array($array_or_object) || !array_key_exists($key_or_property, $array_or_object)) {
                return $default_value;
            }
        }

        if (isset($keys[0])) { // not used count() for performance reasons.
            if ($is_object) {
                return rt_get_akv($keys, $array_or_object->{$key_or_property}, $default_value);
            } else {
                return rt_get_akv($keys, $array_or_object[$key_or_property], $default_value);
            }
        } else {
            if ($is_object) {
                return $array_or_object->{$key_or_property};
            } else {
                return $array_or_object[$key_or_property];
            }
        }
    }
}

if (!function_exists('rt_get_akv_or_customizer')) {
    function rt_get_akv_or_customizer($key, $source, $default = null)
    {
        $source = wp_parse_args(
            $source,
            [
                'prefix' => '',

                // customizer | array
                'strategy' => 'customizer',
            ]
        );

        if ($source['strategy'] !== 'customizer' && !is_array($source['strategy'])) {
            throw new Error(
                'strategy wrong value provided. Array or customizer is required.'
            );
        }

        if (!empty($source['prefix'])) {
            $source['prefix'] .= '_';
        }

        if ($source['strategy'] === 'customizer') {
            return get_theme_mod($source['prefix'] . $key, $default);
        }

        return rt_get_akv($source['prefix'] . $key, $source['strategy'], $default);
    }
}

if (!function_exists('rt_customizer_collect_and_return')) {
    function rt_customizer_collect_and_return($cb)
    {
        ob_start();

        if ($cb) {
            call_user_func($cb);
        }

        return ob_get_clean();
    }
}

/**
 * Generate a random ID.
 */
if (!function_exists('rt_customizer_rand_md5')) {
    function rt_customizer_rand_md5()
    {
        return md5(time() . '-' . uniqid(wp_rand(), true) . '-' . wp_rand());
    }
}

/**
 * Generate attributes string for html tag
 *
 * @param array $attr_array array('href' => '/', 'title' => 'Test').
 *
 * @return string 'href="/" title="Test"'
 */
if (!function_exists('rt_customizer_attr_to_html')) {
    function rt_customizer_attr_to_html(array $attr_array)
    {
        $html_attr = '';

        foreach ($attr_array as $attr_name => $attr_val) {
            if (false === $attr_val) {
                continue;
            }

            $html_attr .= $attr_name . '="' . htmlspecialchars($attr_val) . '" ';
        }

        return $html_attr;
    }
}

/**
 * Generate html tag
 *
 * @param string      $tag Tag name.
 * @param array       $attr Tag attributes.
 * @param bool|string $end Append closing tag. Also accepts body content.
 *
 * @return string The tag's html
 */
if (!function_exists('rt_customizer_html_tag')) {
    function rt_customizer_html_tag($tag, $attr = [], $end = false)
    {
        $html = '<' . $tag . ' ' . rt_customizer_attr_to_html($attr);

        if (true === $end) {
            // <script></script>
            $html .= '></' . $tag . '>';
        } elseif (false === $end) {
            // <br/>
            $html .= '/>';
        } else {
            // <div>content</div>
            $html .= '>' . $end . '</' . $tag . '>';
        }

        return $html;
    }
}

/**
 * Safe render a view and return html
 * In view will be accessible only passed variables
 * Use this function to not include files directly and to not give access to current context variables (like $this)
 *
 * @param string $file_path File path.
 * @param array  $view_variables Variables to pass into the view.
 *
 * @return string HTML.
 */
if (!function_exists('rt_customizer_render_view')) {
    function rt_customizer_render_view(
        $file_path,
        $view_variables = [],
        $default_value = ''
    ) {
        if (!is_file($file_path)) {
            return $default_value;
        }

        // phpcs:ignore WordPress.PHP.DontExtract.extract_extract
        extract($view_variables, EXTR_REFS);
        unset($view_variables);

        ob_start();
        require $file_path;

        return ob_get_clean();
    }
}

if (!function_exists('rt_customizer_get_wp_theme')) {
    function rt_customizer_get_wp_theme()
    {
        return apply_filters('rt_customizer_get_wp_theme', wp_get_theme());
    }
}

if (!function_exists('rt_customizer_get_wp_parent_theme')) {
    function rt_customizer_get_wp_parent_theme()
    {
        return apply_filters('rt_customizer_get_wp_theme', wp_get_theme(get_template()));
    }
}

if (!function_exists('rt_customizer_get_social_networks_list')) {
    function rt_customizer_get_social_networks_list()
    {
        return [
            'facebook' => [
                'label' => __('Facebook', 'rishi'),
            ],

            'twitter' => [
                'label' => __('Twitter', 'rishi'),
            ],

            'instagram' => [
                'label' => __('Instagram', 'rishi'),
            ],

            'pinterest' => [
                'label' => __('Pinterest', 'rishi'),
            ],

            'youtube' => [
                'label' => __('YouTube', 'rishi'),
            ],

            'tiktok' => [
                'label' => __('TikTok', 'rishi'),
            ],


            'dribbble' => [
                'label' => __('Dribbble', 'rishi'),
            ],

            'behance' => [
                'label' => __('Behance', 'rishi'),
            ],

            'linkedin' => [
                'label' => __('LinkedIn', 'rishi'),
            ],

            'wordpress' => [
                'label' => __('WordPress', 'rishi'),
            ],

            'parler' => [
                'label' => __('Parler', 'rishi'),
            ],

            'medium' => [
                'label' => __('Medium', 'rishi'),
            ],

            'slack' => [
                'label' => __('Slack', 'rishi'),
            ],

            'codepen' => [
                'label' => __('CodePen', 'rishi'),
            ],

            'reddit' => [
                'label' => __('Reddit', 'rishi'),
            ],

            'twitch' => [
                'label' => __('Twitch', 'rishi'),
            ],

            'snapchat' => [
                'label' => __('Snapchat', 'rishi'),
            ],

            'spotify' => [
                'label' => __('Spotify', 'rishi'),
            ],

            'soundcloud' => [
                'label' => __('SoundCloud', 'rishi'),
            ],

            'apple_podcast' => [
                'label' => __('Apple Podcasts', 'rishi'),
            ],

            'patreon' => [
                'label' => __('Patreon', 'rishi'),
            ],

            'skype' => [
                'label' => __('Skype', 'rishi'),
            ],

            'github' => [
                'label' => __('GitHub', 'rishi'),
            ],

            'gitlab' => [
                'label' => __('GitLab', 'rishi'),
            ],

            'vimeo' => [
                'label' => __('Vimeo', 'rishi'),
            ],

            'dtube' => [
                'label' => __('DTube', 'rishi'),
            ],

            'facebook_group' => [
                'label' => __('Facebook Group', 'rishi'),
            ],

            'discord' => [
                'label' => __('Discord', 'rishi'),
            ],

            'tripadvisor' => [
                'label' => __('TripAdvisor', 'rishi'),
            ],

            'foursquare' => [
                'label' => __('Foursquare', 'rishi'),
            ],

            'yelp' => [
                'label' => __('Yelp', 'rishi'),
            ],

            'vk' => [
                'label' => __('VK', 'rishi'),
            ],

            'ok' => [
                'label' => __('Odnoklassniki', 'rishi'),
            ],

            'rss' => [
                'label' => __('RSS', 'rishi'),
            ],

            'xing' => [
                'label' => __('Xing', 'rishi'),
            ],

            'whatsapp' => [
                'label' => __('WhatsApp', 'rishi'),
            ],

            'viber' => [
                'label' => __('Viber', 'rishi'),
            ],

            'telegram' => [
                'label' => __('Telegram', 'rishi'),
            ],

            'weibo' => [
                'label' => __('Weibo', 'rishi'),
            ],

            'tumblr' => [
                'label' => __('Tumblr', 'rishi'),
            ],

            'qq' => [
                'label' => __('QQ', 'rishi'),
            ],

            'wechat' => [
                'label' => __('WeChat', 'rishi'),
            ],

            'strava' => [
                'label' => __('Strava', 'rishi'),
            ],

            'flickr' => [
                'label' => __('Flickr', 'rishi'),
            ],

            'phone' => [
                'label' => __('Phone', 'rishi'),
            ],

            'email' => [
                'label' => __('Email', 'rishi'),
            ],
        ];
    }
}

function rt_customizer_current_url()
{
    static $url = null;

    if ($url === null) {
        if (is_multisite() && !(defined('SUBDOMAIN_INSTALL') && SUBDOMAIN_INSTALL)) {
            switch_to_blog(1);
            $url = home_url();
            restore_current_blog();
        } else {
            $url = home_url();
        }

        //Remove the "//" before the domain name
        $url = ltrim(preg_replace('/^[^:]+:\/\//', '//', $url), '/');

        //Remove the ulr subdirectory in case it has one
        $split = explode('/', $url);

        //Remove end slash
        $url = rtrim($split[0], '/');

        $url .= '/' . ltrim(rt_get_akv('REQUEST_URI', $_SERVER, ''), '/');
        $url = set_url_scheme('//' . $url); // https fix
    }

    return $url;
}

/**
 * Treat non-posts home page as a simple page.
 */
if (!function_exists('rt_customizer_is_page')) {
    function rt_customizer_is_page($args = [])
    {
        $args = wp_parse_args(
            $args,
            [
                'shop_is_page' => true,
                'blog_is_page' => true
            ]
        );

        static $static_result = null;

        if ($static_result !== null) {
        }

        $result = (
            ($args['blog_is_page']
                &&
                is_home()
                &&
                !is_front_page()) || is_page() || ($args['shop_is_page'] && function_exists('is_shop') && is_shop()) || is_attachment());

        if ($result) {
            $post_id = get_the_ID();

            if (is_home() && !is_front_page()) {
                $post_id = get_option('page_for_posts');
            }

            if (function_exists('is_shop') && is_shop()) {
                $post_id = get_option('woocommerce_shop_page_id');
            }

            $static_result = $post_id;

            return $post_id;
        }

        $static_result = false;
        return false;
    }
}

function rt_customizer_sync_whole_page($args = [])
{
    return array_merge(
        [
            'selector' => 'main#main',
            'container_inclusive' => true,
            'render' => function () {
                echo rt_customizer_replace_current_template();
            }
        ],
        $args
    );
}


function rt_customizer_values_are_similar($actual, $expected)
{
    if (!is_array($expected) || !is_array($actual)) return $actual === $expected;

    foreach ($expected as $key => $value) {
        if (!rt_customizer_values_are_similar($actual[$key], $expected[$key])) return false;
    }

    foreach ($actual as $key => $value) {
        if (!rt_customizer_values_are_similar($actual[$key], $expected[$key])) return false;
    }

    return true;
}


if (!function_exists('rt_customizer_get_all_image_sizes')) {
    function rt_customizer_get_all_image_sizes()
    {
        $titles = [
            'thumbnail' => __('Thumbnail', 'rishi'),
            'medium' => __('Medium', 'rishi'),
            'medium_large' => __('Medium Large', 'rishi'),
            'large' => __('Large', 'rishi'),
            'full' => __('Full Size', 'rishi'),
        ];

        $all_sizes = get_intermediate_image_sizes();

        $result = [
            'full' => __('Full Size', 'rishi')
        ];

        foreach ($all_sizes as $single_size) {
            if (isset($titles[$single_size])) {
                $result[$single_size] = $titles[$single_size];
            } else {
                $result[$single_size] = $single_size;
            }
        }

        return $result;
    }
}

function rt_customizer_main_attr()
{
    $attrs = [
        'id' => 'main',
        'class' => 'site-main'
    ];

    if (rt_customizer_has_schema_org_markup()) {
        $attrs['class'] .= ' hfeed';
    }

    if (
        (is_singular() || rt_customizer_is_page())
        &&
        rt_customizer_sidebar_position() === 'none'
    ) {

        $attrs['class'] .= ' content-wide';
    }

    return rt_customizer_attr_to_html(
        array_merge(
            apply_filters('rishi:main:attr', $attrs),
            rt_customizer_schema_org_definitions('creative_work', [
                'array' => true
            ])
        )
    );
}

/**
 * Implement meta boxes
 *
 * 
 * @license   http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @package   Rishi
 */

if (!function_exists('rt_customizer_get_post_options')) {
    function rt_customizer_get_post_options($post_id = null, $args = [])
    {
        $args = wp_parse_args(
            $args,
            [
                'meta_id' => 'rt_customizer_post_meta_options'
            ]
        );

        static $post_opts = [];


        if (!$post_id) {
            global $post;

            if ($post && is_singular()) {
                $post_id = $post->ID;
            }

            if (is_home() && !is_front_page()) {
                $post_id = get_option('page_for_posts');
            }

            if (function_exists('is_shop') && is_shop()) {
                $post_id = get_option('woocommerce_shop_page_id');
            }
        }

        $cache_key = $post_id . ':' . $args['meta_id'];

        if (isset($post_opts[$cache_key])) {
            return $post_opts[$cache_key];
        }

        $values = get_post_meta($post_id, $args['meta_id']);

        if (empty($values)) {
            $values = [[]];
        }

        $post_opts[$cache_key] = $values[0];

        return $values[0];
    }
}

if (!function_exists('rt_customizer_get_taxonomy_options')) {
    function rt_customizer_get_taxonomy_options($term_id = null)
    {
        static $taxonomy_opts = [];

        if (!$term_id) {
            $term_id = get_queried_object_id();
        }

        if (isset($taxonomy_opts[$term_id])) {
            return $taxonomy_opts[$term_id];
        }

        $values = get_term_meta(
            $term_id,
            'rt_customizer_taxonomy_meta_options'
        );

        if (empty($values)) {
            $values = [[]];
        }

        $taxonomy_opts[$term_id] = $values[0];

        return $values[0];
    }
}

if (!function_exists('rt_customizer_sanitize_rgba')) :
    /**
     * Sanitize RGBA colors
     */
    function rt_customizer_sanitize_rgba($color)
    {
        if ('' === $color) {
            return '';
        }

        // If string does not start with 'rgba', then treat as hex
        // sanitize the hex color and finally convert hex to rgba
        if (false === strpos($color, 'rgba')) {
            return rt_customizer_sanitize_hex_color($color);
        }

        // By now we know the string is formatted as an rgba color so we need to further sanitize it.
        $color = str_replace(' ', '', $color);
        sscanf($color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha);
        return 'rgba(' . $red . ',' . $green . ',' . $blue . ',' . $alpha . ')';

        return '';
    }
endif;

if (!function_exists('rt_customizer_body_attr')) {
    function rt_customizer_body_attr()
    {
        $attrs = [];

        if (get_theme_mod('has_passepartout', 'no') === 'yes') {
            $attrs['data-frame'] = 'default';
        };

        $attrs['data-forms'] = str_replace(
            '-forms',
            '',
            get_theme_mod('forms_type', 'classic-forms')
        );

        $attrs['data-prefix'] = rt_customizer_manager()->screen->get_prefix();
        $attrs['data-header'] = substr(str_replace(
            'rt-custom-',
            '',
            rt_customizer_manager()->header_builder->get_current_section_id()
        ), 0, 6);

        $attrs['data-footer'] = substr(str_replace(
            'rt-custom-',
            '',
            rt_customizer_manager()->footer_builder->get_current_section_id()
        ), 0, 6);

        $footer_render = new rt_customizer_Footer_Builder_Render();
        $footer_atts = $footer_render->get_current_section()['settings'];

        $reveal_result = [];

        if (rt_customizer_default_akg(
            'has_reveal_effect/desktop',
            $footer_atts,
            false
        )) {
            $reveal_result[] = 'desktop';
        }

        if (rt_customizer_default_akg(
            'has_reveal_effect/tablet',
            $footer_atts,
            false
        )) {
            $reveal_result[] = 'tablet';
        }

        if (rt_customizer_default_akg(
            'has_reveal_effect/mobile',
            $footer_atts,
            false
        )) {
            $reveal_result[] = 'mobile';
        }

        if (count($reveal_result) > 0) {
            $attrs['data-footer'] .= ':reveal';
        }

        return rt_customizer_attr_to_html(array_merge([
            'data-link' => get_theme_mod('content_link_type', 'type-2'),
        ], $attrs, rt_customizer_schema_org_definitions('single', ['array' => true])));
    }
}

function rt_customizer_add_customizer_preview_cache( $maybe_content ) {
	add_action(
		'rt_customizer_customizer_preview_cache',
		function () use ( $maybe_content ) {
			if (is_callable($maybe_content)) {
				/**
				 * Note to code reviewers: This line doesn't need to be escaped.
				 * Function call_user_func($maybe_content) used here escapes the value properly.
				 */
				echo call_user_func($maybe_content);
				return;
			}

			/**
			 * Note to code reviewers: This line doesn't need to be escaped.
			 * Variable $maybe_content used here has the value escaped properly.
			 */
			echo $maybe_content;
		}
	);
}

if (! function_exists('rt_customizer_akg_or_customizer')) {
    function rt_customizer_akg_or_customizer($key, $source, $default = null) {
        $source = wp_parse_args(
            $source,
            [
                'prefix' => '',

                // customizer | array
                'strategy' => 'customizer',
            ]
        );

        if ($source['strategy'] !== 'customizer' && !is_array($source['strategy'])) {
            throw new Error(
                'strategy wrong value provided. Array or customizer is required.'
            );
        }

        if (! empty($source['prefix'])) {
            $source['prefix'] .= '_';
        }

        if ($source['strategy'] === 'customizer') {
            return get_theme_mod($source['prefix'] . $key, $default);
        }

        return rt_get_akv($source['prefix'] . $key, $source['strategy'], $default);
    }
}

function rt_customizer_get_v_spacing() {
        
    $v_spacing_output = '';

    $post_options = rt_customizer_get_post_options();


    $page_vertical_spacing_source = rt_customizer_default_akg(
        'vertical_spacing_source',
        $post_options,
        'inherit'
    );

    $post_content_area_spacing = get_theme_mod(
        'single_content_area_spacing',
        'both'
    );

    if ($page_vertical_spacing_source === 'custom') {
        $post_content_area_spacing = rt_customizer_default_akg(
            'content_area_spacing',
            $post_options,
            'both'
        );
    }

    if( $post_content_area_spacing === 'both'){
        $post_content_area_spacing = 'top:bottom';
    }


    $v_spacing_output = 'data-v-spacing="' . esc_attr( $post_content_area_spacing ) . '"';
    
    return $v_spacing_output;

    return '';

}

function rt_customizer_get_page_spacing() {
    $v_spacing_output = '';

    $post_options = rt_customizer_get_post_options();

    $page_vertical_spacing_source = rt_customizer_default_akg(
        'vertical_spacing_source',
        $post_options,
        'inherit'
    );

    $post_content_area_spacing = get_theme_mod(
        'page_content_area_spacing',
        'both'
    );

    if ($page_vertical_spacing_source === 'custom') {
        $post_content_area_spacing = rt_customizer_default_akg(
            'content_area_spacing',
            $post_options,
            'both'
        );
    }

    if( $post_content_area_spacing === 'both'){
        $post_content_area_spacing = 'top:bottom';
    }

    $v_spacing_output = 'data-page-spacing="' . esc_attr( $post_content_area_spacing
    ) . '"';
        
    return $v_spacing_output;
}

/**Helpers */
function rishi_get_contacts_output($args = []) {
    $args = wp_parse_args($args, [
        'data' => [],
        'link_target' => 'no',
        'type' => 'rounded',
        'fill' => 'outline',
        'size' => ''
    ]);

    $has_enabled_layer = false;

    foreach ($args['data'] as $single_layer) {
        if ($single_layer['enabled']) {
            $has_enabled_layer = true;
            break;
        }
    }

    if (! $has_enabled_layer) {
        return '';
    }

    $data_target = '';

    if ($args['link_target'] !== 'no') {
        $data_target = 'target="_blank"';
    }

    $svgs = [
        'address' => '<svg id="address" xmlns="http://www.w3.org/2000/svg" width="13.788" height="20.937" viewBox="0 0 13.788 20.937"><path id="Path_26497" data-name="Path 26497" d="M29.894,961.362A6.894,6.894,0,0,0,23,968.256a10.93,10.93,0,0,0,1.277,4.6l5.617,9.447,5.617-9.447a10.929,10.929,0,0,0,1.277-4.6A6.894,6.894,0,0,0,29.894,961.362Zm0,3.83a3.064,3.064,0,1,1-3.064,3.064A3.064,3.064,0,0,1,29.894,965.192Z" transform="translate(-23 -961.362)"/></svg>',

        'phone' => '<svg xmlns="http://www.w3.org/2000/svg" width="18.823" height="19.788" viewBox="0 0 18.823 19.788"><path id="Phone" d="M15.925,19.741a8.537,8.537,0,0,1-3.747-1.51,20.942,20.942,0,0,1-3.524-3.094,51.918,51.918,0,0,1-3.759-4.28A13.13,13.13,0,0,1,2.75,6.867a6.3,6.3,0,0,1-.233-2.914,5.144,5.144,0,0,1,1.66-2.906A7.085,7.085,0,0,1,5.306.221,1.454,1.454,0,0,1,6.9.246a5.738,5.738,0,0,1,2.443,2.93,1.06,1.06,0,0,1-.117,1.072c-.283.382-.578.754-.863,1.136-.251.338-.512.671-.736,1.027a.946.946,0,0,0,.01,1.108c.564.791,1.11,1.607,1.723,2.36a30.024,30.024,0,0,0,3.672,3.8c.3.255.615.481.932.712a.892.892,0,0,0,.96.087,10.79,10.79,0,0,0,.989-.554c.443-.283.878-.574,1.314-.853a1.155,1.155,0,0,1,1.207-.024,5.876,5.876,0,0,1,2.612,2.572,1.583,1.583,0,0,1-.142,1.795,5.431,5.431,0,0,1-4.353,2.362A6.181,6.181,0,0,1,15.925,19.741Z" transform="translate(-2.441 0.006)"/></svg>
',

        'mobile' => '<svg xmlns="http://www.w3.org/2000/svg" width="12.542" height="21" viewBox="0 0 12.542 21"><path id="mobile" d="M159.292,76H150.25a1.748,1.748,0,0,0-1.75,1.75v17.5A1.748,1.748,0,0,0,150.25,97h9.042a1.748,1.748,0,0,0,1.75-1.75V77.75A1.748,1.748,0,0,0,159.292,76Zm.525,16.158h-10.15V79.967h10.15Z" transform="translate(-148.5 -76)"/></svg>
',

        'hours' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path id="clock" d="M35,977.362a10,10,0,1,0,10,10A10,10,0,0,0,35,977.362Zm0,3.6a.8.8,0,0,1,.8.8V986.9l3.763,2.175a.8.8,0,0,1-.8,1.375l-4.075-2.35a.813.813,0,0,1-.087-.05.792.792,0,0,1-.4-.687v-5.6A.8.8,0,0,1,35,980.962Z" transform="translate(-25 -977.362)"/></svg>
',

        'fax' => '<svg id="fax" xmlns="http://www.w3.org/2000/svg" width="19" height="17.417" viewBox="0 0 19 17.417"><g id="Group_5861" data-name="Group 5861"><path id="Path_26501" data-name="Path 26501" d="M18.208,16H.792A.794.794,0,0,0,0,16.792v5.526a.794.794,0,0,0,.792.792H3.167V20.746H15.833v2.363h2.375A.794.794,0,0,0,19,22.317V16.792A.794.794,0,0,0,18.208,16Zm-5.542,2.771a.792.792,0,1,1,.792-.792A.792.792,0,0,1,12.667,18.771Zm2.375,0a.792.792,0,1,1,.792-.792.792.792,0,0,1-.792.792Z" transform="translate(0 -9.667)" /><path id="Path_26502" data-name="Path 26502" d="M11,32.166v3.182a.794.794,0,0,0,.792.792H20.5a.794.794,0,0,0,.792-.792V30.99H11Z" transform="translate(-6.646 -18.723)" /><path id="Path_26503" data-name="Path 26503" d="M21.292,2.771H19.708a1.191,1.191,0,0,1-1.187-1.188V0H11.792A.794.794,0,0,0,11,.792v4.75H21.292Z" transform="translate(-6.646)" /><path id="Path_26504" data-name="Path 26504" d="M32.4,1.979h1.583L32,0V1.583A.4.4,0,0,0,32.4,1.979Z" transform="translate(-19.333)" /></g></svg>
',

        'email' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="12.683" viewBox="0 0 20 12.683"><path id="Path_26505" data-name="Path 26505" d="M10.463,976.362a1.465,1.465,0,0,0-.541.107l8.491,7.226a.825.825,0,0,0,1.159,0l8.5-7.233a1.469,1.469,0,0,0-.534-.1H10.463Zm-1.448,1.25a1.511,1.511,0,0,0-.015.213v9.756a1.46,1.46,0,0,0,1.463,1.463H27.537A1.46,1.46,0,0,0,29,987.581v-9.756a1.51,1.51,0,0,0-.015-.213l-8.46,7.2a2.376,2.376,0,0,1-3.064,0Z" transform="translate(-9 -976.362)"/></svg>
',

        'website' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><path id="Path_26506" data-name="Path 26506" d="M12,50A10,10,0,1,1,2,60,10,10,0,0,1,12,50Zm2.537,14H9.463A9.263,9.263,0,0,0,10.7,66.943c.393.576.776,1.057,1.3,1.057s.907-.481,1.3-1.057A9.263,9.263,0,0,0,14.537,64Zm-7.12,0H5.072a8.038,8.038,0,0,0,3.466,3.213A13.037,13.037,0,0,1,7.417,64Zm11.511,0H16.583a13.037,13.037,0,0,1-1.121,3.213A8.038,8.038,0,0,0,18.928,64ZM7.1,58H4.252a8.062,8.062,0,0,0,0,4H7.1a20.05,20.05,0,0,1,0-4Zm7.791,0H9.109a18.4,18.4,0,0,0,0,4h5.782A17.985,17.985,0,0,0,15,60,17.984,17.984,0,0,0,14.891,58Zm4.857,0H16.9a20,20,0,0,1,.1,2,20,20,0,0,1-.1,2h2.848a8.063,8.063,0,0,0,0-4ZM8.538,52.787A8.038,8.038,0,0,0,5.072,56H7.417A13.037,13.037,0,0,1,8.538,52.787ZM12,52c-.524,0-.907.481-1.3,1.057A9.263,9.263,0,0,0,9.463,56h5.074A9.263,9.263,0,0,0,13.3,53.057C12.907,52.481,12.524,52,12,52Zm3.462.787A13.037,13.037,0,0,1,16.583,56h2.345A8.038,8.038,0,0,0,15.462,52.787Z" transform="translate(-2 -50)" fill-rule="evenodd"/></svg>
',
    ];

    $attr = [];

    // if ($args['type'] !== 'simple') {
        $attr['data-icons-type'] = $args['type'];
    // }

    if ($args['type'] !== 'simple' && ! empty($args['fill'])) {
        $attr['data-icons-type'] .= ':' . $args['fill'];
    }

    if (! empty($args['size'])) {
        $attr['data-icon-size'] = $args['size'];
    }

    ob_start(); ?>

    <ul <?php echo rt_customizer_attr_to_html($attr) ?>>
        <?php foreach ($args['data'] as $single_layer) { ?>
            <?php if (! $single_layer['enabled']) { continue; }?>
            <li>
                <span class="ct-icon-container">
                    <?php echo $svgs[$single_layer['id']] ?>
                </span>

                <div class="contact-info">
                    <?php if (! empty(rt_get_akv('title', $single_layer, ''))) { ?>
                        <span class="contact-title">
                            <?php echo esc_html(rt_get_akv('title', $single_layer, '')) ?>
                        </span>
                    <?php } ?>

                    <?php if (! empty(rt_get_akv('content', $single_layer, ''))) { ?>
                        <span class="contact-text">
                            <?php if (! empty(rt_get_akv('link', $single_layer, ''))) { ?>
                                <a href="<?php echo rt_get_akv('link', $single_layer, '') ?>" <?php echo $data_target ?>>
                            <?php } ?>

                            <?php echo rt_get_akv('content', $single_layer, '') ?>

                            <?php if (! empty(rt_get_akv('link', $single_layer, ''))) { ?>
                                </a>
                            <?php } ?>
                        </span>
                    <?php } ?>
                </div>
            </li>
        <?php } ?>
    </ul>

    <?php
    return ob_get_clean();
}

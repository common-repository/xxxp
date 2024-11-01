<?php
/*
  Plugin Name: xxxp
  Plugin URI: http://accountingse.net/2014/01/795/
  Description: xxxp(ぺけぺけえっくすぴー) is plug in which can give warning for a user of Windows XP.
  Version: 0.2
  Author: kazunii_ac
  Author URI: https://twitter.com/kazunii_ac
  License: GPL2
 */

/*  Copyright 2014 kazunii_ac (email : moskov@mcn.ne.jp)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

class xxxp extends WP_Widget {

    function xxxp() {
        $widget_ops = array(
            'description' => 'xxxp is plug in which can give warning for a user of Windows XP.'
        );
        parent::WP_Widget(false, $name = 'xxxp', $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $xp_title = apply_filters('widget_title', $instance['xp_title']);
        $xp_body = apply_filters('widget_body', $instance['xp_body']);
        $nonxp_disp_flg = $instance['nonxp_disp_flg'];
        $nonxp_title = apply_filters('widget_title', $instance['nonxp_title']);
        $nonxp_body = apply_filters('widget_body', $instance['nonxp_body']);
        ?>
        <div id="xxxp_widget" class="sideWidget" style="display:none;">
            <?php echo $before_title . '<span id="xxxp_disp_title"></span>' . $after_title; ?>
            <?php echo '<p id="xxxp_disp_body">' . $body . '</p>'; ?>
            <span id="xxxp_xp_title" style="display:none;"><?php echo htmlspecialchars($xp_title); ?></span>
            <span id="xxxp_xp_body" style="display:none;"><?php echo htmlspecialchars($xp_body); ?></span>
            <span id="xxxp_nonxp_disp_flg" style="display:none;"><?php echo htmlspecialchars($nonxp_disp_flg); ?></span>
            <span id="xxxp_nonxp_title" style="display:none;"><?php echo htmlspecialchars($nonxp_title); ?></span>
            <span id="xxxp_nonxp_body" style="display:none;"><?php echo htmlspecialchars($nonxp_body); ?></span>
        </div>
        <?php
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['xp_title'] = strip_tags($new_instance['xp_title']);
        $instance['xp_body'] = trim($new_instance['xp_body']);
        $instance['nonxp_disp_flg'] = strip_tags($new_instance['nonxp_disp_flg']);
        $instance['nonxp_title'] = strip_tags($new_instance['nonxp_title']);
        $instance['nonxp_body'] = trim($new_instance['nonxp_body']);
        if ($instance['nonxp_disp_flg'] !== 'Yes' && $instance['nonxp_disp_flg'] !== 'No') {
            $instance['nonxp_disp_flg'] = 'No';
        }
        return $instance;
    }

    function form($instance) {
        $xp_title = esc_attr($instance['xp_title']);
        $xp_body = esc_attr($instance['xp_body']);
        $nonxp_disp_flg = esc_attr($instance['nonxp_disp_flg']);
        $nonxp_title = esc_attr($instance['nonxp_title']);
        $nonxp_body = esc_attr($instance['nonxp_body']);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('xp_title'); ?>">
                <?php _e('WindowsXPの場合のタイトル<br />Title for WindowsXP'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('xp_title'); ?>" name="<?php echo $this->get_field_name('xp_title'); ?>" type="text" value="<?php echo $xp_title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('xp_body'); ?>">
                <?php _e('WindowsXPの場合のコンテンツ<br />Contents for WindowsXP'); ?>
            </label>
            <textarea  class="widefat" rows="16" colls="20" id="<?php echo $this->get_field_id('xp_body'); ?>" name="<?php echo $this->get_field_name('xp_body'); ?>"><?php echo $xp_body; ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('nonxp_disp_flg'); ?>">
                <?php _e('WindowsXPではない場合、下記タイトルとコンテンツを表示しますか？<br />When not Windows XP, do you want to display the following title and contents?<br />'); ?>
            </label>
            Yes <input id="<?php echo $this->get_field_id('nonxp_disp_flg'); ?>" name="<?php echo $this->get_field_name('nonxp_disp_flg'); ?>" type="radio"<?php checked('Yes', $nonxp_disp_flg); ?> value="Yes" />
            No <input id="<?php echo $this->get_field_id('nonxp_disp_flg'); ?>" name="<?php echo $this->get_field_name('nonxp_disp_flg'); ?>" type="radio"<?php checked('No', $nonxp_disp_flg); ?> value="No" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('nonxp_title'); ?>">
                <?php _e('WindowsXPではない場合のタイトル<br />Title for not WindowsXP'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('nonxp_title'); ?>" name="<?php echo $this->get_field_name('nonxp_title'); ?>" type="text" value="<?php echo $nonxp_title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('nonxp_body'); ?>">
                <?php _e('WindowsXPではない場合のコンテンツ<br />Contents for not WindowsXP'); ?>
            </label>
            <textarea  class="widefat" rows="16" colls="20" id="<?php echo $this->get_field_id('nonxp_body'); ?>" name="<?php echo $this->get_field_name('nonxp_body'); ?>"><?php echo $nonxp_body; ?></textarea>
        </p>
        <?php
    }

}

wp_enqueue_script('jquery');
wp_enqueue_script('jquery.clientenv.js', plugins_url() . '/xxxp/jquery.clientenv.js');
wp_enqueue_script('xxxp_js', plugins_url() . '/xxxp/xxxp.js');
add_action('widgets_init', create_function('', 'return register_widget("xxxp");'));

////////////////////////////////////////////////////
// 管理メニューのアクションフック
add_action('admin_menu', 'admin_menu_xxxp');

// アクションフックのコールバッック関数
function admin_menu_xxxp() {
    // 設定メニュー下にサブメニューを追加:
    add_options_page('xxxp', 'xxxp', 'manage_options', __FILE__, 'xxxp');
}

function xxxp() {
    if (!empty($_POST['submit'])) {
        $Arr['XP'] = stripslashes($_POST['XP']);
        $Arr['NotXP'] = stripslashes($_POST['NotXP']);
        update_option('xxxp_footer', $Arr);
    }
    $Arr = get_option('xxxp_footer');
    ?>

    <div id="xxxp_wrap">
        <h1 id="disp_mytitle">xxxp</h1>
        <span class="explain_xxxp"></span>
        <form action="<?php echo home_url() ?>/wp-admin/options-general.php?page=xxxp/xxxp.php" method="post">
            <h2>設定 setting</h2>
            <div>
                WindowsXPの場合に記事のフッターに出すHTML(ForWindowsXP)<br />
                <textarea type="textarea" cols="90" rows="10" name="XP"><?php echo $Arr['XP']; ?></textarea><br />
            </div>
            <br />
            <div>
                WindowsXPではない場合に記事のフッターに出すHTML(ForNotWindowsXP)<br />
                <textarea type="textarea" cols="90" rows="10" name="NotXP"><?php echo $Arr['NotXP']; ?></textarea><br />
            </div>
            <input type="submit" name="submit" class="btn_submit button button-primary" value="submit!">
        </form>
    </div>
    <div id="xxxp_footer" style="padding-top:10px;text-align:center;">
        <div id="xxxp_createdby">
            created by 
            <a href="https://twitter.com/kazunii_ac" target="_blank">
                <img src="https://pbs.twimg.com/profile_images/2074468470/_______mini.jpg" />
                @kazunii_ac
            </a>
        </div>
    </div>
    <?php
}

function xxxp_footer_html($Honbun) {
    $Arr = get_option('xxxp_footer');
    return(
            $Honbun
            . '<div id="xxxp_footer_disp"></div>'
            . '<div style="display:none;" id="xxxp_footer_xp">' . $Arr['XP'] . '</div>'
            . '<div style="display:none;" id="xxxp_footer_nonxp">' . $Arr['NotXP'] . '</div>'
            );
}

if (is_admin()) {
    //DoNothing
} else {
    add_filter('the_content', 'xxxp_footer_html', 10);
}
?>

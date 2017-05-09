<?php
function hash_news_add_custom_metabox() {
    add_meta_box(
        "hash_news_meta",
        "News Listing",
        "hash_news_meta_callback",
        "hash_news",
        "normal",
        "core"
    );
}

add_action('add_meta_boxes', 'hash_news_add_custom_metabox');

function hash_news_meta_callback($post) {
    // nonce - ensure your form data came from your form
    wp_nonce_field(basename(__FILE__), 'hash_news_nonce');

    // gets data from the database from post meta column
    $hash_news_stored_meta = get_post_meta( $post->ID );

    ?>
    <div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="news-id" class="hash-row-title"><?php _e('News ID', 'wp-news-listing'); ?></label>
            </div>
            <div class="meta-td">
                <input type="text" name="news_id" id="news_id" value="<?php if ( !empty($hash_news_stored_meta['news_id'])) { echo esc_attr( $hash_news_stored_meta['news_id'][0]); } ?>">
            </div>
        </div>
    </div>
    <div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="news-title" class="hash-row-title"><?php _e('News Title', 'wp-news-listing'); ?></label>
            </div>
            <div class="meta-td">
                <input type="textarea" name="news_title" id="news_title" value="<?php if ( !empty($hash_news_stored_meta['news_title'])) { echo esc_attr( $hash_news_stored_meta['news_title'][0]); } ?>">
            </div>
        </div>
    </div>
    <div>
        <div class="meta-row">
            <div class="meta-th">
                <label for="date_listed" class="hash-row-title"><?php _e('Date Listed', 'wp-news-listing'); ?></label>
            </div>
            <div class="meta-td">
                <input type="text" name="date_listed" class="datepicker" id="date_listed" value="<?php if ( !empty($hash_news_stored_meta['date_listed'])) { echo esc_attr( $hash_news_stored_meta['date_listed'][0]); } ?>">
            </div>
        </div>
    </div>

    <div class="meta">
        <div class="meta-th">
            <span><?php _e('Hash News Body', ''); ?></span>
        </div>
    </div>
    <div class="meta-editor">
        <?php
        $content = get_post_meta($post->ID, 'hash_news_body', true);
        $editor = 'hash_news_body';
        $settings = array(
            'textarea_rows' => 8,
            'media_buttons' => true
        );
        wp_editor($content, $editor, $settings);

        ?>
    </div>
    <?php
}

function hash_news_meta_save($post_id) {
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = (isset($_POST['hash_news_nonce']) && wp_verify_nonce($_POST['hash_newss_nonce'], basename(__FILE__))) ? 'true' : 'false';

    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    }

    if (isset($_POST['hash_news_id'] )) {
        update_post_meta($post_id, 'hash_news_id', sanitize_text_field($_POST['news_id']));
    }
    if (isset($_POST['hash_news_title'] )) {
        update_post_meta($post_id, 'hash_news_title', sanitize_text_field($_POST['news_title']));
    }
    if (isset($_POST['date_listed'] )) {
        update_post_meta($post_id, 'date_listed', sanitize_text_field($_POST['date_listed']));
    }
    if (isset($_POST['application_deadline'] )) {
        update_post_meta($post_id, 'application_deadline', sanitize_text_field($_POST['application_deadline']));
    }

    if (isset($_POST['principle_duties'] )) {
        update_post_meta($post_id, 'news_body', sanitize_text_field($_POST['news_body']));
    }
}

add_action('save_post', 'hash_news_meta_save');
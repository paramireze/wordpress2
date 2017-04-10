<?php
    function dwwp_add_custom_metabox() {
        add_meta_box(
            "dwwp_meta",
            "Job Listing",
            "dwwp_meta_callback",
            "job",
            "normal",
            "core"
        );
    }

    add_action('add_meta_boxes', 'dwwp_add_custom_metabox');

    function dwwp_meta_callback($post) {
        // nonce - ensure your form data came from your form
        wp_nonce_field(basename(__FILE__), 'dwwp_jobs_nonce');

        // gets data from the database from post meta column
        $dwwp_stored_meta = get_post_meta( $post->ID );

        ?>
        <div>
            <div class="meta-row">
                <div class="meta-th">
                    <label for="job-id" class="dwwp-row-title"><?php _e('Job ID', 'wp-job-listing'); ?></label>
                </div>
                <div class="meta-td">
                    <input type="text" name="job_id" id="job_id" value="<?php if ( !empty($dwwp_stored_meta['job_id'])) { echo esc_attr( $dwwp_stored_meta['job_id'][0]); } ?>">
                </div>
            </div>
        </div>
        <div>
            <div class="meta-row">
                <div class="meta-th">
                    <label for="job-title" class="dwwp-row-title"><?php _e('Job Title', 'wp-job-listing'); ?></label>
                </div>
                <div class="meta-td">
                    <input type="textarea" name="job_title" id="job_title" value="<?php if ( !empty($dwwp_stored_meta['job_title'])) { echo esc_attr( $dwwp_stored_meta['job_title'][0]); } ?>">
                </div>
            </div>
        </div>
        <div>
            <div class="meta-row">
                <div class="meta-th">
                    <label for="date_listed" class="dwwp-row-title"><?php _e('Date Listed', 'wp-job-listing'); ?></label>
                </div>
                <div class="meta-td">
                    <input type="text" name="date_listed" class="datepicker" id="date_listed" value="<?php if ( !empty($dwwp_stored_meta['date_listed'])) { echo esc_attr( $dwwp_stored_meta['date_listed'][0]); } ?>">
                </div>
            </div>
        </div>
        <div>
            <div class="meta-row">
                <div class="meta-th">
                    <label for="application_deadline" class="dwwp-row-title"><?php _e('Application Deadline', 'wp-job-listing'); ?></label>
                </div>
                <div class="meta-td">
                    <input type="text" name="application_deadline" class="datepicker" id="application_deadline" value="<?php if ( !empty($dwwp_stored_meta['application_deadline'])) { echo esc_attr( $dwwp_stored_meta['application_deadline'][0]); } ?>">
                </div>
            </div>
        </div>
        <div class="meta">
            <div class="meta-th">
                <span><?php _e('Principle Duties', ''); ?></span>
            </div>
        </div>
        <div class="meta-editor">
            <?php
            $content = get_post_meta($post->ID, 'principle_duties', true);
            $editor = 'principle_duties';
            $settings = array(
                'textarea_rows' => 8,
                'media_buttons' => true
            );
            wp_editor($content, $editor, $settings);

            ?>
        </div>
        <?php
    }

    function dwwp_meta_save($post_id) {
        $is_autosave = wp_is_post_autosave( $post_id );
        $is_revision = wp_is_post_revision($post_id);
        $is_valid_nonce = (isset($_POST['dwwp_jobs_nonce']) && wp_verify_nonce($_POST['dwwp_jobs_nonce'], basename(__FILE__))) ? 'true' : 'false';

        if ($is_autosave || $is_revision || !$is_valid_nonce) {
            return;
        }

        if (isset($_POST['job_id'] )) {
            update_post_meta($post_id, 'job_id', sanitize_text_field($_POST['job_id']));
        }
        if (isset($_POST['job_title'] )) {
            update_post_meta($post_id, 'job_title', sanitize_text_field($_POST['job_title']));
        }
        if (isset($_POST['date_listed'] )) {
            update_post_meta($post_id, 'date_listed', sanitize_text_field($_POST['date_listed']));
        }
        if (isset($_POST['application_deadline'] )) {
            update_post_meta($post_id, 'application_deadline', sanitize_text_field($_POST['application_deadline']));
        }

        if (isset($_POST['principle_duties'] )) {
            update_post_meta($post_id, 'principle_duties', sanitize_text_field($_POST['principle_duties']));
        }
    }

    add_action('save_post', 'dwwp_meta_save');
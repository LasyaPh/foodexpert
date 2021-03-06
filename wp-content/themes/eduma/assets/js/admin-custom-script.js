jQuery(function ($) {
    $(document).ready(function () {
        thim_custom_admin_select();

        thim_eduma_install_demo();

        thim_eduma_30_install_demo();

        thim_eduma_edit_term()
    });


    function thim_custom_admin_select() {
        $('#customize-control-thim_config_logo_mobile select').on('change', function () {
            if ($(this).val() == "custom_logo") {
                $('#customize-control-thim_logo_mobile').show();
                $('#customize-control-thim_sticky_logo_mobile').show();
            } else {
                $('#customize-control-thim_logo_mobile').hide();
                $('#customize-control-thim_sticky_logo_mobile').hide();
            }
        }).trigger('change');

        $('#customize-control-thim_page_builder_chosen select').on('change', function () {
            if ($(this).val() == "visual_composer") {
                $('#customize-control-thim_footer_bottom_bg_img').show();
            } else {
                $('#customize-control-thim_footer_bottom_bg_img').hide();
            }
        }).trigger('change');


        $('#customize-control-thim_box_layout select').on('change', function () {
            if ($(this).val() == "boxed") {
                $('#customize-control-thim_user_bg_pattern').show();
                $('#customize-control-thim_bg_pattern').show();
                $('#customize-control-thim_bg_upload').show();
                $('#customize-control-thim_bg_repeat').show();
                $('#customize-control-thim_bg_position').show();
                $('#customize-control-thim_bg_attachment').show();
                $('#customize-control-thim_bg_size').show();
            } else {
                $('#customize-control-thim_user_bg_pattern').hide();
                $('#customize-control-thim_bg_pattern').hide();
                $('#customize-control-thim_bg_upload').hide();
                $('#customize-control-thim_bg_repeat').hide();
                $('#customize-control-thim_bg_position').hide();
                $('#customize-control-thim_bg_attachment').hide();
                $('#customize-control-thim_bg_size').hide();
            }
        }).trigger('change');


        $('#customize-control-thim_preload select').on('change', function () {
            if ($(this).val() == 'image') {
                $('#customize-control-thim_preload_image').show();
            } else {
                $('#customize-control-thim_preload_image').hide();
            }
        }).trigger('change');
    }


    function thim_eduma_30_install_demo() {
        if ($('.tc-importer-wrapper').length == 0) {
            return;
        }

        if ($('.tc-importer-wrapper .theme.installed[data-thim-demo^=demo-vc]').length > 0) {
            $('.tc-importer-wrapper').addClass('visual_composer');
        }

        if ($('.tc-importer-wrapper .theme.installed').length > 0) {
            return;
        }

        var $html = '<div class="thim-choose-page-builder"><h3 class="title">Please select page builder before Import Demo.</h3>';
        $html += '<select id="thim-select-page-builder">';
        $html += '<option value="">Select</option>';
        $html += '<option value="site_origin">Site Origin</option>';
        $html += '<option value="visual_composer">Visual Composer</option>';
        $html += '</select></div>';

        $('.tc-importer-wrapper').prepend($html);

        if ($('#thim-select-page-builder').val() === '') {
            $('.tc-importer-wrapper').addClass('overlay');
        }

        $(document).on('change', '#thim-select-page-builder', function () {

            var elem = $(this),
                elem_val = elem.val(),
                elem_parent = elem.parents('.tc-importer-wrapper'),
                data = {
                    action: 'thim_update_theme_mods',
                    thim_key: 'thim_page_builder_chosen',
                    thim_value: elem_val
                };

            if (elem_val !== '') {
                if (elem_val == 'visual_composer') {
                    elem_parent.addClass('visual_composer');
                } else {
                    elem_parent.removeClass('visual_composer');
                }
                elem_parent.removeClass('overlay').addClass('loading');
                $.post(ajaxurl, data, function (response) {
                    console.log(response);
                    elem_parent.removeClass('loading');
                });
            } else {
                elem_parent.addClass('overlay');
            }

        });
    }

    function thim_eduma_install_demo() {
        if ($('.thim-demo-browser.theme-browser').length == 0) {
            return;
        }

        var $html = '<div class="thim-choose-page-builder"><h3 class="title">Please select page builder before Import Demo.</h3>';
        $html += '<select id="thim-select-page-builder">';
        $html += '<option value="">Select</option>';
        $html += '<option value="site_origin">Site Origin</option>';
        $html += '<option value="visual_composer">Visual Composer</option>';
        $html += '</select></div>';

        $('.thim-demo-browser.theme-browser').prepend($html);

        if ($('#thim-select-page-builder').val() === '') {
            $('.thim-demo-browser').addClass('overlay');
        }

        $(document).on('change', '#thim-select-page-builder', function () {

            var elem = $(this),
                elem_val = elem.val(),
                elem_parent = elem.parents('.thim-demo-browser'),
                data = {
                    action: 'thim_update_theme_mods',
                    thim_key: 'thim_page_builder_chosen',
                    thim_value: elem_val
                };

            if (elem_val !== '') {
                elem_parent.removeClass('overlay').addClass('loading');
                $.post(ajaxurl, data, function (response) {
                    console.log(response);
                    elem_parent.removeClass('loading');
                });
            } else {
                elem_parent.addClass('overlay');
            }

        });
    }

    function thim_eduma_edit_term() {
        var $custom_heading = $('#thim_custom_heading');

        if (!$custom_heading.length) {
            return;
        }

        check_dependency();
        $(document).on('change', '#thim_custom_heading', function (event) {
            check_dependency();
        });

        function check_dependency() {
            var $custom_heading = $('#thim_custom_heading');

            var checked = $custom_heading.prop('checked') || false;
            toggle_hidden_fields(checked);
        }

        function toggle_hidden_fields(checked) {
            var fields_name = [
                'thim_archive_top_image[id]',
                'thim_archive_cate_heading_bg_color',
                'thim_archive_cate_heading_text_color',
                'thim_archive_cate_heading_bg_opacity',
                'thim_archive_cate_sub_heading_text_color',
                'thim_archive_cate_hide_title',
                'thim_archive_cate_hide_breadcrumbs',

                'thim_learnpress_top_image[id]',
                'thim_learnpress_cate_heading_bg_color',
                'thim_learnpress_cate_heading_bg_opacity',
                'thim_learnpress_cate_heading_text_color',
                'thim_learnpress_cate_sub_heading_text_color',
                'thim_learnpress_cate_hide_title',
                'thim_learnpress_cate_hide_breadcrumbs'
            ];

            fields_name.forEach(function (field_name) {
                var $input_field = $('[name="' + field_name + '"]');
                var $field = $input_field.closest('.form-field');

                if (checked) {
                    $field.removeClass('hide');
                } else {
                    $field.addClass('hide');
                }
            });
        }
    }
});
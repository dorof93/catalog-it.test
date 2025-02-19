<?php
	namespace Project;
    class Helper
    {
        public static function get_pic_link($pic_link, $default) {
            if ( empty($pic_link) || ! file_exists( $_SERVER['DOCUMENT_ROOT'] . $pic_link ) ) {
                return $default;
            }
            return $pic_link;
        }
    }
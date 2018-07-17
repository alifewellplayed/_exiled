<?php
// Fetch the post value, else the default value
function get_post_val($key, $default = '') {
    if(isset($_POST[$key]) and
       !empty($_POST[$key])) {
        return $_POST[$key];
    } else {
        return $default;
    }
}

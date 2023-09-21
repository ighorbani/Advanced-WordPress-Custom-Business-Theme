<?php

// Add helper functions.
require_once('helpers.php');

// Add ACF option pages.
if (is_acf_active()) {
    acf_add_options_page();
    acf_add_options_sub_page('Theme Settings');
}

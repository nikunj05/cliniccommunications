<?php
require_once __DIR__ . '/wp-load.php';

$option_name = 'theme_mods_clinic-communications';
$old = 'http://cliniccommunications.local';
$new = 'https://cliniccommunications.coderscotch.com';

$value = get_option($option_name);

function deep_replace($data, $old, $new) {
    if (is_array($data)) {
        foreach ($data as $key => $val) {
            $data[$key] = deep_replace($val, $old, $new);
        }
        return $data;
    }

    if (is_object($data)) {
        foreach ($data as $key => $val) {
            $data->$key = deep_replace($val, $old, $new);
        }
        return $data;
    }

    if (is_string($data)) {
        return str_replace($old, $new, $data);
    }

    return $data;
}

if ($value === false) {
    exit("Option not found: {$option_name}\n");
}

$fixed = deep_replace($value, $old, $new);
update_option($option_name, $fixed);

echo "Done\n";
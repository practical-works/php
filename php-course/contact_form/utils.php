<?php
function is_suspect($subject, $pattern) {
    $suspect_detected = false;
    if (is_array($subject)) {
        foreach ($subject as $item) {
            if (is_suspect($item, $pattern)) {
                $suspect_detected = true;
                break;
            }
        }
    }
    else {
        $suspect_detected = preg_match($pattern, $subject);
    }
    return $suspect_detected;
}
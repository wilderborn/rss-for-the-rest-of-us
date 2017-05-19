<?php

function gravatar($email)
{
    return "https://www.gravatar.com/avatar/" . e(md5(strtolower($email)));
}

/**
 * SVG helper
 *
 * @param string $src Path to svg in the image directory
 * @return string
 */
function svg($src)
{
    return file_get_contents(public_path('img/' . $src . '.svg'));
}

function safe_html($html)
{
    $tags = [
        'p', 'span',
        'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
        'i', 'em',
        'b', 'strong',
        'hr',
        'ul', 'ol', 'li',
        'img',
    ];

    $allowed = '<' . join('><', $tags) . '>';

    return strip_tags($html, $allowed);
}

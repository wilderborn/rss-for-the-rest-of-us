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

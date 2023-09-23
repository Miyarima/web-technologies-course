<?php

/**
 * Create a shorter sting of the given content.
 *
 * @return string
 */
function getContentShort(string $content): string
{
    $text = "";
    if (strlen($content) > 200) {
        for ($i = 3; $i < 200; $i++) {
            $text .= $content[$i];
        }
    } else {
        $text = $content;
    }
    $text .= ".....";
    return $text;
}

/**
 * Create a shorter sting of the given content.
 *
 * @return string
 */
function getContentMaggy(string $content): string
{
    $text = "";
    for ($i = 17; $i < 190; $i++) {
        $text .= $content[$i];
    }
    $text .= ".....";
    return $text;
}

/**
 * Create a shorter sting of the given content.
 *
 * @return string
 */
function getContentMedium(string $content): string
{
    $text = "";
    for ($i = 3; $i < 300; $i++) {
        $text .= $content[$i];
    }
    $text .= ".....";
    return $text;
}

/**
 * Create a shorter sting of the given content.
 *
 * @return string
 */
function getContentLong(string $content): string
{
    $text = "";
    for ($i = 3; $i < 453; $i++) {
        $text .= $content[$i];
    }
    return $text;
}

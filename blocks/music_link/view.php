<?php

defined('C5_EXECUTE') or die('Access denied');

use Concrete\Core\View\View;

/** @var string $label */
/** @var string $spotify */
/** @var string $youtube */
/** @var string $soundcloud */
/** @var string $apple */
/** @var string $deezer */
/** @var string $tidal */
/** @var string $amazon */
/** @var string $napster */
/** @var string $itunes */

/** @noinspection PhpUnhandledExceptionInspection */
View::element("link_theme/button", [
    "label" => $label,
    "link" => null,
    "links" => [
        [
            "name" => t("Spotify"),
            "link" => $spotify
        ],
        [
            "name" => t("YouTube Music"),
            "link" => $youtube
        ],
        [
            "name" => t("SoundCloud"),
            "link" => $soundcloud
        ],
        [
            "name" => t("Apple Music"),
            "link" => $apple
        ],
        [
            "name" => t("Deezer"),
            "link" => $deezer
        ],
        [
            "name" => t("Tidal"),
            "link" => $tidal
        ],
        [
            "name" => t("Amazon Music"),
            "link" => $amazon
        ],
        [
            "name" => t("Napster"),
            "link" => $napster
        ],
        [
            "name" => t("iTunes"),
            "link" => $itunes
        ]
    ]
], "link_theme");

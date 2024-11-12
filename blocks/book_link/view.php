<?php

defined('C5_EXECUTE') or die('Access denied');

use Concrete\Core\View\View;

/** @var string $label */
/** @var string $apple */
/** @var string $amazon */
/** @var string $google */

/** @noinspection PhpUnhandledExceptionInspection */
View::element("link_theme/button", [
    "label" => $label,
    "link" => null,
    "links" => [
        [
            "name" => t("Apple Books"),
            "link" => $apple
        ],
        [
            "name" => t("Amazon Books"),
            "link" => $amazon
        ],
        [
            "name" => t("Google"),
            "link" => $google
        ]
    ]
], "link_theme");
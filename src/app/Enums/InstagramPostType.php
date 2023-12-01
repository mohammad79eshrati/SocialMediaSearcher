<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;


final class InstagramPostType extends Enum
{
    const VIDEO = 'video';
    const SLIDE = 'slide';
    const IMAGE = 'image';
}

<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Action extends Enum
{
    const SELECTING_LANGUAGE = 'selecting_language';
    const ENTERING_PHONE = 'entering_phone';
}

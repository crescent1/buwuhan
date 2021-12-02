<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Administrator()
 * @method static static User()
 */
final class UserType extends Enum
{
    const Administrator =   0;
    const User =   1;
}

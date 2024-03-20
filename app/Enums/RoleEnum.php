<?php

namespace App\Enums;

enum RoleEnum: int
{
    case ADMIN = 1;
    case MANAGER = 2;
    case SELLER = 3;
    case CLIENT = 4;
}

<?php

namespace App\Models;

use App\Models\Traits\HasPermission;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRole extends BaseModel
{
    use HasFactory, HasPermission;
}

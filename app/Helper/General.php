<?php

namespace App\Helper;

use App\Models\About;
use App\Models\Section;
use Illuminate\Support\Facades\DB;

class General
{
    public static function section()
    {
        return Section::get();
    }

    public static function logo()
    {
        return Section::with('sectionContent')->where('name', 'logo')->first();
    }
}

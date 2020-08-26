<?php

namespace App\Services;

use Spatie\Activitylog\Models\Activity;

class ActivityLogs
{
    public static function find($model)
    {
        return Activity::forSubject($model)->get();
    }
}

<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PusherApplication extends Model
{
    use HasFactory, HasDateTimeFormatter;

    public $incrementing = false;

    protected $keyType = 'string';

    const CACHE_KEY = 'pusher-apps';

    protected static function booted()
    {
        self::created(fn() => self::refreshPusherApps());
        self::updated(fn() => self::refreshPusherApps());
        self::deleted(fn() => self::refreshPusherApps());
    }

    public static function refreshPusherApps()
    {
        Cache::forget(self::CACHE_KEY);
    }
}

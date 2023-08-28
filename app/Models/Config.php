<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
    ];

    public static function get($key, $default = null)
    {
        $config = static::where('key', $key)->first();

        if ($config) {
            return $config->value;
        }

        return $default;
    }

    public static function set($key, $value)
    {
        $config = static::firstOrNew(['key' => $key]);
        $config->value = $value;
        $config->save();

        return $config;
    }

    public static function remove($key)
    {
        $config = static::where('key', $key)->first();

        if ($config) {
            $config->delete();
        }
    }
}

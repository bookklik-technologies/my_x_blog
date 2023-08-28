<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $table = 'home';

    protected $fillable = [
        'key',
        'value',
    ];

    protected $casts = [
        'value' => 'array',
    ];

    public static function get($key)
    {
        $home = static::where('key', $key)->first();

        if ($home) {
            return $home->value;
        }

        return null;
    }

    public static function set($key, $value)
    {
        $home = static::where('key', $key)->first();

        if ($home) {
            $home->value = $value;
            $home->save();
        } else {
            static::create([
                'key' => $key,
                'value' => $value,
            ]);
        }
    }

    public static function delete($key)
    {
        $home = static::where('key', $key)->first();

        if ($home) {
            $home->delete();
        }
    }

}

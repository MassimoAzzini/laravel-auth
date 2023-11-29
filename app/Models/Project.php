<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'start_project',
        'end_project',
        'url'
    ];


    public static function generateSlug($name)
    {
        $slug = Str::slug($name, '-');
        $original_slug = $slug;
        $exist = Project::where('slug', $slug)->first();
        $c = 1;
        while ($exist) {
            $slug = $original_slug . '-' . $c;
            $exist = Project::where('slug', $slug)->first();
            $c++;
        }
        return $slug;
    }

}

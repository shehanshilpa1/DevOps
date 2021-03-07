<?php

namespace App\Http\Helpers;

use App\Http\Models\Role;
use App\Http\Models\User;

class CommonHelper
{
    public static function getRoles()
    {
        $roles = Role::all();
        $roleArray = [];
        foreach ($roles as $key => $role) {
            if ($role->id!=1) {
                $roleArray[$role->id] = $role->name;
            }
        }
        return $roleArray;
    }

    public static function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}

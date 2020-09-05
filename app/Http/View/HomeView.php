<?php
namespace App\Http\View;

class HomeView implements View
{
    static function Html(array $arr): string
    {
        return " ! Hello from HomeView page ! " . $arr['id'];
    }
}
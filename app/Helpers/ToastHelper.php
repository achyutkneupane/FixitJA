<?php

// Author: Achyut Neupane

namespace App\Helpers;

class ToastHelper
{
    public static function showToast($message, $class = 'success')
    {
        session()->flash('toast', ['message' => $message, 'class' => $class]);
    }
}
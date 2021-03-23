<?php

// Author: Achyut Neupane

namespace App\Helpers;

use App\Models\ErrorLog;
use Illuminate\Support\Facades\Auth;
use Request;

class LogHelper
{
    public static function store($module, $e)
    {
        if (isset($e->validator)) {
            foreach ($e->validator->messages()->all() as $err) {
                $error = new ErrorLog;
                $error->found_by = auth()->user() ? auth()->id() : '1';
                $error->module = $module;
                $error->url = url()->current();
                $error->ip = Request::ip();
                $error->user_agent = Request::userAgent();
                $error->title = $e->getMessage();
                $error->description = $err;
                $error->save();
                session()->flash('toast', ['class' => 'error', 'message' => $err]);
            }
        } else {
            $error = new ErrorLog;
            $error->found_by = auth()->user() ? auth()->id() : '1';
            $error->module = $module;
            $error->url = url()->current();
            $error->ip = Request::ip();
            $error->user_agent = Request::userAgent();
            $error->title = $e->getSql();
            $error->description = $e->getMessage();
            $error->save();
            session()->flash('toast', ['class' => 'error', 'message' => $e->getMessage()]);
        }
    }
    static public function storeMessage($module, $message, $user,$title = "Custom Error")
    {
        $error = new ErrorLog;
        $error->found_by = $user->id;
        $error->module = $module;
        $error->url = url()->current();
        $error->ip = Request::ip();
        $error->user_agent = Request::userAgent();
        $error->title = $title;
        $error->description = $message;
        $error->save();
        ToastHelper::showToast('There has been some error. Please verify your action.','error');
    }
}
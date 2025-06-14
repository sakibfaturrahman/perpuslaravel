<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $data = [
            'title' => Setting::all(),
        ];
        return view('template.main', $data);
    }
    public function main()
    {
        $data = [
            'title' => Setting::all(),
        ];
        return view('template.header', $data);
    }
}

<?php

namespace App\Http\Controllers;

class PublicController extends Controller
{
    public function index()
    {
        return view('app');
    }

    public function resume()
    {
        return view('resume/index');
    }

    public function registerNotFound()
    {
        return response()->json([
            'message' => 'Register not found'
        ], 404, []);
    }
}

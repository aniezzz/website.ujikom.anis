<?php

namespace App\Http\Controllers;

use App\Models\ProgramKeahlian;

class ProgramKeahlianController extends Controller
{
    public function index()
    {
        $programs = ProgramKeahlian::all();
        return view('pages.program-keahlian', compact('programs'));
    }
}
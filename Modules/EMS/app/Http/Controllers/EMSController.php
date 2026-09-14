<?php

namespace Modules\EMS\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EMSController extends Controller
{
    /**
     * Display the welcome page.
     */
    public function welcome()
    {
        return view('ems::welcome');
    }

    /**
     * Display the dashboard.
     */
    public function dashboard()
    {
        return view('ems::dashboard');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ems::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ems::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('ems::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('ems::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {}
}

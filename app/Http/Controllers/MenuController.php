<?php

namespace App\Http\Controllers;

use App\Model\GroupMenu;
use App\Model\Menu;
use App\Model\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check() ){
            return view('menu.index', [
                'menu'=>[],
                'menus'=>Menu::all(), 
                'roles'=>Role::all(),
                'groupmenus'=>GroupMenu::all(),
             ]);
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        // if( Auth::check() ){
        //     $companies = Company::all();
        //     $company=Company::find($company->id);
        //     return view('company.index',  ['company'=>$company, 'companies'=>$companies]);
        // }
        // 
        if(Auth::check() ){
            return view('menu.index', [
                'menu'=>Menu::find($menu->id),
                'menus'=>Menu::all(), 
                'roles'=>Role::all(),
                'groupmenus'=>GroupMenu::all(),
             ]);
        }
        return view('auth.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Model\GroupMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class GroupMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::check() ){
            $groupmenu=[];
            $groupmenus = GroupMenu::all();
            return view('groupmenu.index', ['groupmenus'=>$groupmenus, 'groupmenu'=>$groupmenu]);
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
     * @param  \App\Model\GroupMenu  $groupMenu
     * @return \Illuminate\Http\Response
     */
    public function show(GroupMenu $groupMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\GroupMenu  $groupMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(groupmenu $groupmenu)
    {
        if( Auth::check() ){
            $groupmenus = GroupMenu::all();
            $groupmenu=GroupMenu::find($groupmenu->id);
            return view('groupmenu.index',  ['groupmenu'=>$groupmenu, 'groupmenus'=>$groupmenus]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\GroupMenu  $groupMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupMenu $groupMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\GroupMenu  $groupMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupMenu $groupMenu)
    {
        //
    }
}

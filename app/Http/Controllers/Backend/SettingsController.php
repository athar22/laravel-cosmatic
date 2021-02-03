<?php
namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate,Session;
use App\Settings;
class SettingsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {

    if ( Gate::denies('settings')  ) { abort(404); }
    $settings = Settings::find(1);
    return view('backend.pages.settings.index' , compact('settings') );
  }

  public function update(Request $request)
  {

    $settings = Settings::find(1);
    if(! $settings ) {
        $settings = new Settings ;
    }
    $settings->about_us = $request->about_us;
    $settings->mobile = $request->mobile;
    $settings->email = $request->email;
    $settings->address = $request->address;
    $settings->projects = $request->projects;
    $settings->client = $request->client;
    $settings->employees = $request->employees;
    $settings->support = $request->support;
    $settings->expert_employees = $request->expert_employees;
    $settings->verified_service = $request->verified_service;
    $settings->secured_service = $request->secured_service;
    $settings->our_services = $request->our_services;
    $settings->can_i_help = $request->can_i_help;
    $settings->facebook = $request->facebook;
    $settings->twitter = $request->twitter;
    $settings->youtube = $request->youtube;
    $settings->instagram = $request->instagram;
    $settings->history = $request->history;
    $settings->contact = $request->contact;
    $settings->map = $request->map;

    $settings->save();

    return back();
  }


}

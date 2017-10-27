<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\View;

class formController extends Controller
{
    public function create()
   {
      return View::make('resourses/views/form');
   }

  public function store()
   {
      return Input::all();
   }
}

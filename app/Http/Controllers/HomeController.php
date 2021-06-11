<?php

namespace App\Http\Controllers;

use App\Anuncio;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$role = Role::create(['name' => 'Admin']);
         //$user = Auth::user();
         //$user->assignRole('Admin');
        $anuncios = Anuncio::where('activo', 1)->orderBy('created_at', 'DESC')->paginate(15);
        if (isset($anuncios)) {
            return view('home', [
                'anuncios' => $anuncios
            ]);
        }
        return view('home');
    }
}

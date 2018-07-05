<?php

namespace App\Http\Controllers;

use App\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class NuevoController extends Controller
{
    public function direct()
    {
        return view('Nuevo');
    }

    public function InsertDocument(Request $request)
    {
        $temp =$request->all();
        Documents::create($temp);
        //dd($request->all());
        echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Guardado con Exito</strong> Tu Documento a sido guardado
                  
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');

        return redirect(Route('home'));

    }


}

<?php

namespace App\Http\Controllers;

use App\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class EditController extends Controller
{
    public function index($id)
    {
        $data = Documents::where('id', '=', $id)
                ->first();

        //return ($data);
        return view('edit', compact('data'));
    }

    public function update(Request $request)
    {

        $doc = Documents::find($request->id);
        $doc->version = $doc->version + 1;
        $doc->Documento = $request->Documento;

        $doc -> save();

        echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Guardado con Exito</strong> Tu Documento a sido actualizado
                  
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');

        return redirect(Route('home'));

    }
}

<?php

namespace App\Http\Controllers;

use App\Documents;
use Illuminate\Http\Request;

class deleteDocController extends Controller
{
    public function index($id)
    {
        $data = Documents::where('id', '=', $id)
            ->first();

        return view('delete', compact('data'));
    }

    public function deletedoc(request $request)
    {
        $doc = Documents::find($request->id);
        $doc -> delete();

        echo ('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Eliminado con Exito</strong> Tu Documento a sido eliminado
                  
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>');

        return redirect(Route('home'));
    }


}

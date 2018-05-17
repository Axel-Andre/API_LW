<?php

namespace Modules\Backend\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class BackendController extends Controller
{
    /**
     * Affiche l'esapce d'administration
     * @return Response
     */
    public function index()
    {
        return view('backend::home');
    }

}

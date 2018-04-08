<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title as Title;

class ClientController extends Controller
{
    //
    public function __construct( Title $titles )
    {
        $this->titles = $titles->all();
    }

    public function di()
    {
        dd($this->titles);
    }

    public function index()
    {
       $data = []; 
       $obj = new \stdClass;
       $obj->id = 1;
       $obj->title = 'mr';
       $obj->name = 'john';
       $obj->last_name = 'doe';
       $obj->email = 'john@domain.com';
       $data['clients'][] = $obj;
 
       $obj = new \stdClass;
       $obj->id = 2;
       $obj->title = 'ms';
       $obj->name = 'jane';
       $obj->last_name = 'doe';
       $obj->email = 'jane@another-domain.com';
       $data['clients'][] = $obj;
       
        return view('client/index',$data);
    }

    public function newClient()
    {
        $data = [];
        $data['titles'] = $this->titles;
        return view('client/newClient',$data);
    }

    public function create()
    {
            return view('client/create');
    }

    public function show($client_id)
    {
        return view('client/show');
    }
}

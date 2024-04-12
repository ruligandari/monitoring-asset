<?php

namespace App\Controllers\Mobile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class HomeController extends BaseController
{
    function __construct()
    {
        $this->masterassets = new \App\Models\MasterAssetModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
        return view('mobile/home/home', $data);
    }

    public function master()
    {
        $masterassets = $this->masterassets->findAll();

        $data = [
            'title' => 'Master Aset',
            'masterassets' => $masterassets
        ];
        return view('mobile/master-aset/master-aset', $data);
    }
}

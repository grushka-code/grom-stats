<?php

namespace App\Http\Controllers;

use App\Models\Directory;
use App\Models\Page;

class PagesController extends Controller
{

    public function index(){
        $directories = Directory::query()
            ->mainDirectories()
            ->visible()
            ->pluck('title', 'id');
        $data = [];
        foreach ($directories as $id => $directory){
            $data[$directory] = Page::query()
                ->byDirectory($id)
                ->approved()
                ->limit(5)
                ->get();
        }
        return view('pages.pages',['data' => $data]);
    }

    public function page(Page $page){

        return view('pages.page',['model' => $page]);
    }
}

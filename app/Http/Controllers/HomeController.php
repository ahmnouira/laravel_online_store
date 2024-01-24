<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = "Home Page -- Online Store";
        return view('home.index')->with('viewData', $viewData);
    }
    /*
    public function about()
    {
        $data1  = "About us - Online Store";
        $data2 = "About us";
        $description = "This is an about page ...";
        $author = "Developed by: ahmnouira";
        return view('home.about')->with("title", $data1)
            ->with('subtitle', $data2)
            ->with('description', $description)
            ->with('author', $author);
    }
    */

    public function about()
    {
        // viewData variable contains all the data sent to the view. This variable is an associative array.
        $viewData = [];
        $viewData['title']  = "About us - Online Store";
        $viewData['subtitle'] = "About us";
        $viewData['description']  = "This is an about page ...";
        $viewData['author'] = "Developed by: ahmnouira";
        return view('home.about')->with("viewData", $viewData);
    }
}

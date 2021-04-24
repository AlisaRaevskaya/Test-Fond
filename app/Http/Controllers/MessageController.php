<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class MessageController extends Controller
{
    public function support(){
         $page= Page::where('laravel_name', 'center-podderzhky')->OfSort(['sort_order' => 'asc'])->IsPublished()->first();
         $id=$page->id;
        $items=Page::where('parent_id', $id)->IsPublished()->get();
        return view('reception.support', compact('page','items'));
    }

    public function reception(){
        $page= Page::where('laravel_name', 'reception')->IsPublished()->first();
        return view('reception.reception', compact('page'));
    }

    public function lawyer(){
        $page= Page::where('laravel_name', 'lawyer')->IsPublished()->first();
        return view('reception.lawyer', compact('page'));
    }

    public function hotline(){
        $page= Page::where('laravel_name', 'hotline')->IsPublished()->first();
        return view('reception.hotline', compact('page'));
    }
    public function application(){
         $page= Page::where('laravel_name', 'application')->IsPublished()->first();
        return view('reception.application',compact('page'));
    }
    public function claim(){
         $page= Page::where('laravel_name', 'claim')->IsPublished()->first();
        return view('reception.claim', compact('page'));
    }
    public function problem(){
        $page= Page::where('laravel_name', 'problem')->IsPublished()->first();
        return view('reception.problem', compact('page'));
    }
    public function fzakon(){
        return view('blocks.fzakon59-f3');
    }

}
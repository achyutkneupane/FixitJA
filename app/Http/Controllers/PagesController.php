<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';

        return view('demo1_pages.dashboard', compact('page_title', 'page_description'));
    }

    /**
     * Demo methods below
     */

    // Datatables
    public function datatables()
    {
        $page_title = 'Datatables';
        $page_description = 'This is datatables test page';

        return view('demo1_pages.datatables', compact('page_title', 'page_description'));
    }

    // KTDatatables
    public function ktDatatables()
    {
        $page_title = 'KTDatatables';
        $page_description = 'This is KTdatatables test page';

        return view('demo1_pages.ktdatatables', compact('page_title', 'page_description'));
    }

    // Select2
    public function select2()
    {
        $page_title = 'Select 2';
        $page_description = 'This is Select2 test page';

        return view('demo1_pages.select2', compact('page_title', 'page_description'));
    }

    // jQuery-mask
    public function jQueryMask()
    {
        $page_title = 'jquery-mask';
        $page_description = 'This is jquery masks test page';

        return view('demo1_pages.jquery-mask', compact('page_title', 'page_description'));
    }

    // custom-icons
    public function customIcons()
    {
        $page_title = 'customIcons';
        $page_description = 'This is customIcons test page';

        return view('demo1_pages.icons.custom-icons', compact('page_title', 'page_description'));
    }

    // flaticon
    public function flaticon()
    {
        $page_title = 'flaticon';
        $page_description = 'This is flaticon test page';

        return view('demo1_pages.icons.flaticon', compact('page_title', 'page_description'));
    }

    // fontawesome
    public function fontawesome()
    {
        $page_title = 'fontawesome';
        $page_description = 'This is fontawesome test page';

        return view('demo1_pages.icons.fontawesome', compact('page_title', 'page_description'));
    }

    // lineawesome
    public function lineawesome()
    {
        $page_title = 'lineawesome';
        $page_description = 'This is lineawesome test page';

        return view('demo1_pages.icons.lineawesome', compact('page_title', 'page_description'));
    }

    // socicons
    public function socicons()
    {
        $page_title = 'socicons';
        $page_description = 'This is socicons test page';

        return view('demo1_pages.icons.socicons', compact('page_title', 'page_description'));
    }

    // svg
    public function svg()
    {
        $page_title = 'svg';
        $page_description = 'This is svg test page';

        return view('demo1_pages.icons.svg', compact('page_title', 'page_description'));
    }

    //login1
    public function login1()
    {
        $page_title = 'login1';
        $page_description = 'This is login1 test page';

        return view('demo1_pages.login-1', compact('page_title', 'page_description'),["show_sidebar" => false]);
    }
    //wizard1
    public function wizard1()
    {
        $page_title = 'Wizard1';
        $page_description = 'This is wizard1 test page';

        return view('demo1_pages.wizard-1', compact('page_title', 'page_description'),["show_sidebar" => false]);
    }
      //tagify
      public function tagify()
      {
          $page_title = 'Tagify';
          $page_description = 'This is tagify test page';

          return view('demo1_pages.tagify', compact('page_title', 'page_description'),["show_sidebar" => false]);
      }
    // Quicksearch Result
    public function quickSearch()
    {
        return view('demo1_layout.partials.extras._quick_search_result');
    }
}

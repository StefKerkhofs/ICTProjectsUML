<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class GuestPagesController extends Controller
{
    //
    public function showPage($page)
    {
        $sContent="";
        try{
            $oPageData = Page::where('page_name', $page)->first();
            if ($oPageData->page_type == 'pdf'){
                $sContent = '<iframe src="http://docs.google.com/gview?url='.$oPageData->page_content.'&embedded=true" style="width:100%; height:1000px;" frameborder="0"></iframe>';
            }
            else{
                $sContent = $oPageData->page_content;
            }
        }
        catch (ErrorException  $e){
            $sContent = $e->getMessage();
        }



        return view('guest.contentpage', [
            'sContent' => $sContent
        ]);

    }
}

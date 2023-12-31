<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageTermItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class PageTermController extends Controller
{
    public function edit()
    {
        $page_term = PageTermItem::where('id',1)->first();
        return view('admin.page_setting.page_term', compact('page_term'));
    }

     public function update(Request $request)
     {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
         $data['name'] = $request->input('name');
         $data['detail'] = $request->input('detail');
         $data['status'] = $request->input('status');
         $data['seo_title'] = $request->input('seo_title');
         $data['seo_meta_description'] = $request->input('seo_meta_description');

         PageTermItem::where('id',1)->update($data);

         return redirect()->back()->with('success', 'Term Page Content is updated successfully!');

     }

}

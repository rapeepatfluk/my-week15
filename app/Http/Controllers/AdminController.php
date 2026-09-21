<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function blog2()
    {
        $blog2 = Blog::paginate(5);
        return view('blog2', compact('blog2'));
    }

    function delete($id){
        // dd(DB::table("blogs")->where("id", $id)->get());
        Blog::find($id)->delete();
        return redirect()->back()->with("success", "ลบบทความเรียบร้อย");
    }


    function about2()
    {
        $name = 'Rapeepat Wongsuwan';
        $date = '02 June 2026';
        return view('abouts', compact('name', 'date'));
    }

    function create()
    {
        return view('form');
    }

    function insert(Request $req)
    {   
        $req->validate([
            'idproduct'=> 'required|max:50',
            'email' => 'required|email',
            'content' => 'required|max:50',
            'priority' => 'required|max:50',
        ],[
            'idproduct.required'=> 'กรุณากรอกรหัสสินค้า',
            'idproduct.max'=> 'รหัสสินค้าต้องไม่เกิน 50 ตัวอักษร',
            'email.required'=> 'กรุณากรอกอีเมล',
            'email.email'=> 'กรุณากรอกอีเมลให้ถูกต้อง',
            'content.required'=> 'กรุณากรอกอาการชำรุด',
            'content.max'=> 'อาการชำรุดต้องไม่เกิน 50 ตัวอักษร',
            'priority.required'=> 'กรุณากรอกระดับความเร่งด่วน',
            'priority'=> 'ระดับความเร่งด่วนต้องไม่เกิน 50 ตัวอักษร',
        ]);
    }

    function createBlog()
    {
        return view('form_blog');
    }

    function insertBlog(Request $req)
    {
        $req->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required',
        ], [
            'title.required' => 'กรุณากรอกชื่อบทความ',
            'title.max' => 'ชื่อบทความต้องไม่เกิน 255 ตัวอักษร',
            'content.required' => 'กรุณากรอกเนื้อหาบทความ',
            'status.required' => 'กรุณาเลือกสถานะ',
        ]);

        Blog::insert([
            'title' => $req->title,
            'content' => $req->content,
            'status' => $req->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/authors/blog2')->with('success', 'บันทึกบทความเรียบร้อย');
    }
    
    function edit($id){
    $blog = Blog::find($id);
    return view("edit", compact('blog'));
}
// function update(Request $request, $id)
// {
//     $request->validate(['title' => 'required']);
//     DB::table('blogs')->where('id', $id)->update([
//         'title' => $request->title,
//         'content' => $request->content,
//         'status' => $request->status,
//         'updated_at' => now()
//     ]);
//     return redirect('/blog2')->with('success', 'บันทึกแก้ไขแล้ว');
// }
    
function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|max:50',
        'content' => 'required',
    ], [
        'title.required' => 'กรุณาใส่ชื่อบทความ',
        'title.max' => 'ชื่อบทความต้องไม่เกิน 50 ตัวอักษร',
        'content.required' => 'กรุณาใส่เนื้อหา',
    ]);
    $data = [
        'title' => $request->title,
        'content' => $request->content,
        'status' => $request->status,
        'updated_at' => now(),
    ];
    Blog::find($id)->update($data);
    return redirect('/authors/blog2')->with('success', 'บันทึกแก้ไขแล้ว');
}

function change($id)
{
    $blog = Blog::find($id);
    $data=[
        'status' => $blog->status
    ];
    if($data['status'] == 0){
        $data['status']= 1;
    }
    else{
        $data['status'] = 0;
    }
    Blog::find($id)->update($data);
    
    // $blog->update([
    //     'status' => !$blog->status,
    //     'updated_at' => now()
    // ]);
    return redirect()->back();
}
}

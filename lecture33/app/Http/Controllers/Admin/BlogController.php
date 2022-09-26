<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogs'] = Blog::join('blog_categories', 'blog_categories.id', '=', 'blogs.category_id')
            ->select('blogs.*', 'blog_categories.name')
            ->get();
        return view('admin.blog.listData', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['blogCategories'] = BlogCategory::get();
        return view('admin.blog.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'title'       => 'required',
            'valid'       => 'required',
        ]);

        if ($validator->passes()) {

            Blog::create([
                'category_id' => $request->category_id,
                'title'       => $request->title,
                'sub_title'   => $request->sub_title,
                'description' => $request->description,
                'thumbnail'   => self::fileUploader($request->thumbnail, public_path('uploads/blogThumb')),
                'valid'       => $request->valid,
            ]);
            Toastr::success('Blog created successfully', 'Success');
        } else {
            $errMsgs = $validator->messages();
            foreach ($errMsgs->all() as $msg) {
                Toastr::error($msg, 'Required');
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['blogCategoryInfo'] = Blog::find($id);
        return view('admin.blog.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'title'       => 'required',
            'valid'       => 'required',
        ]);

        if ($validator->passes()) {
            Blog::find($id)->update([
                'category_id' => $request->category_id,
                'title'       => $request->title,
                'sub_title'   => $request->sub_title,
                'description' => $request->description,
                'thumbnail'   => $request->thumbnail,
                'valid'   => $request->valid,
            ]);
            Toastr::success('Blog Updated successfully', 'Success');
        } else {
            $errMsgs = $validator->messages();
            foreach ($errMsgs->all() as $msg) {
                Toastr::error($msg, 'Required');
            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blog::find($id)->delete();
        Toastr::success('Category Deleted successfully', 'Success');
        return redirect()->back();
    }


    public static function fileUploader($mainFile, $path)
    {
        $fileName = time().'.'.$mainFile->extension();
        $mainFile->move($path, $fileName);
        return $fileName;
    }
}

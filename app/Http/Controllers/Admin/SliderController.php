<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{

    private $product;
    private $slider;
    public function __construct(Product $product, Slider $slider)
    {
        $this->product = $product;
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider->all();
        // dd($sliders);
        return view("admin.pages.slider.index", compact("sliders"));
    }


    public function create()
    {
        $links = $this->product->all();
        // dd($links);
        return view("admin.pages.slider.create", compact("links"));
    }


    public function store(Request $request)
    {

        // validator
        $rules = [
            'caption' => 'required|min:4',
            'image' => 'required|mimetypes:image/jpeg,image/png|max:5048',
            'desc' => 'required|min:4',

        ];

        $request->validate($rules);
        $request->link = $request->link != null ? $request->link : "#";
        // images
        $pathAvatar = $request->file('image')->store('public/slider');
        $pathAvatar = str_replace("public/", "", $pathAvatar);
        // save database

        try {
            DB::beginTransaction();
            $this->slider->create([
                'caption' => $request->caption,
                'image' => $pathAvatar,
                'desc' => $request->desc,
                'link' => $request->link,
            ]);
            DB::commit();
            return redirect()->route('cp-admin.slider.index')->with('status', 'Thêm thành công!');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('erros', 'Thêm thất bại !');
            Log::error('message :', $exception->getMessage() . '--line :' . $exception->getLine());
        }
    }


    public function show(Slider $slider, $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function edit(Slider $slider, $id)
    {
        $sliders = $this->slider->find($id);
        $links = $this->product->all();
        return view("admin.pages.slider.edit", compact("sliders", "links"));
    }


    public function update(Request $request, $id)
    {

        // validator
        $rules = [
            'caption' => 'required|max:300|min:4',
            'image' => 'mimetypes:image/jpeg,image/png|max:5048',
            'desc' => 'required|max:200|min:4',

        ];
        $messages = [
            'caption.required' => 'Mời nhập tiêu đề!',
            'caption.max' => 'tiêu đề không quá 300 ký tự!',
            'caption.min' => 'tiêu đề  ít nhất 4 ký tự!',
            'image.mimetypes' => 'Ảnh không đúng định dang:jpeg /png /jpg ',
            'image.max' => 'Kích thước ảnh tối đa 5048 kb',
            'desc.required' => 'Mời nhập tiêu đề chi tiết!',
            'desc.max' => 'tiêu đề chi tiết  không quá 200 ký tự!',
            'desc.min' => 'tiêu đề chi tiết  ít nhất 4 ký tự!',

        ];
        $pathAvatar = "";
        $slider =  $this->slider->find($id);
        if ($request->file('image') != null) {
            if (file_exists("storage/" . $slider->image)) {
                unlink("storage/" . $slider->image);
            }
            $pathAvatar = $request->file('image')->store('public/slider');
            $pathAvatar = str_replace("public/", "", $pathAvatar);
        } else {
            $pathAvatar = $slider->image;
        }
        // dd($pathAvatar);

        try {
            DB::beginTransaction();
            $slider->update([
                'caption' => $request->caption,
                'image' => $pathAvatar,
                'desc' => $request->desc,
                'link' => $request->link,
            ]);
            DB::commit();
            return redirect()->route('cp-admin.slider.index')->with('status', 'Thêm thành công!');
        } catch (Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('erros', 'Thêm thất bại !');
            Log::error('message :', $exception->getMessage() . '--line :' . $exception->getLine());
        }
    }


    public function destroy(Slider $slider, $id)
    {
        $slider =  $this->slider->find($id);
        if (file_exists("storage/" . $slider->image)) {
            unlink("storage/" . $slider->image);
        }
        $slider->delete();
        return redirect()->back();
    }
}

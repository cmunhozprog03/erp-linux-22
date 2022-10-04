<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use function PHPUnit\Framework\returnSelf;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'ASC');
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategory $request)
    {
        $data = $request->all();
        
        if ($request->picture) {
            $data['picture'] = $request->picture->store('categories');

            $data['thumb'] = $request->picture->store('categories/thumbs');
            
            // $name = Str::random(20) . $request->file('picture')->getClientOriginalName();
            
            // $route = storage_path() . '/app/public/categories/' . $name;
            

            // $data['thumb'] = Image::make($request->file('picture'))
            // ->resize(150, null, function ($constraint) {
            //     $constraint->aspectRatio();
            // })->save($route);
        }

        Category::create($data);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($url)
    {
        $category = Category::where('url', $url)->first();
        
        if(!$category)
            return redirect()->back();

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategory $request, $url)
    {
        $category = Category::where('url', $url)->first();
        
        if(!$category)
            return redirect()->back();

        $data = $request->all();

        if ($request->hasFile('picture')){
            if(Storage::exists($category->picture)){
                Storage::delete($category->picture);
                Storage::delete($category->thumb);
            }

            if ($request->picture) {
                $data['picture'] = $request->picture->store('categories');
    
                $data['thumb'] = $request->picture->store('categories/thumbs');

            }
        }
        
        $category->update($data);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}

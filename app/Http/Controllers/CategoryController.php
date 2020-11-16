<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::with('parent');
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    return view('layouts.partials._action', [
                        'model' => $data,
                        'show_url' => route('category.show', $data->id),
                        'edit_url' => route('category.edit', $data->id),
                        'delete_url' => route('category.destroy', $data->id)
                    ]);
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('pages.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'type' => 'required',
            'title' => 'required',
            'parent_id' => 'sometimes|numeric|nullable'
        ]);

        return Category::create($data);
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
        //
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
        $category = Category::findOrFail($id);

        $data = $this->validate($request, [
            'type' => 'required',
            'title' => 'required',
            'parent_id' => 'sometimes|numeric|nullable'
        ]);

        return $category->update($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $category = Category::findOrFail($id);

        if ($category->sub) {
            foreach ($category->sub as $sub) {
                $sub->update(['parent_id' => null]);
            }
            $category->delete();
        }

        $category->delete();

        return 'true';
    }
}

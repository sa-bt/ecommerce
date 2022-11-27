<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\Admin\ProductRepository;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private ProductRepository $repository;
    private CategoryRepository $categoryRepository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $products = $this->repository->allByPagination();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin/products/create');
    }

    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->repository->create($request->validated());
            DB::commit();
            $this->success(trans('common.created_tag'));
            return redirect()->route('admin.products.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->alert(trans('common.alert'));
            return redirect()->back();
        }

    }

    public function show(Tag $tag)
    {
        return view('admin/products/show', compact('tag'));
    }


    public function edit(Tag $tag)
    {
        return view('admin/products/edit',compact('tag'));
    }


    public function update(ProductRequest $request, $tag)
    {
        try {
            DB::beginTransaction();
            $this->repository->update($request->validated(),$tag);
            DB::commit();
            $this->success(trans('common.updated_tag'));
            return redirect()->route('admin.products.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->alert(trans('common.alert'));
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Tag;
use App\Repositories\Admin\BrandRepository;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\Admin\ProductRepository;
use App\Repositories\Admin\TagRepository;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private ProductRepository $repository;
    private CategoryRepository $categoryRepository;
    private BrandRepository $brandRepository;
    private TagRepository $tagRepository;

    public function __construct(ProductRepository $repository, BrandRepository $brandRepository, CategoryRepository $categoryRepository, TagRepository $tagRepository)
    {
        $this->repository = $repository;
        $this->brandRepository = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        $products = $this->repository->allByPagination();
        return view('admin.products.index', compact('products',));
    }

    public function create()
    {

        $brands = $this->brandRepository->all();
        $categories = $this->categoryRepository->findBy([["parent_id", ">", "0"]]);
        $tags = $this->tagRepository->all();
        return view('admin.products.create', compact('tags', 'brands', 'categories'));
    }

    public function store(ProductRequest $request)
    {
        //Upload files
        $images=uploadProductImages($request->primary_image, $request->images);
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
        return view('admin/products/edit', compact('tag'));
    }


    public function update(ProductRequest $request, $tag)
    {
        try {
            DB::beginTransaction();
            $this->repository->update($request->validated(), $tag);
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

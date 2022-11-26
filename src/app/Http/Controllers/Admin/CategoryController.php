<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Repositories\Admin\AttributeRepository;
use App\Repositories\Admin\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    private CategoryRepository $repository;
    private AttributeRepository $attributeRepository;

    public function __construct(CategoryRepository $repository, AttributeRepository $attributeRepository)
    {
        $this->repository = $repository;
        $this->attributeRepository = $attributeRepository;
    }

    public function index()
    {
        $categories = $this->repository->allByPagination();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $parentCategories = $this->repository->findBy(['parent_id' => 0]);
        $attributes = $this->attributeRepository->all();
        return view('admin/categories/create', compact('parentCategories', 'attributes'));
    }

    public function store(CategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $category = $this->repository->create($request->validated());
            foreach ($request->attribute_ids as $attributeId) {
                $attribute = $this->attributeRepository->findOneOrFail($attributeId);
                $attribute->categories()->attach($category->id, [
                    "is_filter" => in_array($attributeId, $request->attribute_is_filter_ids) ? 1 : 0,
                    "is_variation" => $request->variation_id == $attributeId ? 1 : 0]);
            }
            DB::commit();
            $this->success(trans('common.created_category'));
            return redirect()->route('admin.categories.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Alert::toast($exception->getMessage(), 'alert')->position('bottom-left')->timerProgressBar();
            return redirect()->back();
        }

    }

    public function show(Category $category)
    {
        return view('admin/categories/show', compact('category'));
    }


    public function edit(Category $category)
    {
        $parentCategories = $this->repository->findBy(['parent_id' => 0]);
        $attributes = $this->attributeRepository->all();
        return view('admin/categories/edit', compact('parentCategories', 'attributes','category'));
    }


    public function update(CategoryRequest $request, Category $category)
    {
        try {
            DB::beginTransaction();
            $category->attributes()->detach();
            foreach ($request->attribute_ids as $attributeId) {
                $attribute = $this->attributeRepository->findOneOrFail($attributeId);
                $attribute->categories()->attach($category->id, [
                    "is_filter" => in_array($attributeId, $request->attribute_is_filter_ids) ? 1 : 0,
                    "is_variation" => $request->variation_id == $attributeId ? 1 : 0]);
            }
            DB::commit();
            $this->success(trans('common.updated_category'));
            return redirect()->route('admin.categories.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->alert(trans('common.alert'));
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}

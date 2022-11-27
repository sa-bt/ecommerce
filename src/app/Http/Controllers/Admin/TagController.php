<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Models\Tag;
use App\Repositories\Admin\TagRepository;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    private TagRepository $repository;

    public function __construct(TagRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $tags = $this->repository->allByPagination();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin/tags/create');
    }

    public function store(TagRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->repository->create($request->validated());
            DB::commit();
            $this->success(trans('common.created_tag'));
            return redirect()->route('admin.tags.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            $this->alert(trans('common.alert'));
            return redirect()->back();
        }

    }

    public function show(Tag $tag)
    {
        return view('admin/tags/show', compact('tag'));
    }


    public function edit(Tag $tag)
    {
        return view('admin/tags/edit',compact('tag'));
    }


    public function update(TagRequest $request, $tag)
    {
        try {
            DB::beginTransaction();
            $this->repository->update($request->validated(),$tag);
            DB::commit();
            $this->success(trans('common.updated_tag'));
            return redirect()->route('admin.tags.index');
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

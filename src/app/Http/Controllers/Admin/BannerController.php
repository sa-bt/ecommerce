<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use App\Repositories\Admin\BannerRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    protected BannerRepository $repository;

    public function __construct(BannerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $banners=$this->repository->allByPagination();
        return view('admin/banners/index', compact('banners'));
    }


    public function create()
    {
        return view('admin/banners/create');
    }


    public function store(BannerRequest $request)
    {
        $data = $request->validated();

        //Upload files
        $data['image'] = uploadBannerImage($request->image);

        $this->repository->create($data);
        $this->success(trans('common.created_record',['value'=>'بنر']));
        return redirect()->route('admin.banners.index');
    }

    public function show(Banner $banner)
    {
        return view('admin/banners/show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin/banners/edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {

        $data = $request->validated();

        //Upload files
        if ($request->has('image')){
            $data['image'] = uploadBannerImage($request->image);
        }

        $this->repository->update($data,$banner->id);
        $this->success(trans('common.updated_record',['value'=>'بنر']));
        return redirect()->route('admin.banners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Banner $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}

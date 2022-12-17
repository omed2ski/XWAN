@extends('layouts.master')

@section('title','View Settings')

@section('pageName','Settings')

@section('contents')

<div class="container-fluid px-4">

    <div class="row mt-3">
        <div class="col-md-12">
            @if (session('message'))
                <h4 class="alert alert-warning">{{session('message')}}</h4>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Website Settings</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('admin/settings')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Website name</label>
                            <input type="text" required name="web_name" @if($setting)  value="{{$setting->web_name}}"  @endif class="form-control">
                        </div>

                        <div class="mb-3">

                            <label for="">Logo</label>
                            <input type="file" name="web_logo" class="form-control">
                            @if($setting)
                            <img src="{{asset('uploads/settings/'.$setting->logo)}}" width="80px" height="80px" alt="logo">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="">Website Favicon</label>
                            <input type="file" name="web_favicon" class="form-control">
                            @if($setting)
                            <img src="{{asset('uploads/settings/'.$setting->favicon)}}" width="80px" height="80px" alt="logo">
                            @endif

                        </div>

                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="description" rows="3" class="form-control">@if($setting)  {{$setting->description}}  @endif</textarea>

                        </div>

                        <h6>SEO Tags</h6>

                        <div class="mb-3">
                            <label for="">Meta title</label>
                            <input type="text" name="meta_title" @if($setting)  value="{{$setting->meta_title}}"  @endif class="form-control">

                        </div>

                        <div class="mb-3">
                            <label for="">Meta Keyword</label>
                            <textarea name="meta_keyword" rows="3" class="form-control">@if($setting)  {{$setting->meta_keyword}}  @endif</textarea>

                        </div>

                        <div class="mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" rows="3" class="form-control">@if($setting)  {{$setting->meta_description}}  @endif</textarea>

                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>




                    </form>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection
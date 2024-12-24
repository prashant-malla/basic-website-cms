@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30 d-flex align-items-center flex-wrap">
                    <h2 class="mr-20">Photo Gallery</h2>
                    <a href="{{ route('admin.photo.create') }}" class="main-btn primary-btn btn-hover btn-sm">
                        <i class="lni lni-plus mr-5"></i> New
                    </a>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.home') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Photo Gallery
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-style mb-30">
                <h6 class="mb-10">Photo Gallery List</h6>
                <p class="text-sm mb-20">
                    For basic styling—light padding and only horizontal
                    dividers—use the class table.
                </p>
                @include('common.flash_message')
                <div class="table-wrapper table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <h6>#</h6>
                                </th>
                                <th>
                                    <h6>Title</h6>
                                </th>
                                <th>
                                    <h6>Status</h6>
                                </th>
                                <th>
                                    <h6>Action</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @foreach ($photos as $photo)
                            <tr>
                                <td>
                                    <div class="employee-image">
                                        <img src="{{ asset('uploads/photo_galleries/'.$photo->main_image) }}" alt="">
                                    </div>
                                </td>
                                <td class="min-width">
                                    <p>{{ $photo->title }}</p>
                                </td>
                                <td class="min-width">
                                    @if ($photo->is_active)
                                        <span class="status-btn active-btn">Active</span>
                                    @else
                                        <span class="status-btn close-btn">In Active</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action">
                                        <a href="{{ route('admin.photo.edit', $photo->id) }}" class="text-edit">
                                            <i class="lni lni-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.photo.destroy', $photo->id) }}" method="delete">
                                            @csrf
                                            <button class="text-danger" type="submit">
                                                <i class="lni lni-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- end table -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection

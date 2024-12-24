@extends('layouts.app')

@section('content')
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30 d-flex align-items-center flex-wrap">
                    <h2 class="mr-20">Contact List</h2>
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
                                Contacts
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
                <h6 class="mb-10">Contacts</h6>
                <p class="text-sm mb-20">
                    list of contacts
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
                                    <h6>Name</h6>
                                </th>
                                <th>
                                    <h6>Email</h6>
                                </th>
                                <th>
                                    <h6>Phone</h6>
                                </th>
                                <th>
                                    <h6>Created At</h6>
                                </th>
                                <th>
                                    <h6>Action</h6>
                                </th>
                            </tr>
                            <!-- end table row-->
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>
                                        <p>{{ $loop->iteration }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $contact->name }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $contact->email }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $contact->phone }}</p>
                                    </td>
                                    <td class="min-width">
                                        <p>{{ $contact->created_at->diffForHumans() }}</p>
                                    </td>
                                    <td>
                                        <div class="action gap-3">
                                            <a href="#" class="text-edit show-message"
                                                data-subject="{{ $contact->subject }}"
                                                data-message="{{ $contact->message }}">
                                                <i class="lni lni-eye"></i>
                                            </a>
                                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                                                method="post" onclick="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
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
    @include('admin.contacts.partials.message')
@endsection

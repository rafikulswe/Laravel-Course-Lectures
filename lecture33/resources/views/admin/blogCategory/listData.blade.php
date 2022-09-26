@extends('admin.layouts.default')

@section('title', 'Blog Category')

@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="datatable_basic.html">Datatables</a></li>
                <li class="active">Basic</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Blog Category</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        {{-- <li style="margin-right: 10px;"><a href="{{ route('blogCategory.create') }}" class="btn btn-primary add-new">Add New</a></li> --}}
                        <li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Launch demo modal
                          </button></li>
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($blogCategories))
                            @foreach ($blogCategories as $key => $category)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        @if ($category->valid == 1)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">InActive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('blogCategory.edit', $category->id) }}"><i class="icon-pencil"></i></a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenterEdit-{{ $category->id }}">
                                            Launch demo modal
                                          </button>
                                        <form action="{{ route('blogCategory.destroy', $category->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                            <button type="submit"><i class="icon-bin"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">No Data found!</td>
                            </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /basic datatable -->

    </div>
    <!-- /content area -->
@endsection


<!-- Add Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="form-horizontal" action="{{ route('blogCategory.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <fieldset class="content-group">
                        <legend class="text-bold"></legend>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Name</label>
                            <div class="col-lg-10">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Status</label>
                            <div class="col-lg-10">
                                <select name="valid" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">In Active</option>
                                </select>
                            </div>
                        </div>

                    </fieldset>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>



<!-- Edit Modal -->
@foreach ($blogCategories as $category)
    <div class="modal fade" id="exampleModalCenterEdit-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="form-horizontal" action="{{ route('blogCategory.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <fieldset class="content-group">
                            <legend class="text-bold"></legend>

                            <div class="form-group">
                                <label class="control-label col-lg-2">Name</label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-2">Status</label>
                                <div class="col-lg-10">
                                    <select name="valid" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="1" @if ($category->valid == 1) selected @endif>Active</option>
                                        <option value="0" @if ($category->valid == 0) selected @endif>In Active</option>
                                    </select>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endforeach

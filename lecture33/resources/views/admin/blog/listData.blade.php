@extends('admin.layouts.default')

@section('title', 'Blog')

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
                <h5 class="panel-title">Blog</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li style="margin-right: 10px;"><a href="{{ route('blog.create') }}" class="btn btn-primary add-new open-modal">Add New</a></li>
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
                            <th>Category</th>
                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Thumbnail</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($blogs))
                            @foreach ($blogs as $key => $blog)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $blog->name }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->sub_title }}</td>
                                    <td>
                                        <img class="img-fluid" width="120" height="80" src="{{ asset('uploads/blogThumb/'.$blog->thumbnail) }}" alt="">
                                    </td>
                                    <td>{{ $blog->description }}</td>
                                    <td>
                                        @if ($blog->valid == 1)
                                            <span class="label label-success">Active</span>
                                        @else
                                            <span class="label label-danger">InActive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('blog.edit', $blog->id) }}"><i class="icon-pencil"></i></a>

                                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
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

@push('javascript')
<script>
    $(document).on("click", ".open-modal", function(e) {
        e.preventDefault();

        // $.ajax({

        // });

        bootbox.dialog({
            title: 'A custom dialog with buttons and callbacks',
            message: "<p>This dialog has buttons. Each button has it's own callback function.</p>",
            size: 'large',
            buttons: {
                cancel: {
                    label: "I'm a cancel button!",
                    className: 'btn-danger',
                    callback: function(){
                        console.log('Custom cancel clicked');
                    }
                },
                ok: {
                    label: "I'm an OK button!",
                    className: 'btn-info',
                    callback: function(){
                        console.log('Custom OK clicked');
                    }
                }
            }
        });

    });
</script>
@endpush

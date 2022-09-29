
        <!-- Basic datatable -->
        <div class="panel panel-flat">
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <fieldset class="content-group">
                        <legend class="text-bold"></legend>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Category</label>
                            <div class="col-lg-10">
                                <select name="category_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($blogCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Title</label>
                            <div class="col-lg-10">
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Sub Title</label>
                            <div class="col-lg-10">
                                <input type="text" name="sub_title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Blog Image</label>
                            <div class="col-lg-10">
                                <input type="file" name="thumbnail" class="form-control">
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

                </form>
            </div>
        </div>
        <!-- /basic datatable -->


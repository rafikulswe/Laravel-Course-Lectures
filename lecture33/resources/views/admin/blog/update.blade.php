
<div class="panel-body">
    <form class="form-horizontal" action="{{ route('blog.update', $blogInfo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <fieldset class="content-group">

            <div class="form-group">
                <label class="control-label col-lg-2">Category</label>
                <div class="col-lg-10">
                    <select name="category_id" class="form-control">
                        <option value="">Select</option>
                        @foreach ($blogCategories as $category)
                        <option value="{{ $category->id }}" @if($category->id == $blogInfo->category_id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Title</label>
                <div class="col-lg-10">
                    <input type="text" name="title" value="{{ $blogInfo->title }}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Sub Title</label>
                <div class="col-lg-10">
                    <input type="text" name="sub_title" value="{{ $blogInfo->sub_title }}" class="form-control">
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
                        <option value="1" @if ($blogInfo->valid == 1) selected @endif>Active</option>
                        <option value="0" @if ($blogInfo->valid == 0) selected @endif>In Active</option>
                    </select>
                </div>
            </div>

        </fieldset>

    </form>
</div>

@extends('admin_panel')
@section('content')
<br>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h2 align="center">Product Information</h2>
            </div>
            <div class="card-body">
                <form action="{{url('/admin/save-product')}}" method="POST" enctype = "multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="book_name" class="col-md-4 col-form-label text-md-right">Book Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="book_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="col-md-4 col-form-label text-md-right">Book Author</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="book_author" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="book_price" class="col-md-4 col-form-label text-md-right">Book Price
                        </label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="book_price" required>
                        </div>
                    </div>
                    

                    <div class="form-group row">
                        <label for="category_name" class="col-md-4 col-form-label text-md-right">Category Name</label>
                        <div class="col-md-8">
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                <option value="{{ $category -> category_id}}">{{ $category -> category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="book_description" class="col-md-4 col-form-label text-md-right">
                            Book Description</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="3" name="book_description" required></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="book_image" class="col-md-4 col-form-label text-md-right">Product Image
                        </label>
                        <div class="col-md-8">
                        <input class="input-file uniform_on" name="book_image" id="fileInput" type="file" required>
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            Add Product
                        </button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
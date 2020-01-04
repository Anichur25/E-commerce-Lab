@extends('admin_panel')
@section('content')
<table class="table mt-4">
    <thead class="table-dark">
        <tr>
            <th>
                Book Name
            </th>
            <th>
                Author Name
            </th>
            <th>
                Book Price
            </th>
            <th>
                Book Description
            </th>
            <th>
                Book Image
            </th>
            <th>
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($all_books as $book)
        <tr>
            <td>{{ $book -> book_name }}</td>
            <td>{{ $book -> book_author }}</td>
            <td>{{ $book -> book_price }}</td>
            <td>{{ $book -> book_description }}</td>
            
            <td><img src="{{ URL :: to($book -> book_image) }}" style="width : 80px; height : 80px;">
            </td>
            <td>
                <a class="btn btn-danger" href="{{URL :: to('/admin/delete-product/'.$book -> book_id)}}">
                    <i class="fas fa-trash-alt"></i>
                </a>
                <a href="{{URL :: to('/admin/edit-product/'.$book -> book_id)}}" class="btn btn-info">
                    <i class="fa fa-edit"></i>
                </a>
            </td>
            
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
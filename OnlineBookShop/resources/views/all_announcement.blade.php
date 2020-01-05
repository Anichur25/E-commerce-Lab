@extends('header')
@section('body')
<div class="container-fluid">

    <div class="row">
        <div class="col-8">
            <div class="container">
                <!-- creating table -->
                <table class="table mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>
                                Announcement Title
                            </th>
                            <th>
                                Announcement Detail
                            </th>
                            <th>
                                Publication Date
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_announcements as $announcement)
                        <tr>
                            <td>{{ $announcement ->announcement_title }}</td>
                            <td>{{ $announcement ->announcement_detail }}</td>
                            <td>{{ $announcement -> publication_date }}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    @endsection
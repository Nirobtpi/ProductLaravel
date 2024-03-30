@extends('backend.master')

@section('content')
    <h5 class="card-title bg-success text-center mb-3"> View All Product (Total {{ $count }}) </h5>
    @if (session('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></ button>
        </div>
    @endif
    <div class="card">
        <div class="card-body py-3">
            <!-- Primary Color Bordered Table -->
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th scope="col">Sl No</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Size</th>
                        <th scope="col">Product Type</th>
                        <th scope="col">Product Des</th>
                        <th scope="col">Cteated Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                            {{-- <th scope="row">{{ $loop->index+1 }}</th> --}}
                            <th scope="row">{{ $products->firstItem() + $key }}</th>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_size }} Kg</td>
                            <td>{{ $product->product_type }}</td>
                            <td>{{ $product->product_description }}</td>
                            <td>{{ Carbon\Carbon::parse($product->created_at)->diffForHumans() }}</td>
                            <td>
                                <a href="{{ url('/edit-product') }}/{{ $product->id }}"
                                    class="btn btn-sm btn-outline-success">Edit</a>
                                <a href="{{ url('/delete-product') }}/{{ $product->id }}"
                                    class="btn btn-sm btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $products->links() }}

        </div>
    </div>
@endsection

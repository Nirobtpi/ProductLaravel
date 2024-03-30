@extends('backend.master')

@section('content')
<h5 class="card-title bg-success text-center mb-3">View All Deleted Product @if ($products == '')
    (Total {{ $count }})
@endif</h5>

    @if (session('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></ button>
    </div>
    @endif
    @if (session('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('delete') }}
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
                    <th scope="col">Cteated Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $key => $product)
                <tr>
                    {{-- <th scope="row">{{ $loop->index+1 }}</th> --}}
                    <th scope="row">{{ $products->firstItem() + $key }}</th>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_size }} Kg</td>
                    <td>{{ $product->product_type }}</td>
                    <td>{{ Carbon\Carbon::parse($product->created_at)->diffForHumans() }}</td>
                    <td>
                        <a href="{{ url('/restore-product') }}/{{ $product->id }}"
                            class="btn btn-sm btn-outline-success">Restore</a>
                        <a href="{{ url('/pdelete-product') }}/{{ $product->id }}"
                            class="btn btn-sm btn-outline-danger">P Delete</a>
                    </td>
                </tr>
                @empty
                <td colspan="6" class="text-center"><h3>No Data Found</h3></td>
                @endforelse


            </tbody>
        </table>
        {{ $products->links() }}

    </div>
</div>
@endsection

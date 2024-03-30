@extends('backend.master')

@section('content')
<section class="section">
            <div class="card-body">
        <h5 class="card-title">Floating labels Form</h5>
                
                 @if(session('success'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                         {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></   button>
                    </div>
                 @endif
                    
        <!-- Floating Labels Form -->
        <form class="row g-3" method="post" action="{{ url('/add-product') }}">
            @csrf
            <div class="col-md-12">
                <div class="form-floating">
                    <input type="text" class="form-control @error('product_name') is in-valid
                        
                    @enderror" name="product_name" id="floatingName" placeholder="Product Name">
                    <label for="floatingName">Product Name</label>
                    @error('product_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control @error('product_size') is in-valid
                        
                    @enderror" name="product_size" id="floatingsize" placeholder="Product Size">
                    <label for="floatingsize">Product Size</label>
                    @error('product_size')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select class="form-select" name="product_type" id="floatingSelect" aria-label="State">
                        <option value="">Select One</option>
                        <option selected="services">Services</option>
                        <option value="physical">Physical</option>
                        
                    </select>
                    <label for="floatingSelect">Product Type</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <textarea name="product_description" class="form-control" placeholder="Address" id="floatingTextarea"
                        style="height: 100px;"></textarea>
                    <label for="floatingTextarea">Product Description</label>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form><!-- End floating Labels Form -->

    </div>
</section>


@endsection

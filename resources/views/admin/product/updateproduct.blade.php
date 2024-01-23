@extends('layouts.admin.master')
@section('title')
    {{ 'Dashboard | Laravel Auth ' }}
@endsection

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.admin.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.admin.navigation')



                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 text-center py-2">
                            <h2>Update <span class="text-primary"> Product </span></h2>
                        </div>
                        <div class="col-lg-12">
                            <div class="card m-0 p-4">
                                <form method="POST" action="{{ route('admin.dashboard.product.update.submit') }}"
                                    id="product" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" class="d-none" name="id" value="{{$updateproduct->id}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Product Title</label>
                                            <input required type="text" class="form-control" name="brand_title"
                                                value="{{$updateproduct->brand_title}}">
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Category</label>
                                            <input type="text" class="d-none" value="{{$updateproduct->category}}" id="category_value">
                                            <select class="form-control" id="category_update" name="category"
                                                aria-label="Default select example">
                                                <option value="cement" {{$updateproduct->category == 'cement' ? 'selected' : ''}}>Cement</option>
                                                <option value="rod" {{$updateproduct->category == 'rod' ? 'selected' : ''}}>Road</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div id="cement_update" class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Cement Brand</label>
                                            <select class="form-control" name="cement_brand"
                                                aria-label="Default select example">
                                                <option value="Elephant" {{$updateproduct->cement_brand == 'Elephant' ? 'selected' : ''}}>Elephant</option>
                                                <option value="Basundhara" {{$updateproduct->cement_brand == 'Basundhara' ? 'selected' : ''}}>Basundhara</option>
                                                <option value="Anwar" {{$updateproduct->cement_brand == 'Anwar' ? 'selected' : ''}}>Anwar</option>
                                                <option value="Scan" {{$updateproduct->cement_brand == 'Scan' ? 'selected' : ''}}> Scan</option>

                                            </select>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Cement Brand Type</label>
                                            <select class="form-control" name="cement_brand_type"
                                                aria-label="Default select example">
                                                <option value="PCC" {{$updateproduct->cement_brand_type == 'PCC' ? 'selected' : ''}}>PCC</option>
                                                <option value="AM" {{$updateproduct->cement_brand_type == 'AM' ? 'selected' : ''}}>AM</option>
                                                <option value="OPC" {{$updateproduct->cement_brand_type == 'OPC' ? 'selected' : ''}}>OPC</option>
                                                <option value="MPC" {{$updateproduct->cement_brand_type == 'MPC' ? 'selected' : ''}}>MPC</option>


                                            </select>
                                        </div>

                                    </div>
                                    <div id="rod_update" class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Rod Brand</label>
                                            <select class="form-control" name="rod_brand"
                                                aria-label="Default select example">
                                                <option value="AKS" {{$updateproduct->rod_brand == 'AKS' ? 'selected' : ''}}>AKS</option>
                                                <option value="SCRM" {{$updateproduct->rod_brand == 'SCRM' ? 'selected' : ''}}>SCRM</option>
                                                <option value="BSRM" {{$updateproduct->rod_brand == 'BSRM' ? 'selected' : ''}}>BSRM</option>
                                                <option value="NORMAL" {{$updateproduct->rod_brand == 'NORMAL' ? 'selected' : ''}}>NORMAL</option>

                                            </select>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Rad Size</label>
                                            <select class="form-control" name="rod_size"
                                                aria-label="Default select example">
                                                <option value="8m"  {{$updateproduct->rod_size == '8m' ? 'selected' : ''}}>8m</option>
                                                <option value="10m" {{$updateproduct->rod_size == '10m' ? 'selected' : ''}}>10m</option>
                                                <option value="12m" {{$updateproduct->rod_size == '12m' ? 'selected' : ''}}>12m</option>
                                                <option value="16m" {{$updateproduct->rod_size == '16m' ? 'selected' : ''}}>16m</option>
                                                <option value="20m" {{$updateproduct->rod_size == '20m' ? 'selected' : ''}}>20m</option>
                                                <option value="22m" {{$updateproduct->rod_size == '22m' ? 'selected' : ''}}>22m</option>
                                                <option value="25m" {{$updateproduct->rod_size == '25m' ? 'selected' : ''}}>25m</option>
                                                <option value="32m" {{$updateproduct->rod_size == '32m' ? 'selected' : ''}}>32m</option>

                                            </select>
                                        </div>

                                    </div>


                                    <div class="my-4">
                                        <label>Product Details </label>
                                        <textarea class="form-control" id="ck_editor" row="10" name="product_details">
                                            @php
                                                echo $updateproduct->product_details
                                            @endphp
                                        </textarea>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <label class="form-label">Product Image</label>
                                            <input name="image" type="file" class="form-control">
                                            <input name="old_image" value="{{$updateproduct->image}}" type="text" class="form-control d-none">
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Product Price</label>
                                            <input required type="text" value="{{$updateproduct->price}}" class="form-control" name="price"
                                                placeholder="10000">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>


    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
@endsection

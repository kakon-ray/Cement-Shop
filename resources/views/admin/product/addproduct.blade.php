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
                            <h2>Add New <span class="text-primary"> Product </span></h2>
                        </div>
                        <div class="col-lg-12">
                            <div class="card m-0 p-4">
                                <form method="POST" action="{{ route('admin.dashboard.product.add.submit') }}"
                                    id="common_alert" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Product Title</label>
                                            <input required type="text" class="form-control" name="brand_title"
                                                placeholder="Product Product">
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Category</label>
                                            <select class="form-control" id="category" name="category"
                                                aria-label="Default select example">
                                                <option selected>Select Category</option>
                                                <option value="cement" selected>Cement</option>
                                                <option value="rod">Road</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div id="cement" class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Cement Brand</label>
                                            <select class="form-control" name="cement_brand"
                                                aria-label="Default select example">
                                                <option value="" selected>Select Elephant Brand</option>
                                                <option value="Elephant">Elephant</option>
                                                <option value="Basundhara">Basundhara</option>
                                                <option value="Anwar">Anwar</option>
                                                <option value="Scan">Scan</option>

                                            </select>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Cement Brand Type</label>
                                            <select class="form-control" name="cement_brand_type"
                                                aria-label="Default select example">
                                                <option value="" selected>Select Cement Brand</option>
                                                <option value="PCC">PCC</option>
                                                <option value="AM">AM</option>
                                                <option value="OPC">OPC</option>
                                                <option value="MPC">MPC</option>


                                            </select>
                                        </div>

                                    </div>
                                    <div id="rod" class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Rod Brand</label>
                                            <select class="form-control" name="rod_brand"
                                                aria-label="Default select example">
                                                <option value="" selected>Select Rod Brand</option>
                                                <option value="Elephant">AKS</option>
                                                <option value="Basundhara">SCRM</option>
                                                <option value="Anwar">BSRM</option>
                                                <option value="Scan">NORMAL</option>

                                            </select>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Rad Size</label>
                                            <select class="form-control" name="rod_size"
                                                aria-label="Default select example">
                                                <option value="" selected>Select Rod Size</option>
                                                <option value="8m">8m</option>
                                                <option value="AM">10m</option>
                                                <option value="10m">12m</option>
                                                <option value="16m">16m</option>
                                                <option value="20m">20m</option>
                                                <option value="22m">22m</option>
                                                <option value="25m">25m</option>
                                                <option value="32m">32m</option>

                                            </select>
                                        </div>

                                    </div>


                                    <div class="my-4">
                                        <label>Product Details </label>
                                        <textarea class="form-control" id="ck_editor" row="10" name="product_details"></textarea>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <label class="form-label">Product Image</label>
                                            <input name="image" type="file" class="form-control">
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Product Price</label>
                                            <input required type="text" class="form-control" name="price"
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

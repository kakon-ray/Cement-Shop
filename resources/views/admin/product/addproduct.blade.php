@extends('layouts.admin.master')
@section('title')
    {{ 'Dashboard | Laravel Auth ' }}
@endsection

@section('content')
    {{-- tags input --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

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
                                    id="product" enctype="multipart/form-data">
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
                                            <input required type="text" id="tags" class="form-control"
                                                name="cement_brand_type" value="0" required
                                                placeholder="PCC AM OPC MPC">

                                        </div>

                                    </div>
                                    <div id="rod" class="row my-4">
                                        <div class="col-lg-6">
                                            <label>Rod Brand</label>
                                            <select class="form-control" name="rod_brand"
                                                aria-label="Default select example">
                                                <option value="" selected>Select Rod Brand</option>
                                                <option value="AKS">AKS</option>
                                                <option value="SCRM">SCRM</option>
                                                <option value="BSRM">BSRM</option>
                                                <option value="NORMAL">NORMAL</option>

                                            </select>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>Rad Size</label>
                                            <select class="form-control" name="rod_size"
                                                aria-label="Default select example">
                                                <option value="" selected>Select Rod Size</option>
                                                <option value="8m">8m</option>
                                                <option value="10m">10m</option>
                                                <option value="12m">12m</option>
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
                                            <input type="file" name="image" required="" accept="image/*"
                                            class="dropify">
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


    {{-- image upload --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">

    {{-- tagsinput --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>

    <script type="text/javascript">
        // The DOM element you wish to replace with Tagify
        var input = document.querySelector('#tags');

        // initialize Tagify on the above input node reference
        new Tagify(input)



        //thumbline image upload 
        $('.dropify').dropify(); //dropify image
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });



    </script>
@endsection

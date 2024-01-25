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
                            <h2>Add New <span class="text-primary"> Employee </span></h2>
                        </div>
                        <div class="col-lg-12">
                            <div class="card m-0 p-4">
                                <form method="POST" action="{{ route('admin.dashboard.employee.update.submit') }}"
                                    id="employee" enctype="multipart/form-data">
                                    @csrf

                                    <input required type="text" class="d-none" name="id"
                                    value="{{ $employe->id }}">

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Name</label>
                                            <input required type="text" class="form-control" name="name"
                                                value="{{ $employe->name }}">
                                        </div>


                                        <div class="col-lg-6">
                                            <label>Employee Address</label>
                                            <input type="address" class="form-control" name="address"
                                                value="{{ $employe->address }}">
                                        </div>

                                        <div class="col-lg-4 my-4">
                                            <div class="card p-2 my-3">
                                                <label class="form-label">Employee Old Image:</label>
                                                <input type="address" class="form-control" name="old_img"
                                                value="{{ $employe->image }}">
                                                <img src="{{ $employe->image }}" style="height: 200px;" class="img-fluid">
                                            </div>
                                        </div>

                                        <div class="col-lg-4 my-4">
                                            <label class="form-label">New Employee Image</label>
                                            <input type="file" name="image" accept="image/*"
                                                class="dropify">
                                        </div>

                                        <div class="col-lg-4 my-4">
                                            <label>Phone Number</label>
                                            <input required type="text" class="form-control" name="phone"
                                                value="{{ $employe->phone }}">
                                        </div>

                                        <div class="col-lg-4">
                                            <label>Phone Email</label>
                                            <input required type="text" class="form-control" name="email"
                                                value="{{ $employe->email }}">
                                        </div>

                                    </div>
                                    <div class="my-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>

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
    <script src="{{ asset('public/backend') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>


    <script type="text/javascript">
        //thumbline image upload 
        $('.dropify').dropify(); //dropify image
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    </script>
@endsection

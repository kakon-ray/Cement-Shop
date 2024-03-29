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
                            <h2>Update <span class="text-primary"> Slider </span></h2>
                        </div>
                        <div class="col-lg-12">
                            <div class="card m-0 p-4">
                                <form method="POST" action="{{ route('admin.dashboard.slider.update.submit') }}"
                                    id="slider" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" class="d-none" name="id"
                                    value="{{$slider->id}}">

                                    <div class="row">
                                        <div class="col-lg-12 my-2">
                                            <label>Update Slider Title</label>
                                            <input required type="text" class="form-control" name="title"
                                                value="{{$slider->title}}">
                                        </div>
                                        <div class="col-lg-12 my-2">
                                            <label>Update Slider Description</label>
                                            <textarea class="form-control" row="10" cols="10" name="desc">{{$slider->desc}}</textarea>
                                        </div>
                                        <div class="col-lg-3 my-2">
                                            <label class="form-label">Slider Old Image</label>
                                            <img src="{{$slider->image}}" style="width: 300px; height:200px" alt="">
                                        </div>

                                        <div class="col-lg-9 my-2">
                                            <label class="form-label">Update Slider Image</label>
                                            <input type="text" name="old_image" class="d-none" value="{{$slider->image}}">
                                            <input type="file" name="image" accept="image/*"
                                                class="dropify">
                                        </div>

                                    </div>
                                    <div class="my-4">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
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


    {{-- image upload --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="{{ asset('admin/js/bootstrap-switch.min.js') }}"></script>


    <script type="text/javascript">
        //thumbline image upload 
        $('.dropify').dropify(); //dropify image
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });
    </script>
@endsection

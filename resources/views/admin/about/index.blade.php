@extends('layouts.admin.master')
@section('title')
    {{ 'Dashboard | Laravel Auth ' }}
@endsection

@section('content')
    <style>
        .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
            height: 200px;
        }

        .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable,
        .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
            height: 200px;
        }
    </style>
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
                            <h2>Add and Update <span class="text-primary"> About Us</span></h2>
                        </div>
                        <div class="col-lg-12">
                            <div class="card m-0 p-4">
                                <form method="POST" action="{{ route('admin.dashboard.aboutus.add.submit') }}"
                                    id="aboutus" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-12 my-2">
                                            <label>About Us Title</label>
                                            <input required type="text" class="form-control" name="title" value="{{ $aboutus->title }}">
                                        </div>
                                        <div class="col-lg-12 my-2">
                                            <label>About Us Description</label>
                                            <textarea class="form-control" id="ck_editor" name="desc">{{ $aboutus->desc }}</textarea>
                                        </div>

                                        <div class="col-lg-3 my-2">
                                            <label class="form-label">About Us Old Image</label>
                                            <img src="{{ $aboutus->image }}" style="width: 300px; height:200px"
                                                alt="">
                                        </div>

                                        <div class="col-lg-9 my-2">
                                            <label class="form-label">About Us Update Image</label>
                                            <input type="text" name="old_image" class="d-none"
                                                value="{{ $aboutus->image }}">
                                            <input type="file" name="image" accept="image/*" class="dropify">
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

    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

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

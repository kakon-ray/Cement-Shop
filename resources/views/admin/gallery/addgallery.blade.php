@extends('layouts.admin.master')
@section('title')
    {{ 'Dashboard | Laravel Auth ' }}
@endsection

@section('content')
    <style>
        .btn_remove {
            margin-bottom: 8px;
        }
    </style>
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
                                <form method="POST" action="{{ route('admin.dashboard.gallery.store') }}" id=""
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Image Seo Title</label>
                                        <input required type="text" class="form-control" name="name"
                                            placeholder="Image Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Thumbnail Image<span class="text-danger">*</span>
                                        </label><br>
                                        <input type="file" name="thumbnail" required="" accept="image/*"
                                            class="dropify">
                                    </div><br>


                                    <div class="my-4">
                                        <h3 class="card-title">More Images (Click Add For More Image)</h3>
                                        <div class="my-4" id="dynamic_field">
                                            <input type="file" accept="image/*" name="images[]"
                                                class="form-control my-4" />
                                        </div>

                                        <button type="button" name="add" id="add"
                                            class="btn btn-success">Add</button>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="{{ asset('public/backend') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>



    <script type="text/javascript">
        $('.dropify').dropify(); //dropify image
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

        //ajax request send for collect childcategory
        $("#subcategory_id").change(function() {
            var id = $(this).val();
            $.ajax({
                url: "{{ url('/get-child-category/') }}/" + id,
                type: 'get',
                success: function(data) {
                    $('select[name="childcategory_id"]').empty();
                    $.each(data, function(key, data) {
                        $('select[name="childcategory_id"]').append('<option value="' + data
                            .id + '">' + data.childcategory_name + '</option>');
                    });
                }
            });
        });




        $(document).ready(function() {
            var postURL = "<?php echo url('addmore'); ?>";
            var i = 1;


            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<tr id="row' + i +
                    '" class="dynamic-added"><td><input type="file" accept="image/*" name="images[' +
                    i +
                    ']" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
                    i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
        });
    </script>
@endsection

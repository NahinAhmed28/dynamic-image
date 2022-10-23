<link href="{!! asset('font') !!}/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div id="zoomupModal" class="modal animated zoomInUp custo-zoomInUp" role="dialog">
    <div class="modal-dialog modal-xl">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a new Image:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>



            <form action="{!! route('image.store') !!}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>Upload (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                        <label class="custom-file-container__custom-file">
                            <input type="file" class="custom-file-container__custom-file__custom-file-input" name="image" accept="image/*">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>
                    <hr>

                            <label for="">Services :</label> <br>
                            <div class="row ml-2">
                                <div class="col-md-6">
                                    <input type="checkbox" id="check1" value="personal" name="serviceName[]"  class="form-check-input px-3 font-weight-bold"> <strong>PERSONAL</strong><br>
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" id="check2" value="company" name="serviceName[]"  class="form-check-input px-3 font-weight-bold"> <strong>SERVICE</strong><br>
                                </div>
                            </div>

                    <div class="row ml-2">
                        <div class="col-md-6">
                            <div id="checkBox1" style="display: none">
                                <label for="">Personal Main Title :</label>
                                <input type="text" class="form-control mb-3" name="title[]">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="personal_sub_title_new"></div>
                                        <button id="personal_sub_title_add" type="button" class="btn btn-info"> personal Sub Title</button>
                                        <script type="text/javascript">
                                            var personal_child_title = 0;
                                            var personal_sub_title = 0;
                                            // add row
                                            $("#personal_sub_title_add").click(function() {
                                                var html = '';
                                                html += '<div id="personal_sub_title_row">';
                                                html += '<lable for="">  Personal Sub Title: </lable>';
                                                html += '<div class="input-group mb-3">';
                                                html += '<input type="text" name="personal_sub_title_'+personal_sub_title+'[]" class="form-control m-input"><br>';
                                                html += '<div class="input-group-append">';
                                                html += '<button id="add_personal_child_title" type="button" class="btn btn-info"> Child Title</button>';
                                                html += '</div>';
                                                html += '<div class="input-group-append">';
                                                html += '<button id="remove_personal_sub_title" type="button" class="btn btn-danger">Remove</button>';
                                                html += '</div>';
                                                html += '</div>';
                                                html += '<div id="personal_child_title_new'+personal_child_title+'"></div>';
                                                $('#personal_sub_title_new').append(html);
                                                personal_sub_title++;
                                            });

                                            // remove row
                                            $(document).on('click', '#remove_personal_sub_title', function() {
                                                $(this).closest('#personal_sub_title_row').remove();
                                            });
                                            $(document).on('click', "#add_personal_child_title", function() {
                                                personal_child_title++;
                                                var html = '';
                                                html += '<div id="personal_child_title_new"></div>';
                                                html += '<div id="personal_sub_title_row">';
                                                html += '<lable for=""> ADD Personal Child Title: </lable>';
                                                html += '<div class="input-group mb-3">';
                                                html += '<input type="text" name="personal_child_title_'+personal_sub_title+'[]" class="form-control m-input">';
                                                html += '<div id="personal_child_title_new"></div>';
                                                html += '<div class="input-group-append">';
                                                html += '<button id="remove_personal_sub_title" type="button" class="btn btn-danger">Remove</button>';
                                                html += '</div>';
                                                html += '</div>';
                                                $(this).closest('#personal_sub_title_row').append(html);
                                            });
                                        </script>
                                        <br>
                                        <label for="" style="margin-top:10px">Personal Notes:</label>
                                        <textarea name="notes[]" class="form-control mb-3 " rows="8" cols="80"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div id="checkBox2" style="display: none">
                                <label for="">Service Main Title :</label>
                                <input type="text" class="form-control mb-3" name="title[]">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="company_sub_title_new"></div>
                                        <button id="company_sub_title_add" type="button" class="btn btn-info">Add Service Sub Title</button>
                                        <script type="text/javascript">
                                            var company_child_title = 0;
                                            var company_sub_title = 0;
                                            // add row
                                            $("#company_sub_title_add").click(function() {
                                                var html = '';
                                                html += '<div id="company_sub_title_row">';
                                                html += '<lable for=""> Service Sub Title: </lable>';
                                                html += '<div class="input-group mb-3">';
                                                html += '<input type="text" name="company_sub_title_'+company_sub_title+'[]" class="form-control m-input"><br>';
                                                html += '<div class="input-group-append">';
                                                html += '<button id="add_company_child_title" type="button" class="btn btn-info">Child Title</button>';
                                                html += '</div>';
                                                html += '<div class="input-group-append">';
                                                html += '<button id="remove_company_sub_title" type="button" class="btn btn-danger">Remove</button>';
                                                html += '</div>';
                                                html += '</div>';
                                                html += '<div id="company_child_title_new'+company_child_title+'"></div>';
                                                $('#company_sub_title_new').append(html);
                                                company_sub_title++;
                                            });

                                            // remove row
                                            $(document).on('click', '#remove_company_sub_title', function() {
                                                $(this).closest('#company_sub_title_row').remove();
                                            });
                                            $(document).on('click', "#add_company_child_title", function() {
                                                company_child_title++;
                                                var html = '';
                                                html += '<div id="company_child_title_new"></div>';
                                                html += '<div id="company_sub_title_row">';
                                                html += '<lable for=""> Service Child Title: </lable>';
                                                html += '<div class="input-group mb-3">';
                                                html += '<input type="text" name="company_child_title_'+company_sub_title+'[]" class="form-control m-input">';
                                                html += '<div id="company_child_title_new"></div>';
                                                html += '<div class="input-group-append">';
                                                html += '<button id="remove_company_sub_title" type="button" class="btn btn-danger">Remove</button>';
                                                html += '</div>';
                                                html += '</div>';
                                                $(this).closest('#company_sub_title_row').append(html);
                                            });
                                        </script>
                                        <br>
                                        <label for="" style="margin-top:10px">Service Notes:</label>
                                        <textarea name="notes[]" class="form-control mb-3 " rows="8" cols="80"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="modal-footer md-button">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{!! asset('font') !!}/plugins/file-upload/file-upload-with-preview.min.js"></script>
<script type="text/javascript">
    var firstUpload = new FileUploadWithPreview('myFirstImage')
</script>
<script type="text/javascript">

    $(function () {
        $("#check1").click(function () {
            if ($(this).is(":checked")) {
                $("#checkBox1").show();
            } else {
                $("#checkBox1").hide();
            }
        });
    });

    $(function () {
        $("#check2").click(function () {
            if ($(this).is(":checked")) {
                $("#checkBox2").show();
            } else {
                $("#checkBox2").hide();
            }
        });
    });

</script>

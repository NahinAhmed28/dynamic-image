<link href="{!! asset('font') !!}/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="/richtexteditor/rte_theme_default.css"/>
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
                        <label>شعار الوزارة (Single File) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                        <label class="custom-file-container__custom-file">
                            <input type="file" class="custom-file-container__custom-file__custom-file-input" name="image" accept="image/*">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>
                    <hr>
                    <label for="">اسم الوزارة :</label>
                    <input type="text" class="form-control mb-3" name="title">
                    <div class="row">
                            <div class="col-md-12">
                              <textarea name="desc" id="email_message" rows="8" cols="80"></textarea>
                            </div>
                        </div>

                    <div class="col-md-12 mt-5">
                        <label for="">Notes:</label>
                        <textarea name="notes" class="form-control mb-3 " rows="8" cols="80"></textarea>
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
<script type="text/javascript" src="/richtexteditor/rte.js"></script>
<script type="text/javascript" src="/richtexteditor/plugins/all_plugins.js"></script>
<script type="text/javascript">
var editor1 = new RichTextEditor("#email_message");
</script>

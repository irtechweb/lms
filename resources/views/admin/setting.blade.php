@extends('layouts.default')
@section('title')
    Dashboard
@endsection

@section('body')
<?php //dd($data);?>

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-body">
      <form action="javascript:;" id="promo_form" method="post" enctype="multipart/form-data">
        <div class="row">
        <div class="col-md-12">
          <span style="font-size: 10px;"> Supported File Formats: mp4 <br>Duration: 5-10 Mins <br> Max File Size: 300MB </span>
          <hr class="my-4">
          <div class="progress" id="progress_div" style="display:none;">
            <div class="progress-bar progress-bar-success" id="bar" role="progressbar" style="width:0%">
              <span id="percent">0%</span>
            </div>
          </div>
          <div id='output_image'></div>
          <div class="row">
            <div class="row">
              <div class="col-md-6">
                <label class="cabinet center-block">
                  <figure class="course-image-container">
                    <div class="video-preview"> @if(isset($video)) @php $file_name = 'course/'.$video->course_id.'/'.$video->video_title.'.'.$video->video_type; @endphp {{-- {{dd(url('public/'.$file_name)) }} --}} {{-- {{dd( storage_path())}} --}} @if(!empty($file_name)) <video width="100%" height="100%" controls preload="auto">
                        <source src="{{ url($file_name)}}" type="video/mp4">
                      </video> @else <blockquote class="blockquote custom-blockquote blockquote-success mt-4">
                        <p class="mb-0">Promo video not yet uploaded</p>
                      </blockquote> @endif @else <blockquote class="blockquote custom-blockquote blockquote-success">
                        <p class="mb-0">Promo video not yet uploaded</p>
                      </blockquote> @endif </div>
                  </figure>
                </label>
              </div>
              <div class="col-md-6">
                <div class="input-group input-group-file" data-plugin="inputGroupFile">
                  <input type="text" class="form-control" readonly="">
                  <span class="input-group-btn">
                    <span class="btn btn-success btn-file">
                      <i class="icon wb-upload" aria-hidden="true"></i>
                      <input type="file" class="file center-block" name="course_video" id="course_video" />
                    </span>
                  </span>
                </div>
              </div>
              <div class="col-md-6">
                <input type="submit" class="btn btn-primary" value="Upload" onclick='upload_video();' />
              </div>
            </div>
          </div>
          
      </div>
    </div>
    </form>
    <hr>
    <form action="javascript:;" id="content_form" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-md-12">            
              <label class="form-control-label">Free Signup Content <span class="required">*</span></label>
              <input type="text" class="form-control" name="signup_title" 
                  placeholder="Course Title" value="" />
            <label class="error" for="course_title"></label>
                  
          
        </div>

    </div>
    <div class="row">
        <div class="form-group col-md-12">            
              <label class="form-control-label">Contact Email <span class="required">*</span></label>
              <input type="text" class="form-control" name="signup_title" 
                  placeholder="Course Title" value="" />
            <label class="error" for="course_title"></label>
                  
          
        </div>

    </div>

    <div class="row">
        <div class="form-group col-md-12">            
              <label class="form-control-label">Instragram <span class="required">*</span></label>
              <input type="text" class="form-control" name="signup_title" 
                  placeholder="Course Title" value="" />
            <label class="error" for="course_title"></label>
                  
          
        </div>

    </div>

    <div class="row">
        <div class="form-group col-md-12">            
              <label class="form-control-label">Facebook <span class="required">*</span></label>
              <input type="text" class="form-control" name="signup_title" 
                  placeholder="Course Title" value="" />
            <label class="error" for="course_title"></label>
                  
          
        </div>

    </div>

    <div class="row">
        <div class="form-group col-md-12">            
              <label class="form-control-label">Tik Tok <span class="required">*</span></label>
              <input type="text" class="form-control" name="signup_title" 
                  placeholder="Course Title" value="" />
            <label class="error" for="course_title"></label>
                  
          
        </div>

    </div>

    <div class="row">
        <div class="form-group col-md-12">            
              <label class="form-control-label">LinkedIn <span class="required">*</span></label>
              <input type="text" class="form-control" name="signup_title" 
                  placeholder="Course Title" value="" />
            <label class="error" for="course_title"></label>
                  
          
        </div>

    </div>

    <div class="row">
        <div class="form-group col-md-12">            
              <label class="form-control-label">Free Signup Content <span class="required">*</span></label>
              <input type="text" class="form-control" name="signup_title" 
                  placeholder="Course Title" value="" />
            <label class="error" for="course_title"></label>
                  
          
        </div>

    </div>
    <div class="row">
        <div class="form-group col-md-12"> 
            <button class="btn btn-primary pull-right">Save</button>
    </div>

    </div>

      </form>
      <br>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="{{ asset('backend/curriculum/js/plugins/tinymce/jscripts/tiny_mce/tiny_mce.js') }}"></script>
<script type="text/javascript">

    $(document).ready(function()
    { 
        // tinymce.init({ 
        //     selector:'textarea',
        //     menubar:false,
        //     statusbar: false,
        //     content_style: "#tinymce p{color:#76838f;}"
        // });
        tinymce.init({  
        mode : "specific_textareas",
        selector : "textarea",
        theme : "advanced",
        theme_advanced_buttons1 : "bold,italic,underline",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        width : "100%",
        plugins : "paste",
        paste_text_sticky : true,
        setup : function(ed) {
          ed.onInit.add(function(ed) {
            ed.pasteAsPlainText = true;
          });
        }
      });
    });
</script>
<script type="text/javascript">
    

    function readFile(input, id) {    
              
      var file_name = input.files[0].name;
      var extension = (input.files[0].name).split('.').pop();
      var allowed_extensions = ["mp4"];
      var fsize = input.files[0].size;
      
      if (input.files && input.files[0]) {
  
          if ($.inArray(extension, allowed_extensions) == -1) {
              toastr.error("Video format mismatch");
              return false;
          } else if(fsize > 1048576*300) {
              toastr.error("Video size exceeds");
              return false;
          } 
          $('.input-group-file input').attr('value', file_name);
          
      }
  }
  $(document).ready(function()
  { 
      $('#course_video').on('change', function () { 
         alert();
          imageId = $(this).data('id'); 
          tempFilename = $(this).val();
          readFile(this, $(this).attr('id')); 
      });
  });
</script>

@endsection


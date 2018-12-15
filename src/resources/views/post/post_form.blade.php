@extends('vendor.itsl.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Post <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Nav item again</a>
                    </li>
                </ul>
            </nav>

            <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                <h1>Create Post</h1>
                <div class="col-md-8">
                    <form method="post" enctype="multipart/form-data" action="{{ route('post.form') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="id_title" name="title"
                                           aria-describedby="title" placeholder="Enter title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <input type="text" class="form-control" id="category" name="category"
                                           aria-describedby="category" placeholder="Enter Category">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <input type="text" class="form-control" id="author" name="author"
                                           aria-describedby="author" placeholder="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="publish_date">Publish Date</label>
                                    <input type="date" class="form-control" id="publish_date"
                                           name="publish_date" value="<?php echo date('Y-m-d', time());?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group required">
                            <label for="post_cover" class="control-label">Store Logo</label>
                            {{--show image--}}
                            <div id="imagePreview"></div>
                            {{--show privious image--}}
                            <div id="previousImage">
                                @if(isset($post_cover))
                                    <img src="{{'/img/'.$post_cover}}" width="100px" rel="nofollow">
                                @endif
                            </div>
                            <input type="file" name="post_cover" data-id="file">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea rows=20 class="form-control" id="summernote" name="description" placeholder="Blog Content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create post</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection
@section("scripts")
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 400
            });
        });

        $(function(){
            $("input[data-id='file']").change(function () {
                $(this).parent().find("#previousImage").hide();
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = $(this).parent().find("#imagePreview");
                    dvPreview.html("");
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    $($(this)[0].files).each(function () {
                        var file = $(this);
                        if (regex.test(file[0].name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = $("<img />");
                                img.attr("style", "height:100px;width: 100px");
                                img.attr("src", e.target.result);
                                dvPreview.append(img);
                            }
                            reader.readAsDataURL(file[0]);
                        } else {
                            alert(file[0].name + " is not a valid image file.");
                            dvPreview.html("");
                            return false;
                        }
                    });
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            });
        });
    </script>
@endsection
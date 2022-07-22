
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fund Me</title>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<div class="container" style="margin-top:80px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ URL::previous() }}"><button class="btn btn-success"><i class="fa fa-arrow-left" ></i>&nbsp;Back</button></a>
                </div>
                <br>
                <div class="card-body">
                    <form method="POST" action="{{ route('add_campaign') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>University Name</label>
                            <select class="form-control" name="university_id" required>
                                <option disabled selected value="">--Select--</option>
                                <option value='1'>University of Barishal</option>
                                <option value='2'>University of Global Village</option>
                                <option value='3'>Patuakhali Science and Technology University</option>
                                <option value='4'>BM College</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" name="description" id="summernote" rows="10" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Target Amount BDT</label>
                            <input type="number" name="target_amount"  step=any class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control-file" id="exampleFormControlFile1" required>
                            @error('cover_image')
                            <span class="invalid-feedback" style="color: red;" role="alert">
                                        <strong>Accept only PNG,JPG image</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Documents</label>
                            <input type="file" name="document" class="form-control-file" id="exampleFormControlFile1" required>
                            @error('document')
                            <span class="invalid-feedback" style="color: red;" role="alert">
                                        <strong>Accept only PDF file</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add Campaign" class="btn btn-primary">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
</body>
</html>

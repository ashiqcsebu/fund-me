
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
                    <?php
                    $id=$_GET['id'];
                    $get_campaign = DB::table('campaigns')->where('id',$id)->first();
                    ?>
                        <div class="form-group">
                            <label>University Name</label>
                                    @if($get_campaign->university_id=='1')
                                        University of Barishal
                                    @endif
                                    @if($get_campaign->university_id=='2')
                                        University of Global Village
                                    @endif
                                    @if($get_campaign->university_id=='3')
                                        Patuakhali Science and Technology University
                                    @endif
                                    @if($get_campaign->university_id=='4')
                                        BM College
                                    @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            {{$get_campaign->title}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Target Amount BDT</label>
                            {{$get_campaign->target_amount}}
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <br>
                            <br>
                            <?php
                            echo $get_campaign->description;
                            ?>

                        </div>

                        <div class="form-group">
                            <br>
                            <label for="exampleFormControlFile1">Cover Image</label>
                            <br>
                            <img src="cover_image/{{$get_campaign->cover_image}}" alt="person" class="img-fluid rounded-circle">
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Documents</label>
                            <br>
                            <a href="document/{{$get_campaign->document}}" target="_blank">{{$get_campaign->document}}</a>
                        </div>


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

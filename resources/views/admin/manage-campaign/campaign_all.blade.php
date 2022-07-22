@include('include.admin_header');
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h4>
                    campaign List
                    @if (session('status'))
                        <span style="float:right;color:green;" >  {{ session('status') }}</span>
                    @endif
                    @if (session('error'))
                        <span style="float:right;color:red;" >  {{ session('error') }}</span>
                    @endif
                </h4>
                <div class="card">
                    <div class="card-header">
                        <a href="/add_campaign" style="float:right;"><button type="button" class="btn btn-success btn-sm">Add New Campaign</button></a>
                    </div>
                    <div class="card-body">
                        <?php
                        $get_user = DB::table('campaigns')->orderBy('id','DESC')->get();
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>University name</th>
                                    <th>Target Amount</th>
                                    <th>Raised Amount</th>
                                    <th>Document</th>
                                    <th>Campaign Status</th>
                                    <th width="280px">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($get_user as $user)
                                    <tr>
                                        <td>{{ $user->title }}</td>
                                        <td>
                                            @if($user->university_id=='1')
                                                University of Barishal
                                            @endif
                                            @if($user->university_id=='2')
                                                University of Global Village
                                            @endif
                                            @if($user->university_id=='3')
                                                Patuakhali Science and Technology University
                                            @endif
                                            @if($user->university_id=='4')
                                                BM College
                                            @endif
                                        </td>
                                        <td>{{ $user->target_amount }}</td>
                                        <td>
                                            <?php
                                            $total = DB::table('pays')->where('campaign_id', $user->id)->max('amount');
                                            ?>
                                            {{$total}}
                                        </td>
                                        <td><a href="document/{{$user->document}}" target="_blank">{{$user->document}}</a></td>
                                        <td>
                                            @if($user->campaign_status=='1')
                                                <button class="btn btn-success btn-sm">Active</button>
                                            @endif
                                            @if($user->campaign_status=='0')
                                                <button class="btn btn-warning btn-sm">Inactive</button>
                                            @endif
                                            @if($user->campaign_status=='2')
                                                <button class="btn btn-info btn-sm">Verified By University</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="/view_campaign?id={{$user->id}}">View</a>
                                            <a class="btn btn-primary btn-sm" href="/edit_campaign?id={{$user->id}}">Edit</a>
                                            @if($user->campaign_status=='0')
                                                <button class="btn btn-success btn-sm"  style="margin-top:10px;">Waiting University Verification</button>
                                            @endif
                                            @if($user->campaign_status=='2')
                                                <a class="btn btn-success btn-sm" style="margin-top:0px;" href="{{'/active_campaign/'.$user->id}}">Activate Now</a>

                                            @endif
                                            @if($user->campaign_status=='1')
                                                <a class="btn btn-warning btn-sm" style="margin-top:0px;" href="{{'/inactive_campaign/'.$user->id}}">InActivate Now</a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('include.admin_footer');

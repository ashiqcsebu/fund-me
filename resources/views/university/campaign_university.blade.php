@include('include.admin_header');
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h4>
                    Campaign List
                    @if (session('status'))
                        <span style="float:right;color:green;" >  {{ session('status') }}</span>
                    @endif
                    @if (session('error'))
                        <span style="float:right;color:red;" >  {{ session('error') }}</span>
                    @endif
                </h4>
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <?php
                        $get_user = DB::table('campaigns')->where('university_id',Auth::user()->university_id)->orderBy('id','DESC')->get();
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
                                                <button class="btn btn-info btn-sm">Waiting Admin Approval</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="/view_campaign?id={{$user->id}}">View</a>
                                            @if($user->campaign_status=='0')
                                            <a class="btn btn-warning btn-sm" style="margin-top:0px;" href="{{'/approve_campaign/'.$user->id}}">Mark As Verified</a>
                                            @endif
                                            @if($user->campaign_status=='2')
                                            <button class="btn btn-info btn-sm"  style="margin-top:0px;">Already Verified</button>
                                            @endif
                                            @if($user->campaign_status=='1')
                                            <button class="btn btn-success btn-sm"  style="margin-top:0px;">Approved by Admin</button>
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

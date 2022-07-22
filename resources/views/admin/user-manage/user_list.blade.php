@include('include.admin_header')
<br>
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h4>
          User list
          @if (session('status'))
           <span style="float:right;color:green;" >  {{ session('status') }}</span>
          @endif
        </h4>
        <div class="card">
          <div class="card-header">

            <a href="/add-user" style="float:right;"><button type="button" class="btn btn-success btn-sm">Add New User</button></a>
          </div>
          <div class="card-body">
            <?php
            $get_user = DB::table('users')->orderBy('id','DESC')->get();
            ?>
            <div class="table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>NID</th>
                    <th>Phone</th>
                    <th>Addres</th>
                    <th>User Status</th>
                    <th width="280px">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($get_user as $user)
                  <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                          @if($user->role=='1')
                              <button class="btn btn-success btn-sm">Admin</button>
                          @endif
                          @if($user->role=='0')
                               <button class="btn btn-warning btn-sm">User</button>
                           @endif
                           @if($user->role=='2')
                                <button class="btn btn-info btn-sm">Representative</button>
                            @endif
                      </td>
                      <td>{{$user->ic}}</td>
                      <td>{{$user->phone }}</td>
                      <td>{{$user->address }}</td>
                      <td>
                          @if($user->user_status=='1')
                              <button class="btn btn-success btn-sm">Active</button>
                          @endif
                          @if($user->user_status=='0')
                               <button class="btn btn-warning btn-sm">Inactive</button>
                           @endif
                      </td>
                      <td>
                          @if($user->user_status=='1')
                          <a class="btn btn-warning btn-sm" href="{{'/activate/'.$user->id}}">Inactivate User</a>
                          @endif
                          @if($user->user_status=='0')
                          <a class="btn btn-success btn-sm" href="{{'/activate/'.$user->id}}">Activate User</a>
                          @endif

                         <a class="btn btn-danger btn-sm" style="margin-top:0px;" href="{{'/del_user/'.$user->id}}">Delete</a>

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

@include('include.admin_header');
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h4>
        Edit Profile
          @if (session('status'))
           <span style="float:right;color:green;" >  {{ session('status') }}</span>
          @endif
        </h4>
        <div class="card">
          <div class="card-header">

          </div>
          <div class="card-body">
            <?php
            $get_user = DB::table('users')->where('id',Auth::id())->first();
            ?>
            <form method="POST" action="{{ route('edit_profile') }}">
                @csrf
              <input type="hidden" name="id" value="{{$get_user->id}}">
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{$get_user->name}}" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{$get_user->email}}" class="form-control" required readonly>
              </div>
              <div class="form-group">
                <label>NID</label>
                <input type="number" name="ic" class="form-control" value="{{$get_user->ic}}" required readonly>
              </div>

              <div class="form-group">
                <label>Phone</label>
                <input type="number" name="phone" value="{{$get_user->phone}}" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" value="{{$get_user->address}}" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="text" name="password"  class="form-control" >
              </div>
              <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@include('include.admin_footer');

@extends("layouts.inventorydashboard")
@section('title', 'Users')
@section('page', 'user')
@section("content")
<style>
    .btn {
        color: #000;
        background-color: #ffc107;
        border-color: #ffc107;
    }
    .btn.active{
        color: #fff;
        background-color: #198754;
        border-color: #198754;
    }
</style>
  <div class="container">
    <div class="row">
        <h1 class="h1">List of Users</h1>
    </div>
    <div class="row">
      <table class="table table-hover"> 
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Approved</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $idx => $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <form action="user/update" class="frmUpdate">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}"/>
                        <input type="hidden" class="approved" name="approved" value="{{ $user->approved }}"/>
                        <input type="submit" class="btn {{ $user->approved ? 'active' : '' }}" value="{{ $user->approved ? 'Active' : 'Inactive' }}"
                        >
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
@stop
    <script src="{{ url('js/jquery.js') }}"></script>
    <script>
        (function($){
            $(document).ready(function(){
                console.log("ready");
                let form = $(".frmUpdate");

                form.on("submit", function(e){
                    e.preventDefault();


                    let me = $(this);
                    let btn = me.find(".btn").first();
                    let approvedTxt = me.find(".approved").first();

                    $.ajax({
                        url : me.attr("action"),
                        data : me.serialize(),
                        type : "post",
                        dataType: "json",
                        success : function(res){
                            let status = res.status;
                            let btnTxt = res.status ? "Active" : "Inactive";
                            console.log(status, btnTxt)

                            btn.toggleClass("active");
                            approvedTxt.val(res.status ? 1 : 0)
                            btn.val(res.status ? "Active" : "Inactive");
                        }
                    });

                });
            });
        })(jQuery);
    </script>
  </body>
</html>
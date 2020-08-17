@extends('Restaurant.home')

@section('title')
  Customer Orders
@endsection


@section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Customer's Order History</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('res.logs') }}">Orders</a></li>
  </ol>
</nav>
<div class="box-body">
  <h3>Orders</h3>
  <table id="orderTable" class="table table-hover ">
      <thead>
          <tr>
            <th>Id</th>
            <th>Dish Name</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Quantity</th>
          </tr>
          </thead>
          <tfoot>
          <tr>
            <th>Id</th>
            <th>Dish Name</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Quantity</th>
          </tr>
      </tfoot>
  </table>
</div>
@endsection

@section('script')
<script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function(){
        // Ajax call to fetch data from the database
        var table = $('#orderTable').DataTable({
            "processing" : true,
            "serverSide" : true,
            paging: true,
            "ajax":{
                "url": "{{url("/restaurant/customer/logs/data")}}",
            },
            "columns":[
                {"data":"id", "name":"id"},
                {"data": 'dish_name' , "name":"dish_name"},
                {"data":"user_name", "name":"user_name"},
                {"data":"user_email", "name":"user_email"},
                {"data":"qty", "name":"qty"},
            ]
        });
        $('#orderTable tfoot th ').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
        });
        table.columns().every( function () {
            var that = this;
            $( 'input', this.footer()).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }else{
                  console.log("here");
                }
            });
        });
    });
</script>
@endsection
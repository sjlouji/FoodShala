@extends('Customer.home')

{{-- @section('title')
  Restraunt Registration
@endsection --}}


@section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

<div class="box-body container" style="margin-top: 100px">
  <h3>Orders</h3>
  <table id="orderTable" class="table table-hover ">
      <thead>
          <tr>
            <th>Id</th>
            <th>Dish Name</th>
            <th>Restaurant Name</th>
            <th>Contact Number</th>
            <th>Quantity</th>
          </tr>
          </thead>
          <tfoot>
          <tr>
            <th>Id</th>
            <th>Dish Name</th>
            <th>Restaurant Name</th>
            <th>Contact Number</th>
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
                "url": "{{url("/foodshala/data")}}",
            },
            "columns":[
                {"data":"id", "name":"id"},
                {"data": 'dish_name' , "name":"dish_name"},
                {"data":"rest_name", "name":"rest_name"},
                {"data":"mobile", "name":"mobile"},
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
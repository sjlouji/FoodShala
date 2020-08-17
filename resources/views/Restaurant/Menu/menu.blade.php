@extends('Restaurant.home')

@section('title')
  Menu
@endsection

@section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Menu</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <button class="btn btn-sm btn-outline-secondary" onclick="window.location='{{ route('res.addDish') }}'"><i class="fa fa-plus"></i> Add a dish</button>
    </div>
  </div>
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('res.menu') }}">Menu</a></li>
  </ol>
</nav>
<div class="box-body">
  <h3>Dishes</h3>
  <table id="menuTable" class="table table-hover ">
      <thead>
          <tr>
            <th>Id</th>
            <th>Dish Name</th>
            <th>Dish Price ₹</th>
            <th>Tag</th>
            <th>Veg / Non-Veg</th>
            <th>Action</th>
          </tr>
          </thead>
          <tfoot>
          <tr>
            <th>Id</th>
            <th>Dish Name</th>
            <th>Dish Price</th>
            <th>Tag</th>
            <th>Action</th>
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
        var table = $('#menuTable').DataTable({
            "processing" : true,
            "serverSide" : true,
            paging: true,
            "ajax":{
                "url": "{{url("restaurant/menu/data")}}",
            },
            "columns":[
                {"data":"id", "name":"id"},
                {"data":"dish_name", "name":"dish_name"},
                {"data":"dish_price", 
                  render: function(data){
                    return data+' ₹';
                  }
                },
                {"data":"dish_tag", 
                  render: function(data){
                    if(data == 'dessert'){
                      return 'Dessert';
                    }else if(data == 'starters'){
                      return 'Starters';
                    }else if(data == 'main_course'){
                      return 'Main Course';
                    }else if(data == 'briyani_rice_noodles'){
                      return 'Briyani, Rice and Noodles ';
                    }else if(data == 'indian_breads'){
                      return 'Indian Breads';
                    }else if(data == 'breakfast'){
                      return 'Breakfast';
                    }else if(data == 'short_byte'){
                      return 'Short Byte';
                    }else if(data == 'rolls'){
                      return 'Rolls';
                    }else if(data == 'juice'){
                      return 'Juice';
                    }else {
                      return 'No Data Found';
                    }
                  },
                },
                {"data":"dish_veg_nonveg",
                  render: function(data){
                    if(data == 'veg'){
                      return 'Vegetarian';
                    }else if(data == 'nonveg'){
                      return 'Non Vegetarian';
                    }else{
                      return '-';
                    }
                  },
                },
                {"data":null,
                    "render":function(data,type,row)
                    {
                        var templateId = data.id;
                        return'<a title="View Template" target="_blank" class="" href="{{  url("restaurant/menu") }}/'+templateId+'/view" style="color:#1E1E1E"><i class="fa fa-eye"></i></a>  <a title="View Template" target="_blank" class="" href="{{  url("restaurant/menu") }}/'+templateId+'/edit" style="color:#1E1E1E"><i class="fa fa-edit"></i></a>  <a title="DeleteDish" target="_blank" href="{{  url("restaurant/menu") }}/'+templateId+'/delete" class="" href="#" style="color:#1E1E1E"><i class="fa fa-trash"></i></a>';
                    },
                    searchable: false, //add this line
                },
            ]
        });
        $('#menuTable tfoot th ').each( function () {
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
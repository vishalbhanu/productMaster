<!DOCTYPE html>
<html>
<head>
    <title>Product</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
     
<div class="container">
    <h4>Products </h4>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <a href="javascript:void(0)" data-toggle="modal" data-target='#addProduct_modal'  class="add btn btn-success btn-sm">Add</a>
    <div class="card">
      <!-- <div class="card-header"> Logout</div> -->
      <div class="card-body">
          <!-- <div class="col-md-6 text-center"></div> -->
          <div class="col-md-6 text-center">
              <form method="POST" action="{{ route('admin.logout') }}">
                  @csrf
                  <button type="submit" class="btn btn-primary">Logout</button>
              </form>
          </div></div> 
    </div>
    <br/>
    
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>productName</th>
                <th>price</th>
                <th>description</th>
                <th>discountPercentage</th>
                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<div class="modal fade" id="addProduct_modal">
    <div class="modal-dialog">
    <form id="productData_add" action="{{ route('product.add') }}" method="POST">
            @csrf
            <div class="modal-content">
             <h4>Add Product</h4>   
            <div class="modal-body">
                <div class="form-group mb-3">
                    <input type="text" placeholder="Product Name" id="addproductName" autocomplete="off" class="form-control" name="productName" required
                        autofocus>
                    @if ($errors->has('productName'))
                    <span class="text-danger">{{ $errors->first('productName') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="number" placeholder="Price" id="addprice" autocomplete="off" class="form-control" name="price" required
                        autofocus>
                    @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="text" placeholder="Product Description" id="adddescription" autocomplete="off" class="form-control" name="description" required
                        autofocus>
                    @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="text" placeholder="Discount Percentage" id="adddiscountPercentage" autocomplete="off" class="form-control" name="discountPercentage" required
                        autofocus>
                    @if ($errors->has('discountPercentage'))
                    <span class="text-danger">{{ $errors->first('discountPercentage') }}</span>
                    @endif
                </div>
            </div>
            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-dark btn-block">Add Product</button>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="modal fade" id="edit_modal">
    <div class="modal-dialog">
        <form id="productData_edit" action="{{ route('product.edit') }}" method="POST">
            @csrf
            <div class="modal-content">
             <h4>Edit Product</h4>   
            <div class="modal-body">
                <div class="form-group mb-3">
                <input type="text" hidden id="editId" autocomplete="off" class="form-control" name="editId" required>
                    <input type="text" placeholder="Product Name" id="editproductName" autocomplete="off" class="form-control" name="productName" required
                        autofocus>
                    @if ($errors->has('productName'))
                    <span class="text-danger">{{ $errors->first('productName') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="number" placeholder="Price" id="editprice" autocomplete="off" class="form-control" name="price" required
                        autofocus>
                    @if ($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="text" placeholder="Product Description" id="editdescription" autocomplete="off" class="form-control" name="description" required
                        autofocus>
                    @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <input type="text" placeholder="Discount Percentage" id="editdiscountPercentage" autocomplete="off" class="form-control" name="discountPercentage" required
                        autofocus>
                    @if ($errors->has('discountPercentage'))
                    <span class="text-danger">{{ $errors->first('discountPercentage') }}</span>
                    @endif
                </div>
            </div>
            <div class="d-grid mx-auto">
                <button type="submit" class="btn btn-dark btn-block">Update</button>
            </div>
        </div>
        </form>
    </div>
</div>
    
</body>
    
<script type="text/javascript">
  $(function () {

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
     
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        pageLength: 5,
        ajax: "{{ route('admin.product') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'productName', name: 'productName'},
            {data: 'price', name: 'price'},
            {data: 'description', name: 'description'},
            {data: 'discountPercentage',name : 'discountPercentage'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('body').on('click', '.delete', function () {
        if (confirm("Delete Record?") == true) {
            var id = $(this).data('id');
            console.log('id',id);
            // ajax
            $.ajax({
                type:"POST",
                url: "{{ url('admin/admin-delete-product') }}",
                data: { id: id},
                dataType: 'json',
                success: function(res){
                var oTable = $('.data-table').dataTable();
                oTable.fnDraw(false);
            }
            });
        }
    });
    
    $('body').on('click', '.edit', function (event) {
        event.preventDefault();
        var productName = $(this).data('datax');
        var price = $(this).data('datay');
        var description = $(this).data('dataz');
        var discountPercentage = $(this).data('dataw');
        var id = $(this).data('id');
        console.log(productName);
        $('#editproductName').val(productName);
        $('#editproductName').html(productName);
        $('#editprice').val(price);
        $('#editprice').html(price);
        $('#editdescription').val(description);
        $('#editdescription').html(description);
        $('#editdiscountPercentage').val(discountPercentage);
        $('#editdiscountPercentage').html(discountPercentage);
        $('#editId').val(id);
        $('#editId').html(id);
    });
});
</script>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
     
<div class="container">
    <h4>Products </h4>
    <div class="card">
      <!-- <div class="card-header"> Logout</div> -->
      <div class="card-body">
          <!-- <div class="col-md-6 text-center"></div> -->
          <div class="col-md-6 text-center">
              <form method="POST" action="{{ route('customer.logout') }}">
                  @csrf
                  <button type="submit" class="btn btn-primary">Logout</button>
              </form>
          </div></div> 
    </div>
    <br/>
    {!! $products->links() !!}

    <div class="row">
    @foreach ($products as  $key => $product)
    <div class="col-sm-12 col-md-12">
        <div class="card" style="width: 80%;height:265px;margin:10px 10px 10px 10px;">
            <div class="card-body">
                <h5 class="card-title">{{$product['productName']}}</h5>
                <p class="card-text">{{$product['description']}}</p>
                <h5 class="card-text">{{$product['price']}}</h5>
            </div>
        </div>
    </div>
    <br>
     @endforeach  
     </div>
 
</div>
    
</body>
    
<script type="text/javascript">
 
</script>
</html>
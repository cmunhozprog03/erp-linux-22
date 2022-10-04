<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Products</title>
</head>
<body>
  
  <div class="container">
    <div class="row" style="margin-top: 50px">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-primary text-white">
            Adicionar Novo Produto
          </div>
          <div class="card-body">
            <form action="{{ route('save.product') }}" method="POST", enctype="multipart/form-data" id="form">
              @csrf
              <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" class="form-control" name="product_name" placeholder="Enter name product">
                <span class="text-danger error-text product_name_error"></span>
              </div>
              <div class="form-group">
                <label for="">Product image</label>
                <input type="file" class="form-control" name="product_image">
                <span class="text-danger error-text product_image_error"></span>
              </div>
              <button type="submit" class="btn btn-primary">Save Product</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-primary text-white">
            All Products
          </div>
          <div class="card-body">

          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>


  <script>
    $(function(){
      $('#form').on('submit', function(e){
        e.preventDefault();
        
        var form = this;
        $.ajax({
          url:$(form).attr('action'),
          method:$(form).attr('method'),
          data: new FormData(form),
          processData: false,
          dataType: 'json',
          contentType: false,
          beforeSend:function(){
            $(form).find('span.error-text').text('');
          },
          success:function(data){
            if(data.code == 0) {
              $.each(data.error, function(prefix,val){
                $(form).find('span.'+prefix+'_error').text(val[0]);
              });
            } else {
              $(form)[0].reset();
              alert('New product has been saved successfully');
            }
          }

        });
      });    
    });
  </script>


</body>
</html>
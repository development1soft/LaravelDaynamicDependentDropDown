<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 align="center" style = "color:red">Daynamic Dropdown Example</h1>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Categories</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-12 products" style="display:none;">
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Products</label>
                    <select class="form-control" id="exampleFormControlSelect2">
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function (){
            
            $('#exampleFormControlSelect1').on('change',function (){

                var category_id = $('#exampleFormControlSelect1').val();
                
                $.ajax({

                    url : '/category/'+category_id+'/products',

                    type: "GET",

                }).done(function (data){

                    console.log(data.length);
                    
                    if(data.length > 0){
                    
                        $.each(data, function(index, value) {

                            console.log(value);
                            
                            $('#exampleFormControlSelect2').empty();

                            $('#exampleFormControlSelect2').append(new Option(value.product_name,value.id));
                        
                            $('.products').fadeIn(1000);
                        });
                    
                    }else if(data.length == 0){
                        
                        $('#exampleFormControlSelect2').empty();
                        
                        $('#exampleFormControlSelect2').append(new Option('No Products Available',0));

                        $('.products').fadeIn(1000);

                    }


                });

            });
        });
    </script>
  </body>
</html>
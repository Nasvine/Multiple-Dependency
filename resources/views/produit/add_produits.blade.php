<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Multiple Dependency</title>
</head>
<body>


    <div class="container mt-4 mb-3 pd-3">

        <h2 class="text-bold text-center">Laravel Ajax Multiple Dependency</h2>
        <br><br>
        <hr>
        <div class="row justify-content-center mt-2 mb-2 pd-2">
            <div class="col-md-6">

                <form action="#" method="POST">
                    @csrf
                    <div class="form-group mt-2 mb-2 pd-2">
                        <select name="produit_id" id="produit" class="form-control">
                            <option value="">Select Produit</option>
                            @foreach ($produits as $produit)
                                <option value="{{ $produit->id }}">{{ $produit->name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group mt-2 mb-2 pd-2">
                        <select name="price" id="prix" class="form-control">
                            <option value="">Select Prix</option>
                        </select>
                    </div>

                    
                </form>

                </div>
            </div>
        </div>
    </div>





{{-- AJAX CDN --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>




<script type="text/javascript">
    
// Appel à Ajax lorsque l'ID de région est sélectionné

    $(document).ready(function () {
        $('#produit').change(function(){
            let id = $(this).val();
            $('select[name="city_id"]').empty();
            
            //demarrage de Ajax
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
           });


        //call country on region selected

            $.ajax({
                dataType: 'json',
                url: "/getPrix/"+id,
                type: "GET",
                success: function (data) {
                    console.log(data);
                    $('select[name="price"]').empty();
                    $.each(data, function(key, value){
                      $('select[name="price"]').append('<option value="'+ value.id +'">'+ value.price +'</option>');
                });
                },
               error: function(error) {
                    console.log(error);
               }
            });
        });



    //call city on country selected
        $('#country').change(function(){
            let id = $(this).val();

            $.ajax({
            dataType: 'json',
            url: "/getCity/"+id,
            type: "GET",
            success: function (data) {
                console.log(data);
                $('select[name="city_id"]').empty();
                $.each(data, function(key,data){
                    $('select[name="city_id"]').append('<option value="'+ data.id +'">'+ data.city_name +'</option>');
            });
            },
            error: function(error) {
                console.log(error);
            }
            });
        });

    });

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>






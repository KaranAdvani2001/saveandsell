<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Add Product For Sale</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="{{asset('css/main.css')}}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                    <h2 class="title">Add Product For Sale/Trade</h2>
                </div>
                <div class="card-body">
                <form method="POST" action = "{{ route('products.index') }}" > >
                        @csrf
                        <div class="form-row">
                            <div class="name">Category Name</div>
                            <div class="value">
                                <input class="input--style-6" type="select" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Product Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="string" name="name" placeholder="Brand Name and Model advised to be included ">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Description</div>
                            <div class="value">
                                <div class="input-group">
                                    <textarea class="textarea--style-6" type= "text" name="description" placeholder="Message sent to the employer"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Size</div>
                            <div class="value">
                                <input class="input--style-6" type="string" name="size">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Price</div>
                            <div class="value">
                                <input class="input--style-6" type="double" name="price">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Product Image</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input class="input-file" type="file" name="product_image" id="file">
                                    <label class="label--file" for="file">Browse</label>
                                    <span class="input-file__info">No image chosen</span>
                                </div>
                                <div class="label--desc">Upload a clear image of the product. Max file size 50 MB</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                 <a href="{{ route('products.index') }}" button  class="btn btn--radius-2 btn--blue-2" type="submit">Add Product</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main JS-->
    <script src="{{asset('js/global.js')}}"></script>

</body>

</html>


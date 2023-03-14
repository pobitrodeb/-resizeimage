<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pobitrodeb.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <section class="my-5">
        <div class="container">
            <h2> Laravel Image Resize </h2>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($message =Session::get('success'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{ $message }}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <div class="row">
                  <div class="col-md-4">
                    <strong>Original Image:</strong>
                    <br/>
                    <img src="/images/{{ Session::get('imageName') }}" width="300px" />
                </div>
                <div class="col-md-4">
                    <strong>Thumbnail Image:</strong>
                    <br/>
                    <img src="/thumbnail/{{ Session::get('imageName') }}" />
                </div>
            </div>
            @endif

            <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <br/>
                        <input type="file" name="image" class="image">
                    </div>
                    <div class="col-md-12">
                        <br/>
                        <button type="submit" class="btn btn-success">Upload Image</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

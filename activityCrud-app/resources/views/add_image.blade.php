<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form method="post" action="{{ route('images.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="image">
                <label>
                    <h4>Add image</h4>
                </label>
                <input type="file" class="form-control" required name="image">
            </div>

            <div class="post_button">
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
    </div>
</body>

</html>

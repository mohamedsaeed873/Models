
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Create New Posts</h1>

<form method="post" action="{{route('posts.update',$post->id)}}">
    @method('PUT')
    @csrf
    <input type="text" name="title" value="{{$post->title}}"> <br><br>

    <input type="text" name="body" value="{{$post->body}}"> <br><br>

    <button type="submit">Update</button>
</form>
</body>
</html>


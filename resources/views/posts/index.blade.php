<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<h1>Show all Posts</h1>
<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Title</th>
        <th scope="col">Body</th>
    </tr>
    </thead>
    <tbody>
 @foreach($posts as $post)
     <tr>
         <td>{{$post->id}}</td>
         <td>{{$post->title}}</td>
         <td>{{$post->body}}</td>
         <td>
             <a class="btn btn-outline-success" href="{{route('posts.edit',$post->id)}}" role="button">Edit</a>
             <form method="post" action="{{route('posts.destroy',$post->id)}}">
                 @method('DELETE')
                 @csrf
                 <button class="btn btn-outline-danger" type="submit">Delete</button>
             </form>

         </td>

     </tr>

 @endforeach

    </tbody>
</table>
</body>
</html>

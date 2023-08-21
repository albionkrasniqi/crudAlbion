@extends('layout.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>See Books</title>
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success container">
            {{session('success')}}
        </div>
    @endif
    <table class="table container">
        <thead>
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Book Author</th>
                <th>Book Price</th>
                <th>Book Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataBooks as $book)
            <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->bookName}}</td>
                    <td>{{$book->bookAuthor}}</td>
                    <td>{{$book->price}}</td>
                    <td>{{$book->stock ? 'Yes' : 'No'}}</td>
                    <td>
                        <a href="{{route('books.edit', $book->id)}}" class="btn btn-primary">Update</a>
                        <form action="{{route('books.delete', $book->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</body>
</html>
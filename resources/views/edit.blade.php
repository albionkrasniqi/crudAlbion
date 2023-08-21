@extends('layout.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Book</title>
</head>
<body>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <h2>Edit Books</h2>
        <form action="{{route('books.update', $dataBooks->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="bookName" value="{{$dataBooks->bookName}}">
            @error('bookName')
                <p class="text-danger">{{$message}}</p>
            @enderror
            <input type="text" name="bookAuthor" value="{{$dataBooks->bookAuthor}}">
            @error('bookAuthor')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <input type="number" name="price" value="{{$dataBooks->price}}">
            @error('price')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <select name="stock">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
            @error('stock')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
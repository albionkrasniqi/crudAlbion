@extends('layout.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
</head>
<body>
    <h2>Books Registration</h2>
    <br>
    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <form action="{{route('books.create')}}" method="POST">
        @csrf
        <input type="text" name="bookName" class="form-control" placeholder="Enter Book Name"><br>
        @error('bookName')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
        <input type="text" name="bookAuthor" class="form-control"  placeholder="Enter Book Author"><br>
        @error('bookAuthor')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
        <input type="number" name="price" class="form-control"  placeholder="Enter Book Price"><br>
        @error('price')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
        <label for="stock">Enter Stock</label><br>
        <select  class="form-control"  name="stock">
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>
        @error('stock')
        <div class="text-danger">
            {{$message}}
        </div>
        @enderror
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <br>
        <a href="{{route('books.see')}}" class="btn btn-primary">See All Books</a>
    </form>
</body>
</html>
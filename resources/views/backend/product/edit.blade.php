@extends('layouts.backend')

@section('styles')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Tambah Product</div>
                    <div class="card-body">
                        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-2">
                                <label for="">Nama Product</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ $product->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="">Image : </label>
                                <img src="{{ Storage::url($product->image) }}" alt="" style="width: 100px;">
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ $product->image }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                             <div class="mb-2">
                                <label for="">Price</label>
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}">
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                             <div class="mb-2">
                                <label for="">Stock</label>
                                <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ $product->stock }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="">Nama Kategori</label>
                                <select name="category_id" id="" class="form-control">
                                    <option disabled selected>Pilih Kategori</option>
                                    @foreach($category as $data)
                                        <option value="{{ $data->id }}" {{ $data->id == $product->category_id ? 'selected' : '' }} >
                                            {{ $data->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <button type="submit" class="btn btn-sm btn-outline-primary">Simpan</button>
                                <button type="reset" class="btn btn-sm btn-outline-warning">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush

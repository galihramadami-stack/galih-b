@extends('layouts.app')
@section('content')
<div class="contrainer">
    <div class="row">
        <div class="col">
            <fieldset>
                <legend>Tambah data post</legend>
                <form action="{{ route('post.show') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="">title</label>
                        <input type="text" name="title" class="form-control" value required>
                    </div>
                    <div class="mb-3">
                        <label for="">content</label>
                        <textarea type="text" name="content" class="form-control" required> 
                    </div>
                     <div class="mb-3">
                        <button type="submit" name="simpan" class="form-control" required> </button>
                    </div>                  
                </form>
            </fieldset>
        </div>
    </div>
</div>

@endsection
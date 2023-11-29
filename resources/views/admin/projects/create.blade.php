@extends('layouts.admin')

@section('content')

<form class="row g-3">
    <div class="col-12">
        <label for="name" class="form-label">Name New Project</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="col-4">
        <label for="start_project" class="form-label">Start Project</label>
        <input type="date" class="form-control" id="start_project" name="start_project">
    </div>
    <div class="col-4">
        <label for="end_project" class="form-label">End Project</label>
        <input type="date" class="form-control" id="end_project" name="end_project">
    </div>
    <div class="col-4">
        <label for="url" class="form-label">Link Project</label>
        <input type="text" class="form-control" id="url" name="url">
    </div>
    <div class="col-12">
        <label for="short_description" class="form-label">Short Description</label>
        <input type="text" class="form-control" id="short_description" name="short_description">
    </div>
    <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</form>


@endsection

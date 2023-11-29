@extends('layouts.admin')

@section('content')

    <h1 class="fw-bold text-primary">Index Projects</h1>

    <a class="btn btn-secondary text-end my-3" href="{{ route('admin.projects.create') }}">New Project</a>

    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Name Project</th>
            <th scope="col">Start Project</th>
            <th scope="col">Short Description</th>
            <th scope="col">Link</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->start_project }}</td>
                    <td>{{ $project->short_description }}</td>
                    <td><a href="{{ $project->url }}" target="_blank">Project link</a></td>
                    <td>
                        <a class="btn btn-success" href="{{ route('admin.projects.show', $project) }}">Details</a>
                        <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                        @include('admin.partials.btnDelate')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $projects->links() }}

@endsection

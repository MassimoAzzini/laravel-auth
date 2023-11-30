@extends('layouts.admin')

@section('content')

    <h1 class="fw-bold text-primary">Index Technologies</h1>

    <a class="btn btn-secondary text-end my-3" href="{{ route('admin.technologies.create') }}">New Technology</a>

    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Name Technologies</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($technologies as $technology)
                <tr>
                    <td>

                        <form
                          action="{{ route('admin.technologies.update', $technology) }}"
                          method="POST"
                          id="form-edit-{{ $technology->id }}">
                          @csrf
                          @method('PUT')
                          <input type="text" class="form-cst" value="{{ $technology->name }}" name="name">
                        </form>

                    </td>

                    <td class="d-flex justify-content-end">

                        <a class="btn btn-info" href="{{ $technology->link }}">Documentation</a>
                        <button onclick="submitForm({{ $technology->id }})" class="btn btn-warning">Edit</button>
                        @include('admin.partials.btnDelate', [
                            'route' => route('admin.technologies.destroy', $technology),
                            'message' => 'Are you sure you want to delete this technology?',
                        ])

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function submitForm(id) {
            const form = document.getElementById('form-edit-' + id);
            form.submit();
        }

    </script>

@endsection

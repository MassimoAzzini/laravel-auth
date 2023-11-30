@extends('layouts.admin')

@section('content')

    <h1 class="fw-bold text-primary">Index Technologies</h1>

    <form class="col-5" action="{{ route('admin.technologies.store') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="New Tecnology" name="name">
            <input type="text" class="form-control" placeholder="Link documantation" name="link">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Create</button>
        </div>
    </form>

    <table class="table table-dark w-75">
        <thead>
          <tr>
            <th scope="col">Name Technologies</th>
            {{-- <th id="th-magic" class="d-none" scope="col">Link</th> --}}
            <th class="col-3 text-center" scope="col">Action</th>
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
                          <input type="text" class="form-cst w-25" value="{{ $technology->name }}" name="name" disabled>

                          <input id="link-{{ $technology->id }}" type="text" class="d-none w-50" value="{{ $technology->link }}" name="link">

                          <button onclick="submitForm({{ $technology->id }})" id="btn-submit-{{ $technology->id }}" class="d-none btn btn-warning">Send</button>
                        </form>

                    </td>

                    {{-- <td id="td-magic" class="d-none">
                        <form
                        action="{{ route('admin.technologies.update', $technology) }}"
                        method="POST"
                        id="form-edit-{{ $technology->id }}">
                        @csrf
                        @method('PUT')
                        <input type="text" class="form-cst" value="{{ $technology->name }}" name="name">

                        <input id="link-{{ $technology->id }}" type="text" class="form-cst d-none" value="{{ $technology->link }}" name="link">

                        <button onclick="submitForm({{ $technology->id }})" id="btn-submit-{{ $technology->id }}" class="btn btn-warning d-none">Send</button>
                      </form>

                    </td> --}}

                    <td class="d-flex justify-content-around">

                        <a class="btn btn-info" href="{{ $technology->link }}" target="_blank">Documentation</a>

                        <button onclick="startEdit({{ $technology->id }})" class="btn btn-warning">Edit</button>
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

            const link = document.getElementById('link-' + id);
            const btnSubmit = document.getElementById('btn-submit-' + id);
            // const thLink = document.getElementById('th-magic');
            // const tdLink = document.getElementById('td-magic');
            // const tdLink = document.getElementsByClassName('td-magic');

            link.classList.add('d-none');
            btnSubmit.classList.add('d-none');
            // thLink.classList.add('d-none');
            // tdLink.classList.add('d-none');

        }


        function startEdit(id) {
            const link = document.getElementById('link-' + id);
            const btnSubmit = document.getElementById('btn-submit-' + id);
            // const thLink = document.getElementById('th-magic');
            // const tdLink = document.getElementById('td-magic');
            // const tdLink = document.getElementsByClassName('td-magic');

            link.classList.remove('d-none');
            btnSubmit.classList.remove('d-none');
            // thLink.classList.remove('d-none');
            // tdLink.classList.remove('d-none');
        }

    </script>

@endsection

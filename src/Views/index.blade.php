<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('vendor/contacts/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/contacts/css/main.css') }}">
    <title>Contacts</title>
</head>
<body>
<div class="container mt-5">
    <h2>Contacts</h2>
    <form action="{{ route('contacts.store') }}" method="POST" id="contactForm">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" required>
        </div>
        <div class="form-group form-phone">
            <label for="phone">Phone</label>
            <div id="phoneFields">
                <input type="tel" class="form-control" name="phone[]" required>
            </div>
            <button type="button" id="addPhone" class="btn btn-secondary mt-2">+</button>
        </div>
        <button type="submit" class="btn btn-primary">Save Contact</button>
    </form>

    <table class="table mt-4">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phones</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->first_name }}</td>
                <td>{{ $contact->last_name }}</td>
                <td>
                    @foreach($contact->phones as $phone)
                        <div>{{ $phone->number }}</div>
                    @endforeach
                </td>
                <td>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $contacts->links() }}
</div>
<script type="text/javascript" src="{{ asset('vendor/contacts/js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/contacts/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/contacts/js/main.js') }}"></script>

</body>
</html>


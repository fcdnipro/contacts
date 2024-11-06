<form id="contactForm" action="{{route('contacts.submit')}}" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" name="Contact[first_name]" required>
        </div>
        <div class="form-group col-md-6">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="Contact[last_name]" required>
        </div>
    </div>

    <div class="form-group col-md-4">
        <label for="phone1">Phone</label>
        @foreach($phones as $key => $phone)
            <input type="tel" class="form-control" id="phone1" name="phone[]" required>
            @if($key > 1)
                <button type="submit" class="btn-primary delete_phone" name="action" value='contacts.remove-phone'><i class="icon-trash"></i></button>
            @endif
        @endforeach
        <button type="submit" class="btn btn-secondary" id="addPhone" name="action" value='contacts.add-phone'>+</button>
    </div>
    <div id="additionalPhones"></div>
    <div class="form-row">
    </div>

    <button type="submit" class="btn btn-primary mt-3" name="action" value='contacts.create'>Відправити</button>
</form>

document.getElementById('addPhone').addEventListener('click', function () {
    var phoneField = document.createElement('input');
    phoneField.type = 'tel';
    phoneField.name = 'phone[]';
    phoneField.classList.add('form-control');
    phoneField.classList.add('form-phone');

    var deleteButton = document.createElement('button');
    deleteButton.type = 'button';
    deleteButton.classList.add('btn', 'btn-danger', 'mt-2');
    deleteButton.innerHTML = 'Delete';
    deleteButton.addEventListener('click', function () {
        phoneField.remove(); // Видалення поля
        deleteButton.remove(); // Видалення кнопки
    });

    document.getElementById('phoneFields').appendChild(phoneField);
    document.getElementById('phoneFields').appendChild(deleteButton);
});

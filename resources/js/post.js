// 編集ボタンの動き
const editButton = document.querySelectorAll(".js-edit-button");
if (editButton) {
    editButton.forEach( btn => {
        btn.addEventListener("click", e => {
            e.stopPropagation();
            const parent = btn.parentElement;
            const id = parent.getAttribute('data-id');
            window.location.href = "/edit/pin/" + id;
        });
    })
}

// 削除ボタンの動き
const deleteForm = document.querySelectorAll('.js-delete-form');
deleteForm.forEach( form => {
    form.addEventListener('submit', (e)=> {
        e.stopPropagation();

        if (!confirm('削除します。よろしいですか？')) {
            e.preventDefault();
        }
    });
});
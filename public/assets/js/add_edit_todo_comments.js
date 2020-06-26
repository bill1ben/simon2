var container;
var addCommentBtn = $('<button type="button" class="btn btn-sm btn-primary add_tag_link">Add a Comment</button>');
var btnContainer = $('<div class="btn-add-container"></div>').append(addCommentBtn);

function addDeleteBtn(newFormComment) {
    var removeFormButton = $('<button class="btn btn-sm btn-danger" type="button">Delete this comment</button>');
    newFormComment.append(removeFormButton);
    removeFormButton.on('click', function(e) {
        newFormComment.remove();
    });
}

function addCommentForm(container) {
    let newForm = container.data('prototype');
    let index = Math.random().toString(16).slice(2);
    newForm = newForm.replace(/__name__/g, index);
    let newFormComment = $('<div></div>').append(newForm);
    addDeleteBtn(newFormComment);
    container.append(newFormComment);
}

$(document).ready(function() {

    container = $('.todo-comments');
    container.after(btnContainer);

    $('.comment-row').each(function() {
        addDeleteBtn($(this));
    });

    addCommentBtn.on('click', function(e) {
        addCommentForm(container);
    });
});
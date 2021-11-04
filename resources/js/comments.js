window.toggleReplyFormVisbility = function (e) {
    e.preventDefault();

    e.target.closest(".comment").classList.toggle("reply-form-visible");
};

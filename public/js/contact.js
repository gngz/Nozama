$(document).ready(function() {

    $('#contactForm').submit(function (event) {
        event.preventDefault();

        var input = $("<input />").attr("type", "hidden")
        .attr("name", "message")
        .attr("value", quill.getHtml());

        input.appendTo(this);

        this.submit();

    })

});


Quill.prototype.getHtml = function() {
    return this.container.firstChild.innerHTML;
};
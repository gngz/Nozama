$(document).ready(function() {


    ajax('/util/categories')
    .done(function(data) {
        data.forEach(element => {
            $('#category').append('<option value="'+element.id+'">'+element.name+'</option>');
        });
    });


    $('#category').change(function() {
        var subCatElement  = $('#subcategory');
        var categoryId = this.value;

        if(categoryId) {
           
        } else {
            subCatElement.empty();
            subCatElement.prop('disabled', true);
        }


        ajax("/util/subcategories/" + categoryId)
        .done(function(data) {
            subCatElement.empty()
            data.forEach(element => {
                subCatElement.append('<option value="'+element.id+'">'+element.name+'</option>');
                subCatElement.prop('disabled', false);
            });
        });
        
    });


    $('#purchaseForm').submit(function (event) {
        event.preventDefault();

        var input = $("<input />").attr("type", "hidden")
        .attr("name", "description")
        .attr("value", quill.getHtml());

        input.appendTo(this);

        this.submit();

    })

});




function ajax(url) {
    return $.ajax({
        url ,
        context: document.body
    })
}

Quill.prototype.getHtml = function() {
    return this.container.firstChild.innerHTML;
};
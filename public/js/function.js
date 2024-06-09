function urlModalHandler(element) {
    // Get the data-id attribute
    var dataId = $(element).data("id-target");
    console.log("data id:" + dataId);

    // Update the action attribute of the form
    var form = $("#delete-data-form");
    form.attr("action", dataId);
}
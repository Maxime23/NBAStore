$("#prevContenu").click(function () {
    $('#previewModal').empty();
    var temp = CKEDITOR.instances["areaPreview"].getData();
    var n = temp.length;
    if(n == 0){ 
        $('#previewModal').append("<b style='color:#D64541;'>La zone est actuellement vide !</b><a class=\"close-reveal-modal\">&#215;</a>");
        $('#previewModal').foundation('reveal', 'open');
    }else{
        $('#previewModal').append(temp+"<a class=\"close-reveal-modal\">&#215;</a>");
        $("#previewModal pre").addClass("prettyprint");
        $('#previewModal').foundation('reveal', 'open');
    }
});
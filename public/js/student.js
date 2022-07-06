$(document).ready(function(){
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function(){
        if(this.checked){
            checkbox.each(function(){
                this.checked = true;
            });
        } else{
            checkbox.each(function(){
                this.checked = false;
            });
        }
    });
    checkbox.click(function(){
        if(!this.checked){
            $("#selectAll").prop("checked", false);
        }
    });
    $('body').on('change', "#find_sort", function(){
        var changeType  = $(this).val();
        if (changeType === "age") {
            $("#sort_input").prop("type","number");
        }
        else if (changeType === "name") {
            $("#sort_input").prop("type","text");
        }
        else if (changeType === "month") {
            $("#sort_input").prop("type","number");
        }
        else {
            // error
        }
    });
});

$(document).ready(function(){
    window.user_form = $('#user_form')
    // toggle form
    window.toggle_form = function() {
        user_form.toggle();
    }

    // save user
    window.save_User = function() {
        var finalObj = {};
        $.each(user_form.serializeArray(), function () {
            finalObj[this.name] = this.value;
        });

        $.post('/testSite/',finalObj).done(function(result){
            if (result.done){
                user_form.get(0).reset();
                var user = result.data;
                $("table#user_table>tbody").append(`<tr>
                    <td>${user.id}</td>
                    <td>${user.fName}</td>
                    <td>${user.lName}</td>
                    <td>${user.age}</td>
                    <td>
                         <button type="button" class="delete_user" data-id="${user.id}">Delete</button>
                    </td>
                </tr>`);
                user_form.hide();
                toastr.success("Added with success");
            } else {
                console.error("ceva ne to");
                toastr.error(result.error);
            }
        });
    }

    // delete user
    $("#user_table").on("click", ".delete_user", function(){
        var user_id = $(this).data("id");
        var button_obj = $(this);
        var finalObj = {
            "action":"delete_user",
            "user_id":user_id
        }
        $.post('/testSite/',finalObj).done(function(result){
            if (result.done){
                button_obj.closest("tr").remove();
                toastr.success("Removed with success");
            } else {
                toastr.error("ceva ne to")
                console.error("ceva ne to");
            }
        });
    })
})
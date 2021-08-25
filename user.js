function save_User() {
    var finalObj = {};
    $.each($('form#user_form').serializeArray(), function () {
        finalObj[this.name] = this.value;
    });

    $.post('/testSite/',finalObj).done(function(result){
        console.log('>>>',result);
        result= JSON.parse(result);
        if (result.done){
            $("#user_form").get(0).reset();
            var user = result.data;
            $("table#user_table>tbody").append(`<tr>
                        <td>${user.id}</td>
                        <td>${user.fName}</td>
                        <td>${user.lName}</td>
                        <td>${user.age}</td>
                        <td>
                            <form action="controllers/IndexController.php" method="get">
                                <button name="id" value="${user.id}">Delete</button>
                            </form>
                        </td>
                    </tr>`)
        } else {
            console.error("ceva ne to");
        }
    });

    console.log(finalObj);
}

$("#user_table").on("click", ".delete_user", function(){
    var user_id = $(this).data("id");
    var finalObj = {

    }
    $.post('/testSite/',finalObj).done(function(result){
        console.log('>>>',result);
        result= JSON.parse(result);
        if (result.done){

        } else {
            console.error("ceva ne to");
        }
    });
})
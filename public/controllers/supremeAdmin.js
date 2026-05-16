$(document).ready(function(){
    $('#tblUserDetails').DataTable({
        paging: false,
        searching: false,
        info: false,
        ordering: false,
        lengthChange: false,
        autoWidth: false,
        scrollCollapse: true,
        columnDefs: [
            { targets: [0, 1, 2, 3], className: 'text-center align-middle' },
        ],
    });
    getUserDetails();

    function getUserDetails(){
        $.ajax({
            type:"GET",
            url:"/get-user-details",
            dataType:"json",
            success:function(response){
                console.log(response.data);
            },
            error:function(xhr){
                console.log(xhr.responseText);
            }

        });
    }
});

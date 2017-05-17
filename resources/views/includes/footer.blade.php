
<!-- Latest compiled and minified JavaScript -->
<script src="{{ url('js/jquery-1.11.1.js')}}"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="{{ url('js/bootstrap.js')}}"></script>


<script type="text/javascript">
    $(document).ready(function () {

        $('.delete-task111').click(function () {
            var contact_id = $(this).attr('id');
//             $("#contact-" + contact_id).remove();
//            return;
//            return false;
//            return;
            $.ajax({
//                type: "DELETE",
                type:"GET",
                url: 'http://localhost/crudapp/public/contacts/delete/' + contact_id,
                data: {"_token": "{{ csrf_token() }}"},
                success: function (data) {
                    console.log(data);

                    $("#contact-" + contact_id).remove();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
            
            return false;
        });
    });
</script>



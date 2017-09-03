
$(document).ready(function() {

    $(document).on('click','#add', function(e){
        e.preventDefault();
        $.ajax({
            'type':'POST',
            'url':'/mvc/index.php/goods/goods/add',
            'dataType':'json',
            'data':{
                'name': $('#name').val(),
                'description': $('#description').val(),
                'price': $('#price').val()
            },
            'success':function (json) {
                if(json.error){
                    alert(json.error);
                }
                else{
                    getgoods();
                }
            },
            'error':function () {
                console.log('not ok');
            }
        })
    });


    function getgoods() {
        $.ajax({
            'type': 'POST',
            'url': '/mvc/index.php/goods/goods/show',
            'dataType':'json',
            'data':{

            },
            'success':function (json) {
                $.each(json, function (key, val) {
                    $('table').append("<tr data-id='"+val.id+"'>" +
                        "<td>"+$("tr").length+"</td>" +
                        "<td class='goods' data-col='name'>"+val.name+"</td>" +
                        "<td class='goods' data-col='description'>"+val.description+"</td>" +
                        "<td class='goods' data-col='price'>"+val.price+"</td>" +
                        "<td class='delete'><button class='delete'>&#10008</button></td>" +

                        "</tr>");
                })
            }
        })

        $('#formAdd input#name').val('');
        $('#formAdd input#description').val('');
        $('#formAdd input#price').val('');

    }

    $(document).on('click', 'button.delete', function (e) {
        var id = $(e.target.closest('tr')).data('id');

        $.ajax({
            'type':'POST',
            'url':'/mvc/index.php/goods/goods/delete',
            'dataType':'json',
            'data':{
                'id': id
            },
            'success':function () {
                $(e.target.closest('tr')).remove();
            }
        })

    })


    $(document).on('dblclick', 'td', function (e) {
        console.log($(this));

        if($(this).data('col')){
            var id = $(this).closest('tr').data('id');
            var name = $(this).data('col');
            var elem = $(this);
            var text = $(this).text();

            console.log(text);

            $(this).text('');
            $(this).append('<input name="update" class="update" value="'+text+'">');
            var input = $(this).children();
            input.focus();

            console.log(id);

            $(input).focusout(function(){

                console.log(input.val());
                console.log(id);

                var newText = input.val();

                $.ajax({
                    'type': 'POST',
                    'url':'/mvc/index.php/goods/goods/update',
                    'dataType':'json',
                    'data':{
                        'id':id,
                        'name': name,
                        'text':newText
                    },
                    'success':function (json) {
                        console.log(elem);
                        elem.children().remove();
                        elem.text(newText);

                    },
                    'error':function () {
                        console.log('error');
                    }
                })
            });
        }

    })




});

	

	

	 
	 
 
 
 
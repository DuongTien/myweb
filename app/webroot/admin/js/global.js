var Form = {
    addUser: function(){
        var form = $('#add-user');
        form.ajaxForm({
            type: 'post',
            dataType: 'json',
            data: 'data',
            beforeSerialize: function() {
                console.log('loading');
            },
            success: function(data) {
                if(data.status) {
                    $('.error_box').hide();
                    $('.valid_box').show();
                }else{
                    $('.valid_box').hide();
                    $('.error_box').show();
                }
                Form.addUser();
            }
        });
    },
    addCategory: function(){
        var form = $('#add-category');
        form.ajaxForm({
            type: 'post',
            dataType: 'json',
            data: 'data',
            beforeSerialize: function() {
                console.log('loading');
            },
            success: function(data) {
                if(data.status) {
                    $('.error_box').hide();
                    $('.valid_box').show();
                }else{
                    $('.valid_box').hide();
                    $('.error_box').show();
                }
            }
        });
    }
}
var Paginater = {
    page: function(){
        $('.pagination a').click(function(){
            var url = $(this).attr('href');
            pagination(url);
            return false;
        });
        function pagination(url)
        {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                beforeSend: function(){
                },
                success: function(data) {
                    $('.center_content').html(data);
                    Delete.Del($('.user-del-12'));
                    Delete.Del($('.del-Category'));
                    Delete.Del($('.del-product'));
                    Delete.Del($('.del-post'));
                    Delete.Del($('.del-support'));
                    Delete.Del($('.del-authorization'));
                    Paginater.page();
                },
                error: function(data) {
                    console.log('Error');
                }
            });
        }
    }
}

var Delete = {
    Del: function(classname){
        classname.click(function(){
            var url = $(this).attr('href');
            var curBtn = $(this);
            delUser(url,curBtn);
        return false;
        });
        function delUser(url,curBtn)
        {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                beforeSend: function(){
                },
                success: function(data) {
                    if(data.status){
                        curBtn.parent().parent().fadeOut();
                    }
                },
                error: function(data) {
                    console.log('Error');
                }
            });
        }
    }
}


$(document).ready(function(){
    Form.addUser();
    Paginater.page();
    Delete.Del($('.user-del-12'));
    Delete.Del($('.del-Category'));
    Form.addCategory();
    Delete.Del($('.del-product'));
    Delete.Del($('.del-post'));
    Delete.Del($('.del-support'));
    Delete.Del($('.del-authorization'));

    tinymce.init({
        document_base_url: baseUrl,
        selector: "textarea#post-content",
        theme: "modern",
        language : "en",
        width : "100%",
        height: 300,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
        ],
        content_css: "css/content.css",
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ",
        toolbar2: "link image | print preview media fullpage | forecolor backcolor emoticons",
        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],
        force_p_newlines : false,
        relative_urls : false,
        external_filemanager_path:baseUrl + "/filemanager/",
        filemanager_title:"Responsive Filemanager" ,
        external_plugins: { "filemanager" : baseUrl + "/filemanager/plugin.min.js"}
    });

})
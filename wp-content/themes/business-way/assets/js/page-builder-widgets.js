jQuery(document).ready(function($) {

        var at_document = $(document);

    at_document.on('click','.media-image-upload', function(e){

        // Prevents the default action from occuring.
        e.preventDefault();
        var media_image_upload = $(this);
        var media_title = $(this).data('title');
        var media_button = $(this).data('button');
        var media_input_val = $(this).prev();
        var media_image_url_value = $(this).prev().prev().children('img');
        var media_image_url = $(this).siblings('.img-preview-wrap');

        var meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
            title: media_title,
            button: { text:  media_button },
            library: { type: 'image' }
        });
        // Opens the media library frame.
        meta_image_frame.open();
        // Runs when an image is selected.
        meta_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = meta_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            media_input_val.val(media_attachment.url);
            if( media_image_url_value !== null ){
                media_image_url_value.attr( 'src', media_attachment.url );
                media_image_url.show();
                LATESTVALUE(media_image_upload.closest("p"));
            }
        });
    });

   // Runs when the image button is clicked.
    jQuery('body').on('click','.media-image-remove', function(e){
        $(this).siblings('.img-preview-wrap').hide();
        $(this).prev().prev().val('');
    });
   
    var LATESTVALUE = function (wrapObject) {
        wrapObject.find('[name]').each(function(){
            $(this).trigger('change');
        });
    };  

});


jQuery(document).ready(function($) {

    var count = 0;
    jQuery("body").on('click','.pt-business-way-add', function(e) {

      e.preventDefault();
       
      var widget_id = $(this).attr('data-id');

      var ID=  $(this).attr('id');
      var arr11 = ID.split('-');
      var num= arr11[2];
      var additional = $(this).parent().parent().find('.pt-business-way-additional');
      var add = $(this).parent().parent().find('.pt-business-way-add');
      count = additional.find('.pt-business-way-sec').length;
   
      //Json response
      $.ajax({
        type      : "GET",
        url       : ajaxurl,
        data      : {
            action: 'business_way_wp_pages_plucker',
        },
        dataType: "json",
        success: function (data) {

            var options = '<option disabled>Select pages</option>';

            $.each(data, function( index, value ) {
                var option = '<option value="'+index+'">'+value+'</option>';
                options += option;
            });


            additional.append(
                '<div class="pt-business-way-sec"><div class="sub-option section widget-upload">'+
                '<label for="widget-'+widget_id+'-'+num+'-features-'+count+'">Pages</label>'+
                '<select class="widefat" id="widget-'+widget_id+'-'+num+'-features-'+count+'-page_ids"'+
                'name="widgets['+num+'][features]['+count+'][page_ids]">'+ options + '</select>' +
                '<a class="pt-business-way-remove delete">Remove Feature</a></div></div>' );

        }   
        });   
      
    });

    jQuery(".pt-business-way-remove").live('click', function() {
        jQuery(this).parent().parent().remove();
    });

});






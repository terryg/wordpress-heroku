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
    jQuery("body").on('click','.business-way-counter-add', function(e) {
      event.preventDefault();
      var additional = $(this).parent().parent().find('.business-way-counter-additional');
      var container = $(this).parent().parent().parent().parent();
      var container_class = container.attr('id');
      var container_class_array = container_class.split("business-way-counter-").reverse();
      var instance = container_class_array[0];
      console.log(instance);
      var add = $(this).parent().parent().find('.business-way-counter-add');
      count = additional.find('.business-way-counter-section').length;
      additional.append('<div class="business-way-counter-section"><div class="sub-option section widget-upload">'+
        
        
        '<label for="widget-business-way-counter['+instance+'][features]['+count+'][counter_title]"><strong>Counter Title :</strong></label>'+
        '<input class="widefat" id="widget-business-way-counter-'+instance+'-features-'+count+'-counter_title" name="widget-business-way-counter['+instance+'][features]['+count+'][counter_title]" type="text" value="" />'+

        '<label for="widget-business-way-counter['+instance+'][features]['+count+'][counter_icon]"><strong>Counter Icon :</strong></label><br/> <small><em>Font Awesome Icon Used in Widgets <a href="http://fontawesome.io/cheatsheet/"target="_blank">Refer here</a> for icon class. For example: fa-desktop </em></small><br/>'+
        '<input class="widefat" id="widget-business-way-counter-'+instance+'-features-'+count+'-counter_icon" name="widget-business-way-counter['+instance+'][features]['+count+'][counter_icon]" type="text" value="" />'+

        '<label for="widget-business-way-counter['+instance+'][features]['+count+'][counter_value]"><strong>Counter Value :</strong></label>'+
        '<input class="widefat" id="widget-business-way-counter-'+instance+'-features-'+count+'-counter_value" name="widget-business-way-counter['+instance+'][features]['+count+'][counter_value]" type="number" value="" /><a class="business-way-counter-remove delete">Remove Counter Section</a></div>');

       
    });

    jQuery(".business-way-counter-remove").live('click', function() {
        jQuery(this).parent().remove();
    });

    
    // Clients js
    
     var count = 0;
    jQuery("body").on('click','.business-way-clients-add', function(e) {
      event.preventDefault();
      var additional = $(this).parent().parent().find('.business-way-clients-additional');
      var container = $(this).parent().parent().parent().parent();
      var container_class = container.attr('id');
      var container_class_array = container_class.split("business-way-clients-").reverse();
      var instance = container_class_array[0];
      var add = $(this).parent().parent().find('.business-way-clients-add');
      count = additional.find('.business-way-clients-section').length;
      additional.append('<div class="business-way-clients-section"><div class="sub-option section widget-upload">'+
        
        '<p><label for="widget-business-way-clients['+instance+'][features]['+count+'][client_image]"><strong>Clients Image :</strong></label>'+
          
        '<input class="widefat custom_media_urls" id="widget-business-way-clients-'+instance+'-features-'+count+'-client_image" name="widget-business-way-clients['+instance+'][features]['+count+'][client_image]" type="text"  placeholder="No file chosen" />'+

        '<input id="widget-business-way-clients-'+instance+'-features-'+count+'-client_image" class="upload-button-wdgt custom_media_button button media-image-upload" type="button" value="Upload" /></div></p>'+

        '<label for="widget-business-way-clients['+instance+'][features]['+count+'][client_image_link]"><strong> Enter URL :</strong></label>'+
        '<input class="widefat" id="widget-business-way-clients-'+instance+'-features-'+count+'-client_image_link" name="widget-business-way-clients['+instance+'][features]['+count+'][client_image_link]" type="text" value="" /><a class="business-way-clients-remove delete"><strong>Remove Clients Section</strong></a></div>');


    });

    jQuery(".business-way-clients-remove").live('click', function() {
        jQuery(this).parent().remove();
    });
    
    
    

    var count = 0;
    jQuery("body").on('click','.pt-business-way-add', function(e) {

      e.preventDefault();
      var additional = $(this).parent().parent().find('.pt-business-way-additional');
      var container = $(this).parent().parent().parent().parent();
     
      var container_class = container.attr('id');
   
      var arr = container_class.split('-');
    
      var val=  arr[1].split('_');
  
       val.shift();
      
      var liver=  val.join('_')
   
      var container_class_array = container_class.split(liver+"-");
      var instance = container_class_array[1];
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
                '<label for="widget-'+liver+'-'+instance+'-features-'+count+'-page_ids">Pages</label>'+
                '<select class="widefat" id="widget-'+liver+'-'+instance+'-features-'+count+'-page_ids"'+
                'name="widget-'+liver+'['+instance+'][features]['+count+'][page_ids]">'+ options + '</select>' +
                '<a class="pt-business-way-remove delete">Remove Feature</a></div></div>' );

        }
        });
      
    });

    jQuery(".pt-business-way-remove").live('click', function() {
        jQuery(this).closest(".pt-business-way-sec").remove();
    });
  
});






/* Customizer JS Upsale*/
jQuery(document).ready(function($){

    function blook_reorder_sections( container ){

        var sections = [];
        var sectionName;
        $( container+' .control-section' ).each(function(){

            sectionName = $(this).attr('aria-owns');
            sectionName = sectionName.replace( "sub-accordion-section-", "");
            sections.push(sectionName);
        });
        var sections = sections.toString();

        var data = {
            'action': 'cutie_pie_arrange_home_section',
            'sections': sections,
            '_wpnonce': cutie_pie_re_customizer.ajax_nonce,
        };

        $.post( ajaxurl, data, function(response) {

            wp.customize.previewer.refresh();

        });

    }


    $('#sub-accordion-panel-homepage_option_panel').sortable({
      axis: 'y',
      items: '.control-section',
      update: function( event, ui ) {

        blook_reorder_sections( '#sub-accordion-panel-homepage_option_panel' );

      },

    });

});
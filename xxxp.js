jQuery(window).load(function () {
    jQuery.clientenv();
    if(jQuery.clientenv.is('windowsXP')){
        jQuery('#xxxp_disp_title').html(
            jQuery('#xxxp_xp_title').text()
            );
        jQuery('#xxxp_disp_body').html(
            jQuery('#xxxp_xp_body').text()
            );
        jQuery('#xxxp_footer_disp').html(
            jQuery('#xxxp_footer_xp').html()
            );
        jQuery('#xxxp_widget').css("display", "block");
        jQuery('#xxxp_footer_disp').css("display", "block");
    }else{
        if(jQuery('#xxxp_nonxp_disp_flg').text() == 'Yes'){
            jQuery('#xxxp_disp_title').html(
                jQuery('#xxxp_nonxp_title').text()
                );
            jQuery('#xxxp_disp_body').html(
                jQuery('#xxxp_nonxp_body').text()
                );            
            jQuery('#xxxp_widget').css("display", "block");
        }else{
            jQuery('#xxxp_widget').remove();
        }
        jQuery('#xxxp_footer_disp').html(
            jQuery('#xxxp_footer_nonxp').html()
            );
        jQuery('#xxxp_footer_disp').css("display", "block");
    }
});
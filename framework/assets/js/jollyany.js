jQuery(function($){
    var updateHikashopCart = function () {
        if ($(".jollyany-hikacart").length){
            var hikacart_quantity = 0;
            $('#jollyany-hikacart-content .hikashop_cart_module tbody tr').find('input.hikashop_product_quantity_field').each(function (i, el) {
                hikacart_quantity   +=  parseInt($(el).val());
            });
            if (hikacart_quantity>0) {
                $('.jollyany-hikacart-icon > i').html('<span class="cart-count">'+hikacart_quantity+'</span>');
            } else {
                $('.jollyany-hikacart-icon > i').empty();
            }
        }
    };
    $(document).ready(function(){
        if ($('#astroid-preloader').length && $('#jollyany-preloader-logo-template').length && !$('#astroid-preloader .jollyany-preloader-logo').length) {
            $('#astroid-preloader').prepend($('#jollyany-preloader-logo-template').html());
        }
        if ($(".jollyany-hikacart").length){
            var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;

            $.fn.attrchange = function(callback) {
                if (MutationObserver) {
                    var options = {
                        subtree: false,
                        attributes: true
                    };

                    var observer = new MutationObserver(function(mutations) {
                        mutations.forEach(function(e) {
                            callback.call(e.target, e.attributeName);
                        });
                    });

                    return this.each(function() {
                        observer.observe(this, options);
                    });
                }
            }
            $('#jollyany-hikacart-content .hikashop_cart').attrchange(function(attrName) {
                if(attrName=='class'){
                    updateHikashopCart();
                }
            });
            $(".jollyany-hikacart-icon").on("click", function(e){
                e.preventDefault();
            });
            updateHikashopCart();
        }
        if ($(".jollyany-login").length){
            $(".jollyany-login-icon").on("click", function(e){
                e.preventDefault();
            });
        }
        if ($('#astroid-header').length && $('#astroid-header').hasClass('has-sidebar') && $('#jollyany-sidebar-collapsed-logo-template').length && !$('#astroid-header .astroid-sidebar-collapsed-logo').length) {
            $('#astroid-header').find('.astroid-sidebar-collapsable').after($('#jollyany-sidebar-collapsed-logo-template').html());
        }
    });
});
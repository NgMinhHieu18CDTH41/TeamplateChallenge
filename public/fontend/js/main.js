/*price range*/
$(document).ready(function() {
    $('.banner-home').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [{

                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,

                }
            }, {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }, {
                breakpoint: 700,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

});

$(document).ready(function() {
    $('.slide-news-popular').slick({
        autoplay: false,
        autoplaySpeed: 6000,
        dots: true,
        arrows: false,
        infinite: false,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 767,
                settings: {
                    variableWidth: true,
                    slidesToShow: 0,
                    slidesToScroll: 0
                }
            }
        ]
    })
});
// $('.slickpicture').slick({
//     autoplay: true,
//     autoplaySpeed: 6000,
//     dots: false,
//     arrows: false,
//     infinite: false,
//     speed: 300,
//     slidesToShow: 5,
//     slidesToScroll: 5,
//     responsive: [{
//             breakpoint: 1200,
//             settings: {
//                 slidesToShow: 5,
//                 slidesToScroll: 5
//             }
//         },
//         {
//             breakpoint: 1024,
//             settings: {
//                 slidesToShow: 4,
//                 slidesToScroll: 4
//             }
//         },
//         {
//             breakpoint: 991,
//             settings: {
//                 slidesToShow: 3,
//                 slidesToScroll: 3
//             }
//         },
//         {
//             breakpoint: 767,
//             settings: {
//                 slidesToShow: 2,
//                 slidesToScroll: 2
//             }
//         }
//     ]
// });
// function addToCart(e) {
//     if (typeof e !== 'undefined') e.preventDefault();
//     var $this = $(this);
//     var form = $this.parents('form');
//     $.ajax({
//         type: 'POST',
//         url: '/cart/add.js',
//         async: false,
//         data: form.serialize(),
//         dataType: 'json',
//         error: addToCartFail,
//         beforeSend: function() {},
//         success: addToCartSuccess,
//         cache: false
//     });
// }
// $('.banner-home').slick({
//     autoplay: false,
//     autoplaySpeed: 6000,
//     dots: true,
//     arrows: false,
//     infinite: false,
//     speed: 300,
//     slidesToShow: 3,
//     slidesToScroll: 3,
//     responsive: [{
//             breakpoint: 1200,
//             settings: {
//                 slidesToShow: 3,
//                 slidesToScroll: 3
//             }
//         },
//         {
//             breakpoint: 1024,
//             settings: {
//                 slidesToShow: 3,
//                 slidesToScroll: 3
//             }
//         },
//         {
//             breakpoint: 991,
//             settings: {
//                 slidesToShow: 3,
//                 slidesToScroll: 3
//             }
//         },
//         {
//             breakpoint: 767,
//             settings: {
//                 variableWidth: true,
//                 slidesToShow: 2,
//                 slidesToScroll: 2
//             }
//         }
//     ]
// });

$(document).ready(function($) {

    $('.carousel-nav').each(function() {

        var tab = $(this);

        var $owl = $('.owl-carousel', tab).owlCarousel({
            animateOut: 'fadeInUp',
            animateIn: 'fadeOut',
            items: 1,
            margin: 30,
            stagePadding: 30,
            smartSpeed: 450,
            loop: true,
        });


        $owl.on('changed.owl.carousel', function(event) {
            var index = event.item.index;
            $('.tabs__nav a', tab).removeClass('active');
            $('.tabs__nav a', tab).eq(index).addClass('active');
        });

        $('.tabs__nav a', tab).on('click', function(e) {
            e.preventDefault();
            var index = $(this).index();
            $owl.trigger('to.owl.carousel', [index]);

        });



    });





});

$(document).ready(function() {
    $('.carousel').carousel()


    // Enable Carousel Controls
    $(".carousel-control-prev").click(function() {
        $("#multi-item-example").carousel("prev");
    });
    $(".carousel-control-next").click(function() {
        $("#multi-item-example").carousel("next");
    });
});


// $('.row-onclick-ads').slick({
//     autoplay: true,
//     autoplaySpeed: 1500,
//     dots: true,
//     arrows: false,
//     slidesToShow: 3,
//     slidesToScroll: 1
// });
// $('.multiple-items').slick({
//     infinite: true,
//     slidesToShow: 3,
//     slidesToScroll: 3
// });
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}



function validInputQty(ob) {
    if (ob.value == 0) ob.value = 1;
}

function qtyDown(ob, id) {
    var qty = ob.nextElementSibling.value;
    qty--;
    document.querySelector('[data-id="input-' + id + '"]').value = qty;
    if (qty < 1) return alert('Vui lòng nhập số lượng lớn hơn 0!');
    changeCartAjax(id, qty);
}

function qtyUp(ob, id) {
    var qty = ob.previousElementSibling.value;
    qty++;
    document.querySelector('[data-id="input-' + id + '"]').value = qty;
    changeCartAjax(id, qty);
}


function number_format(number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}
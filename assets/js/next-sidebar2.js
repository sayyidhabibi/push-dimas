$(function () {
    // Sidebar links
    $('.sidebar .sidebar-menu li a').on('click', function () {
        const $this = $(this);

        if ($this.parent().hasClass('open')) {
            $this
            .parent()
            .children('.dropdown-menu')
            .slideUp(200, () => {
                $this.parent().removeClass('open');
            });
        } else {
            $this
            .parent()
            .parent()
            .children('li.open')
            .children('.dropdown-menu')
            .slideUp(200);

            $this
            .parent()
            .parent()
            .children('li.open')
            .children('a')
            .removeClass('open');

            $this
            .parent()
            .parent()
            .children('li.open')
            .removeClass('open');

            $this
            .parent()
            .children('.dropdown-menu')
            .slideDown(200, () => {
                $this.parent().addClass('open');
            });
        }
    });

    $('.offcanvas-toggle').click(function (e) {
        e.preventDefault();
        $('.offcanvas-menu').toggleClass('open');
        //tambah disini
    });

    // Sidebar Activity Class
    const sidebarLinks = $('.sidebar').find('.sidebar-link');

    sidebarLinks
    .each((index, el) => {
        $(el).removeClass('active');
    })
    .filter(function () {
        const href = $(this).attr('href');
        const pattern = href[0] === '/' ? href.substr(1) : href;
        return pattern === (window.location.pathname).substr(1);
    })
    .addClass('active');

    // ٍSidebar Toggle
    // var angka = 0;
    // $("#spatitle").hide();
    $('.sidebar-toggle').on('click', e => {
       //  angka = angka + 1;
       //  if (angka == 1) {
       //      $("#spatitle").show();
       //      // alert(angka);
       //      angka = angka + 1;
       //  } else {
       //     $("#spatitle").hide();
       //     angka = angka - angka;
       //      // alert(angka);
       // }
       $('.app').toggleClass('is-collapsed');
       e.preventDefault();
        //tambah disini oposite
    });

    if ($(window).width() < 992) {
       $('.app').toggleClass('is-collapsed');
       $('.nama-user').hide();       
    } else {
        $('.sidebar-toggle').hide();
        $('#sidebar').mouseenter(function () {
            $('.app').removeClass('is-collapsed');
            $("#spatitle").show();
        });
        $('#sidebar').mouseleave(function () {
            $('.app').addClass('is-collapsed');
            $("#spatitle").hide();
        });
    };

});

// function windowSize() {
//   windowWidth = window.innerWidth ? window.innerWidth : $(window).width();
//   if(windowWidth < 768) {
//     if($('.app').hasClass('is-collapsed')) {
//       $('.app').removeClass('is-collapse');
//     }
//   }
//   $('.app').addClass('is-collapsed')
// }

// windowSize();

// // Add Element to dom when resize screen
// $(window).resize(function() {
//   windowSize();
// });

// ------------------------------------------------------
// @Scrollbar
// ------------------------------------------------------

$(function () {
  const scrollables = $('.scrollable');
  if (scrollables.length > 0) {
    scrollables.each((index, el) => {
      new PerfectScrollbar(el);
  });
}
}());

// ------------------------------------------------------
// @Navbar search
// ------------------------------------------------------

$(function () {
  $('.search-toggle').on('click', e => {
    $('.search-box, .search-input').toggleClass('active');
    $('.search-input input').focus();
    e.preventDefault();
});
}());
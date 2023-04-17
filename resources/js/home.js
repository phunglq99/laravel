var btn = document.querySelector('[data-toggle="fullscreen"]');
    
      btn.addEventListener('click', function() {
        if (document.fullscreenElement) {
          document.exitFullscreen();
        } else {
          document.documentElement.requestFullscreen();
        }
        });

/*----------------------------------------------------------------------*/
var toggleBtn = document.querySelector('.button-toogle-menu');
var sidebar = document.querySelectorAll('.sidebar-nav__item > .collapse');
var sidebarNav = document.querySelector('.sidebar-nav');
var wrapper = document.querySelector('.wrapper');


toggleBtn.addEventListener('click', function() {
  wrapper.classList.toggle('close');
  sidebarNav.classList.add('sidebar-inherit');

  for (var i = 0; i < sidebar.length; i++) {
    sidebar[i].classList.toggle('display');
  }
})


var sidebarIn =  document.querySelector('.sidebar-in');
  sidebarIn.addEventListener('click', function() {
      wrapper.classList.add('close');
  })

var overLay =  document.querySelector('.overlay');
  overLay.addEventListener('click', function() {
      wrapper.classList.add('close');
  })

  var $alertSecond = $('.alert');
  var timeoutAlert = setTimeout(function() {
      $alertSecond.removeClass('show').addClass('hide');
      setTimeout(function() {
          $alertSecond.hide();
      }, 1000);
  }, 2000);


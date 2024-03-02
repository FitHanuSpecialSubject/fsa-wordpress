jQuery( function() {
		
	// Search toggle.
	var searchbutton = jQuery('.search-toggle');
	var searchbuttonX = jQuery('.search-icon');

	searchbutton.on( 'click', function() {
		jQuery('.header-search-nav').toggleClass("show");
		jQuery('.search-navigation').toggleClass("focus");

	} );
	searchbuttonX.on( 'click', function() {
		jQuery('.header-search-nav').removeClass("show");
		jQuery('.search-navigation').removeClass("focus");
		searchbutton.focus();
	} );
	

	// Header search
	searchbutton.on("click", function(n) {
		if (jQuery(this).attr('aria-expanded') == 'false' ) {
			searchbutton.focus();
		} else {
			jQuery(".search-box input.search-field").focus();
			n.preventDefault();
			var t, a, c, o = document.querySelector(".search-box");
			let e = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])',
				m = document.querySelector(".search-field"),
				u = o.querySelectorAll(e),
				r = u[u.length - 1];
			if (!o) return !1;
			for (a = 0, c = (t = o.getElementsByTagName("button")).length; a < c; a++) t[a].addEventListener("focus", l, !0), t[a].addEventListener("blur", l, !0);

			function l() {
				for (var e = this; - 1 === e.className.indexOf("search-box");) "*" === e.tagName.toLowerCase() && (-1 !== e.className.indexOf("focus") ? e.className = e.className.replace("focus", "") : e.className += " focus"), e = e.parentElement
			}
			document.addEventListener("keydown", function(e) {
				("Tab" === e.key || 9 === e.keyCode) && (e.shiftKey ? document.activeElement === m && (r.focus(), e.preventDefault()) : document.activeElement === r && (m.focus(), e.preventDefault()))
			})
		}
	});
  if (jQuery(window).width() < 981) {
    const toggleBtn = document.getElementById('menu-toggle');
    const menuContainer = document.querySelector('.menu-container');
    const closeBtn = document.getElementById('close-btn');
    const menuLinks = document.querySelectorAll('.menu-container a');
    const searchNavigation = document.querySelector('.search-navigation');

    toggleBtn.addEventListener('click', () => {
      menuContainer.classList.toggle('show-menu');
      searchNavigation.classList.toggle('show-menu');
      if (menuContainer.classList.contains('show-menu')) {
        menuLinks[0].focus();
      }
      if (searchNavigation.classList.contains('show-menu')) {
        menuLinks[0].focus();
      }
    });

    menuContainer.addEventListener('keydown', (event) => {
      if (event.key === 'Escape') {
        toggleBtn.focus();
        menuContainer.classList.remove('show-menu');
        searchNavigation.classList.remove('show-menu');
      } else if (event.key === 'Tab') {
        if (document.activeElement === closeBtn) {
          event.preventDefault();
          menuLinks[0].focus();
        } else if (document.activeElement === menuLinks[0] && event.shiftKey) {
          event.preventDefault();
          closeBtn.focus();
        } else if (document.activeElement === menuLinks[menuLinks.length - 1] && !event.shiftKey) {
          event.preventDefault();
          closeBtn.focus();
        }
      }
    });

    closeBtn.addEventListener('click', () => {
      toggleBtn.focus();
      menuContainer.classList.remove('show-menu');
      searchNavigation.classList.remove('show-menu');
    });

    menuContainer.addEventListener('transitionend', (event) => {
      if (event.propertyName === 'transform' && !menuContainer.classList.contains('show-menu')) {
        menuLinks[0].blur();
      }
    });

    window.onload = function() {
      menuContainer.classList.add("sub-menu");
    };
  }

  jQuery(window).scroll(function() {
    jQuery('.back-to-top').toggleClass('display-top', jQuery(this).scrollTop() > 400);
  });

  jQuery('.back-to-top').click(function() {
    jQuery('html,body').animate({
      scrollTop: 0
    }, 500);
    return false;
  });


} );
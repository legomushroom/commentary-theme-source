;(function ($, undefined) {

  var main = {
    init: function () {
      this.vars(); this.initEvents(); this.loop();
    },
    vars: function () {
      this.mainSelector   =  '[id^=vw_widget_bundle_progress]';
      this.$widget        = $(this.mainSelector);
      this.$menuItems     = $(this.mainSelector + ' #js-bundle-progress-item');
      this.$progressbars  = $(this.mainSelector + ' #js-bundle-progress-progressbar');
      this.$posts         = $('.vw-main-post');
      this.$w             = $(window);
      this.$doc           = $(document);
      this.$htmlBody      = $('html, body');
      this.wHeight        = this.$w.height();
      this.loop           = this.loop.bind(this);
      this.gaSent         = {}

      this.getDimentions();
    },
    getDimentions: function () {
      this.dimentions = [];
      this.$posts.each(function (i, item) {
        var $item = $(item);
        var pos = $item.offset();
        var $menuItem = this.$menuItems.eq(i);
        this.dimentions.push({
          start:        pos.top,
          height:       $item.outerHeight(),
          $item:        $item,
          $menuItem:    $menuItem,
          $progressbar: this.$progressbars.eq(i),
          url:          $menuItem.data().url,
          name:         $menuItem.data().name,
          index:        i
        });
      }.bind(this));
    },

    initEvents: function () {
      var it = this;
      $(document.body).on('click', '#js-bundle-progress-item', function (e) {
        if (!e.metaKey) {
          e.preventDefault(); it.scrollTo($(this).data().index);
        }
      });
    },

    scrollTo: function (i) {
      var item = this.dimentions[i];
      this.$htmlBody.animate({ scrollTop: item.start - this.wHeight/3 + 10 });
    },

    checkWidgetDisplay: function () {
      var scrollY = window.pageYOffset||document.scrollTop||document.body.scrollTop;

      if (scrollY === this.previousScrollY) { return; }
      this.previousScrollY = scrollY;

      this.currentItem = this.getCurrentItem(scrollY);

      if (this.currentItem !== this.previousItem) {
        (this.previousItem) && this.previousItem.$menuItem.removeClass('is-check');
        this.currentItem.$menuItem.addClass('is-check');
        this.setRead(this.currentItem.index);

        this.setBrowserCurrent();

        this.previousItem = this.currentItem;
      }
      this.setProgress(this.currentItem, scrollY);
    },

    setBrowserCurrent: function () {
      window.history && window.history.replaceState({}, '', this.currentItem.url);
      document.title = this.currentItem.name + ' | commentary';
      if (!this.gaSent[this.currentItem.url]) {

        if (this.currentItem.index) {
          this.$doc.trigger('bp-page-view', [ this.currentItem.$item ]);
        }

        ga('send', 'pageview', this.currentItem.url);
        this.gaSent[this.currentItem.url] = true;

      }
    },

    setProgress: function (currentItem, scrollY) {
      var delta = scrollY - (currentItem.start - this.wHeight/3);
      if (delta < 0) {
        if (currentItem.index === 0) {
          currentItem.$progressbar.css({ 'transform': 'scaleX(' + 0 + ')' });
        }
        return;
      }

      var percent = Math.min(delta/currentItem.height, 1);
      currentItem.$progressbar.css({ 'transform': 'scaleX(' + percent + ')' });
    },

    setRead: function (index) {
      for (var i = 0; i < this.dimentions.length; i++) {
        if (i < index) {
          this.dimentions[i].$menuItem.addClass('is-read');
        } else {
          this.dimentions[i].$menuItem.removeClass('is-read');
          this.dimentions[i].$progressbar.css({ 'transform': 'scaleX(' + 0 + ')' });
        }
      };
    },

    getCurrentItem: function (scrollY) {
      var item = this.dimentions[0];
      for (var i = 0; i < this.dimentions.length; i++) {
        if (scrollY > this.dimentions[i].start - this.wHeight/3) {
          item = this.dimentions[i];
        } else {
          break;
        }
      };
      return item;
    },
    loop: function () {
      this.checkWidgetDisplay();
      requestAnimationFrame(this.loop);
    }
  };

  var mainMobile = Object.create(main);

  mainMobile.vars = function () {
    this.$openBtn = $('#js-bundle-progress-mobile-open');
    this.$main    = $('#js-bundle-progress-mobile').css({ display: 'block' });
    this.$current = $('#js-bundle-progress-mobile-current');
    this.$panelProgressbar = $('#js-bundle-progress-mobile-panel-progressbar');
    
    this.mainSelector   =  '#js-bundle-progress-mobile';
    this.$widget        = $(this.mainSelector);
    this.$menuItems     = $(this.mainSelector + ' #js-bundle-progress-item');

    this.$progressbars  = $(this.mainSelector + ' #js-bundle-progress-progressbar');
    this.$posts         = $('.vw-main-post');
    this.$w             = $(window);
    this.$htmlBody      = $('html, body');
    this.wHeight        = this.$w.height();
    this.showPanel      = this.$posts.eq(0).offset().top + 20;

    this.loop           = this.loop.bind(this);

    this.getDimentions();
  }

  mainMobile.initEvents = function () {
    var it = this;

    var hammertime = new Hammer(this.$openBtn[0]);
    hammertime.on('tap', function(ev) {
      it.$main.toggleClass('is-open');
    });

    
    this.$menuItems.each(function (i, item) {
      var hammertime = new Hammer(item);
      hammertime.on('tap', function (e) {
        if (e.target.getAttribute('id') === 'js-bundle-progress-author') { return }
        if (!e.metaKey) {
          e.preventDefault();
          it.scrollTo($(item).data().index);
        }
      });
    });
  }
  mainMobile.setProgress = function (currentItem, scrollY) {
    var delta = scrollY - (currentItem.start - this.wHeight/3);
    if (delta < 0) {
      if (currentItem.index === 0) {
        currentItem.$progressbar.css({ 'transform': 'scaleX(' + 0 + ')' });
        this.$panelProgressbar.css({ 'transform': 'scaleX(' + 0 + ')' });
        currentItem.$progressbar.css({ 'transform': 'scaleX(' + 0 + ')' });
      }
      return;
    }

    var percent = Math.min(delta/currentItem.height, 1);
    currentItem.$progressbar.css({ 'transform': 'scaleX(' + percent + ')' });
    this.$panelProgressbar.css({ 'transform': 'scaleX(' + percent + ')' });
  }
  mainMobile.checkWidgetDisplay = function () {
    var scrollY = window.pageYOffset||document.scrollTop||document.body.scrollTop;

    if (scrollY === this.previousScrollY) { return; }
    this.previousScrollY = scrollY;

    if (scrollY > this.showPanel) {
      !this.isPanelShow && this.$main.addClass('is-show');
      this.isPanelShow = true;
    } else {
      this.isPanelShow && this.$main.removeClass('is-show');
      this.isPanelShow = false;
    }

    this.currentItem = this.getCurrentItem(scrollY);

    if (this.currentItem !== this.previousItem) {
      (this.previousItem) && this.previousItem.$menuItem.removeClass('is-check');
      this.currentItem.$menuItem.addClass('is-check');
      this.setRead(this.currentItem.index);

      this.setBrowserCurrent();

      this.$current.text(this.currentItem.name);

      this.previousItem = this.currentItem;
    }

    this.setProgress(this.currentItem, scrollY);
  }

  var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);

  var module = (check) ? mainMobile : main;
  setTimeout(function () { module.init() }, 1000);
  
})(window.jQuery || window.Zepto);
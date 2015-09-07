;(function ($, undefined) {

  "use strict";
  if (!Date.now) Date.now = function() {
      return (new Date).getTime()
  };
  (function() {
      var n = ["webkit", "moz"];
      for (var e = 0; e < n.length && !window.requestAnimationFrame; ++e) {
          var i = n[e];
          window.requestAnimationFrame = window[i + "RequestAnimationFrame"];
          window.cancelAnimationFrame = window[i + "CancelAnimationFrame"] || window[i + "CancelRequestAnimationFrame"]
      }
      if (/iP(ad|hone|od).*OS 6/.test(window.navigator.userAgent) || !window.requestAnimationFrame || !window.cancelAnimationFrame) {
          var a = 0;
          window.requestAnimationFrame = function(n) {
              var e = Date.now();
              var i = Math.max(a + 16, e);
              return setTimeout(function() {
                  n(a = i)
              }, i - e)
          };
          window.cancelAnimationFrame = clearTimeout
      }
  })();


  var main = {
    init: function () {
      if (this.vars()) { return };
      // this.shift();
      this.initSync();
      this.initEvents();
      this.loop();
    },
    vars: function () {
      var check = false;
      (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
      
      this.isMobile = check;

      this.mainSelector   = (!this.isMobile) ? '#js-bundle-progress' : '#js-bundle-progress-mobile-items';

      this.$widget        = $(this.mainSelector);
      
      // this.$menuItems     = this.$widget.find('.js-bundle-progress-item');
      this.$posts         = $('.vw-main-post');
      this.initialLength  = this.$posts.length;

      if (this.isMobile) {
        this.$mainEl = $('#js-bundle-progress-mobile');
        this.$currentPanel  = this.$mainEl.find('#js-bundle-progress-mobile-current');
        this.$currentProgressbar = this.$mainEl.find('#js-bundle-progress-mobile-panel-progressbar');
        this.$openBtn = this.$mainEl.find('#js-bundle-progress-mobile-open');
        this.initialLength = 3;
        this.showPanel     = this.$posts.eq(0).offset().top + 20;
        this.$mainEl.css('display', 'block');
      }

      this.$w             = $(window);
      this.$doc           = $(document);
      this.$htmlBody      = $('html, body');
      this.wHeight        = this.$w.height();
      this.viewOffset     = this.wHeight/3;
      this.loop           = this.loop.bind(this);
      this.gaSent         = {};
      this.dimentions     = [];

      if (this.$posts.length) { this.getDimentions(); } else { return true; }
    },
    getDimentions: function () {
      var items = (!this.dimentions.length) ? this.$posts : this.dimentions;
      for (var i = 0; i < items.length; i++) {
        this.pushDimention(items[i], i);
      };
    },

    notifyLockers: function ($el) {
      this.tryPandaHook(); this.$doc.trigger('bp-page-view', [ $el ]);
    },

    trigger: function (i, el) {
      var $el  = $(el);
      if ( window.bizpanda && window.bizpanda.inited ) { this.notifyLockers($el); } 
      else { this.$doc.bind('bp-init', this.notifyLockers.bind(this) ); }
      this.addPost($el);
    },

    initSync: function () {
      var $doc = $(document);

      // wrap :: [string] -> [string]
      var wrapInBrackets = function (str) {
        return '[' + str + ']';
      }

      var it = this;

      $doc.ajaxComplete(function (event, xhr, settings) {
        if (!xhr.responseText) {return};
        var match = xhr.responseText.match(/data\-ajax\-id\=\".+?\"/gim);
        if (!match || !match.length) {return};
        var wrappedMatch = match.map(wrapInBrackets);
        var selector = wrappedMatch.join(' , ');
        $(selector).each(it.trigger.bind(it));
      });

    },

    pushDimention: function ($item, i) {
      $item = $($item);
      i = (i == null) ? this.dimentions.length : i;
      
      if (this.dimentions[i] == null) {
        this.dimentions[i] = {};
        
        var pos = $item.offset(), data = $item.data();

        var $newItem = $('<li class="vw-bundle-progress__item js-bundle-progress-item"></li>');
        var $header = $('<div class="vw-bundle-progress__number font-header">' + (i+1) + '</div>');
        var $progressbar = $('<div class="js-bundle-progress-progressbar vw-bundle-progress__progressbar"></div>');
        this.dimentions[i].start = pos.top;
        this.dimentions[i].height = $item.outerHeight();
        this.dimentions[i].$item = $item;
        this.dimentions[i].url = data.url;
        this.dimentions[i].name = data.name;
        this.dimentions[i].name = data.name;
        this.dimentions[i].authorName = data.authorName;
        this.dimentions[i].authorLink = data.authorLink;
        this.dimentions[i].index = i;
        this.dimentions[i].$menuItem = $newItem;
        this.dimentions[i].$progressbar = $progressbar;
        var $title = $('<h4 class="vw-bundle-progress__title"><a id="js-bundle-progress-item" data-index="' + i + '" href="' + this.dimentions[i].url + '">' + this.dimentions[i].name + '</a></h4>');
        var $author = $('<div class="vw-post-meta vw-post-meta-large1">'
          + '<span class="vw-post-author">'
            + '<a class="author-name" href="' + this.dimentions[i].authorLink + '" title="Posts by ' + this.dimentions[i].authorName + '" rel="author">' + this.dimentions[i].authorName + '</a>'
          + '</span>'
        + '</div>');

        $newItem.append($header, $progressbar, $title, $author);
        this.$widget.append($newItem);
      } else {
        this.dimentions[i].start  = this.dimentions[i].$item.offset().top;
        this.dimentions[i].height = this.dimentions[i].$item.outerHeight();
      }

    },

    addPost: function($post) {
      this.pushDimention($post);
      this.shift();
    },

    shift: function (end) {
      var height  = 0;
      var shift   = 0;
      var end     = (end == null) ? this.dimentions.length : end;

      if (end <= this.initialLength) { end = this.initialLength; }
      var start   = start || (end-this.initialLength);
      start = Math.max(start, 0);

      for (var i = 0; i < end; i++) {
        
        if (i < start) {
          shift += this.dimentions[i].$menuItem.outerHeight();
          this.shiftedIndex = i;
        } else {
          height += this.dimentions[i].$menuItem.outerHeight();
        }
      };

      height = height || 320;
      this.$widget.parent().css({ 'height': height + 'px' });
      this.$widget.css({ 'transform': 'translateY(-' + shift+ 'px)' });
    },

    initEvents: function () {
      var it = this;
      $(document.body).on('click', '#js-bundle-progress-item', function (e) {
        if (!e.metaKey) {
          e.preventDefault(); it.scrollTo($(this).data().index);
        }
      });
      this.$w.on('resize', this.getDimentions.bind(this) );

      if (this.isMobile) {
        var it = this;

        var hammertime = new Hammer(this.$openBtn[0]);
        hammertime.on('tap', function(ev) { it.$mainEl.toggleClass('is-open'); });


        // this.$menuItems.each(function (i, item) {
        //  var hammertime = new Hammer(item);
        //  hammertime.on('tap', function (e) {
        //    if (e.target.getAttribute('id') === 'js-bundle-progress-author') { return }
        //    if (!e.metaKey) {
        //      e.preventDefault();
        //      it.scrollTo($(item).data().index);
        //    }
        //  });
        // });

      }


    },

    scrollTo: function (i) {
      var item = this.dimentions[i];
      this.$htmlBody.animate({ scrollTop: item.start - this.viewOffset + 10 });
    },

    checkWidgetDisplay: function () {
      var scrollY = this.$w.scrollTop();

      if (scrollY === this.previousScrollY) { return; }
      this.previousScrollY = scrollY;

      this.currentItem = this.getCurrentItem(scrollY);

      if (this.isMobile) {
        if (scrollY > this.showPanel) {
          !this.isPanelShow && this.$mainEl.addClass('is-show');
          this.isPanelShow = true;
        } else {
          this.isPanelShow && this.$mainEl.removeClass('is-show');
          this.isPanelShow = false;
        }
      }

      if (this.currentItem !== this.previousItem) {
        (this.previousItem) && this.previousItem.$menuItem.removeClass('is-check');
        this.currentItem.$menuItem.addClass('is-check');
        this.setRead(this.currentItem.index);

        this.shift(this.currentItem.index+1);

        this.setBrowserCurrent();

        this.previousItem = this.currentItem;
      }



      this.setProgress(this.currentItem, scrollY);
    },

    setBrowserCurrent: function () {
      window.history && window.history.replaceState({}, '', this.currentItem.url);
      document.title = this.currentItem.name + ' | commentary';

      if (this.isMobile) {
        this.$currentPanel.text(this.currentItem.name);
      }

      if (!this.gaSent[this.currentItem.url]) {
        // this.$doc.trigger('bp-page-view', [ this.currentItem.$item, this.currentItem.index === 0 ]);
        
        ga('send', 'pageview', this.currentItem.url);
        this.gaSent[this.currentItem.url] = true;

        var notifyLockers = function() {
          this.tryPandaHook();
          this.$doc.trigger('bp-page-view', [ this.currentItem.$item, this.currentItem.index === 0 ]);
        }.bind(this);
        
        if ( window.bizpanda && window.bizpanda.inited ) { notifyLockers(); } 
        else { this.$doc.bind('bp-init', notifyLockers ); }

      }
    },

    tryPandaHook: function () {
      if (this.isPandaHook) { return }
      $.pandalocker && $.pandalocker.hooks.add( 'opanda-locked', this.getDimentions.bind(this));
      this.isPandaHook = true;
    },

    setProgress: function (currentItem, scrollY) {
      var delta = scrollY - (currentItem.start - this.viewOffset);
      if (delta < 0) {
        if (currentItem.index === 0) {
          currentItem.$progressbar.css({ 'transform': 'scaleX(' + 0 + ')' });
        }
        return;
      }

      var percent = Math.min(delta/currentItem.height, 1);
      currentItem.$progressbar.css({ 'transform': 'scaleX(' + percent + ')' });

      if (this.isMobile) {
        this.$currentProgressbar.css({ 'transform': 'scaleX(' + percent + ')' });
      }

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
        if (scrollY > this.dimentions[i].start - this.viewOffset) {
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

  setTimeout(function () { main.init() }, 1000);
  
})(window.jQuery || window.Zepto);
/*!
  LegoMushroom @legomushroom http://legomushroom.com
  MIT License 2014
 */
(function(){var e;e=function(){function e(e){this.o=null!=e?e:{},window.isAnyResizeEventInited||(this.vars(),this.redefineProto())}return e.prototype.vars=function(){return window.isAnyResizeEventInited=!0,this.allowedProtos=[HTMLDivElement,HTMLFormElement,HTMLLinkElement,HTMLBodyElement,HTMLParagraphElement,HTMLFieldSetElement,HTMLLegendElement,HTMLLabelElement,HTMLButtonElement,HTMLUListElement,HTMLOListElement,HTMLLIElement,HTMLHeadingElement,HTMLQuoteElement,HTMLPreElement,HTMLBRElement,HTMLFontElement,HTMLHRElement,HTMLModElement,HTMLParamElement,HTMLMapElement,HTMLTableElement,HTMLTableCaptionElement,HTMLImageElement,HTMLTableCellElement,HTMLSelectElement,HTMLInputElement,HTMLTextAreaElement,HTMLAnchorElement,HTMLObjectElement,HTMLTableColElement,HTMLTableSectionElement,HTMLTableRowElement],this.timerElements={img:1,textarea:1,input:1,embed:1,object:1,svg:1,canvas:1,tr:1,tbody:1,thead:1,tfoot:1,a:1,select:1,option:1,optgroup:1,dl:1,dt:1,br:1,basefont:1,font:1,col:1,iframe:1}},e.prototype.redefineProto=function(){var e,t,n,o;return t=this,o=function(){var o,i,r,a;for(r=this.allowedProtos,a=[],e=o=0,i=r.length;i>o;e=++o)n=r[e],null!=n.prototype&&a.push(function(e){var n,o;return n=e.prototype.addEventListener||e.prototype.attachEvent,function(n){var o;return o=function(){var e;return(this!==window||this!==document)&&(e="onresize"===arguments[0]&&!this.isAnyResizeEventInited,e&&t.handleResize({args:arguments,that:this})),n.apply(this,arguments)},e.prototype.addEventListener?e.prototype.addEventListener=o:e.prototype.attachEvent?e.prototype.attachEvent=o:void 0}(n),o=e.prototype.removeEventListener||e.prototype.detachEvent,function(t){var n;return n=function(){return this.isAnyResizeEventInited=!1,this.iframe&&this.removeChild(this.iframe),t.apply(this,arguments)},e.prototype.removeEventListener?e.prototype.removeEventListener=n:e.prototype.detachEvent?e.prototype.detachEvent=wrappedListener:void 0}(o)}(n));return a}.call(this)},e.prototype.handleResize=function(e){var t,n,o,i,r,a;return n=e.that,this.timerElements[n.tagName.toLowerCase()]?this.initTimer(n):(o=document.createElement("iframe"),n.appendChild(o),o.style.width="100%",o.style.height="100%",o.style.position="absolute",o.style.zIndex=-999,o.style.opacity=0,o.style.top=0,o.style.left=0,t=window.getComputedStyle?getComputedStyle(n):n.currentStyle,r="static"===t.position&&""===n.style.position,i=""===t.position&&""===n.style.position,(r||i)&&(n.style.position="relative"),null!=(a=o.contentWindow)&&(a.onresize=function(e){return function(){return e.dispatchEvent(n)}}(this)),n.iframe=o),n.isAnyResizeEventInited=!0},e.prototype.initTimer=function(e){var t,n;return n=0,t=0,this.interval=setInterval(function(o){return function(){var i,r;return r=e.offsetWidth,i=e.offsetHeight,r!==n||i!==t?(o.dispatchEvent(e),n=r,t=i):void 0}}(this),this.o.interval||62.5)},e.prototype.dispatchEvent=function(e){var t;return document.createEvent?(t=document.createEvent("HTMLEvents"),t.initEvent("onresize",!1,!1),e.dispatchEvent(t)):document.createEventObject?(t=document.createEventObject(),e.fireEvent("onresize",t)):!1},e.prototype.destroy=function(){var e,t,n,o,i,r,a;for(clearInterval(this.interval),this.interval=null,window.isAnyResizeEventInited=!1,t=this,r=this.allowedProtos,a=[],e=o=0,i=r.length;i>o;e=++o)n=r[e],null!=n.prototype&&a.push(function(e){var t;return t=e.prototype.addEventListener||e.prototype.attachEvent,e.prototype.addEventListener?e.prototype.addEventListener=Element.prototype.addEventListener:e.prototype.attachEvent&&(e.prototype.attachEvent=Element.prototype.attachEvent),e.prototype.removeEventListener?e.prototype.removeEventListener=Element.prototype.removeEventListener:e.prototype.detachEvent?e.prototype.detachEvent=Element.prototype.detachEvent:void 0}(n));return a},e}(),"function"==typeof define&&define.amd?define("any-resize-event",[],function(){return new e}):"object"==typeof module&&"object"==typeof module.exports?module.exports=new e:("undefined"!=typeof window&&null!==window&&(window.AnyResizeEvent=e),"undefined"!=typeof window&&null!==window&&(window.anyResizeEvent=new e))}).call(this);

// Set jQuery to NoConflict Mode
jQuery.noConflict();

;(function( $, window, document, undefined ){
	"use strict";

	/* =============================================================================

	On Ready

	============================================================================= */

	$( document ).ready( function () {
		// ### CUSTOM JS HERE ###

		FastClick.attach(document.body);

		(function (undefined) {
			var check = false;
			(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
			if (check) { $(document.body).addClass('mobile-device'); };
		})();

		/*

  	(function (undefined) {
  		var $doc = $(document);

  		// wrap :: [string] -> [string]
  		var wrapInBrackets = function (str) {
  			return '[' + str + ']';
  		}

  		var trigger = function (i, el) {
  			var $el  = $(el);
  			$doc.trigger('bp-page-view', [ $el ]);

  			if ( $.fn.hcSticky ) {
  				var offset = 15;

  				if ( $( '#wpadminbar' ) ) {
  					offset += $( '#wpadminbar' ).height();
  				}

  				if ( $( 'body.vw-site-enable-sticky-menu' ) ) {
  					offset += $( '.vw-menu-main-inner' ).height();
  				}

  				var vw_sticky_sidebar = $el.parents('.vw-page-wrapper').find('.vw-page-sidebar');

  				if ( vw_sticky_sidebar  && ($('.vw-main-post').length  || $(window).width() > 1000  ) ) {
  					vw_sticky_sidebar.hcSticky( {
  						stickTo: '.container',
  						wrapperClassName: 'vw-sticky-sidebar-wrapper',
  						offResolutions: [-768],
  						top: offset,
  					} );

  					$( document ).bind( 'vw_content_height_changed', function() {
  						vw_sticky_sidebar.hcSticky( 'reinit' );
  					} );
  				}
  			}

  		}

  		$doc.ajaxComplete(function (event, xhr, settings) {
  			if (!xhr.responseText) {return};
  			var match = xhr.responseText.match(/data\-ajax\-id\=\".+\"/gim);
  			if (!match.length) {return};
  			var wrappedMatch = match.map(wrapInBrackets);
  			var selector = wrappedMatch.join(' , ');
  			$(selector).each(trigger);
  		});

  	})();

  	*/

		// Sticky Type Resizer
		var TypeResizer = {
			init: function (o) {
				this.vars(o); this.events();
			},
			vars: function (o) {
				this.$stickyContents 	= o.$stickyContents;
				this.$post 						= o.$post;
				this.$me 							= this.$stickyContents.find('#js-sticky-contents-resize-tool');
				this.$plusBtn  				= this.$me.find('#js-sticky-contents-resize-tool-plus');
				this.$minusBtn 				= this.$me.find('#js-sticky-contents-resize-tool-minus');
				this.$normal 					= this.$me.find('#js-sticky-contents-resize-tool-normal');
				this.fontAddition = 0;
				this.fontSize 		= 18;
			},
			events: function () {
				this.$plusBtn.on('click', 	this.increaseFont.bind(this));
				this.$minusBtn.on('click', 	this.decreaseFont.bind(this));
				this.$normal.on('click', 		this.resetFontSize.bind(this));
			},
			increaseFont: function () {
				this.fontAddition = this.clamp(++this.fontAddition);
				this.setCurrentFontSize();
			},
			decreaseFont: function () {
				this.fontAddition = this.clamp(--this.fontAddition);
				this.setCurrentFontSize();
			},
			setCurrentFontSize: function () {
				this.$post.css({ 'font-size':  (this.fontSize + this.fontAddition) + 'px' })
			},
			resetFontSize: function () { this.fontAddition = 0; this.setCurrentFontSize(); },
			clamp: function (value) { return Math.max(Math.min(value, 10), -10); }
		};

		// var $frame = $('#js-print-iframe');
		// $frame.attr('src', '/print-page/');
		// var iFrameLoaded = false;

		// if (!window.CommentaryMagazine.isIframeLoaded) {
		// 	$frame[0].onload = function () {
		// 		window.CommentaryMagazine.isIframeLoaded = true;
		// 		console.log('loaded');
		// 		$(document).trigger('vw-iframe-loaded');
		// 	};
		// }
		// console.log('start listen');

		// Sticky Header
		(function (undefined) {

			var Main = function ($post) {
				if (this.vars($post) === false) {return};
				this.$stickyContentsItems.length && this.addContents();
				this.loop(); this.defineQueries();
				var typeResize = Object.create(TypeResizer);
				typeResize.init({ $post: $post, $stickyContents: this.$stickyContents });
			}

			Main.prototype.vars = function ($post) {
					this.$post  				 = $post;
					if (!this.$post[0]) {return false};
					this.$stickyContents = this.$post.find('#js-sticky-contents');
					this.$stickyContentsItems = this.$post.find('#js-sticky-contents-with-items');
					this.$items 				 = this.$post.find('.intense.heading');

					this.$visibleMenu 	 = this.$stickyContents.find('.sticky-contents__items');
					this.$itemsContainer = this.$post.find('#js-sticky-content-items');
					this.items 					 = [];
					// this.isConentents 	 = false;
					this.$w  						 = $(window);
					this.containerWidth  = this.$post.outerWidth()
					this.$adminBar 			 = $('#wpadminbar');
					this.isAdminBar 		 = !!this.$adminBar.length;
					this.adminBarHeight  = this.$adminBar.outerHeight() || 0;
					this.wHeight 			 	 = this.$w.outerHeight();
					this.wWidth 				 = this.$w.outerWidth();
					this.loop 					 = this.loop.bind(this);
					this.$menu 					 = $('#vw-menu-main');
					this.menuHeight  		 = this.$menu.outerHeight();

					this.isMenuItems  = this.$items.length > 0;
					this.desktopQuery = (this.isMenuItems) ? 1500 : 1220;
					this.mobileQuery  = (this.isMenuItems) ? 1219 : this.desktopQuery;

					this.isTabletQuery = !!this.isMenuItems;
					this.isTabletQuery || this.$stickyContents.addClass('is-no-contents');

					this.$printBtn = this.$post.find('#js-sticky-contents-print');
					// console.log(this.$printBtn.length);

					setTimeout((function () {
						this.getActiveArea();
					}.bind(this)), 200);

					var timeout = null;
					this.$w.on('resize', function () {
						this.wHeight = this.$w.outerHeight();
						this.wWidth  = this.$w.outerWidth();
						this.getActiveArea();
						this.containerWidth = this.$post.outerWidth()

						clearTimeout(timeout);
						timeout = setTimeout((function () {
							this.getYs(); this.getMenuWidth();
						}).bind(this), 100);
					}.bind(this));

					this.bindPrint();

				}
			Main.prototype.print = function (e) {
				var $credits = this.$post.parent().children('.vw-about-author, .vw-related-posts');
				var frame = window.frames['print_frame'];
				frame.document.querySelector('.vw-page-content').innerHTML = this.$post.html() + $('<div />').append($credits).html();
				frame.window.history && frame.window.history.replaceState({}, '', document.location.href);
				frame.document.title = document.title;
				frame.window.focus();
				this.$printBtn.removeClass('is-loading');
				frame.window.print();
			}

			Main.prototype.tryToPrint = function () {
				this.$printBtn.addClass('is-loading');
				// this.print();
				if (window.CommentaryMagazine.isIframeLoaded) { this.print(); }
				else { $(document).on('vw-iframe-loaded', function () { this.print(); }.bind(this));
				}
			}

			Main.prototype.bindPrint = function () {
				this.$post.on('click', '#js-sticky-contents-print', this.tryToPrint.bind(this));
				// this.$printBtn.on('click', this.tryToPrint.bind(this));
			}
			Main.prototype.getActiveArea = function () {
					this.postActiveAreaTop = this.$post.offset().top - 120;
					this.postActiveArea = this.postActiveAreaTop + this.$post.outerHeight() - this.wHeight + 180;
				}
			Main.prototype.initSticky = function () {
					this.isStickyInited && this.destroySticky();
					if (this.isMenuItems) {
						this.$items 				 = this.$post.find('.intense.heading');
						this.isMenuItems  = this.$items.length > 0;
					}
					// this.isStickyInited && !this.isMenuItems && this.$stickyContents.css({ left: '0' });
					var offsetTop = ((this.$w.outerWidth() < 768) ? 15 : (this.menuHeight+15));
					offsetTop += (this.isAdminBar) ? this.adminBarHeight : 0;
					var it = this;
					setTimeout(function () {
						var offset = (this.isMenuItems && this.wWidth < this.desktopQuery) ? offsetTop + 50 : 0;

						this.$stickyContents.css({
							top: 'auto', bottom: 'auto',
							position: 'absolute'
						});
						this.$stickyContents.hcSticky({
								top: 			  offsetTop,
								bottomEnd: 	offset + (.5*$(window).height()),
								skipMarginsRecalc: true
								// bottomEnd: 	0
							});
						this.$stickyWrapper = this.$stickyContents.parent();
						this.isStickyInited = true;
						this.stickyContentsHeight = this.$stickyContents.outerHeight();
						this.getMenuWidth();
					}.bind(this), 500);
				},
			Main.prototype.destroySticky = function () {
					this.$stickyContents.hcSticky('destroy');
					this.$stickyContents.attr('style', '');
				}
			Main.prototype.getMenuWidth = function () {
					this.visibleMenuWidth = this.$visibleMenu.outerWidth();
					this.innerMenuWidth   = this.$itemsContainer.outerWidth();
				}
			Main.prototype.addContents = function () {
					this.isConentents = true;
					this.$items.length && this.$stickyContents.addClass('is-sticky-contents');
					this.$items.each(function (i, item) {
						var $item = $(item), $div = $('<div class="sticky-contents__item"/>');
						$div.text($item.text()); this.$itemsContainer.append($div);
						this.addDimention($item, $div);
					}.bind(this));
					
					this.$menuItems = this.$itemsContainer.find('.sticky-contents__item');
					this.getMenuItemsPositions();

					var it = this;
					this.$stickyContents.on('click', '.sticky-contents__item', function () {
						var offset = -400;
						offset += (it.isAdminBar) ? it.adminBarHeight : 0;
						offset += ((it.$w.outerWidth() > this.desktopQuery) ? 0 : it.stickyContentsHeight);
						$('html, body').animate({'scrollTop': $(this).data().y - offset});
					});
				},
			Main.prototype.getMenuItemsPositions = function () {
					// this.menuItemsPositions = [];
					setTimeout((function () {
						this.$menuItems.each(function (i, item) {
							var $item = $(item);
							var data = {
								left: $item.offset().left, width: $item.outerWidth(), i: i
							};
							$item.data('position', data);
						}).bind(this);
					}).bind(this), 500);
				}
			Main.prototype.getYs = function () {
					this.stickyContentsHeight = this.$stickyContents.outerHeight();
					for (var i = 0; i < this.items.length; i++) {
						this.items[i].y = this.items[i].el.offset().top;
						this.items[i].$item.data({ el: this.items[i].$item, y: this.items[i].y });
					};
				}
			Main.prototype.addDimention = function ($el, $div) {
					var y = $el.offset().top;
					if (this.wWidth >= this.desktopQuery) {
						y += .7*this.$w.height();
					}

					this.items.push({
						el: 	$el,
						$item: $div,	
						y: 		y
					});
					$div.data({ el: $div, y: y });
				},
			Main.prototype.checkItems = function () {
					var scrollY = window.pageYOffset || document.scrollTop || document.body.scrollTop;

					if (this.state === 'mobile') {
						var isShow = !(scrollY < this.postActiveAreaTop || scrollY > this.postActiveArea);
						(this.isMobileShow !== isShow) && this.$stickyContents.toggleClass('is-show', isShow);
						this.isMobileShow = isShow;
						return;
					}

					for (var i = 0; i < this.items.length; i++) {
						if (scrollY + this.stickyContentsHeight + 50 > this.items[i].y) {
							this.currentActiveItem = this.items[i];
						}
					};
					if (this.currentActiveItem && this.currentActiveItem !== this.previousActiveItem) {
						if (this.previousActiveItem && this.previousActiveItem !== this.currentActiveItem) {
							this.previousActiveItem.$item.removeClass('is-active');
						}

						var pos = this.currentActiveItem.$item.data('position');
						var rightPoint  = pos.left + pos.width;
						var centerPoint = pos.left + (pos.width/2);
						var menuCenter  = this.visibleMenuWidth/2;
						var dX = 0;

						if (rightPoint > menuCenter) {
							dX = (menuCenter - centerPoint) + 30;
						}

						// var shift = (this.state === 'desktop') ? 0 : 15
						// dX = Math.max(dX, this.visibleMenuWidth-this.innerMenuWidth-shift);
						// this.$itemsContainer.css({ 'transform': 'translateX(' + dX + 'px) translateZ(0)' });
						
						this.currentActiveItem.$item.addClass('is-active');
						this.previousActiveItem = this.currentActiveItem;
					}
				},
			Main.prototype.defineQueries = function () {
					var it = this;

					enquire.register("print", {
					    match : function() {
					    	it.isPrintOpen = true;
					    },
					    unmatch : function() {
					    	it.isPrintOpen = false;
					    },
					});

					enquire.register("screen and (min-width:" + this.desktopQuery + "px)", {
					    match : function() {
					    	it.state = 'desktop';
					    	it.$stickyContents.removeClass('is-mobile-layout');
				    		it.$stickyContents.removeClass('is-tablet-layout');

								it.isMenuItems && it.$stickyContents.addClass('is-sticky-contents');
								it.$stickyContents.css({ width: '170px' });
								it.initSticky();
					    },
					    unmatch : function() {
					    	// it.$stickyContents.removeClass('is-tablet-layout');
					    },
					});

					if (this.isTabletQuery) {
						enquire.register("screen and (min-width:" + this.mobileQuery + "px) and (max-width:" + this.desktopQuery + "px)", {
						    match : function() {
						    	it.state = 'tablet';
						    	it.$stickyContents.addClass('is-no-contents');
						    	it.$stickyContents.removeClass('is-sticky-contents');
						    	it.$stickyContents.css({ width: it.containerWidth + 'px' });
						    	it.initSticky();
						    },
						    unmatch : function() {
						    	!it.isPrintOpen && it.$stickyContents.removeClass('is-no-contents');
						    },
						});
						// enquire.register("screen and (min-width:" + this.mobileQuery + "px) and (max-width:1000px)", {
						//   match : function() { it.initSticky(); }
						// });
						// enquire.register("screen and (min-width:1000px) and (max-width:" + this.desktopQuery + "px)", {
						//   match : function() { it.initSticky(); }
						// });
					}

					enquire.register("screen and (max-width:" + this.mobileQuery + "px)", {
					    match : function() {
					    	it.isStickyInited && it.destroySticky();
					    	it.state = 'mobile';
					    	it.$stickyContents.removeClass('is-sticky-contents');
					    	it.$stickyContents.addClass('is-mobile-layout');
					    	setTimeout(function() {
					    		it.$stickyContents.css({ display: 'block' });
					    	}, 300);
					    	// it.headroom = new Headroom(it.$stickyContents[0]).init();
					    	// it.$stickyContents.css({ width: '100%' });
					    	// it.$stickyContents.css({ top: 'auto' });
					    },
					    unmatch : function() {
					    	it.$stickyContents.removeClass('is-mobile-layout');
					    	it.$stickyContents.removeClass('headroom');
					    	it.$stickyContents.removeClass('headroom--pinned');
					    	it.$stickyContents.removeClass('headroom--unpinned');
					    },
					});

				}

			Main.prototype.loop = function () {
					// return;
					this.checkItems(); requestAnimationFrame(this.loop);
				}

			window.CommentaryMagazine = (window.CommentaryMagazine == null) ? {} : window.CommentaryMagazine;

			window.CommentaryMagazine.StickyContents = Main;
		
			setTimeout(function () {
				var $posts = $('.vw-main-post');
				$posts.each(function (i, post) { new Main($(post)); });
			}, 1000);

		})();

		window.CommentaryMagazine = (window.CommentaryMagazine == null) ? {} : window.CommentaryMagazine;

		// window.CommentaryMagazine.print = function (e) {
		// 	// console.log(this, e.target);
		// 	window.print && window.print();
		// 	e && e.preventDefault();
		// }
		
		// ### END of CUSTOM JS ###

		// -----------------------------------------------------------------------------
		// Scroll to top
		// 
		$('.vw-scroll-to-top')
			.vwScroller( { visibleClass: 'vw-scroll-to-top-visible' } )
			.click( function() {
				$( 'html, body' ).animate( { scrollTop: 0 }, "fast" );
			} );
		// -----------------------------------------------------------------------------
		// Scroll to top
		// 
		var $comments 				= $('#comments'),
				$title 						= $('#js-comments-title'),
				$commentList  		= $('#js-comment-list'),
				$commentListInner = $commentList.find('#js-comment-list-inner'),
				$htmlBody 				= $('html, body'),
				height 						= $commentListInner.outerHeight(),
				isOpen 						= false;

		var updateHeight = function UpdateHeightFunction () {
			$commentList.css({ height: ((isOpen) ? height+15 : 0) + 'px' });
		};
				
		setTimeout(function () {
			$commentListInner.on('onresize', function () {
				height = $commentListInner.outerHeight(); updateHeight();
			});
		}, 100);

		$title
			.on('tap', function() {
				$comments.toggleClass('is-comments-open'); isOpen = !isOpen; updateHeight();
				$htmlBody.animate({ 'scrollTop':  $commentList.offset().top + 'px' });
			} );

		// -----------------------------------------------------------------------------
		// More articles
		// 
		var $more_articles = $('.vw-more-articles');

		setTimeout(function () {
			$more_articles.vwScroller( { visibleClass: 'vw-more-articles-visible', selector: '#comments' } )
		}, 2000);
		$more_articles.find( '.vw-close-button' ).click( function() {
			$more_articles.hide();
		} );

		// -----------------------------------------------------------------------------
		// Mobile menu
		// 
		if ( $.fn.mmenu ) {
			$(".vw-menu-mobile-wrapper").mmenu({
				classes: "mm-slide",
				offCanvas: false
				// clone:true,
				// searchfield: true
			});

			// $(".vw-mobile-nav-button").click(function() {
			// 	$(".vw-menu-mobile-wrapper").trigger("open.mm");
			// });
		}

		// nav: vw-menu-mobile-wrapper mm-menu mm-horizontal mm-slide mm-offcanvas mm-center mm-current mm-right mm-opened
		// li: nav-menu-item-426 main-menu-item  menu-item-even menu-item-depth-0 menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children
		// ul: vw-menu-location-mobile mm-list mm-panel mm-opened mm-current


		$('.vw-mobile-nav-button-wrapper').on('click', function (e) {
			// console.log('open 1');
			$('.vw-menu-mobile-wrapper').toggleClass('is-open');
			e.stopPropagation();
		});

		$(document.body).on('click', '#js-mobile-menu-close-btn', function () {
			$('.vw-menu-mobile-wrapper').removeClass('is-open');
		})

		// $('#js-mobile-menu-close-btn').on('click', function (e) {
		// 	$('.vw-menu-mobile-wrapper').removeClass('is-open');
		// 	e.stopPropagation();
		// });

		// $(document.body).on('click', function () {
		// 	$('.vw-menu-mobile-wrapper').removeClass('is-open');
		// });

		// $('#js-mobile-menu').on('click', function (e) {
		// 	e.stopPropagation();
		// });

		// -----------------------------------------------------------------------------
		// Fit video in the content area
		// 
		if ( $.fn.fitVids ) {
			$( '.vw-featured-image-wrapper, .flxmap-container, .comment-body, .vw-post-content, .vw-main-post, #footer' ).fitVids( { customSelector: "iframe[src*='maps.google.'],iframe[src*='soundcloud.com']" } );
		}

		// -----------------------------------------------------------------------------
		// Masonry layout
		// 
		$( '.vw-blog-enable-masonry-layout .vw-isotope' ).vwIsotope();

		// -----------------------------------------------------------------------------
		// Share box & Image light box
		// 
		if ( $.fn.magnificPopup ) {
			$( '.vw-post-meta-icon.vw-post-share-count' ).magnificPopup({
				type: 'inline',

				fixedContentPos: false,
				fixedBgPos: true,

				overflowY: 'auto',

				closeBtnInside: true,
				preloader: false,
				
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			}).click( function( e ) {
				e.preventDefault();
			} );


			// Add light box to featured image & all image links in post content
			$( '.vw-main-post .vw-post-content a[href*=".png"]'
				+ ', .vw-main-post .vw-post-content a[href*=".jpg"]'
				+ ', .vw-main-post .vw-post-content a[href*=".jpeg"]'
				+ ', .vw-custom-tiled-gallery a'
				+ ', .vw-embeded-gallery a'
				+ ', .vw-main-post .vw-featured-image a'
			).magnificPopup({
				type: 'image',
				closeOnContentClick: true,
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [0,1] // Will preload 0efore current, and 1 after the current image
				},
				image: {
					verticalFit: true,
					titleSrc: function( item ) {
						var title = item.el.attr('title');
						if ( ! title ) {
							title = $( 'img', item.el ).attr('alt');
						}

						return title;
					}
				}
			});

			// Add lightbox to video post
			/*$( '.vw-enable-video-lightbox .vw-post-box.vw-post-format-video a.vw-post-box-thumbnail' ).magnificPopup({
				disableOn: 700,
				type: 'iframe',
				mainClass: 'mfp-fade',
				removalDelay: 160,
				preloader: false,

				fixedContentPos: false
			});*/
		}

		// -----------------------------------------------------------------------------
		// Menu
		// 
		$('.vw-menu-location-top').superfish({
			delay:       800,                            // one second delay on mouseout
			animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
			speed:       'fast',                          // faster animation speed
			autoArrows:  false                            // disable generation of arrow mark-up
		});

		$('.vw-menu-location-main').superfish({
			popUpSelector: '.sub-menu-wrapper',
			delay:       800,                            // one second delay on mouseout
			animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
			speed:       'fast',                          // faster animation speed
			autoArrows:  false                            // disable generation of arrow mark-up
		});

		// -----------------------------------------------------------------------------
		// Instant search
		// 
		if ( $.fn.instant_search ) {
			$( '.vw-instant-search-button' ).instant_search();
		}

		// -----------------------------------------------------------------------------
		// Slider
		// 
		if ( $.fn.vwSwiper ) {
			$( '.vw-single-slider .swiper-container, .vw-post-loop-slider-large .swiper-container' ).vwSwiper();
			$( '.vw-post-loop-slider-large-carousel .swiper-container, .vw-post-loop-slider-carousel .swiper-container' ).vwSwiper( {
				slidesPerView: 'auto',
			} );
		}

		// -----------------------------------------------------------------------------
		// Ajax pagination
		//
		if ( $.fn.vwPaginationAjax ) {
			$( '.vwspc-section' ).vwPaginationAjax();
		}

		// -----------------------------------------------------------------------------
		// Tabular widget
		//
		$('.vw-fixed-tab').vwFixedTab();

		// -----------------------------------------------------------------------------
		// Custom tiled gallery
		//
		$( '.vw-custom-tiled-gallery' ).each( function ( i, el ) {
			var $gallery =  $( el );
			var layout = $gallery.attr( 'data-gallery-layout' );
			if ( ! ( parseInt( layout, 10 ) > 0 ) ) {
				layout = '213'; // Default layout
			}

			layout = layout.split('');
			var columnLayout = [];
			for (var i in layout ) {
				var columnCount = parseInt( layout[i], 10 );
				var columnWidth = 100.0 / columnCount;
				for ( var j = 1; j <= columnCount; j++ ) {
					columnLayout.push( columnWidth );
				}
			}

			$gallery.find( '> figure' ).each( function( i, el ) {
				var $el = $( el );
				var layoutIndex = i % columnLayout.length;
				$el.css( 'width', columnLayout[ layoutIndex ] - 1 + '%' );
			} );
		} );

		// -----------------------------------------------------------------------------
		// Full page link section
		//
		$( '.vwspc-section-full-page-link' ).click( function() {
			window.location = $( this ).find( 'a' ).eq(0).attr( 'href' );
		} );

		if ( $.fn.backstretch ) {
			$( '.vwspc-section-full-page-link' ).each( function () {
				var $this = $( this );
				var background_url = $this.find( 'img.vw-full-page-link-background' ).attr( 'src' );
					
				if ( background_url ) {
					$this.backstretch( background_url, {
						fade: vw_main_js.VW_CONST_BACKSTRETCH_OPT_FADE,
						centeredY: vw_main_js.VW_CONST_BACKSTRETCH_OPT_CENTEREDY,
						centeredX: vw_main_js.VW_CONST_BACKSTRETCH_OPT_CENTEREDX,
						duration: vw_main_js.VW_CONST_BACKSTRETCH_OPT_DURATION,
					} );
				}
			} );
		}

		// -----------------------------------------------------------------------------
		// Tipsy
		// 
		if ( $.fn.tipsy ) {
			$('.widget_vw_widget_author_list a, .vw-author-socials a, .vw-category-link, .vw-author-avatar, .author-name, .vw-post-date, .vw-post-shares-social, .bbp-author-avatar, .vw-post-comment-count, .vw-post-likes-count, .vw-post-view-count, .vw-post-share-count').tipsy( {
				fade: true,
				gravity: 's',
			} );
		}

		if ( $.fn.tipsy ) {
			$('.vw-intense-tooltip').tipsy( {
				fade: true,
				html: true,
				gravity: function () {
					return this.getAttribute('data-placement');
				},
			} );
		}

		// -----------------------------------------------------------------------------
		// Sticky Sidebar
		//
		if ( $.fn.hcSticky ) {
			var offset = 15;

			if ( $( '#wpadminbar' ) ) {
				offset += $( '#wpadminbar' ).height();
			}

			if ( $( 'body.vw-site-enable-sticky-menu' ) ) {
				offset += $( '.vw-menu-main-inner' ).height();
			}

			var vw_sticky_sidebar = $(".vwspc-section-sidebar .vw-sticky-sidebar, .vw-page-wrapper .vw-sticky-sidebar");

			if ( vw_sticky_sidebar && !($('.wv-home-page').length)/* && ($('.vw-main-post').length  || $(window).width() > 1000  ) */) {
				vw_sticky_sidebar.hcSticky( {
					stickTo: '.container',
					wrapperClassName: 'vw-sticky-sidebar-wrapper',
					offResolutions: [-768],
					top: offset,
				} );

				$( document ).bind( 'vw_content_height_changed', function() {
					vw_sticky_sidebar.hcSticky( 'reinit' );
				} );
			}
		}

		// -----------------------------------------------------------------------------
		// Star Rating
		// 
		if ( $.fn.raty ) {
			var $user_rating = $( '.vw-review-user-rating' );
			$user_rating.raty( {
				path: vw_main_js.theme_path+'/js/raty/images',
				readOnly: false,
				half: true,
				space: false,
				size: 16,
				width: 110,
				score: function() {
					return $( this ).attr( 'data-score' );
				},
				click: function( score, evt ) {
					jQuery.ajax( {
						type: "GET",
						url: vw_main_js.ajaxurl,
						data: {
							post_id: $( this ).attr( 'data-post-id' ),
							rating: score,
							action: 'user_rating',
						},
						cache: false,
						success: function( data, textStatus, jqXHR ) {
							$( $user_rating ).raty( 'readOnly', true );
							if ( jqXHR.responseText ) {
								console.log(jqXHR.responseText);
								$( '.vw-review-user-rating-title' ).html( jqXHR.responseText );
							}
						}
					} );
				},
			} );
		}

		// ImgLiquid
		// if ( $.fn.imgLiquid ) {
			// $( '.vw-post-loop-slider-large .vw-post-style-slide' ).imgLiquid();
		// }

	} );

	$( window ).load( function() {
		// -----------------------------------------------------------------------------
		// Sticky bar
		// 
		$( '.vw-site-enable-sticky-menu .vw-menu-main-wrapper' ).vwSticky();
	} )




	/* =============================================================================

	Custom Extensions

	============================================================================= */

	$.fn.vwScroller = function( options ) {
		var default_options = {
			delay: 					500, /* Milliseconds */
			position: 			0.7, /* Multiplier for document height */
			visibleClass: 	'',
			invisibleClass: '',
			selector: 			null
		}
		options = $.extend( default_options, options );

		var $sel = null;
		if (options.selector != null) {
			$sel = $(options.selector);
		}
		if (options.selector && !$sel[0]) {options.selector = null}

		var getShowPosition = function getShowPosition () {
			var position = null, wHeight = $window.height();
			return (options.selector != null) ? (
				$(options.selector).offset().top - wHeight
			) : (
				( $document.height() - wHeight ) * options.position
			);
		}

		var isVisible = false,
				$document = $(document),
				$window = $(window),
				showPosition = getShowPosition();

		$window.on('resize', function () { showPosition = getShowPosition(); });

		// setTimeout(function () {
		$(document.body).on('onresize', function () {
			showPosition = getShowPosition();
		});
		// }, 2000);

		var observer = $.proxy( function () {

			var isInViewPort = $document.scrollTop() > showPosition;
	
			// options.selector && console.log($document.scrollTop(), showPosition);

			if ( !isVisible && isInViewPort ) {
				onVisible();
			} else if ( isVisible && ! isInViewPort ) {
				onInvisible();
			}
		}, this );

		var onVisible = $.proxy( function () {
			isVisible = true;

			/* Add visible class */
			if ( options.visibleClass ) {
				this.addClass( options.visibleClass );
			}

			/* Remove invisible class */
			if ( options.invisibleClass ) {
				this.removeClass( options.invisibleClass );
			}

		}, this );

		var onInvisible = $.proxy( function () {
			isVisible = false;

			/* Remove visible class */
			if ( options.visibleClass ) {
				this.removeClass( options.visibleClass );
			}
			
			/* Add invisible class */
			if ( options.invisibleClass ) {
				this.addClass( options.invisibleClass );
			}
		}, this );

		/* Start observe*/
		setInterval( observer, options.delay );

		return this;
	}

	/* -----------------------------------------------------------------------------
	 * Fixed Tabular
	 * -------------------------------------------------------------------------- */
	$.fn.vwFixedTab = function() {
		this.each( function( i, el ) {
			var $this = $( el );
			var $tabs = $this.find( '.vw-fixed-tab-title' );
			var $contents = $this.find( '.vw-fixed-tab-content' );

			$tabs.each( function( i, el ) {
				$( el ).click( function( e ) {
					e.preventDefault();

					// Manage tabs
					$this.find( '.vw-fixed-tab-title.is-active' ).removeClass( 'is-active' );
					$( this ).addClass( 'is-active' );

					// Manage contents
					$this.find( '.vw-fixed-tab-content.is-active' ).hide();
					$contents.eq( i ).show().addClass('is-active');

					$( document ).trigger( 'vw_content_height_changed' );
				} )
			} );

		} );
	}

	/* -----------------------------------------------------------------------------
	 * Ajax Pagination
	 * -------------------------------------------------------------------------- */
	$.fn.vwPaginationAjax = function() {
		function progressiveAnimate(items, reverse) {
			var i = 0;

			if (reverse) {
				items = $(items.get().reverse());
			}

			items.each(function(){
				var $this = $(this);

				if (reverse) {
					$this.stop().delay( i + '').fadeTo(150, 0);
				} else {
					$this.stop().delay( i + '').fadeTo(150, 1);
				}

				i = i + 100;
			});
		}

		$( this ).on( 'click', '.vw-page-navigation-pagination a', function( e ) {
			var $this = $( this );

			if ( $this.hasClass( 'vw-no-pagination-ajax' ) ) {
				return;
			}
			e.preventDefault(); // prevent default linking
			var link = $this.attr( 'href' );
			var $viewport = $('html, body');
			var $container = $this.closest( '.vwspc-section, .vw-post-shortcode' );
			var container_id = $container.attr( 'id' );

			if( ! container_id ) {
				console.log( 'AJAX Pagination Error: No container' );
			}

			if ( $container.hasClass( 'vwspc-section' ) ) {
				var placeholder = '#'+container_id+' .vwspc-section-content';
				var $post_container = $container.find( '.vwspc-section-content .vw-post-loop' );
				var $controls = $container.find( '.vwspc-section-content .vw-post-loop > *, .vwspc-section-content .vw-page-navigation' );

			} else { // hasClass( 'vw-post-shortcode' )
				var placeholder = '#'+container_id;
				var $post_container = $container.find( '.vw-post-loop' );
				var $controls = $container.find( '.vw-post-loop > *, .vw-page-navigation' );

			}

			$viewport
				.animate( { scrollTop: $container.offset().top - 60 }, 1700, "easeOutQuint")
				.bind("scroll mousedown DOMMouseScroll mousewheel keyup", function (e) {
					if (e.which > 0 || e.type === "mousedown" || e.type === "mousewheel") {
						$viewport.stop().unbind('scroll mousedown DOMMouseScroll mousewheel keyup');
					}
				});

			$controls.fadeTo( 500, 0, function() {
				$( this ).css('visibility', 'hidden');
			} );
			$post_container.addClass( 'vw-preloader-bg' );

			$( placeholder ).load( link + ' ' + placeholder + '>*', function( response, status, xhr ) {
				if( status == 'success' ) {
					$( '.vw-isotope' ).vwIsotope();
					$container.removeClass( 'vw-preloader-bg' );
				}

				if( status == 'error' ) {
					console.log( 'AJAX Pagination Error: '+xhr.status+': '+xhr.statusText );
				}
			} );
		} );
	}

	/* -----------------------------------------------------------------------------
	 * Swiper Slider
	 * -------------------------------------------------------------------------- */
	$.fn.vwSwiper = function( options ) {

		if ( $.fn.swiper ) {
			var default_options = {
				direction: 'horizontal',
				simulateTouch: false,
				loop: true,
				slidesPerView: 1,
				autoplay: parseInt( vw_main_js.slider_slide_duration ),
				autoplayDisableOnInteraction: false,
				speed: parseInt( vw_main_js.slider_transition_speed ),
			}

			this.each( function () {
				var $this = $( this );
				
				if ( $this.hasClass( 'vw-swiper-large-nav' ) ) {
					$this.append( '<div class="container"><div class="col-sm-12"><span class="vw-swiper-arrow-nav"><span class="vw-swiper-arrow-left"></span><span class="vw-swiper-arrow-right"></span></span></div></div>' );
				} else {
					$this.append( '<span class="vw-swiper-arrow-nav"><span class="vw-swiper-arrow-left"></span><span class="vw-swiper-arrow-right"></span></span>' );
				}

				var args = $.extend(
					default_options
					, options
					, {
						nextButton: $this.find( '.vw-swiper-arrow-right' ),
						prevButton: $this.find( '.vw-swiper-arrow-left' ),
						onInit: function( swp ) {
							// Assign origin class
							var originClasses = [ 'vw-kenburn-origin-1', 'vw-kenburn-origin-2', 'vw-kenburn-origin-3' ];
							$.each( swp.slides, function( i, el ) {
								var $slide = $( el );
								var classIndex = $slide.data( 'swiper-slide-index' ) % originClasses.length;
								$slide.addClass( originClasses[ classIndex ] );
							} )
						},
						onSlideChangeStart: function( swp ) {
							var activeIndex = $( swp.slides[ swp.activeIndex ] ).data( 'swiper-slide-index' );
							swp.container.find('.swiper-slide[data-swiper-slide-index="'+activeIndex+'"]').removeClass( 'resetanim' ).addClass( 'vw-kenburn-active' );
							
						},
						onSlideChangeEnd: function( swp ) {
							var activeIndex = $( swp.slides[ swp.activeIndex ] ).data( 'swiper-slide-index' );
							swp.container.find('.swiper-slide-next, .swiper-slide-prev').addClass( 'resetanim' );
						},
					}
				);
				
				// Fix looped
				if ( args.loop && args.slidesPerView == 'auto' ) {
					args.loopedSlides = $this.find( '.swiper-slide' ).length;
				}

				var $mySwiper = $this.swiper( args );
			});
		}
	};

	/* -----------------------------------------------------------------------------
	 * Masonry Layout
	 * -------------------------------------------------------------------------- */
	$.fn.vwIsotope = function() {
		if ( $.fn.isotope ) {
			var $isotope_list = $( this );

			$( window ).resize( function() {
				$isotope_list.isotope( 'layout' );
			} );

			$isotope_list.each( function( i, el ) {
				var $this = $( el );
				$this.imagesLoaded( function () {
					setTimeout(function () {
						$this.isotope();
					}, 5000);

				} );
			} );
		}
	};

	/* -----------------------------------------------------------------------------
	 * Sticky Header
	 * -------------------------------------------------------------------------- */
	$.fn.vwSticky = function() {
		if ( $.fn.sticky ) {
			var $sticky_bar = $( this );
			var $sticky_wrapper = false;
			var offset = 0;

			if ( $( '#wpadminbar' ).length ) {
				offset = $( '#wpadminbar' ).height();
			}
			
			$sticky_bar.addClass( 'vw-sticky' ).sticky( {
				wrapperClassName: 'vw-sticky-wrapper',
				topSpacing: offset,
			} );

			$( window ).resize( function() {
				if ( ! $sticky_wrapper ) $sticky_wrapper = $( '.vw-sticky-wrapper' );
				$sticky_wrapper.css('height', $sticky_bar.outerHeight());
				$sticky_bar.sticky( 'update' );
			} );
		}
	}

})( jQuery, window , document );

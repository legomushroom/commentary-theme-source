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
		
		(function (undefined) {
			var main = {
				init: function () {
					this.vars();
					if (this.wWidth < 768) {
						new Headroom(this.$stickyContents[0]).init();
						return this.$stickyContents.addClass('is-mobile-layout');
					}
					// this.initSticky();
					this.$stickyContents.length && this.addContents();
					this.loop();
					this.defineQueries();
				},
				vars: function () {
					this.$post  				 = $('.vw-post-content');
					this.$stickyContents = this.$post.find('#js-sticky-contents');
					this.$itemsContainer = this.$post.find('#js-sticky-content-items');
					this.$items 				 = this.$post.find('.intense.heading');
					this.items 					 = [];
					this.isConentents 	 = false;
					this.$w  						 = $(window);
					this.containerWidth  = this.$post.outerWidth()
					this.$adminBar 			 = $('#wpadminbar');
					this.isAdminBar 		 = !!this.$adminBar.length;
					this.adminBarHeight  = this.$adminBar.outerHeight();
					this.wWidth 				 = this.$w.outerWidth();

					var timeout = null, it = this;
					this.$w.on('resize', function () {
						this.wWidth  = this.$w.outerWidth();
						clearTimeout(timeout);
						timeout = setTimeout(function () {
							it.getYs();
						}, 100);
					}.bind(this));
				},
				initSticky: function () {
					this.isStickyInited && this.destroySticky();
					var offsetTop = ((this.$w.outerWidth() < 1001) ? 15 : 68);
					offsetTop += (this.isAdminBar) ? this.adminBarHeight : 0;
					setTimeout(function () {
						this.$stickyContents.hcSticky({
								top: 			  offsetTop,
								bottomEnd: 	300
							});
						this.$stickyWrapper = this.$stickyContents.parent();
						this.isStickyInited = true;
						this.stickyContentsHeight = this.$stickyContents.outerHeight();
					}.bind(this), 200);
				},
				destroySticky: function () {
					this.$stickyContents.hcSticky('destroy');
					this.$stickyContents.attr('style', '');
				},
				addContents: function () {
					this.isConentents = true;
					this.$stickyContents.addClass('is-sticky-contents');
					this.$items.each(function (i, item) {
						var $item = $(item), $div = $('<div class="sticky-contents__item"/>');
						$div.text($item.text()); this.$itemsContainer.append($div);
						this.addDimention($item, $div);
					}.bind(this));

					var it = this;
					this.$stickyContents.on('click', '.sticky-contents__item', function () {
						var offset = 100;
						offset += (it.isAdminBar) ? it.adminBarHeight : 0;
						offset -= ((it.$w.outerWidth() < 1001) ? 0 : 0);
						offset += ((it.$w.outerWidth() > 1510) ? 0 : it.stickyContentsHeight);
						$('html, body').animate({'scrollTop': $(this).data().y - offset + 25});
					});
				},
				getYs: function () {
					this.stickyContentsHeight = this.$stickyContents.outerHeight();
					for (var i = 0; i < this.items.length; i++) {
						this.items[i].y = this.items[i].el.offset().top;
						this.items[i].$item.data({ el: this.items[i].$item, y: this.items[i].y });
					};
				},
				addDimention: function ($el, $div) {
					var y = $el.offset().top;
					this.items.push({
						el: 	$el,
						$item: $div,	
						y: 		y
					});
					$div.data({ el: $div, y: y });
				},
				checkItems: function () {
					var scrollY = window.pageYOffset || document.scrollTop || document.body.scrollTop;
					for (var i = 0; i < this.items.length; i++) {
						if (scrollY + this.stickyContentsHeight + 50 > this.items[i].y) {
							this.currentActiveItem = this.items[i];
						}
					};
					if (this.currentActiveItem) {
						if (this.previousActiveItem && this.previousActiveItem !== this.currentActiveItem) {
							this.previousActiveItem.$item.removeClass('is-active');
						}
						this.currentActiveItem.$item.addClass('is-active');
						this.previousActiveItem = this.currentActiveItem;
					}
				},
				defineQueries: function () {
					var it = this;
					enquire.register("screen and (min-width:1510px)", {
					    match : function() {
					    	it.$stickyContents.removeClass('is-tablet-layout');
					    	it.$stickyContents.removeClass('is-mobile-layout');
					    	it.$stickyContents.css({ width: '170px' });
					    	it.initSticky();
					    },
					    unmatch : function() {
					    	// it.$stickyContents.removeClass('is-tablet-layout');
					    },
					});

					enquire.register("screen and (min-width:768px) and (max-width:1510px)", {
					    match : function() {
					    	it.$stickyContents.addClass('is-tablet-layout');
					    	it.$stickyContents.css({ width: this.containerWidth+5 + 'px' });
					    	it.initSticky();
					    	// it.$stickyContents.hcSticky('reinit');
					    },
					    unmatch : function() {
					    	it.$stickyContents.removeClass('is-tablet-layout');
					    },
					});

					enquire.register("screen and (min-width:768px) and (max-width:1000px)", {
					  match : function() { it.initSticky(); }
					});

					enquire.register("screen and (min-width:1000px) and (max-width:1510px)", {
					    match : function() { it.initSticky(); }
					});

					enquire.register("screen and (max-width:768px)", {
					    match : function() {
					    	it.destroySticky();
					    	it.$stickyContents.addClass('is-mobile-layout');
					    	it.$stickyContents.removeClass('is-sticky-contents');
					    	it.$stickyContents.css({ width: '100%' });
					    },
					    unmatch : function() {
					    	it.$stickyContents.removeClass('is-mobile-layout');
					    	it.$stickyContents.removeClass('headroom');
					    	it.$stickyContents.removeClass('headroom--pinned');
					    	it.$stickyContents.removeClass('headroom--unpinned');
					    },
					});

				},

				loop: function () {
					this.checkItems(); requestAnimationFrame(this.loop.bind(this));
				}
			}
		main.init()
		})();
		
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
		$more_articles.vwScroller( { visibleClass: 'vw-more-articles-visible' } )
		$more_articles.find( '.vw-close-button' ).click( function() {
			$more_articles.hide();
		} );

		// -----------------------------------------------------------------------------
		// Mobile menu
		// 
		if ( $.fn.mmenu ) {
			$(".vw-menu-mobile-wrapper").mmenu({
				classes: "mm-slide",
				offCanvas: {
					position: "right",
					// zposition : "front",
				},
				// clone:true,
				// searchfield: true
			});

			$(".vw-mobile-nav-button").click(function() {
				$(".vw-menu-mobile-wrapper").trigger("open.mm");
			});
		}

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
			$( '.vw-instant-search-buton' ).instant_search();
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

			if ( vw_sticky_sidebar ) {
				vw_sticky_sidebar.hcSticky( {
					stickTo: '.container',
					wrapperClassName: 'vw-sticky-sidebar-wrapper',
					offResolutions: [-992],
					top: offset,
				} );

				$( document ).bind( 'vw_content_height_changed', function() {
					vw_sticky_sidebar.hcSticky( 'reinit' );
				} );

				// setTimeout(function () {
				// 	$( document ).trigger('vw_content_height_changed');
				// 	console.log('trgger');
				// }, 1500);

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
			delay: 500, /* Milliseconds */
			position: 0.7, /* Multiplier for document height */
			visibleClass: '',
			invisibleClass: '',
		}

		var isVisible = false;
		var $document = $(document);
		var $window = $(window);

		options = $.extend( default_options, options );

		var observer = $.proxy( function () {
			var isInViewPort = $document.scrollTop() > ( ( $document.height() - $window.height() ) * options.position );

			if ( ! isVisible && isInViewPort ) {
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
			e.preventDefault(); // prevent default linking
			var $this = $( this );
			var link = $this.attr( 'href' );
			var $viewport = $('html, body');
			var $container = $this.closest( '.vwspc-section, .vw-post-shortcode' );
			var container_id = $container.attr( 'id' );

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
					console.log( 'Error: '+xhr.status+': '+xhr.statusText );
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
					$this.isotope();
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
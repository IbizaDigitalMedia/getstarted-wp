/**
 * getboilerplate
 * Material Design style buttons
 */

const Buttons = (() => {
  'use strict';

  /**
   * Main options object.
   * Contains subobjects for all global options.
   * @type {Object}
   */
  let options = {
    buttonElem: '.button a',
    gelElem: '.gel'
  };

  /**
   * Initialise buttons.
   * @param  {Object} params Object to merge with internal options Object
   * @return {undefined}
   */
  function init(params) {
    options = $.extend({}, options, params);

    let parent;
    let gel;
    let diameter;
    let x;
    let y;

    $(options.buttonElem).click(function(event) {
      parent = $(this).parent();

      // Create gel element if it doesn't exist
      if (parent.find(options.gelElem).length === 0) {
        parent.prepend('<span class="' + options.gelElem.substring(1) + '"></span>');
      }

      gel = parent.find(options.gelElem);

      // Stop animation if double clicked
      gel.removeClass('animate');

      // Set size of gel
      if (!gel.height() && !gel.width()) {
        diameter = Math.max(parent.outerWidth(), parent.outerHeight());
        gel.css({
          height: diameter,
          width: diameter
        });
      }

      // Get click coordinates
      x = event.pageX - parent.offset().left - gel.width() / 2;
      y = event.pageY - parent.offset().top - gel.height() / 2;

      // Set gel position and animate
      gel.css({
        top: y + 'px',
        left: x + 'px'
      }).addClass('animate');
    });
  }

  return {
    init: init
  };
})();

export default Buttons;

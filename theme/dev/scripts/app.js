/**
 * getboilerplate
 * Main application entry point
 */

import Buttons from './components/buttons';

const App = (() => {
  'use strict';

  /**
   * Main options object.
   * Contains subobjects for all global options.
   * @type {Object}
   */
  let options = {};

  /**
   * Initialise application.
   * @param  {Object} params Object to merge with internal options Object
   * @return {undefined}
   */
  function init(params) {
    options = $.extend({}, options, params);

    Buttons.init();
  }

  return {
    init: init
  };
})();

/**
 * jQuery Document Ready
 */
$(function() {
  'use strict';

  // Initialise main application inside jQuery document.ready();
  App.init({});
});

export default App;

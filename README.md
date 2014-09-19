ecwid-seo
=========
ecwid__catalog.php: all ajax-content building functionality
ecwid__product__api.php: Ecwid product API wrapper
ecwid__platform.php: contains platform-specific functions. They are to be redefined in WordPress, Joomla etc., and for a standalone version these are used
ecwid__misc.php: other functions
run.php: the code that actually runs the processing. Since the original script produced its output into php variables, we also need that run code
build.php: compiles all files into one. php build.php > ecwid_ajax_indexing.php produces a compiled file with that name

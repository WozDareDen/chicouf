Photopile JS
============
**Photopile JS** is a JavaScript/jQuery image gallery that simulates a pile of photos scattered about on a surface. 
Thumbnail clicks remove photos from the pile, *(enlarging them as if being picked up by the user)*, and once in view a secondary click returns the photo to the pile. Thumbnails are draggable, enhancing the experience by allowing photos buried deep in the pile to be uncovered. 

**Demo:** [photopile-js.com/demo](http://photopile-js.com/demo)

Improvements
------------
Wish list for future improvements:

* Improved cross-browser support
* Improved performance when user quick-clicks multiple thumbnails before they are viewed

Use
---
Include in your project:

* jQuery
* jQuery UI
* jQuery UI Touch Punch
* photopile.css
* photopile.js
* loading.gif
* nav-sprites.png

Add gallery markup:

    <div class="photopile-wrapper">
      <ul class="photopile">
        <li>
          <a href="PATH/TO/YOUR/FULLSIZE/IMAGE">
            <img src="PATH/TO/YOUR/THUMBNAIL/IMAGE" alt="Image description" ... />
          </a>
        </li>
        <!-- Add as many list items as you require for your gallery :) -->
      </div>
    </div>

Reference [photopile-js.com](http://photopile-js.com) for more detail.

The MIT License (MIT)
---------------------

Copyright (c) 2014 Photopile JS

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

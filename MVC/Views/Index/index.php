
<div id="container">

    <div id="slideshow">
        <ul id="nav">
            <li id="prev"><a href="#">Previous</a></li>
            <li id="next"><a href="#">Next</a></li>
        </ul>

        <ul id="slides">
            <ul id="slides">

                <?php
                foreach($this->imageList as $key=> $image)
                {
                    echo  '<li><img src="'.URL.$image.'" data-caption="'.$key.'" /></li>';
                }

                ?>

            </ul>
        </ul>
        <div id="slideshowCaption">
            This is a caption
        </div>

    </div>
</div>





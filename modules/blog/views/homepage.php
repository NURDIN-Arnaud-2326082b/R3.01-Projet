<?php
$css_files = "style.css";
include __DIR__ . '/../controllers/header.php';
header_page("Accueil", $css_files);
?>



    <div class="slider">
        <img  class="slider-background" src="../../../img/raclette.jpg" >
        <div class="slider-content">
            <h1>Tenrac</h1>
            <p>blablabla</p>
        </div>
    </div>

    <div  id="about" class="section">
        <div class="boxed">
            <div class="flex toColumn mCenter">
                <div  class="w40 wm100">
                    <h2>blablabla</h2>

                </div>
                <div class="w60 wm100">
                    <p>aloalo</p>
                </div>
            </div>
        </div>
    </div>

    <div id="skills" class="section dark">
        <div class="boxed text-center">
            <h2>blablabla</h2>
            <div class="flex toColumn gap20">
                <div class="w25 wm100 skill">
                    <img src="img/html.png">
                    <h3>poulet</h3>
                </div>
                <div class="w25 wm100 skill">
                    <img src="img/css.png">
                    <h3>tenders</h3>
                </div>
                <div class="w25 wm100 skill">
                    <img src="img/c++.png">
                    <h3>bouffe</h3>
                </div>
                <div class="w25 wm100 skill">
                    <img src="img/java.png">
                    <h3>d'autre bouffe</h3>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>

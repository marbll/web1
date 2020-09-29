<!DOCTYPE html>
<html lang="en">
<head>
    <script src="js/jQuery.js"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Web 1</title>
</head>
<body>
<table id="mainTable">
    <tr>
        <td colspan="3" class="header"><div><span>Blinova Margarita, Anisova Tatiana P3230</span> <span>Variant: 2604 </span></div></td>
    </tr>
    <tr>
        <td class="left_col">
            <div id="svgWrapper">
                <svg width="450" height="450">
                    <polygon points="150,225 225,225 225,150"
                             fill="#d65674" fill-opacity="0.5" stroke="rgb(214, 86, 116)"></polygon> <!-- треугольник на графике-->


                    <polygon points="225,150 225,225 375,225, 375,150"
                             fill="#f21b5b" fill-opacity="0.4" stroke="rgb(242, 27, 91)"></polygon> <!-- прямоугольник на графике-->


                    <path d="M 225 375 A 150 150, 90, 0, 0, 375 225 L 225 225 Z"
                          fill="#FADADD" fill-opacity="0.6" stroke="rgb(250, 218, 221)"></path> <!-- сектор круга на графике-->


                    <line class="axis" x1="0" x2="450" y1="225" y2="225" stroke="rgb(78,35,59)" stroke-width="2"></line> <!--оси-->
                    <line class="axis" x1="225" x2="225" y1="0" y2="450" stroke="rgb(78,35,59)" stroke-width="2"></line>


                    <polygon points="225,0 219,16 231,16" stroke="rgb(78,35,59)" stroke-width="2"></polygon> <!-- стрелочки для осей-->
                    <polygon points="450,225 434,231 434,219" stroke="rgb(78,35,59)" stroke-width="2"></polygon>


                    <line class="core-line" x1="300" x2="300" y1="230" y2="220" stroke="rgb(78,35,59)" stroke-width="2"></line> <!-- шкала деления-->
                    <line class="core-line" x1="375" x2="375" y1="230" y2="220" stroke="rgb(78,35,59)" stroke-width="2"></line>

                    <line class="core-line" x1="75" x2="75" y1="230" y2="220" stroke="rgb(78,35,59)" stroke-width="2"></line>
                    <line class="core-line" x1="150" x2="150" y1="230" y2="220" stroke="rgb(78,35,59)" stroke-width="2"></line>

                    <line class="core-line" x1="220" x2="230" y1="150" y2="150" stroke="rgb(78,35,59)" stroke-width="2"></line>
                    <line class="core-line" x1="220" x2="230" y1="75" y2="75" stroke="rgb(78,35,59)" stroke-width="2"></line>

                    <line class="core-line" x1="220" x2="230" y1="300" y2="300" stroke="rgb(78,35,59)" stroke-width="2"></line>
                    <line class="core-line" x1="220" x2="230" y1="375" y2="375" stroke="rgb(78,35,59)" stroke-width="2"></line>


                    <text class="core-text" x="290" y="215">R/2</text> <!--подписи к шкале деления-->
                    <text class="core-text" x="370" y="215">R</text>

                    <text class="core-text" x="65" y="215" >-R</text>
                    <text class="core-text" x="135" y="215">-R/2</text>

                    <text class="core-text" x="235" y="155">R/2</text>
                    <text class="core-text" x="235" y="80">R</text>

                    <text class="core-text" x="235" y="305">-R/2</text>
                    <text class="core-text" x="235" y="379">-R</text>



                </svg>
            </div>

        </td>
        <td class="center_col">
            <div id="answer">
                <p id="textCloud"></p>
                <img id="answerCloud" src="img/cloud3.png">
            </div>
        </td>

        <td class="right_col">
            <div id="panel">
                <form id="form1" method = "GET", action = "index.php">
                <div id="buttonXWrapper">
                    <h3>Choose X:</h3>
                    <div id="buttonX">
                        <button class="inputX">-4</button>
                        <button class="inputX">-1</button>
                        <button class="inputX">2</button>
                        <button class="inputX">-3</button>
                        <button class="inputX">0</button>
                        <button class="inputX">3</button>
                        <button class="inputX">-2</button>
                        <button class="inputX">1</button>
                        <button class="inputX">4</button>
                    </div>
                </div>
                <div id="buttonYWrapper">
                    <input id="inputY" type="text" placeholder="Enter Y:"/>
                </div>
                <div id="buttonZWrapper">
                    <h3>Choose R:</h3>
                    <div id="buttonZ">
                        <select id="inputR">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
                <div id="sendClearWrapper">
                    <button id="send">Send</button>
                    <button id="clear">Clear</button>
                </div>
                </form>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <div id="shitTableWrapper">
                <table id="shitTable">
                    <tr>
                        <th>X</th>
                        <th>Y</th>
                        <th>R</th>
                        <th>Result</th>
                        <th>Current time</th>
                        <th>Computation time</th>
                    </tr>
                    <tbody id="writingResult">
                        <?php
                            include "send.php";
                        ?>
                    </tbody>
                </table>
            </div>
        </td>

    </tr>
</table>

<div id="anchor"></div>
</body>

<script>
    let sendButton = document.getElementById("send");
    let clearButton = document.getElementById("clear");
    let inputX = document.getElementsByClassName("inputX");
    let clickedX = null;
    let inputY = document.getElementById("inputY");
    let inputR = document.getElementById("inputR");
    let textCloud = document.getElementById("textCloud");
    let form1 = document.getElementById("form1");
    clearButton.addEventListener("click", function (event){
        event.preventDefault();
        fetch('clear.php', {
            method: 'GET',
        });
        let result = document.getElementById("writingResult");
        result.innerHTML = "";
        textCloud.innerText = "Table cleared";
    })
    form1.addEventListener("submit", function (event){
        event.preventDefault();
        if (clickedX!=null){
            let x = clickedX.innerText;
            let y = inputY.value;
            let afterDot = (y.toString().includes('.')) ? (y.toString().split('.').pop().length) : (0);
            if(isFinite(y) && afterDot>10){
                textCloud.innerText = "Y must have less than 11\n digits after a dot";
            }else {
                if (isFinite(y) && y>-3 && y<5 /*&& y!=""*/){
                    if (y!=""){
                        y = Number(y).toFixed(10);
                        let r = inputR.value;
                        let result = document.getElementById("writingResult");
                        //event.preventDefault(); // отменяем действие события по умолчанию
                        $.get("send.php", { x: x, y: y, r: r }, function (data, status){
                            result.innerHTML = data;
                        });
                        if (((x * x + y * y) <= r * r && x >= 0 && y <= 0) ||
                            (y <= x + r / 2 && x <= 0 && y >= 0) ||
                            (x >= 0 && y >= 0 && x <= r && y <= r / 2)) {
                            textCloud.innerText = "Point hits the figure";
                        }else {
                            textCloud.innerText = "Point doesn't hit\nthe figure";
                        }
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $("#anchor").offset().top
                        }, 1000);
                    }
                    else{
                        textCloud.innerText = "You forgot to enter Y";
                    }

                }
                else{
                    textCloud.innerText = "Y must be a number,\nY∈(-3;5)"
                }
            }
        }
        else{
            textCloud.innerText = "You forgot to enter X";
        }



    });
    for(let i=0; i<inputX.length; i++){
        inputX[i].addEventListener("click", function (event){
            event.preventDefault();
            clickedX = event.target;
            for(let k=0; k<inputX.length; k++){
                inputX[k].style.backgroundColor = "rgba(250, 218, 221, 1)";
            }
            clickedX.style.backgroundColor = "rgba(240, 185, 203, 0.8)";
        });
    }

</script>

</html>
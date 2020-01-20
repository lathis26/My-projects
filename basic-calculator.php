<!DOCTYPE html>
<html>
<head>
    <title>My CSS</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<style>
    h1{
        text-align: center;
        color: #0e00b6;
    }
    #calculator{
        background: #f6f6f6;
        border: 2px groove #6c6c6c;
        width:500px;
        height:454px;
        margin: auto;
    }

    #display{
        width: 100%;
        height: 120px;
        background: #cecece;
        color: #fff;
        font-size: 65px;
        text-align: right;
        vertical-align: text-bottom;
        padding-right: 10px;
        border-bottom: 2px double #0d2940;
    }

    #keyboard{
        width: 100%;
        background: #c7c7c7;
        border-bottom: 1px solid #000;
    }

    #keyboard tr{
        height: 50px;
        background: #eeeeee;
    }

    #keyboard tr:first-child{
        background: #c9c9c9;
    }

    #keyboard td{
        border-right: 1px solid #000000;
        text-align: center;
        font-size: 35px;
        color: #000 ;
        border-top: 1px solid #000000;
        cursor: pointer;
        font-weight: bold;
    }
    body{
        background: #0d2940;
    }
    h1{
        color: #ffc40f;
    }
</style>
<script>
    $( document ).ready(function(event) {
        var tmp='';
        var keycode = 0;
        //Read the keyboard input
        document.onkeypress = function (event) {
            event = event || window.event;
            keycode = event.keyCode;
            console.log(keycode);
        };
        //####################################
        $(".operator").click(function () {
            return calc($(this), 'operator');
        });
        //####################################
        $(".number").click(function () {
            return calc($(this),'number')
        });
        //####################################
        $(".answer").click(function () {
            return calc($(this),'answer')
        });
        //####################################
        $(".reset").click(function () {
            resetcal(true);
        });
        //####################################
        var scounter = 0;
        var numsonly='';
        var numsonly2='';
        var value ='';
        var sign = '';
        var answer = false;
        function calc(obj, from) {
            if (from=='number'){
                value = obj.text();
                if (sign=='') {
                    numsonly += value;
                }else{
                    numsonly2 += value;
                }
                tmp+=value;
            }
            if (from=='operator'){
                value = obj.text();
                tmp+=value;
                sign=value;
                scounter++;
                if (scounter>1) {
                    tmp = numsonly;
                    tmp+=value;
                    sign=value;
                }

            }
            if (from=='answer'){
                answer=true;
            }

            if (numsonly2!='' && answer) {
                var result = eval(numsonly + sign + numsonly2);
                resetcal();
                $("#result").text(result);

                if($("#result").text().length>6){
                    result = $("#result").text().substring(0,5);
                    $("#result").text(result);
                }
            }else{
                $("#result").text(numsonly + sign + numsonly2);
            }

        }
        //####################################
        function resetcal(clear=false) {
            scounter = 0;
            numsonly='';
            numsonly2='';
            value ='';
            sign = '';
            answer = false;
            if (clear){
                $("#result").text('');
            }
        }
        //####################################
    });
</script>
<h1>Basic Calculator</h1>
<div id="calculator">
    <div id="display">
        <span id="result"></span>
    </div>

    <table id="keyboard">
        <tr>
            <td><button class="btn btn-default reset">AC</button></td>
            <td><button class="btn btn-default">+/-</button></td>
            <td><button class="btn btn-default operator">%</button></td>
            <td><button class="btn btn-default operator">/</button></td>
        </tr>
        <tr>
            <td><button class="btn btn-default number">7</button></td>
            <td><button class="btn btn-default number">8</button></td>
            <td><button class="btn btn-default number">9</button></td>
            <td><button class="btn btn-default operator">*</button></td>
        </tr>
        <tr>
            <td><button class="btn btn-default number">4</button></td>
            <td><button class="btn btn-default number">5</button></td>
            <td><button class="btn btn-default number">6</button></td>
            <td><button class="btn btn-default operator">-</button></td>
        </tr>
        <tr>
            <td><button class="btn btn-default number">1</button></td>
            <td><button class="btn btn-default number">2</button></td>
            <td><button class="btn btn-default number">3</button></td>
            <td><button class="btn btn-default operator">+</button></td>
        </tr>
        <tr>
            <td colspan="2"><button class="btn btn-default number">0</button></td>
            <td><button class="btn btn-default">.</button></td>
            <td><button class="btn btn-default answer">=</button></td>
        </tr>
    </table>




</div>
</body>
</html>

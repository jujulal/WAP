$(function () {
    "use strict";
    var divs = $("#puzzlearea div");
    for (var i = 0; i < divs.length; i++) {
        var div = divs[i];
        var x = ((i % 4) * 100);
        var y = (Math.floor(i / 4) * 100);
        div.className = "puzzlepiece";
        div.style.left = x + 'px';
        div.style.top = y + 'px';
        div.style.backgroundImage = 'url("background.jpg")';
        div.style.backgroundPosition = -x + 'px ' + (-y) + 'px';
        div.x = x;
        div.y = y;
    }
    var divscom = (function () {
        var d = [];
        var c = $(".puzzlepiece");
        for (var i = 0; i < c.length; i++) {
            d[i] = {x: $(c[i]).position().left,
                y: $(c[i]).position().top
            };
        }
        return d;

    }());
    var emptytop = 300;
    var emptyleft = 300;
    function shifttoempty(current) {
        var pos = current.position();
        current.css("top", emptytop + "px");
        current.css("left", emptyleft + "px");
        emptyleft = pos.left;
        emptytop = pos.top;

    }
    function checkwin() {
        var divnow = (function () {
            var d = [];
            var c = $(".puzzlepiece");
            for (var i = 0; i < c.length; i++) {
                d[i] = {x: $(c[i]).position().left,
                    y: $(c[i]).position().top
                };


            }
            return d;
        }());
        var complete = true;
        for (var i = 0; i < divscom.length; i++) {
            if ((Math.floor(divscom[i].x) !== Math.floor(divnow[i].x)) || (Math.floor(divscom[i].y) !== Math.floor(divnow[i].y))) {
                complete = false;
            }
        }
        if (complete) {
            alert("You Won! HURRAY!!");

        }
    }

    $(".puzzlepiece").click(function () {
        var current = $(this).position();
        if ((emptytop === current.top && (emptyleft === current.left + 100 || emptyleft === current.left - 100)) || (emptyleft === current.left && (emptytop === current.top + 100 || emptytop === current.top - 100))) {
            shifttoempty($(this));
            checkwin();

        }
    });
    $(".puzzlepiece").hover(function () {
        var current = $(this).position();
        if ((emptytop === current.top && (emptyleft === current.left + 100 || emptyleft === current.left - 100)) || (emptyleft === current.left && (emptytop === current.top + 100 || emptytop === current.top - 100))) {
            $(this).addClass("movablepiece");
        }
    }, function () {
        $(this).removeClass("movablepiece");
    });
    $("#shufflebutton").click(function () {
        for (var i = 0; i < 100; i++) {
            var allpiece = $(".puzzlepiece");
            var pice = [];
            var k = 0;
            for (var j = 0; j < allpiece.length; j++) {

                if ((emptytop === Math.floor($(allpiece[j]).position().top) && (emptyleft === Math.floor($(allpiece[j]).position().left + 100) || emptyleft === Math.floor($(allpiece[j]).position().left - 100))) || (emptyleft === Math.floor($(allpiece[j]).position().left) && (emptytop === Math.floor($(allpiece[j]).position().top + 100) || emptytop === Math.floor($(allpiece[j]).position().top - 100)))) {
                    pice[k] = $(allpiece[j]);
                    k++;
                }
            }
            shifttoempty($(pice[Math.floor(Math.random() * (pice.length))]));
        }
    });



});


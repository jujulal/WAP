$(document).ready(function () {
    'use strict';
    var boundries = $(".boundary"),
        won = true,
        start = $("#start"),
        end = $("#end"),
        endClicked = function () {
            boundries.unbind("mouseover");
            end.unbind("click");
            if (won) {
                $('#status').text("You win! :)");
            } else {
                $('#status').text("You Lose! :(");
            }
        },
        boundryHovered = function () {
            won = false;
            boundries.addClass("youlose");
        },
        startClicked = function () {
            won = true;
            end.bind('click', endClicked);
            boundries.removeClass("youlose");
            boundries.bind("mouseover", boundryHovered);
        };
    end.unbind('click');
    start.click(startClicked);
});
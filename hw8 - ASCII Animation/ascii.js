"use strict";
window.onload = loaded;
function loaded() {
    var startAnim = document.getElementById("start");
    var stopAnim = document.getElementById("stop");
    var fieldset = document.getElementById("viewarea");
    var animation = document.getElementById("amination");
    var animationSize = document.getElementById("aminationsize");
    var animationSpeed = document.getElementById("animationspeed");
    disableme(false, true, false);
    startAnim.onclick = start;
    stopAnim.onclick = stop;
    animation.onchange = animationChanged;
    animationSize.onchange = sizeChanged;
    animationSpeed.onchange = speedChanged;
    function start() {
        if (fieldset.value === null || fieldset.value === "") {
            alert("Nothing to animate");
        } else {
            sizeChanged();
            speed = animationSpeed.checked ? 50 : 250;
            clearTimeInterval();
            startAnimation(ANIMATIONS[animation.value], speed);
            disableme(true, false, true);
        }
    }

    var time = null;
    var speed = 0;
    var count = 0;
    var frames = null;

    function startAnimation(animationString, speed) {
        frames = animationString.split("=====\n");
        time = setInterval(function animate() {
            fieldset.value = frames[count % frames.length];
            count += 1;
        }, speed);
    }

    function stop() {
        disableme(false, true, false);
        clearTimeInterval();
        //to reset the animation
        count = 0;
        fieldset.value = frames.join("=====\n");
    }

    function clearTimeInterval() {
        if (time !== null) {
            clearInterval(time);
            time = null;
        }
    }

    function disableme(startStatus, stopStatus, selectStatus) {
        startAnim.disabled = startStatus;
        stopAnim.disabled = stopStatus;
        animation.disabled = selectStatus;
    }

    function animationChanged() {
        clearTimeInterval();
        count = 0;
        speed = 0;
        fieldset.value = ANIMATIONS[animation.value];
    }

    function sizeChanged() {
        fieldset.style.fontSize = animationSize.value;
    }

    function speedChanged() {
        speed = animationSpeed.checked ? 50 : 250;
        clearTimeInterval();
        if (startAnim.disabled == true) {
            startAnimation(ANIMATIONS[animation.value], speed);
        }
    }
}
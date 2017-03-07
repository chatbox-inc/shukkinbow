var year,month,day,hour,min,sec,date,time;

function getToday(){
    var dtObj = new Date();
    year = dtObj.getFullYear();
    month = dtObj.getMonth()+1;
    day = dtObj.getDate();
    hour = dtObj.getHours();
    min = dtObj.getMinutes();
    sec = dtObj.getSeconds();

    modTimeFormat();

    date = year+"-"+month+"-"+day;
    time = hour+":"+min+":"+sec;
}


function modTimeFormat(){
    if(month < 10){ month = "0" + month; }
    if(day < 10){ day = "0" + day; }
    if(hour < 10) { hour = "0" + hour; }
    if(min < 10) { min = "0" + min; }
    if(sec < 10) { sec = "0" + sec; }
}


function dispCurrentTime(){
    if(document.getElementById("current")) {
        document.getElementById("current").innerHTML = time;
    }
}

function getCurrentTime(){
    getToday();

    dispCurrentTime(); // 現在時刻を表示させたい時だけ

    setTimeout('getCurrentTime()',1000);
}


function workStart() {
    $.post("/starttime",
        {
            start_time: date + " " + time,
            work_location : work_location
        }
    ).done(function(){
        location.href="/count"
    });
}


var timer,start_time;

function getCountInfo(){
    $.get("/countinfo", function (time) {
            start_time = time;
        }
    ).done(function () {
        countUp();
    });
}


function countUp() {
    getToday();
    modTimeFormat();

    var current =  new Date(date+" "+time);
    var start = new Date(start_time);

    current = current.getTime();
    start = start.getTime();

    var timer = current - start;
    timer = timer/1000;

    sec =  timer%60;
    min =  Math.floor(timer/60%60);
    hour = Math.floor(timer/3600%24);

    modTimeFormat();

    timer = hour + ":" + min + ":" + sec ;

    document.getElementById("count_up").innerHTML = timer;
    setTimeout("countUp()", 1000);
}


function workEnd() {
    getCurrentTime();

    $.post("/endtime",
        {
            end_time: date+" "+time,
            working_time:timer,
        }
    ).done(function(){
        document.cookie = 'timer = ' + false
        location.href="/end"
    });
}
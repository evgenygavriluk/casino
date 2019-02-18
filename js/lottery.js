function getXmlHttp() {
    var xmlhttp;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
};

function tryWin()
{
    var win;
    var xmlhttp = getXmlHttp();
    xmlhttp.open('POST', 'lottery_back.php', true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    var zapros='try=1';
    xmlhttp.send(zapros);
    xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4) {
            if(xmlhttp.status == 200) {
                result = xmlhttp.responseText;
                win = JSON.parse(result);
                alert('Your prize is '+win[1]+' '+win[0]);
            }
        }
    }
}

let prizeButton = document.querySelector('#prizeButton');
let wheel = document.querySelector('#wheel');

prizeButton.addEventListener('click', function(){
    wheel.classList.add('wheel-rotate');
    var timeCount = 0;
    var timer = setInterval(()=>{
        if(timeCount>5){
            wheel.classList.remove('wheel-rotate');
            clearInterval(timer);
            tryWin();
        }
        timeCount++;
        console.log(timeCount);
    }, 1000)

})
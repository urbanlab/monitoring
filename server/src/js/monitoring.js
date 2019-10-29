function action(prototype='', action='') {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
    {
        if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
        }
    };
    xmlhttp.open("GET", "http://192.168.71.201/server/ajaxController.php?proto=" + prototype + "&action=" + action, true);
    xmlhttp.send();
}
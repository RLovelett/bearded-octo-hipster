(function($){
    var ws = new WebSocket("ws://localhost:8080");

    ws.onopen = function(event) {
        console.log("Opened!");
        console.log(event);
    }

    ws.onclose = function(event) {
        console.log("Closed.");
        console.log(event);
    }

    ws.onmessage = function(event) {
        if(event.data) {
            var obj = $.parseJSON(event.data);
            if(obj && obj.guid) {
                console.log("GUID!");
                ws.close();
            }
        }
    }
}(jQuery))